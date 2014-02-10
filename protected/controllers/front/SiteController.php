<?php

class SiteController extends Controller {

    public $liked = false;

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->renderPartial('error', $error);
        }
    }

    public function actionIndex() {
        $facebook = new Facebook(array(
            'appId' => '623431217672700',
            'secret' => '19249b10ff0411d523d1569b5689ca78',
        ));
        $theRequest = $facebook->getSignedRequest();
        if ($theRequest["page"]["liked"] == 1 || $_GET[valid] == 'ok') {
            $liked = true;
        } else {
            $liked = false;
        }
        $this->render('index', array('liked' => $liked));
    }

    public function actionHome() {
        $contenidos = CMSClass::getContenidos(array('categoria' => 1, 'order' => 'fecha'));
        foreach ($contenidos as $cont)
            $eventos[date('Y', $cont->fecha)][date('n', $cont->fecha)][date('j', $cont->fecha)][] = $cont;
        $this->render('home', array(
            'eventos' => $eventos
        ));
    }

    public function actionForm() {
        $this->render('form');
    }

    public function actionWinTicket() {
        $this->render('win_ticket');
    }

    public function actionWinExist() {
        $this->render('win_exist');
    }

    public function actionWinMorePoints() {
        $this->render('win_morepoints');
    }

    public function actionSave() {
        $model = new Registrados();
        $model->attributes = $_POST['Registrados'];
        $model->fecha_alta = time();
        
        $criteria = new CDbCriteria();
        $criteria->compare('facebookId', $model->facebookId);
        $criteria->order = "id DESC";
        
        $old_model = Registrados::model()->find($criteria);

        if(is_object($old_model) && time() < ($old_model->fecha_alta + 24*60*60) && !isset($_POST['share']))
            echo "exist";
        else {
            $model->save();
            echo "ok";
        }
    }

    public function actionCheck() {
        $fb = $_POST['fb'];
        
        $criteria = new CDbCriteria();
        $criteria->compare('facebookId', $fb);
        $criteria->order = "id DESC";
        
        $old_model = Registrados::model()->find($criteria);
        
        if(is_object($old_model) && time() < ($old_model->fecha_alta + 24*60*60))
            echo "exist";
        else
            echo "ok";
    }

}