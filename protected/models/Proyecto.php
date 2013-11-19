<?php

/**
 * This is the model class for table "proyecto".
 *
 * The followings are the available columns in table 'proyecto':
 * @property string $id_proyecto
 * @property string $titulo
 * @property string $descripcion
 * @property string $tipo_proyecto
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $administrador
 * @property string $admin_riesgo
 *
 * The followings are the available model relations:
 * @property Usuario $adminRiesgo
 * @property Usuario $administrador0
 * @property Riesgo[] $riesgos
 */
date_default_timezone_set('Mexico/General');
class Proyecto extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'proyecto';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('titulo, descripcion, tipo_proyecto, fecha_inicio, fecha_fin, administrador, admin_riesgo', 'required'),
            array('titulo', 'length', 'max' => 95),
            array('tipo_proyecto', 'length', 'max' => 10),
            array('administrador, admin_riesgo', 'length', 'max' => 10),
            array('fecha_inicio', 'compare', 'compareValue' => date('Y-m-d'), 'operator' => '=='), //Esto compara que la fecha de inicio de licitación sea igual a la fecha actual
            array('fecha_fin', 'compare', 'compareValue' => date('Y-m-d'), 'operator' => '>'), //Esto compara que la fecha de finalización de licitación sea mayor a la fecha actual
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_proyecto, titulo, descripcion, tipo_proyecto, fecha_inicio, fecha_fin, administrador, admin_riesgo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'adminRiesgo' => array(self::BELONGS_TO, 'Usuario', 'admin_riesgo'),
            'administrador0' => array(self::BELONGS_TO, 'Usuario', 'administrador'),
            'riesgos' => array(self::MANY_MANY, 'Riesgo', 'proyecto_riesgo(id_proyecto, id_riesgo)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_proyecto' => 'Id Proyecto',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'tipo_proyecto' => 'Tipo Proyecto',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'administrador' => 'Administrador',
            'admin_riesgo' => 'Admin Riesgo',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_proyecto', $this->id_proyecto, true);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('tipo_proyecto', $this->tipo_proyecto, true);
        $criteria->compare('fecha_inicio', $this->fecha_inicio, true);
        $criteria->compare('fecha_fin', $this->fecha_fin, true);
        $criteria->compare('administrador', $this->administrador, true);
        $criteria->compare('admin_riesgo', $this->admin_riesgo, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Proyecto the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
