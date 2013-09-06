<?php

/**
 * This is the model class for table "gmc_prenotazione".
 *
 * The followings are the available columns in table 'gmc_prenotazione':
 * @property integer $id_prenotazione
 * @property integer $id_fondo
 * @property integer $id_prestazione
 * @property integer $id_paziente
 * @property string $data_creazione
 * @property string $data_visita
 * @property integer $assegnata
 * @property string $note_paziente
 * @property string $note_gmc
 * @property integer $id_user
 *
 * The followings are the available model relations:
 * @property User $idUser
 * @property Fondo $idFondo
 * @property Prestazione $idPrestazione
 * @property Paziente $idPaziente
 */
class Prenotazione extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

    public $nomePaziente;
    public $nomePrestazione;
    public $nomeFondo;


    public function tableName()
	{
		return 'gmc_prenotazione';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_fondo, id_prestazione, id_paziente', 'required'),
			array('id_fondo, id_prestazione, id_paziente, assegnata, id_user', 'numerical', 'integerOnly'=>true),
			array('data_creazione, data_visita, note_paziente, note_gmc, nomePaziente', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_prenotazione, id_fondo, id_prestazione, id_paziente, d3ata_creazione, data_visita, assegnata, note_paziente, note_gmc, id_user, nomePaziente',  'safe', 'on'=>'search'),
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
			'idFondo' => array(self::BELONGS_TO, 'Fondo', 'id_fondo'),
			'idPrestazione' => array(self::BELONGS_TO, 'Prestazione', 'id_prestazione'),
			'idPaziente' => array(self::BELONGS_TO, 'Paziente', 'id_paziente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_prenotazione' => 'Id Prenotazione',
			'id_fondo' => 'Id Fondo',
			'id_prestazione' => 'Id Prestazione',
			'id_paziente' => 'Id Paziente',
			'data_creazione' => 'Data inserimento',
			'data_visita' => 'Data Visita',
			'assegnata' => 'Confermate',
			'note_paziente' => 'Note Paziente',
			'note_gmc' => 'Note Gmc',
			'id_user' => 'Id User',
            'nomePaziente'=>'Paziente',
            'nomePrestazione'=>'Prestazione'
		);
	}



    public function afterFind(){
        parent::afterFind();
        $paziente = Paziente::model()->findByPk($this->id_paziente);
        $prestazione = Prestazione::model()->findByPk($this->id_prestazione);
        $fondo = Fondo::model()->findByPk($this->id_fondo);
        $this->nomePaziente = $paziente->nomeCompleto();
        $this->nomePrestazione = $prestazione->nome;
        $this->nomeFondo = $fondo->nome;
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

		$criteria->compare('id_prenotazione',$this->id_prenotazione);
		$criteria->compare('id_fondo',$this->id_fondo);
		$criteria->compare('id_prestazione',$this->id_prestazione);
		$criteria->compare('id_paziente',$this->id_paziente);
        if(isset($this->data_creazione) && $this->data_creazione!='')
            $criteria->addCondition("DATE_FORMAT ( data_creazione,  '%d/%m/%Y' )  ='" . $this->data_creazione . "'");
//		$criteria->compare('data_creazione',$this->data_creazione,true);
		$criteria->compare('data_visita',$this->data_visita,true);
		$criteria->compare('assegnata',$this->assegnata);
		$criteria->compare('note_paziente',$this->note_paziente,true);
		$criteria->compare('note_gmc',$this->note_gmc,true);
		$criteria->compare('id_user',$this->id_user);
        $criteria->with = array('idPaziente');
        $criteria->compare('idPaziente.cognome',$this->nomePaziente);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Prenotazione the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
