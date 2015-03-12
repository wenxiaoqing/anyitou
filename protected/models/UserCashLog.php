<?php

/**
 * This is the model class for table "user_cash_log".
 *
 * The followings are the available columns in table 'user_cash_log':
 * @property string $id
 * @property string $user_id
 * @property string $category
 * @property string $trans_id
 * @property integer $cash_status
 * @property string $cash_num
 * @property string $use_money
 * @property string $deal_time
 * @property integer $status
 */
class UserCashLog extends CActiveRecord
{
    
    public $username;
    public $realname;
    public $starttime;
    public $endtime;
    public $total_cash;
    public $statusDict = array('0' => '', '1' => '有效', '2' => '无效',);
    // 资金流向
    public $directionDict = array('1' => '收入', '2' => '支出');
    public $directionDicts = array('1' => '支出', '2' => '收入');
    
   public  $categorys= array(
   		'invest' =>'投资冻结',
   		'recharge' =>'充值',
   		'withdraw' =>'提现',
   		'withdraw_fee' =>'提现手续费',
   		'withdraw_back' =>'提现退回',
   		'repayment_interest' =>'投资收益',
   		'repayment_interest_reward' =>'投资奖励收益',
   		'repayment_capital' =>'收回本金',
   		'repayment_to.interest' =>'偿还利息',
   		'repayment_to.capital' =>'偿还本金',
   		'repayment_interest_coupon_int' =>'利息券收益',
   		'repayment_interest_coupon_reb' =>'反利券收益',
   		'loans' =>'投资成功',
   		'collect' =>'融资收款',
   		'collect_fillamount' =>'补全融资额',
   		'invite_reward' =>'邀请奖励',
   		'novice' =>'体验投资',
   		'system' =>'系统支付',
   		'debt_buy' =>'收购债权',
   		'debt_sell' =>'转让债权',
   		'debt_sellfee' =>'转让手续费',
   		'draw_coupon'=>'抵消提现券',
   );
   
 public  $categorysAttrs= array(
   		'repayment_interest_reward' =>'投资奖励收益',
   		'repayment_interest_coupon_int' =>'利息券收益',
   		'repayment_interest_coupon_reb' =>'反利券收益',
   		'collect_fillamount' =>'补全融资额',
   		'invite_reward' =>'邀请奖励',
   		'system' =>'系统支付',
   		'draw_coupon'=>'抵消提现券',
   		'activity_price'=>'活动奖励',
   		'debt_sellfee' =>'转让手续费',
   );
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UserCashLog the static model class
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
        return 'user_cash_log';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id,cash_num, status', 'required'),
            array('cash_status, status', 'numerical', 'integerOnly'=>true),
            array('user_id, cash_num', 'length', 'max'=>10),
            array('category', 'length', 'max'=>30),
            array('trans_id', 'length', 'max'=>50),
            array('use_money', 'length', 'max'=>11),
            array('deal_time,username,status,category','safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_id,username,status,category, trans_id, cash_status, cash_num, use_money, deal_time, status', 'safe', 'on'=>'search'),
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
            'id' => 'ID',
            'user_id' => 'UID',
            'username' => '用户名',
            'realname' => '真实姓名',
            'category' => '类型',
            'trans_id' => '交易ID',
            'cash_status' => '资金流向',
            'cash_num' => '交易金额',
            'use_money' => '余额',
            'deal_time' => '处理时间',
            'status' => '状态',
        	'starttime'=>'起始时间',
        	'endtime'=>'截止时间',
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

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.user_id', $this->user_id);
        $criteria->compare('user.user_name', $this->username, true);
        $criteria->compare('user.real_name', $this->realname, true);
        $criteria->compare('t.category', $this->category);
        $criteria->compare('t.trans_id', $this->trans_id);
        $criteria->compare('t.cash_status', $this->cash_status);
        $criteria->compare('t.cash_num', $this->cash_num);
        $criteria->compare('t.use_money', $this->use_money);
        $criteria->compare('t.deal_time', $this->deal_time,true);
        $criteria->compare('t.status', $this->status);
        $criteria->with = array('user',);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'t.id DESC', 
            ),
        ));
    }
    
    public function getStatus($status)
	{
	    if(isset($this->statusDict[$status])) {
	        return $this->statusDict[$status];
	    } else {
	        return '';
	    }
	}
	
	
    public function getDirection($direction)
	{
	    if(isset($this->directionDict[$direction])) {
	        return $this->directionDict[$direction];
	    } else {
	        return '';
	    }
	}
	
	public function getDirections($direction)
	{
		if(isset($this->directionDicts[$direction])) {
			return $this->directionDicts[$direction];
		} else {
			return '';
		}
	}
	
	public function getCategory($category)
	{
// 		if(isset($this->categorys[$category]['label'])) {
// 			return $this->categorys[$category]['label'];
		if(isset($this->categorys[$category])) {
			return $this->categorys[$category];
		} else {
			return '';
		}
	}
	
	public function getCategorys($value ='')
	{
	    if(empty($value)){
	       
	        $value=$this->category;
	    }
	    return $this->categorys[$value];
	}
}