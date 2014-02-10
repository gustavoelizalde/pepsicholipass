<?php

/**
 * This is the model class for table "contenidos_x_idiomas".
 *
 * The followings are the available columns in table 'contenidos_x_idiomas':
 * @property string $id
 * @property string $contenidos_id
 * @property string $idiomas_id
 * @property string $titulo
 * @property string $copete
 * @property string $descripcion
 */
class ContenidosXIdiomas extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ContenidosXIdiomas the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'contenidos_x_idiomas';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('contenidos_id, idiomas_id', 'required'),
            array('titulo', 'requiredIdioma'),
            array('contenidos_id, idiomas_id', 'length', 'max' => 10),
            array('titulo, copete', 'length', 'max' => 250),
            array('descripcion', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, contenidos_id, idiomas_id, titulo, copete, descripcion', 'safe', 'on' => 'search'),
        );
    }

    public function requiredIdioma($attribute) {
        if (trim($this->$attribute) == '')
            $this->addError($attribute, 'Complete el ' . $attribute . ' en ' . $this->idioma->nombre);
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idioma' => array(self::BELONGS_TO, 'Idiomas', 'idiomas_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'contenidos_id' => 'Contenidos',
            'idiomas_id' => 'Idioma',
            'titulo' => 'Titulo',
            'copete' => 'Copete',
            'descripcion' => 'Descripcion',
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
        $criteria->compare('contenidos_id', $this->contenidos_id, true);
        $criteria->compare('idiomas_id', $this->idiomas_id, true);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('copete', $this->copete, true);
        $criteria->compare('descripcion', $this->descripcion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getContenidoPorId($id) {
        $contenido = $this->model()->findByPk($id);
        return $contenido;
    }

}