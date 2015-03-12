<?php

/**
 * This is the model class for table "item_repayment_log".
 *
 * The followings are the available columns in table 'item_repayment_log':
 * @property string $id
 * @property string $invest_id
 * @property integer $item_id
 * @property string $user_id
 * @property string $trade_no
 * @property integer $status
 * @property string $type
 * @property integer $order
 * @property string $value_time
 * @property string $repay_time
 * @property string $interest
 * @property string $capital
 * @property string $addtime
 * @property string $addip
 * @property string $response
 */
class ItemRepaymentLog extends CActiveRecord
{
    
    public $username;
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ItemRepaymentLog the static model class
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
		return 'item_repayment_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_id, status, order', 'numerical', 'integerOnly'=>true),
			array('invest_id, interest, capital', 'length', 'max'=>11),
			array('user_id', 'length', 'max'=>10),
			array('trade_no, value_time, addip', 'length', 'max'=>50),
			array('type', 'length', 'max'=>20),
			array('repay_time, addtime, response', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, invest_id, item_id, user_id, trade_no, status, type, order, value_time, repay_time, interest, capital, addtime, addip, response', 'safe', 'on'=>'search'),
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
			'invest_id' => '投资记录ID',
			'item_id' => '投资项目',
			'user_id' => '用户ID',
			'trade_no' => 'Trade No',
			'status' => '状态',
			'type' => 'Type',
			'order' => 'Order',
			'value_time' => '计息日',
			'repay_time' => '还款日',
			'interest' => '收益',
			'capital' => '本机',
			'addtime' => '添加时间',
			'addip' => 'Addip',
			'response' => '响应结果',
		    'username' => '用户名',
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
		$criteria->compare('t.invest_id',$this->invest_id,true);
		$criteria->compare('t.item_id',$this->item_id);
		$criteria->compare('t.user_id',$this->user_id,true);
		$criteria->compare('t.trade_no',$this->trade_no,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.type',$this->type,true);
		$criteria->compare('t.order',$this->order);
		$criteria->compare('t.value_time',$this->value_time,true);
		$criteria->compare('t.repay_time',$this->repay_time,true);
		$criteria->compare('t.interest',$this->interest,true);
		$criteria->compare('t.capital',$this->capital,true);
		$criteria->compare('t.addtime',$this->addtime,true);
		$criteria->compare('t.addip',$this->addip,true);
		$criteria->compare('t.response',$this->response,true);
		$criteria->compare('user.user_name', $this->username, true);
		$criteria->with = array('user', 'itemInfo');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder'=>'t.id DESC', 
            ),
		));
	}
}