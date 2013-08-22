<?php

/**
 * This is the model class for table "gmc_pagina".
 *
 * The followings are the available columns in table 'gmc_pagina':
 * @property integer $id_pagina
 * @property string $nome
 * @property string $contenuto
 * @property integer $ordine
 * @property string $ultima_modifica
 */
class Pagina extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gmc_pagina';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, contenuto', 'required'),
			array('ordine', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>200),
			array('ultima_modifica', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pagina, nome, contenuto, ordine, ultima_modifica', 'safe', 'on'=>'search'),
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
			'id_pagina' => 'Id Pagina',
			'nome' => 'Nome',
			'contenuto' => 'Contenuto',
			'ordine' => 'Ordine',
			'ultima_modifica' => 'Ultima Modifica',
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

		$criteria->compare('id_pagina',$this->id_pagina);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('contenuto',$this->contenuto,true);
		$criteria->compare('ordine',$this->ordine);
		$criteria->compare('ultima_modifica',$this->ultima_modifica,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pagina the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
