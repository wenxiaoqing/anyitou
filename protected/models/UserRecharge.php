<?php

/**
 * This is the model class for table "user_recharge".
 *
 * The followings are the available columns in table 'user_recharge':
 * @property string $id
 * @property string $trade_no
 * @property string $user_id
 * @property integer $category
 * @property integer $recharge_type
 * @property string $recharge_amount
 * @property string $bank_id
 * @property string $recharge_time
 * @property string $before_amount
 * @property string $after_amount
 * @property integer $status
 * @property string $desc
 */
class UserRecharge extends CActiveRecord
{
    
    public $username;
    
    public $statusDict = array('0' => '等待支付', '1' => '成功', '2' => '失败',);
    
    public $categoryDict = array('1' => '线上', '2' => '线下',);
    
    public $typeDict = array();
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UserRecharge the static model class
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
        return 'user_recharge';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('trade_no, user_id, desc', 'required'),
            array('category, recharge_type, status', 'numerical', 'integerOnly'=>true),
            array('trade_no', 'length', 'max'=>50),
            array('user_id, recharge_amount, before_amount, after_amount', 'length', 'max'=>10),
            array('bank_id', 'length', 'max'=>20),
            array('desc', 'length', 'max'=>255),
            array('recharge_time', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, trade_no, user_id, category, recharge_type, recharge_amount, bank_id, recharge_time, before_amount, after_amount, status, desc', 'safe', 'on'=>'search'),
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
            'trade_no' => '交易单号',
            'user_id' => '用户ID',
            'username' => '用户名',
            'category' => '类型',
            'recharge_type' => '充值方式',
            'recharge_amount' => '金额',
            'bank_id' => '银行',
            'recharge_time' => '充值时间',
            'before_amount' => 'Before Amount',
            'after_amount' => 'After Amount',
            'status' => '状态',
            'desc' => '备注',
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
        $criteria->compare('trade_no',$this->trade_no);
        $criteria->compare('user_id',$this->user_id);
        $criteria->compare('user.user_name',$this->username, true);
        $criteria->compare('category',$this->category);
        $criteria->compare('recharge_type',$this->recharge_type);
        $criteria->compare('bank_id',$this->bank_id);
        $criteria->compare('recharge_time',$this->recharge_time,true);
        $criteria->compare('status',$this->status);
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
}