<?php

class ContenidosParametrosController extends Controller {

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
                'actions' => array('index'),
                'expression' => 'Yii::app()->user->checkAccess("listarParametros")',
            ),
            array('allow',
                'actions' => array('create'),
                'expression' => 'Yii::app()->user->checkAccess("crearParametros")',
            ),
            array('allow',
                'actions' => array('update'),
                'expression' => 'Yii::app()->user->checkAccess("editarParametros")',
            ),
            array('allow',
                'actions' => array('delete'),
                'expression' => 'Yii::app()->user->checkAccess("eliminarParametros")',
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
        $model = new ContenidosParametros;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ContenidosParametros'])) {
            $model->attributes = $_POST['ContenidosParametros'];
            if ($model->save())
                $this->redirect(array('index'));
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

        if (isset($_POST['ContenidosParametros'])) {
            $model->attributes = $_POST['ContenidosParametros'];
            if ($model->save())
                $this->redirect(array('index'));
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
        /* $dataProvider=new CActiveDataProvider('ContenidosParametros');
          $this->render('index',array(
          'dataProvider'=>$dataProvider,
          )); */

        $model = new ContenidosParametros('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ContenidosParametros']))
            $model->attributes = $_GET['ContenidosParametros'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ContenidosParametros('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ContenidosParametros']))
            $model->attributes = $_GET['ContenidosParametros'];

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
        $model = ContenidosParametros::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'contenidos-parametros-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
