<?php

/**
 * This is the model class for table "user_invest".
 *
 * The followings are the available columns in table 'user_invest':
 * @property string $id
 * @property string $trade_no
 * @property string $user_id
 * @property integer $item_id
 * @property string $item_amount
 * @property string $money
 * @property integer $has_reward
 * @property string $freeze_trx_id
 * @property string $item_income
 * @property string $invest_time
 * @property string $agreement_id
 * @property integer $status
 * @property string $details
 * @property integer $loans_flag
 * @property integer $unfreeze_status
 * @property string $remark
 */
class UserInvest extends CActiveRecord
{

    public $username;
    public $realname;
    public $item_title;
    
    public $statusDict = array('0' => '未成功', '1' => '成功', '2' => '失败',);
    public $hasRewardDict = array('0' => '无奖励', '1' => '有奖励');
    public $loansFlagDict = array('0' => '未放款', '1' => '已放款');
    public $typeAttrs=array(''=>'','1'=>'值投','2'=>'债券转让');
    public $debtStatusAttrs=array('0'=>'未转让','1'=>'部分转让','2'=>'全部转让');

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UserInvest the static model class
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
        return 'user_invest';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('trade_no,item_amount, item_income, agreement_id', 'required'),
        array('item_id, has_reward, status, loans_flag, unfreeze_status', 'numerical', 'integerOnly'=>true),
        array('trade_no, freeze_trx_id', 'length', 'max'=>50),
        array('user_id, item_amount, item_income', 'length', 'max'=>10),
        array('money', 'length', 'max'=>11),
        array('agreement_id', 'length', 'max'=>30),
        array('invest_time, details,debt_status, remark,item_title', 'safe'),
        // The following rule is used by search().
        // Please remove those attributes that should not be searched.
        array('id, trade_no, user_id, debt_status,item_id,item_title,item_amount, money, has_reward, freeze_trx_id, item_income, invest_time, agreement_id, status, details, loans_flag, unfreeze_status, remark', 'safe', 'on'=>'search'),
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
		    'user'=> array(self::BELONGS_TO, 'User', 'user_id'),
		    'itemInfo'=> array(self::BELONGS_TO, 'ItemInfo', 'item_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
			'id' => 'ID',
			'trade_no' => '交易单号',
			'user_id' => '用户名',
			'item_id' => '项目名',
			'item_amount' => '投资金额',
			'money' => '支付金额',
			'has_reward' => '是否有奖励',
			'freeze_trx_id' => '冻结单号',
			'item_income' => '投资收益',
			'invest_time' => '投资时间',
			'agreement_id' => '合同编号',
			'status' => '投资状态',
			'details' => 'Details',
			'loans_flag' => '放款标记',
			'unfreeze_status' => '解冻状态',
			'remark' => '备注',
            'username' => '用户名',
            'realname' => '真实姓名',
        	'type'=>'类型',
        	'item_title'=>'项目名',
        	'debt_status'=>'债券状态',
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

        $criteria->compare('t.id',$this->id,true);
        $criteria->compare('t.trade_no',$this->trade_no,true);
        $criteria->compare('t.user_id',$this->user_id);
        $criteria->compare('t.item_id',$this->item_id);
        $criteria->compare('t.item_amount',$this->item_amount,true);
        $criteria->compare('t.money',$this->money,true);
        $criteria->compare('t.has_reward',$this->has_reward);
        $criteria->compare('t.freeze_trx_id',$this->freeze_trx_id,true);
        $criteria->compare('t.invest_time',$this->invest_time,true);
        $criteria->compare('t.agreement_id',$this->agreement_id,true);
        $criteria->compare('t.status',$this->status);
        $criteria->compare('t.loans_flag',$this->loans_flag);
        $criteria->compare('t.unfreeze_status',$this->unfreeze_status);
        $criteria->compare('t.type',$this->type);
        $criteria->compare('t.debt_status',$this->debt_status);
        $criteria->compare('user.user_name', $this->username, true);
        $criteria->compare('user.real_name', $this->realname, true);
        $criteria->compare('itemInfo.item_title', $this->item_title, true);
        $criteria->with = array('user', 'itemInfo');

        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder'=>'t.id DESC', 
            ),
        ));
    }

    public function isHasReward($value)
    {
        if(isset($this->hasRewardDict[$value])) {
            return $this->hasRewardDict[$value];
        } else {
            return '';
        }
    }
    
    public function isLoaned($value)
    {
        if(isset($this->loansFlagDict[$value])) {
            return $this->loansFlagDict[$value];
        } else {
            return '';
        }
    }
    
    public function getStatus($status)
	{
	    if(isset($this->statusDict[$status])) {
	        return $this->statusDict[$status];
	    } else {
	        return '';
	    }
	}
	
    public function getStatusLabel($status)
    {
        $color = '#666';
    	switch ($status) {
    	    case 1:
    	        $color = 'green';
    	        break;
    	    case 2:
    	        $color = 'red';
    	        break;
    	}
    	
    	$label = '<span style="color:'.$color.';" >'.$this->getStatus($status).'</span>';
    	return $label;
    }
    
    public function getTypeStatus($status)
    {
    	if(isset($this->typeAttrs[$status]))
    	{
    		return $this->typeAttrs[$status];
    	}else {
    		return '';
    	}
    }
    
    public function getDebtStatus($status)
    {
    	if(isset($this->debtStatusAttrs[$status]))
    	{
    		return $this->debtStatusAttrs[$status];
    	}else {
    		return '';
    	}
    }
}