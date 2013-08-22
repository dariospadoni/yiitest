<?php

/**
 * This is the model class for table "gmc_allegato_prestazione".
 *
 * The followings are the available columns in table 'gmc_allegato_prestazione':
 * @property integer $id_allegato_prestazione
 * @property integer $id_prestazione
 * @property string $nome
 * @property string $url
 * @property string $estensione
 *
 * The followings are the available model relations:
 * @property Prestazione $idPrestazione
 */
class AllegatoPrestazione extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gmc_allegato_prestazione';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_prestazione, nome, url, estensione', 'required'),
			array('id_prestazione', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>200),
			array('url', 'length', 'max'=>255),
			array('estensione', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_allegato_prestazione, id_prestazione, nome, url, estensione', 'safe', 'on'=>'search'),
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
			'idPrestazione' => array(self::BELONGS_TO, 'Prestazione', 'id_prestazione'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_allegato_prestazione' => 'Id Allegato Prestazione',
			'id_prestazione' => 'Id Prestazione',
			'nome' => 'Nome',
			'url' => 'Url',
			'estensione' => 'Estensione',
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

		$criteria->compare('id_allegato_prestazione',$this->id_allegato_prestazione);
		$criteria->compare('id_prestazione',$this->id_prestazione);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('estensione',$this->estensione,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AllegatoPrestazione the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
