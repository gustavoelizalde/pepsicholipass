<?php

class Noticias extends CActiveRecord {
    
    public $titulo;
    public $contenido;
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

?>