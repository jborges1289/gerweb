<?php

/**
 * This is the model class for table "riesgo".
 *
 * The followings are the available columns in table 'riesgo':
 * @property string $id_riesgo
 * @property string $nombre
 * @property string $categoria
 * @property string $tipo
 * @property string $probabilidad
 * @property string $impacto
 * @property string $fecha
 * @property string $descripcion
 * @property string $factores_influyen
 * @property string $reduccion
 * @property string $plan_contigencia
 * @property string $redactor
 * @property string $responsable
 *
 * The followings are the available model relations:
 * @property Proyecto[] $proyectos
 * @property Usuario $redactor0
 * @property Usuario $responsable0
 */
class Riesgo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'riesgo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, categoria, tipo, probabilidad, impacto, fecha, descripcion, factores_influyen, reduccion, plan_contigencia, redactor, responsable', 'required'),
			array('nombre', 'length', 'max'=>45),
			array('categoria, tipo, impacto', 'length', 'max'=>15),
			array('probabilidad, redactor, responsable', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_riesgo, nombre, categoria, tipo, probabilidad, impacto, fecha, descripcion, factores_influyen, reduccion, plan_contigencia, redactor, responsable', 'safe', 'on'=>'search'),
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
			'proyectos' => array(self::MANY_MANY, 'Proyecto', 'proyecto_riesgo(id_riesgo, id_proyecto)'),
			'redactor0' => array(self::BELONGS_TO, 'Usuario', 'redactor'),
			'responsable0' => array(self::BELONGS_TO, 'Usuario', 'responsable'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_riesgo' => 'Id Riesgo',
			'nombre' => 'Nombre',
			'categoria' => 'Categoria',
			'tipo' => 'Tipo',
			'probabilidad' => 'Probabilidad',
			'impacto' => 'Impacto',
			'fecha' => 'Fecha',
			'descripcion' => 'Descripcion',
			'factores_influyen' => 'Factores Influyen',
			'reduccion' => 'Reduccion',
			'plan_contigencia' => 'Plan Contigencia',
			'redactor' => 'Redactor',
			'responsable' => 'Responsable',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_riesgo',$this->id_riesgo,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('categoria',$this->categoria,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('probabilidad',$this->probabilidad,true);
		$criteria->compare('impacto',$this->impacto,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('factores_influyen',$this->factores_influyen,true);
		$criteria->compare('reduccion',$this->reduccion,true);
		$criteria->compare('plan_contigencia',$this->plan_contigencia,true);
		$criteria->compare('redactor',$this->redactor,true);
		$criteria->compare('responsable',$this->responsable,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Riesgo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
