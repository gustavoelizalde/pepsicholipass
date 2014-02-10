<?php

class EditForm extends CFormModel {

    public $titulo;
    public $contenido;
    public $activo;

    public function rules() {
        return array(
            array('titulo, contenido', 'required'),
        );
    }

}

?>