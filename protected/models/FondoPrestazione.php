<?php

/**
 * This is the model class for table "gmc_fondo_prestazione".
 *
 * The followings are the available columns in table 'gmc_fondo_prestazione':
 * @property integer $id_fondo_prestazione
 * @property integer $id_fondo
 * @property integer $id_prestazione
 * @property integer $prezzo
 *
 * The followings are the available model relations:
 * @property Prestazione $idPrestazione
 * @property Fondo $idFondo
 */
class FondoPrestazione extends CActiveRecord
{

    public $nomeFondo;
    public $nomePrestazione;
    public $prezzoPrestazioneNoFondo;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gmc_fondo_prestazione';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_fondo, id_prestazione, prezzo', 'required'),
			array('id_fondo, id_prestazione, prezzo', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_fondo_prestazione, id_fondo, id_prestazione, prezzo', 'safe', 'on'=>'search'),
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
			'id_fondo_prestazione' => 'Id Fondo Prestazione',
			'id_fondo' => 'Id Fondo',
			'id_prestazione' => 'Id Prestazione',
			'prezzo' => 'Prezzo',
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

		$criteria->compare('id_fondo_prestazione',$this->id_fondo_prestazione);
		$criteria->compare('id_fondo',$this->id_fondo);
		$criteria->compare('id_prestazione',$this->id_prestazione);
		$criteria->compare('prezzo',$this->prezzo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FondoPrestazione the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
