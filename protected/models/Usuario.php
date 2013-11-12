<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $id_usuario
 * @property string $usuario
 * @property string $contrasena
 * @property string $nombres
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property integer $discriminador
 *
 * The followings are the available model relations:
 * @property Proyecto[] $proyectos
 * @property Proyecto[] $proyectos1
 * @property Riesgo[] $riesgos
 * @property Riesgo[] $riesgos1
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario, contrasena, nombres, primer_apellido, segundo_apellido, discriminador', 'required'),
			array('discriminador', 'numerical', 'integerOnly'=>true),
			array('usuario, contrasena, nombres, primer_apellido, segundo_apellido', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuario, usuario, contrasena, nombres, primer_apellido, segundo_apellido, discriminador', 'safe', 'on'=>'search'),
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
			'proyectos' => array(self::HAS_MANY, 'Proyecto', 'admin_riesgo'),
			'proyectos1' => array(self::HAS_MANY, 'Proyecto', 'administrador'),
			'riesgos' => array(self::HAS_MANY, 'Riesgo', 'redactor'),
			'riesgos1' => array(self::HAS_MANY, 'Riesgo', 'responsable'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'ID',
			'usuario' => 'Usuario',
			'contrasena' => 'Contraseña',
			'nombres' => 'Nombres',
			'primer_apellido' => 'Primer Apellido',
			'segundo_apellido' => 'Segundo Apellido',
			'discriminador' => 'Discriminador',
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

		$criteria->compare('id_usuario',$this->id_usuario,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('contrasena',$this->contrasena,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('primer_apellido',$this->primer_apellido,true);
		$criteria->compare('segundo_apellido',$this->segundo_apellido,true);
		$criteria->compare('discriminador',$this->discriminador);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
