<?php

/**
 * This is the model class for table "contenidos_x_contenidos_parametros".
 *
 * The followings are the available columns in table 'contenidos_x_contenidos_parametros':
 * @property string $id
 * @property string $contenidos_id
 * @property string $contenidos_parametros_id
 * @property string $idiomas_id
 * @property string $valor
 */
class ContenidosXContenidosParametros extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ContenidosXContenidosParametros the static model class
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
		return 'contenidos_x_contenidos_parametros';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contenidos_id, contenidos_parametros_id, idiomas_id', 'required'),
			array('contenidos_id, contenidos_parametros_id, idiomas_id', 'length', 'max'=>10),
			array('valor', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, contenidos_id, contenidos_parametros_id, idiomas_id, valor', 'safe', 'on'=>'search'),
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
			'parametro'=>array(self::BELONGS_TO,'ContenidosParametros','contenidos_parametros_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'contenidos_id' => 'Contenidos',
			'contenidos_parametros_id' => 'Contenidos Parametros',
			'idiomas_id' => 'Idiomas',
			'valor' => $this->parametro->nombre,
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
		$criteria->compare('contenidos_id',$this->contenidos_id,true);
		$criteria->compare('contenidos_parametros_id',$this->contenidos_parametros_id,true);
		$criteria->compare('idiomas_id',$this->idiomas_id,true);
		$criteria->compare('valor',$this->valor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}