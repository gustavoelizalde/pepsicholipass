<?php

class WebUser extends CWebUser {

    private $_model;

    function getRol() {
		$return = array();
		$roles = Yii::app()->authManager->getRoles(Yii::app()->user->id);
        foreach($roles as $rol)
			$return[] = $rol->name;
		return implode(', ', $return);
    }

    function getNombre() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->nombre;
    }

    function getApellido() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->apellido;
    }

    function getAvatar() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->avatar;
    }

    protected function loadUser($id = null) {
        if ($this->_model === null) {
            if ($id !== null)
                $this->_model = Staff::model()->findByPk($id);
        }
        return $this->_model;
    }

}

?>