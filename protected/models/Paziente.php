<?php

/**
 * This is the model class for table "gmc_paziente".
 *
 * The followings are the available columns in table 'gmc_paziente':
 * @property integer $id_paziente
 * @property string $cf
 * @property string $codice_sanitario
 * @property string $nome
 * @property string $cognome
 * @property string $data_nascita
 * @property string $citta_nascita
 * @property string $indirizzo
 * @property string $citta
 * @property string $provincia
 * @property string $cap
 * @property string $telefono
 * @property string $email
 * @property string $note
 */
class Paziente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gmc_paziente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cf, nome, cognome, telefono', 'required'),
			array('cf', 'length', 'max'=>16),
			array('codice_sanitario', 'length', 'max'=>20),
			array('nome, cognome, citta_nascita, citta, email', 'length', 'max'=>100),
			array('indirizzo', 'length', 'max'=>250),
			array('provincia', 'length', 'max'=>5),
			array('cap', 'length', 'max'=>10),
			array('telefono', 'length', 'max'=>30),
			array('data_nascita, note', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_paziente, cf, codice_sanitario, nome, cognome, data_nascita, citta_nascita, indirizzo, citta, provincia, cap, telefono, email, note', 'safe', 'on'=>'search'),
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
			'id_paziente' => 'Id Paziente',
			'cf' => 'Codice fiscale',
			'codice_sanitario' => 'Codice sanitario',
            'nome' => 'Nome',
            'cognome' => 'Cognome',
            'data_nascita' => 'Data di nascita',
            'citta_nascita' => 'Città di nascita',
            'indirizzo' => 'Indirizzo',
            'citta' => 'Città',
            'provincia' => 'Provincia',
            'cap' => 'CAP',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'note' => 'Note',
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

		$criteria->compare('id_paziente',$this->id_paziente);
		$criteria->compare('cf',$this->cf,true);
		$criteria->compare('codice_sanitario',$this->codice_sanitario,true);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('cognome',$this->cognome,true);
		$criteria->compare('data_nascita',$this->data_nascita,true);
		$criteria->compare('citta_nascita',$this->citta_nascita,true);
		$criteria->compare('indirizzo',$this->indirizzo,true);
		$criteria->compare('citta',$this->citta,true);
		$criteria->compare('provincia',$this->provincia,true);
		$criteria->compare('cap',$this->cap,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Paziente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function nomeCompleto (){
        return $this->nome . " " . $this->cognome;
    }

}
