<?php

/**
 * This is the model class for table "background_loans_log".
 *
 * The followings are the available columns in table 'background_loans_log':
 * @property integer $id
 * @property string $invest_id
 * @property integer $item_id
 * @property string $trade_no
 * @property string $sub_trade_no
 * @property integer $out_user_id
 * @property integer $in_user_id
 * @property string $total_money
 * @property string $user_real_money
 * @property string $datetime
 * @property integer $status
 * @property string $desc
 */
class BackgroundLoansLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BackgroundLoansLog the static model class
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
		return 'background_loans_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_id, trade_no, sub_trade_no, out_user_id, in_user_id, datetime', 'required'),
			array('item_id, out_user_id, in_user_id, status', 'numerical', 'integerOnly'=>true),
			array('invest_id', 'length', 'max'=>11),
			array('trade_no, sub_trade_no', 'length', 'max'=>20),
			array('total_money, user_real_money', 'length', 'max'=>10),
			array('desc', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, invest_id, item_id, trade_no, sub_trade_no, out_user_id, in_user_id, total_money, user_real_money, datetime, status, desc', 'safe', 'on'=>'search'),
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
		    'out_user' => array(self::BELONGS_TO, 'User', 'out_user_id'),
		    'in_user' => array(self::BELONGS_TO, 'User', 'in_user_id'),
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
			'item_id' => '投资项目ID',
			'trade_no' => '订单号',
			'sub_trade_no' => '关联订单号',
			'out_user_id' => '出款人',
		    //'out_user_name' => '出款人',
			'in_user_id' => '收款人',
		    //'in_user_name' => '收款人',
			'total_money' => '总额',
			'user_real_money' => '用户支付金额',
			'datetime' => '时间',
			'status' => '状态',
			'desc' => '描述',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('invest_id',$this->invest_id);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('trade_no',$this->trade_no);
		$criteria->compare('sub_trade_no',$this->sub_trade_no);
		$criteria->compare('out_user_id',$this->out_user_id);
		$criteria->compare('in_user_id',$this->in_user_id);
		$criteria->compare('total_money',$this->total_money);
		$criteria->compare('user_real_money',$this->user_real_money);
		$criteria->compare('datetime',$this->datetime,true);
		$criteria->compare('status',$this->status);
		$criteria->with = array('out_user', 'in_user');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder'=>'t.id DESC',
            ),
		));
	}
}