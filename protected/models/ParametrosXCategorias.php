<?php

/**
 * This is the model class for table "contenidos_parametros_x_contenidos_categorias".
 *
 * The followings are the available columns in table 'contenidos_parametros_x_contenidos_categorias':
 * @property string $contenidos_parametros_id
 * @property string $contenidos_categorias_id
 */
class ParametrosXCategorias extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ParametrosXCategorias the static model class
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
		return 'contenidos_parametros_x_contenidos_categorias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contenidos_parametros_id, contenidos_categorias_id', 'required'),
			array('contenidos_parametros_id, contenidos_categorias_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('contenidos_parametros_id, contenidos_categorias_id', 'safe', 'on'=>'search'),
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
			'contenidos_parametros_id' => 'Contenidos Parametros',
			'contenidos_categorias_id' => 'Contenidos Categorias',
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

		$criteria->compare('contenidos_parametros_id',$this->contenidos_parametros_id,true);
		$criteria->compare('contenidos_categorias_id',$this->contenidos_categorias_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}