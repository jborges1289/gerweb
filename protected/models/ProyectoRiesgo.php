<?php

/**
 * This is the model class for table "proyecto_riesgo".
 *
 * The followings are the available columns in table 'proyecto_riesgo':
 * @property string $id_proyecto
 * @property string $id_riesgo
 * @property string $fecha
 * @property string $estado_riesgo
 * @property integer $linea_corte
 */
class ProyectoRiesgo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proyecto_riesgo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_proyecto, id_riesgo, fecha, estado_riesgo', 'required'),
			array('linea_corte', 'numerical', 'integerOnly'=>true),
			array('id_proyecto, id_riesgo', 'length', 'max'=>10),
			array('estado_riesgo', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_proyecto, id_riesgo, fecha, estado_riesgo, linea_corte', 'safe', 'on'=>'search'),
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
			'id_proyecto' => 'Id Proyecto',
			'id_riesgo' => 'Id Riesgo',
			'fecha' => 'Fecha',
			'estado_riesgo' => 'Estado Riesgo',
			'linea_corte' => 'Linea Corte',
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

		$criteria->compare('id_proyecto',$this->id_proyecto,true);
		$criteria->compare('id_riesgo',$this->id_riesgo,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('estado_riesgo',$this->estado_riesgo,true);
		$criteria->compare('linea_corte',$this->linea_corte);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProyectoRiesgo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
