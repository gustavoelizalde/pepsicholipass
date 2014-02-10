<?php

class RegistradosController extends Controller {

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
        return array(
			array('allow',
                'expression' => 'Yii::app()->user->id == "admin-root"',
            ),
			array('allow',
                'actions' => array('excel', 'updatePageSize'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('index'),
                'expression' => 'Yii::app()->user->checkAccess("listarRegistrados")',
            ),
            array('allow',
                'actions' => array('create'),
                'expression' => 'Yii::app()->user->checkAccess("crearRegistrados")',
            ),
            array('allow',
                'actions' => array('update'),
                'expression' => 'Yii::app()->user->checkAccess("editarRegistrados")',
            ),
            array('allow',
                'actions' => array('delete'),
                'expression' => 'Yii::app()->user->checkAccess("eliminarRegistrados")',
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

    public function actionExcel() {
        $separador = $_GET['separador'];
        
        $xml = "Id" . $separador . "Evento" . $separador . "Fecha" . $separador . "Nombre" . $separador . "Apellido" . $separador . "Email" . $separador . "Telefono" . $separador . "Comentario" . $separador . "FB Id" . $separador . "\r\n";
        $model = Registrados::model()->findAll();

        foreach ($model as $m) {
            $evento_titulo = utf8_decode($m->cont->contenidos_x_idiomas[0]->titulo);
            $evento_titulo = str_replace('"', "'", $evento_titulo);
            $nombre = utf8_decode($m->nombre);
            $nombre = str_replace('"', "'", $nombre);
            $apellido = utf8_decode($m->apellido);
            $apellido = str_replace('"', "'", $apellido);
            $comentario = utf8_decode($m->comentario);
            $comentario = str_replace('"', "'", $comentario);
            $xml .= $m->id . $separador. '"' . $evento_titulo . '"' . $separador . utf8_decode(date("Y-m-d", $m->cont->fecha)) . $separador . '"' . $nombre . '"' . $separador . '"' . $apellido . '"' . $separador . $m->email . $separador . utf8_decode($m->telefono) . $separador . '"' . $comentario . '"'. $separador . $m->facebookId . $separador . "\r\n";
        }

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . date('m-d-Y', time()) . "_registro.csv");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        ob_clean();
        flush();
        echo $xml;
        exit;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Registrados;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Registrados'])) {
            $model->attributes = $_POST['Registrados'];
            if ($model->save())
                $this->redirect(array('Registrados/index'));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Registrados'])) {
            $model->attributes = $_POST['Registrados'];
            if ($model->save())
                $this->redirect(array('Registrados/index'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    
    
    public function actionIndex() {
        $model = new Registrados('search');
        if ($_POST['Registrados']['pageSize'])
            $model->pageSize = $_POST['Registrados']['pageSize'];
//        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Registrados']))
            $model->attributes = $_GET['Registrados'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Registrados('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Registrados']))
            $model->attributes = $_GET['Registrados'];

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
        $model = Registrados::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'registrados-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    
    public function actionUpdatePageSize(){
        $_SESSION['pageSize'] = $_POST['pageSize'];
        echo $_SESSION['pageSize'];
    }

}
