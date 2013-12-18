<?php

/**
 * This is the model class for table "{{compras}}".
 *
 * The followings are the available columns in table '{{compras}}':
 * @property integer $id
 * @property integer $id_usuario
 * @property integer $id_promo
 * @property string $fecha_compra
 * @property integer $estado
 *
 * The followings are the available model relations:
 * @property Users $idUsuario
 * @property Promociones $idPromo
 */
class Compra extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Compra the static model class
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
		return '{{compras}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, id_promo, estado, referencia, precio', 'required'),
			array('id_usuario, id_promo, estado', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_usuario, id_promo, fecha_compra, estado, referencia, precio', 'safe', 'on'=>'search'),
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
			'idUsuario' => array(self::BELONGS_TO, 'Users', 'id_usuario'),
			'idPromo' => array(self::BELONGS_TO, 'Promociones', 'id_promo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_usuario' => 'Id Usuario',
			'id_promo' => 'Id Promo',
			'fecha_compra' => 'Fecha Compra',
			'estado' => 'Estado',
			'referencia' => 'Referencia',
			'precio' => 'Precio',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_promo',$this->id_promo);
		$criteria->compare('fecha_compra',$this->fecha_compra,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('referencia',$this->referencia);
		$criteria->compare('precio',$this->precio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}