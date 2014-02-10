<?php

/**
 * This is the model class for table "contenidos".
 *
 * The followings are the available columns in table 'contenidos':
 * @property string $id
 * @property string $contenidos_categorias_id
 * @property string $fecha_alta
 * @property string $fecha_edit
 * @property integer $destacado
 * @property integer $fecha
 * @property integer $activo
 */
class Contenidos extends CActiveRecord {

    public $titulo;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Contenidos the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'contenidos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('contenidos_categorias_id, fecha', 'required'),
            array('destacado, activo', 'numerical', 'integerOnly' => true),
            array('contenidos_categorias_id', 'length', 'max' => 10),
            array('fecha_alta, fecha_edit', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, contenidos_categorias_id, fecha_alta, fecha_edit, destacado, activo, titulo, fecha', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'contenidos_x_idiomas' => array(self::HAS_MANY, 'ContenidosXIdiomas', 'contenidos_id', 'condition' => 'contenidos_x_idiomas.idiomas_id = 1'),
            'categorias' => array(self::MANY_MANY, 'ContenidosCategorias', 'contenidos_x_contenidos_categorias(contenidos_id,contenidos_categorias_id)'),
            'archivos' => array(self::MANY_MANY, 'Archivos', 'archivos_x_contenidos(contenidos_id,archivos_id)'),
        );
    }

    public function getParam($param, $id_idioma) {
        $param = ContenidosParametros::model()->findByAttributes(array(
            'nombre' => $param
        ));

        $m = ContenidosXContenidosParametros::model()->findByAttributes(array(
            'contenidos_id' => $this->id,
            'idiomas_id' => $id_idioma,
            'contenidos_parametros_id' => $param->id
        ));

        if (is_object($m))
            return $m->valor;
        else
            return '';
    }

    public function getText($param, $id_idioma) {
        $m = ContenidosXIdiomas::model()->findByAttributes(array(
            'contenidos_id' => $this->id,
            'idiomas_id' => $id_idioma
        ));

        if (is_object($m))
            return $m->{$param};
        else
            return '';
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'contenidos_categorias_id' => 'Contenidos Categorias',
            'fecha_alta' => 'Fecha Alta',
            'fecha_edit' => 'Fecha Edit',
            'destacado' => 'Destacado',
            'fecha' => 'Fecha',
            'activo' => 'Activo',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($cat = 0) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->join = "INNER JOIN contenidos_x_idiomas ON (t.id = contenidos_x_idiomas.contenidos_id)";

        $criteria->compare('contenidos_x_idiomas.idiomas_id', 1);
        
        $criteria->compare('t.id', $this->id);
        $criteria->compare('contenidos_categorias_id', $cat);
        $criteria->compare('fecha_alta', $this->fecha_alta);
        $criteria->compare('fecha_edit', $this->fecha_edit);
        $criteria->compare('destacado', $this->destacado);
        $criteria->compare('fecha', CDateTimeParser::parse($this->fecha, 'yyyy-MM-dd'));
        $criteria->compare('activo', $this->activo);
        $criteria->compare('contenidos_x_idiomas.titulo', $this->titulo, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}