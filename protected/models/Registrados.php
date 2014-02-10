<?php

/**
 * This is the model class for table "registrados".
 *
 * The followings are the available columns in table 'registrados':
 * @property string $id
 * @property string $contenidos_id
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $telefono
 * @property string $birthday
 * @property string $comentario
 * @property string $facebookId
 * @property string $fecha_alta
 */
class Registrados extends CActiveRecord {

    public $evento;
    public $pageSize = 10;
    public $fecha;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Registrados the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'registrados';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre, apellido, email, contenidos_id', 'required'),
            array('nombre, apellido, email, telefono', 'length', 'max' => 150),
            array('birthday', 'length', 'max' => 10),
            array('comentario, facebookId', 'length', 'max' => 250),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nombre, apellido, email, telefono, birthday, comentario, contenidos_id, evento, pageSize', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cont' => array(self::BELONGS_TO, 'Contenidos', 'contenidos_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'contenidos_id' => 'Evento',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'email' => 'Email',
            'telefono' => 'Telefono',
            'birthday' => 'Birthday',
            'comentario' => 'Comentario',
            'facebookId' => 'Facebook Id',
            'pageSize' => 'Items por p&aacute;gina',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($cant=10) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->join = 'INNER JOIN contenidos ON (t.contenidos_id = contenidos.id)
                           INNER JOIN contenidos_x_idiomas ON (contenidos.id = contenidos_x_idiomas.contenidos_id)';

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('contenidos_x_idiomas.titulo', $this->evento, true);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('apellido', $this->apellido, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('birthday', $this->birthday, true);
        $criteria->compare('comentario', $this->comentario, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => $_SESSION['pageSize']),
        ));
    }

}