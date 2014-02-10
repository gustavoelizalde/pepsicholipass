<?php

/**
 * This is the model class for table "recursos".
 *
 * The followings are the available columns in table 'recursos':
 * @property string $id
 * @property string $recursos_id
 * @property string $nombre
 * @property string $url
 * @property string $parametros
 * @property string $orden
 * @property integer $visible
 * @property integer $activo
 */
class Recursos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Recursos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'recursos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('recursos_id, nombre, url', 'required'),
			array('visible, activo', 'numerical', 'integerOnly'=>true),
			array('recursos_id, orden', 'length', 'max'=>10),
			array('nombre', 'length', 'max'=>100),
			array('url', 'length', 'max'=>150),
			array('parametros', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, recursos_id, nombre, url, orden, visible, activo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'recursos_id' => 'Recursos',
			'nombre' => 'Nombre',
			'url' => 'Url',
			'parametros' => 'Parámetros',
			'orden' => 'Orden',
			'visible' => 'Visible',
			'activo' => 'Activo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('recursos_id',$this->recursos_id,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('orden',$this->orden,true);
		$criteria->compare('visible',$this->visible);
		$criteria->compare('activo',$this->activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}