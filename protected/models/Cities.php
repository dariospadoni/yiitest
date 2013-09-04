<?php

/**
 * This is the model class for table "gmc_cities".
 *
 * The followings are the available columns in table 'gmc_cities':
 * @property integer $city_code_istat
 * @property integer $city_code_istat_province
 * @property integer $city_code_istat_city
 * @property string $city_code_land
 * @property integer $city_code_postal
 * @property string $city_name
 * @property string $city_province_code
 * @property string $city_province_name
 * @property string $city_region
 * @property string $city_telephone_prefix
 * @property string $city_website
 * @property string $city_deleted
 * @property string $city_moved
 * @property integer $city_moved_code_istat
 * @property string $city_notes
 */
class Cities extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gmc_cities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_notes', 'required'),
			array('city_code_istat, city_code_istat_province, city_code_istat_city, city_code_postal, city_moved_code_istat', 'numerical', 'integerOnly'=>true),
			array('city_code_land', 'length', 'max'=>4),
			array('city_name, city_province_name, city_website', 'length', 'max'=>255),
			array('city_province_code', 'length', 'max'=>7),
			array('city_region', 'length', 'max'=>31),
			array('city_telephone_prefix', 'length', 'max'=>10),
			array('city_deleted, city_moved', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('city_code_istat, city_code_istat_province, city_code_istat_city, city_code_land, city_code_postal, city_name, city_province_code, city_province_name, city_region, city_telephone_prefix, city_website, city_deleted, city_moved, city_moved_code_istat, city_notes', 'safe', 'on'=>'search'),
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
			'city_code_istat' => 'City Code Istat',
			'city_code_istat_province' => 'City Code Istat Province',
			'city_code_istat_city' => 'City Code Istat City',
			'city_code_land' => 'City Code Land',
			'city_code_postal' => 'City Code Postal',
			'city_name' => 'City Name',
			'city_province_code' => 'City Province Code',
			'city_province_name' => 'City Province Name',
			'city_region' => 'City Region',
			'city_telephone_prefix' => 'City Telephone Prefix',
			'city_website' => 'City Website',
			'city_deleted' => 'City Deleted',
			'city_moved' => 'City Moved',
			'city_moved_code_istat' => 'City Moved Code Istat',
			'city_notes' => 'City Notes',
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

		$criteria->compare('city_code_istat',$this->city_code_istat);
		$criteria->compare('city_code_istat_province',$this->city_code_istat_province);
		$criteria->compare('city_code_istat_city',$this->city_code_istat_city);
		$criteria->compare('city_code_land',$this->city_code_land,true);
		$criteria->compare('city_code_postal',$this->city_code_postal);
		$criteria->compare('city_name',$this->city_name,true);
		$criteria->compare('city_province_code',$this->city_province_code,true);
		$criteria->compare('city_province_name',$this->city_province_name,true);
		$criteria->compare('city_region',$this->city_region,true);
		$criteria->compare('city_telephone_prefix',$this->city_telephone_prefix,true);
		$criteria->compare('city_website',$this->city_website,true);
		$criteria->compare('city_deleted',$this->city_deleted,true);
		$criteria->compare('city_moved',$this->city_moved,true);
		$criteria->compare('city_moved_code_istat',$this->city_moved_code_istat);
		$criteria->compare('city_notes',$this->city_notes,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cities the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
