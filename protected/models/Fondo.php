<?php

/**
 * This is the model class for table "gmc_fondo".
 *
 * The followings are the available columns in table 'gmc_fondo':
 * @property integer $id_fondo
 * @property string $nome
 * @property string $descrizione
 * @property string $sito_web
 * @property string $logo
 */
class Fondo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gmc_fondo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome', 'required'),
			array('nome', 'length', 'max'=>200),
			array('sito_web', 'length', 'max'=>256),
			array('descrizione, logo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_fondo, nome, descrizione, sito_web, logo', 'safe', 'on'=>'search'),
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
			'id_fondo' => 'Id Fondo',
			'nome' => 'Nome',
			'descrizione' => 'Descrizione',
			'sito_web' => 'Sito Web',
			'logo' => 'Logo',
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

		$criteria->compare('id_fondo',$this->id_fondo);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('descrizione',$this->descrizione,true);
		$criteria->compare('sito_web',$this->sito_web,true);
		$criteria->compare('logo',$this->logo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Fondo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getImageData (){
        if (isset($this->logo))
            return base64_encode ($this->logo);
        else
            return "";
    }

    public function isNewRecord(){
        return ! isSet ($this->id_fondo );
    }

}
