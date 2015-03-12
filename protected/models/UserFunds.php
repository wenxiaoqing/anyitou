<?php

/**
 * This is the model class for table "user_funds".
 *
 * The followings are the available columns in table 'user_funds':
 * @property string $user_id
 * @property string $account_pass
 * @property string $all_assets
 * @property string $all_income
 * @property integer $status
 */
class UserFunds extends CActiveRecord
{
    
    public $statusAttrs = array('0' => '未开通', '1' => '正常', '2' => '关闭',);
    
    public $username;
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserFunds the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_funds';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('user_id, all_assets, use_money, frozen_money, collected_interest, all_income', 'length', 'max'=>10),
			array('account_pass', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, all_assets, use_money, frozen_money, collected_interest, all_income, status', 'safe', 'on'=>'search'),
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
		    "user"   =>  array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'UID',
		    'username' => '用户名',
			'all_assets' => '总资产',
		    'use_money' => '可用余额',
		    'frozen_money' => '冻结金额',
		    'prize_num' => '奖励账户',
			'all_income' => '已获收益',
		    'collected_interest' => '待收收益',
			'status' => '账户状态',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('user.user_name', $this->username,true);
		$criteria->compare('all_assets',$this->all_assets);
		$criteria->compare('use_money', $this->use_money);
		$criteria->compare('all_income',$this->all_income);
		$criteria->compare('status',$this->status);
        $criteria->with = array('user',);
        
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria, 
		    'sort'=>array(
                'defaultOrder'=>'t.user_id DESC', 
            ),
		));
	}
	
    public function getStatus($value = '')
	{
	    if(empty($value)) {
	        $value = $this->status;
	    }
	    return $this->statusAttrs[$value];
	}
}