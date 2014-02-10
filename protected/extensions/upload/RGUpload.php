<?php

class RGUpload extends CWidget {

    private $_baseUrl;
    public $id = "btn_archivo";
    public $controller = "upload";
    public $action = "upload";
    public $extencions = "*";
    public $recortes = "120x120";
    public $cantidadTotal = "3";

    public function init() {
        $this->registerCoreScripts();
        $this->renderButtom();
    }

    private function renderButtom() {
        $action = CHtml::normalizeUrl(array($this->controller . '/' . $this->action));

        echo '<div id="' . $this->id . '" class="btn_upload"><span id="label"></span><a href="javascript:void(0)"></a><span id="loader">cargando..</span></div><div class="listItems"><ul></ul></div>';

        Yii::app()->getClientScript()->registerScript(
                'script_' . $this->id, 'addAjaxUpload("' . $this->id . '","' . $action . '","' . $this->extencions . '","' . $this->recortes . '","' . Yii::app()->request->baseUrl . '",'.$this->cantidadTotal.');', CClientScript::POS_READY
        );
    }

    private function registerCoreScripts() {
        $localAssetsDir = dirname(__FILE__) . '/assets';
        $this->_baseUrl = Yii::app()->getAssetManager()->publish($localAssetsDir);

        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.js');

        foreach (scandir($localAssetsDir) as $f) {
            $_f = strtolower($f);
            if (strstr($_f, ".js"))
                $cs->registerScriptFile($this->_baseUrl . "/" . $_f);
            if (strstr($_f, ".css"))
                $cs->registerCssFile($this->_baseUrl . "/" . $_f);
        }
    }

    /*
      public function run()
      {

      }
     */
}

?>