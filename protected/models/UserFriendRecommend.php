<?php

/**
 * This is the model class for table "user_friend_recommend".
 *
 * The followings are the available columns in table 'user_friend_recommend':
 * @property integer $id
 * @property integer $user_id
 * @property integer $recommend_id
 * @property string $date_time
 * @property integer $status
 * @property string $income
 */
class UserFriendRecommend extends CActiveRecord
{
    public $recommend_user_name;
    public $user_name;
    public $statusAttrs = array(
        '0' => '未生效', '1' => '已生效',
    );
    
  
    public $typeAttrs = array(
        '0' => '未知',
        '1' => '通过链接',
        '2' => '通过二维码',
        '3' => '通过分享',
    );
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserFriendRecommend the static model class
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
		return 'user_friend_recommend';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, recommend_id, date_time, status', 'required'),
			array('user_id, recommend_id,coupon_id,status, prize', 'numerical', 'integerOnly'=>true),
			array('income', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, recommend_id,coupon_id,date_time, status, prize, income, recommend_type, user_name, recommend_user_name', 'safe', 'on'=>'search'),		
			array('status','in','range'=>array(0,1),'message'=>'状态只能为0或1'),
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
		    'recommend_user' => array(self::BELONGS_TO, 'User', 'recommend_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID编号',
			'user_id' => '用户',
		    'user_name' => '用户名',
			'recommend_id' => '邀请人',
		    'recommend_user_name' => '邀请人用户名',
		    'prize'=> '邀请奖励',
			'date_time' => '邀请时间',
		    'recommend_type' => '推荐类型',
			'status' => '状态',
			'income' => '累积奖励',
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.user_id',$this->user_id);
		$criteria->compare('user.user_name', $this->user_name,true);
		$criteria->compare('t.recommend_id', $this->recommend_id);
		$criteria->compare('recommend_user.user_name', $this->recommend_user_name);
		$criteria->compare('t.date_time',$this->date_time,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.prize',$this->income);
		$criteria->compare('t.income',$this->income);
		$criteria->compare('t.recommend_type',$this->recommend_type);
		$criteria->compare('t.coupon_id',$this->coupon_id);
		$criteria->with = array('recommend_user', 'user');

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
	
	public function getStatus($value = '')
	{
	    if(empty($value)) {
	        $value = $this->status;
	    }
	    return $this->statusAttrs[$value];
	}
	
    public function getType($value = '')
	{
	    if(empty($value)) {
	        $value = $this->recommend_type;
	    }
	    return $this->typeAttrs[$value];
	}
	
	public function getInviteInfo($user_id = '')
	{
	    if($user_id == '') {
	        $user_id = $this->user_id;
	    }
	    if(empty($user_id)) {
	        return FALSE;
	    }
	    
	    $criteria=new CDbCriteria;
		$criteria->compare('user_id', $user_id);
		$criteria->with = array('recommend_user');
		
		$model = $this->findByAttributes(array(), $criteria);
	    return $model;
	}
	
}