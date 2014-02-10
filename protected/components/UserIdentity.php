<?php

class UserIdentity extends CUserIdentity {

    private $_id;
    public $escenario;

    public function authenticate() {
        if ($this->escenario == 'admin')
            if ($this->username == 'root' && $this->password == 'sim138') {
                $this->errorCode = self::ERROR_NONE;
                $this->_id = 'admin-root';
                return !$this->errorCode;
            } else
                $record = Staff::model()->findByAttributes(array('username' => $this->username));
        elseif ($this->escenario == 'frontend')
            $record = Usuarios::model()->findByAttributes(array('usuario' => $this->username));

        if ($record === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if ($record->pass !== md5($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $record->id;
            $this->errorCode = self::ERROR_NONE;
        }
        
        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}