<?php

/**
 * This is the model class for table "staff".
 *
 * The followings are the available columns in table 'staff':
 * @property string $id
 * @property string $nombre
 * @property string $apellido
 * @property string $username
 * @property string $pass
 * @property integer $activo
 */
class Staff extends CActiveRecord {

    public function getRolName() {
        foreach ($this->roles as $rol)
            $return[] = $rol->nombre;
        return count($return) > 0 ? $return : array();
    }

    public function getRolesId() {
        foreach ($this->roles as $rol)
            $return[] = $rol->id;
        return count($return) > 0 ? $return : array();
    }

    public function revokeAllRoles() {
        $items = Yii::app()->authManager->getRoles($this->id);
        foreach ($items as $item)
            Yii::app()->authManager->revoke($item->name, $this->id);
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Staff the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'staff';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre, apellido, username, pass, activo', 'required'),
            array('username', 'unique'),
            array('activo', 'numerical', 'integerOnly' => true),
            array('nombre, apellido, username', 'length', 'max' => 100),
            array('avatar', 'length', 'max' => 255),
            array('pass', 'length', 'max' => 250),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nombre, apellido, username, pass, activo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'roles' => array(self::MANY_MANY, 'StaffRoles', 'staff_x_staff_roles(staff_id,staff_roles_id)')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'username' => 'Username',
            'pass' => 'Pass',
            'avatar' => 'Avatar',
            'activo' => 'Activo',
        );
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
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('apellido', $this->apellido, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('pass', $this->pass, true);
        $criteria->compare('activo', $this->activo);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}