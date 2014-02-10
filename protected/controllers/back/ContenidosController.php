<?php

class ContenidosController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        $cat_name = $categoria = ContenidosCategorias::model()->findByPk(intval($_GET['cat']))->nombre;
        return array(
            array('allow',
                'expression' => 'Yii::app()->user->id == "admin-root"',
            ),
            array('allow',
                'actions' => array('index'),
                'expression' => 'Yii::app()->user->checkAccess("listar' . $cat_name . '")',
            ),
            array('allow',
                'actions' => array('create'),
                'expression' => 'Yii::app()->user->checkAccess("crear' . $cat_name . '")',
            ),
            array('allow',
                'actions' => array('update'),
                'expression' => 'Yii::app()->user->checkAccess("editar' . $cat_name . '")',
            ),
            array('allow',
                'actions' => array('delete'),
                'expression' => 'Yii::app()->user->checkAccess("eliminar' . $cat_name . '")',
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Contenidos;
        $categoria = ContenidosCategorias::model()->findByPk(intval($_GET['cat']));
        $idiomas = Idiomas::model()->findAll();

        for ($i = 0; $i < count($idiomas); $i++) {
            $idiomas_model[] = new ContenidosXIdiomas();
        }

        for ($j = 0; $j < count($categoria->parametros); $j++) {
            for ($i = 0; $i < count($idiomas); $i++) {
                $temp[$idiomas[$i]->id] = new ContenidosXContenidosParametros();
                $temp[$idiomas[$i]->id]->contenidos_parametros_id = $categoria->parametros[$j]->id;
                $temp[$idiomas[$i]->id]->idiomas_id = $idiomas[$i]->id;
            }
            $parametros_model[] = $temp;
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Contenidos'])) {
            $validate_idiomas = true;
            $validate_parametros = true;
            /*
              Cargo los modelos con sus datos correspondientes y luego valido
             */
            // Contenido
            $model->fecha_alta = time();
            $model->attributes = $_POST['Contenidos'];
            $model->fecha = CDateTimeParser::parse($model->fecha, 'yyyy-MM-dd');
            // Contenido por Idiomas
            if (isset($_POST['ContenidosXIdiomas'])) {
                for ($i = 0; $i < count($_POST['ContenidosXIdiomas']); $i++) {
                    $idiomas_model[$i]->attributes = $_POST['ContenidosXIdiomas'][$i];
                    $idiomas_model[$i]->contenidos_id = 0;
                    if (!$idiomas_model[$i]->validate())
                        $validate_idiomas = false;
                }
            }
            // Contenido por Parametros
            if (isset($_POST['ContenidosXContenidosParametros'])) {
                for ($j = 0; $j < count($_POST['ContenidosXContenidosParametros']); $j++) {
                    for ($i = 0; $i < count($idiomas); $i++) {
                        $parametros_model[$j][$idiomas[$i]->id]->attributes = $_POST['ContenidosXContenidosParametros'][$j][$idiomas[$i]->id];
                        $parametros_model[$j][$idiomas[$i]->id]->contenidos_id = 0;
                        if (!$parametros_model[$j][$idiomas[$i]->id]->validate())
                            $validate_parametros = false;
                    }
                }
            }

            /*
              Valido y guardo
             */
            if ($model->save() && $validate_idiomas && $validate_parametros) {
                for ($i = 0; $i < count($_POST['ContenidosXIdiomas']); $i++) {
                    $idiomas_model[$i]->contenidos_id = $model->id;
                    $idiomas_model[$i]->save();
                }
                for ($j = 0; $j < count($_POST['ContenidosXContenidosParametros']); $j++)
                    for ($i = 0; $i < count($idiomas); $i++) {
                        $parametros_model[$j][$idiomas[$i]->id]->contenidos_id = $model->id;
                        $parametros_model[$j][$idiomas[$i]->id]->save();
                    }
                for ($i = 0; $i < count($_POST['cat']); $i++) {
                    $temp = new ContenidosXContenidosCategorias();
                    $temp->contenidos_categorias_id = $_POST['cat'][$i];
                    $temp->contenidos_id = $model->id;
                    $temp->save();
                }
                for ($i = 0; $i < count($_POST['archivo']); $i++) {
                    $temp = new Archivos();
                    $temp->archivo = $_POST['archivo'][$i];
                    $temp->tipo = end(explode('.', $_POST['archivo'][$i]));
                    if ($temp->save()) {
                        $temp2 = new ArchivosXContenidos();
                        $temp2->archivos_id = $temp->id;
                        $temp2->contenidos_id = $model->id;
                        $temp2->save();
                    }
                }

                $this->redirect(array('index', 'cat' => $_GET['cat']));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'idiomas' => $idiomas,
            'idiomas_model' => $idiomas_model,
            'parametros_model' => $parametros_model
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model->fecha = date('Y-m-d',$model->fecha);
        $categoria = ContenidosCategorias::model()->findByPk(intval($_GET['cat']));
        $idiomas = Idiomas::model()->findAll();

        foreach ($idiomas as $idioma) {
            $idiomas_model[] = ContenidosXIdiomas::model()->findByAttributes(
                    array(
                        'contenidos_id' => $model->id,
                        'idiomas_id' => $idioma->id
                    )
            );
        }

        for ($j = 0; $j < count($categoria->parametros); $j++) {
            foreach ($idiomas as $idioma) {
                $temp[$idioma->id] = ContenidosXContenidosParametros::model()->findByAttributes(
                        array(
                            'contenidos_id' => $model->id,
                            'contenidos_parametros_id' => $categoria->parametros[$j]->id,
                            'idiomas_id' => $idioma->id
                        )
                );
            }
            $parametros_model[] = $temp;
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Contenidos'])) {
            $validate_idiomas = true;
            $validate_parametros = true;
            /*
              Cargo los modelos con sus datos correspondientes y luego valido
             */
            // Contenido
            $model->fecha_edit = time();
            $model->attributes = $_POST['Contenidos'];
            $model->fecha = CDateTimeParser::parse($model->fecha, 'yyyy-MM-dd');
            // Contenido por Idiomas
            if (isset($_POST['ContenidosXIdiomas'])) {
                for ($i = 0; $i < count($_POST['ContenidosXIdiomas']); $i++) {
                    $idiomas_model[$i]->attributes = $_POST['ContenidosXIdiomas'][$i];
                    $idiomas_model[$i]->contenidos_id = 0;
                    if (!$idiomas_model[$i]->validate())
                        $validate_idiomas = false;
                }
            }
            // Contenido por Parametros
            if (isset($_POST['ContenidosXContenidosParametros'])) {
                for ($j = 0; $j < count($_POST['ContenidosXContenidosParametros']); $j++) {
                    for ($i = 0; $i < count($idiomas); $i++) {
                        $parametros_model[$j][$idiomas[$i]->id]->attributes = $_POST['ContenidosXContenidosParametros'][$j][$idiomas[$i]->id];
                        $parametros_model[$j][$idiomas[$i]->id]->contenidos_id = 0;
                        if (!$parametros_model[$j][$idiomas[$i]->id]->validate())
                            $validate_parametros = false;
                    }
                }
            }

            /*
              Valido y guardo
             */
            if ($model->save() && $validate_idiomas && $validate_parametros) {
                for ($i = 0; $i < count($_POST['ContenidosXIdiomas']); $i++) {
                    $idiomas_model[$i]->contenidos_id = $model->id;
                    $idiomas_model[$i]->save();
                }
                for ($j = 0; $j < count($_POST['ContenidosXContenidosParametros']); $j++)
                    for ($i = 0; $i < count($idiomas); $i++) {
                        $parametros_model[$j][$idiomas[$i]->id]->contenidos_id = $model->id;
                        $parametros_model[$j][$idiomas[$i]->id]->save();
                    }
                ContenidosXContenidosCategorias::model()->deleteAll('contenidos_id = ' . $model->id);
                for ($i = 0; $i < count($_POST['cat']); $i++) {
                    $temp = new ContenidosXContenidosCategorias();
                    $temp->contenidos_categorias_id = $_POST['cat'][$i];
                    $temp->contenidos_id = $model->id;
                    $temp->save();
                }
                for ($i = 0; $i < count($_POST['archivo']); $i++) {
                    $temp = new Archivos();
                    $temp->archivo = $_POST['archivo'][$i];
                    $temp->tipo = end(explode('.', $_POST['archivo'][$i]));
                    if ($temp->save()) {
                        $temp2 = new ArchivosXContenidos();
                        $temp2->archivos_id = $temp->id;
                        $temp2->contenidos_id = $model->id;
                        $temp2->save();
                    }
                }

                $this->redirect(array('index', 'cat' => $_GET['cat']));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'idiomas' => $idiomas,
            'idiomas_model' => $idiomas_model,
            'parametros_model' => $parametros_model
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = Contenidos::model()->findByPk($id);

        ContenidosXIdiomas::model()->deleteAll('contenidos_id = ' . $model->id);
        ContenidosXContenidosParametros::model()->deleteAll('contenidos_id = ' . $model->id);
        ContenidosXContenidosCategorias::model()->deleteAll('contenidos_id = ' . $model->id);
        for ($i = 0; $i < count($model->archivos); $i++)
            $model->archivos->delete();
        ArchivosXContenidos::model()->deleteAll('contenidos_id = ' . $model->id);
        $model->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        /* $dataProvider=new CActiveDataProvider('Contenidos');
          $this->render('index',array(
          'dataProvider'=>$dataProvider,
          )); */

        $model = new Contenidos('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Contenidos']))
            $model->attributes = $_GET['Contenidos'];

        $this->render('admin', array(
            'model' => $model
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Contenidos('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Contenidos']))
            $model->attributes = $_GET['Contenidos'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Contenidos::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'contenidos-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
