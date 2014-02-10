<?php

/**
 * This is the model class for table "Usuarios".
 *
 * The followings are the available columns in table 'Usuarios':
 * @property string $id
 * @property string $paises_id
 * @property string $usuario
 * @property string $pass
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $telefono
 * @property string $direccion
 * @property string $ciudad
 * @property string $provincia
 * @property integer $activo
 */
class Usuarios extends CActiveRecord {

    private $_identity;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Usuarios the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Usuarios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('paises_id', 'required'),
            array('activo', 'numerical', 'integerOnly' => true),
            array('paises_id', 'length', 'max' => 10),
            array('usuario, pass, nombre, apellido, email, telefono, direccion, ciudad, provincia, avatar', 'length', 'max' => 255),
            array('email', 'email'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, paises_id, usuario, pass, nombre, apellido, email, telefono, direccion, ciudad, provincia, activo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'paises' => array(self::BELONGS_TO, 'Paises', 'paises_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'paises_id' => 'Paises',
            'usuario' => 'Usuario',
            'pass' => 'Contraseña',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'email' => 'Email',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
            'ciudad' => 'Ciudad',
            'provincia' => 'Provincia',
            'avatar' => 'Avatar',
            'activo' => 'Activo',
        );
    }

    public function login() {
        if ($this->_identity === null) {
            $this->_identity = new FrontIdentity($this->usuario, $this->pass);
            if (!$this->_identity->authenticate()) {
                if ($this->_identity->errorCode === FrontIdentity::ERROR_USERNAME_INVALID)
                    $this->addError('login', 'El usuario ingresado no existe.');
                else if ($this->_identity->errorCode === FrontIdentity::ERROR_PASSWORD_INVALID)
                    $this->addError('login', 'La contraseña es incorrecta.');
            }
        }
        if ($this->_identity->errorCode === FrontIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        }
        else
            return false;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('paises_id', $this->paises_id, true);
        $criteria->compare('usuario', $this->usuario, true);
        $criteria->compare('pass', $this->pass, true);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('apellido', $this->apellido, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('direccion', $this->direccion, true);
        $criteria->compare('ciudad', $this->ciudad, true);
        $criteria->compare('provincia', $this->provincia, true);
        $criteria->compare('avatar', $this->avatar, true);
        $criteria->compare('activo', $this->activo);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}