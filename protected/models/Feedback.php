<?php

/**
 * This is the model class for table "gmc_feedback".
 *
 * The followings are the available columns in table 'gmc_feedback':
 * @property integer $id_feedback
 * @property string $cognome
 * @property string $nome
 * @property string $email
 * @property string $cf
 * @property integer $id_prestazione
 * @property integer $id_fondo
 * @property string $data_visita
 * @property string $commento
 *
 * The followings are the available model relations:
 * @property Prestazione $idPrestazione
 * @property Fondo $idFondo
 */
class Feedback extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gmc_feedback';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cognome, nome, data_visita', 'required'),
			array('id_prestazione, id_fondo', 'numerical', 'integerOnly'=>true),
			array('cognome, nome', 'length', 'max'=>100),
			array('email', 'length', 'max'=>200),
			array('cf', 'length', 'max'=>16),
			array('commento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_feedback, cognome, nome, email, cf, id_prestazione, id_fondo, data_visita, commento', 'safe', 'on'=>'search'),
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
			'idFondo' => array(self::BELONGS_TO, 'Fondo', 'id_fondo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_feedback' => 'Id Feedback',
			'cognome' => 'Cognome',
			'nome' => 'Nome',
			'email' => 'Email',
			'cf' => 'Cf',
			'id_prestazione' => 'Id Prestazione',
			'id_fondo' => 'Id Fondo',
			'data_visita' => 'Data Visita',
			'commento' => 'Commento',
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

		$criteria->compare('id_feedback',$this->id_feedback);
		$criteria->compare('cognome',$this->cognome,true);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('cf',$this->cf,true);
		$criteria->compare('id_prestazione',$this->id_prestazione);
		$criteria->compare('id_fondo',$this->id_fondo);
		$criteria->compare('data_visita',$this->data_visita,true);
		$criteria->compare('commento',$this->commento,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Feedback the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
