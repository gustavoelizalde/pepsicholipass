<?php

/**
 * This is the model class for table "contenidos_categorias".
 *
 * The followings are the available columns in table 'contenidos_categorias':
 * @property string $id
 * @property string $contenidos_categorias_id
 * @property string $nombre
 * @property integer $show_copete
 * @property integer $show_descripcion
 * @property integer $show_destacado
 * @property integer $show_archivos
 * @property integer $activo
 */
class ContenidosCategorias extends CActiveRecord
{
	public function getParamsId()
	{
		$return=array();
		for($i=0; $i<count($this->parametros); $i++)
			$return[]=$this->parametros[$i]->id;
		return $return;
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ContenidosCategorias the static model class
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
		return 'contenidos_categorias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contenidos_categorias_id, nombre', 'required'),
			array('show_copete, show_descripcion, show_destacado, show_archivos, activo', 'numerical', 'integerOnly'=>true),
			array('contenidos_categorias_id', 'length', 'max'=>10),
			array('nombre', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, contenidos_categorias_id, nombre, activo', 'safe', 'on'=>'search'),
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
			'parametros'=>array(self::MANY_MANY,'ContenidosParametros','contenidos_parametros_x_contenidos_categorias(contenidos_categorias_id,contenidos_parametros_id)'),
			'categorias'=>array(self::HAS_MANY,'ContenidosCategorias','contenidos_categorias_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'contenidos_categorias_id' => 'Dependencia',
			'nombre' => 'Nombre',
			'show_copete' => 'Ver Copete',
			'show_descripcion' => 'Ver Descripcion',
			'show_destacado' => 'Ver Destacado',
			'show_archivos' => 'Ver Archivos',
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
		$criteria->compare('contenidos_categorias_id',$this->contenidos_categorias_id,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('activo',$this->activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}