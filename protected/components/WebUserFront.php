<?php
class WebUserFront extends CWebUser{
	
	private $_model;
	
	function getNombre(){
    	$user = $this->loadUser(Yii::app()->user->id);
    	return $user->nombre;
  	}
	
	function getApellido(){
    	$user = $this->loadUser(Yii::app()->user->id);
    	return $user->apellido;
  	}
	
	protected function loadUser($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null)
				$this->_model=Usuarios::model()->findByPk($id);
		}
		return $this->_model;
	}
}
?>