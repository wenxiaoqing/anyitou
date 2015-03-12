<?php

/**
 * This is the model class for table "chedai_apply".
 *
 * The followings are the available columns in table 'chedai_apply':
 * @property integer $id
 * @property integer $user_id
 * @property string $real_name
 * @property string $identity
 * @property string $mobile
 * @property string $loan_amount
 * @property string $loan_purpose
 * @property string $repayment_source
 * @property string $brand_model
 * @property integer $vehicle_type
 * @property string $buy_time
 * @property string $buy_price
 * @property string $kilometre
 * @property string $emissions
 * @property string $mot_time
 * @property string $insurance_time
 * @property integer $traffic_violation
 * @property string $apply_time
 */
class ChedaiApply extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'chedai_apply';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, real_name, identity, mobile, loan_amount, loan_purpose, repayment_source, brand_model, vehicle_type, buy_time, buy_price, kilometre, emissions, mot_time, insurance_time, traffic_violation, apply_time', 'required'),
			array('user_id, vehicle_type, traffic_violation', 'numerical', 'integerOnly'=>true),
			array('real_name, identity, mobile, kilometre, emissions', 'length', 'max'=>20),
			array('loan_amount, buy_price', 'length', 'max'=>10),
			array('loan_purpose, repayment_source', 'length', 'max'=>100),
			array('brand_model', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, real_name, identity, mobile, loan_amount, loan_purpose, repayment_source, brand_model, vehicle_type, buy_time, buy_price, kilometre, emissions, mot_time, insurance_time, traffic_violation, apply_time', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'user_id' => '登录用户ID',
			'real_name' => '申请人真实姓名',
			'identity' => '申请人身份证号',
			'mobile' => '申请人手机号码',
			'loan_amount' => '申请贷款额度',
			'loan_purpose' => '贷款用途',
			'repayment_source' => '还款来源',
			'brand_model' => '品牌型号',
			'vehicle_type' => '车辆类型',
			'buy_time' => '车辆购买时间',
			'buy_price' => '车辆购买价格',
			'kilometre' => '车辆行驶公里数',
			'emissions' => '车辆排量',
			'mot_time' => '年检到期日',
			'insurance_time' => '保险到期日',
			'traffic_violation' => '是否违章 0未违章 1已违章',
			'apply_time' => '申请时间',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('real_name',$this->real_name,true);
		$criteria->compare('identity',$this->identity,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('loan_amount',$this->loan_amount,true);
		$criteria->compare('loan_purpose',$this->loan_purpose,true);
		$criteria->compare('repayment_source',$this->repayment_source,true);
		$criteria->compare('brand_model',$this->brand_model,true);
		$criteria->compare('vehicle_type',$this->vehicle_type);
		$criteria->compare('buy_time',$this->buy_time,true);
		$criteria->compare('buy_price',$this->buy_price,true);
		$criteria->compare('kilometre',$this->kilometre,true);
		$criteria->compare('emissions',$this->emissions,true);
		$criteria->compare('mot_time',$this->mot_time,true);
		$criteria->compare('insurance_time',$this->insurance_time,true);
		$criteria->compare('traffic_violation',$this->traffic_violation);
		$criteria->compare('apply_time',$this->apply_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ChedaiApply the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
