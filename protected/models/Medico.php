<?php

/**
 * This is the model class for table "gmc_medico".
 *
 * The followings are the available columns in table 'gmc_medico':
 * @property integer $id_medico
 * @property string $nome
 * @property string $cognome
 * @property string $email
 * @property string $password
 * @property string $specializzazione
 * @property string $formazione
 * @property string $esperienze_precedenti
 * @property string $attivita_accademica
 * @property string $attivita_scientifica
 * @property string $pubblicazioni
 */
class Medico extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gmc_medico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, cognome, email, password', 'required'),
			array('nome, cognome, email', 'length', 'max'=>100),
			array('password', 'length', 'max'=>50),
			array('specializzazione, formazione, esperienze_precedenti, attivita_accademica, attivita_scientifica, pubblicazioni', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_medico, nome, cognome, email, password, specializzazione, formazione, esperienze_precedenti, attivita_accademica, attivita_scientifica, pubblicazioni', 'safe', 'on'=>'search'),
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
			'id_medico' => 'Id Medico',
			'nome' => 'Nome',
			'cognome' => 'Cognome',
			'email' => 'Email',
			'password' => 'Password',
			'specializzazione' => 'Specializzazione',
			'formazione' => 'Formazione',
			'esperienze_precedenti' => 'Esperienze Precedenti',
			'attivita_accademica' => 'Attivita Accademica',
			'attivita_scientifica' => 'Attivita Scientifica',
			'pubblicazioni' => 'Pubblicazioni',
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

		$criteria->compare('id_medico',$this->id_medico);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('cognome',$this->cognome,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('specializzazione',$this->specializzazione,true);
		$criteria->compare('formazione',$this->formazione,true);
		$criteria->compare('esperienze_precedenti',$this->esperienze_precedenti,true);
		$criteria->compare('attivita_accademica',$this->attivita_accademica,true);
		$criteria->compare('attivita_scientifica',$this->attivita_scientifica,true);
		$criteria->compare('pubblicazioni',$this->pubblicazioni,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Medico the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
