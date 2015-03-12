<?php

/**
 * This is the model class for table "user_coupon_log".
 *
 * The followings are the available columns in table 'user_coupon_log':
 * @property integer $id
 * @property integer $user_id
 * @property integer $coupon_id
 * @property integer $item_id
 * @property string $get_time
 * @property integer $status
 * @property string $use_time
 */
class UserCouponLog extends CActiveRecord
{
    
    public $userName;
    
    public $item;
    
    public $statusAttrs = array(
        '0' => '未使用', '1' => '已使用',
    );
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserCouponLog the static model class
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
		return 'user_coupon_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, coupon_id, get_time', 'required'),
			array('user_id, coupon_id, item_id, status', 'numerical', 'integerOnly'=>true),
			array('use_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, coupon_id, item_id, get_time, status, use_time, userName, item', 'safe', 'on'=>'search'),
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
		    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		    'item_info' => array(self::BELONGS_TO, 'ItemInfo', 'item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '编号ID',
			'user_id' => '用户ID',
		    'userName' => '用户名',
			'coupon_id' => '投资券ID',
			'item_id' => '项目ID',
		    'item' => '投资项目',
			'get_time' => '领取时间',
			'status' => '状态',
			'use_time' => '使用时间',
		);
	}
	
    public function getStatus($value = '')
	{
	    if(empty($value)) {
	        $value = $this->status;
	    }
	    return $this->statusAttrs[$value];
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.user_id',$this->user_id);
		$criteria->compare('user.user_name',$this->userName, true);
		$criteria->compare('t.coupon_id',$this->coupon_id);
		$criteria->compare('t.item_id',$this->item_id);
		$criteria->compare('item_info.item_title',$this->item, true);
		$criteria->compare('t.get_time',$this->get_time,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.use_time',$this->use_time,true);
		//$criteria->limit = 2;
		$criteria->with = array('user', 'item_info');
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder'=>'t.id DESC',
            ),
            'pagination'=>array(
                'pageSize'=> 20,
            ),
		));
	}
}