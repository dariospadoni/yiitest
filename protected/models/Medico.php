<?php

/**
 * This is the model class for table "gmc_medico".
 *
 * The followings are the available columns in table 'gmc_medico':
 * @property integer $id_medico
 * @property integer $id_user
 * @property string $specializzazione
 * @property string $formazione
 * @property string $esperienze_precedenti
 * @property string $attivita_accademica
 * @property string $attivita_scientifica
 * @property string $pubblicazioni
 * @property string $foto
 *
 * The followings are the available model relations:
 * @property User $idUser
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
			array('id_user', 'required'),
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('specializzazione, formazione, esperienze_precedenti, attivita_accademica, attivita_scientifica, pubblicazioni, foto', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_medico, id_user, specializzazione, formazione, esperienze_precedenti, attivita_accademica, attivita_scientifica, pubblicazioni, foto', 'safe', 'on'=>'search'),
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
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_medico' => 'Id Medico',
			'id_user' => 'Id User',
			'specializzazione' => 'Specializzazione',
			'formazione' => 'Formazione',
			'esperienze_precedenti' => 'Esperienze Precedenti',
			'attivita_accademica' => 'Attività Accademica',
			'attivita_scientifica' => 'Attività Scientifica',
			'pubblicazioni' => 'Pubblicazioni',
			'foto' => 'Foto',
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('specializzazione',$this->specializzazione,true);
		$criteria->compare('formazione',$this->formazione,true);
		$criteria->compare('esperienze_precedenti',$this->esperienze_precedenti,true);
		$criteria->compare('attivita_accademica',$this->attivita_accademica,true);
		$criteria->compare('attivita_scientifica',$this->attivita_scientifica,true);
		$criteria->compare('pubblicazioni',$this->pubblicazioni,true);
		$criteria->compare('foto',$this->foto,true);

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
