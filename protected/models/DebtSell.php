<?php

/**
 * This is the model class for table "debt_sell".
 *
 * The followings are the available columns in table 'debt_sell':
 * @property string $id
 * @property string $number
 * @property string $user_id
 * @property string $invest_id
 * @property string $item_id
 * @property integer $status
 * @property integer $category
 * @property string $amount
 * @property string $real_amount
 * @property string $buyer_apr
 * @property string $repayment_time
 * @property string $price
 * @property string $transferred_amount
 * @property integer $transferred_num
 * @property string $addtime
 * @property integer $sell_days
 * @property string $sell_start_time
 * @property string $sell_end_time
 * @property double $real_apr
 * @property string $desc
 */
class DebtSell extends CActiveRecord
{
	public $username;
	public $item_title;
	public $statusAttrs=array('0'=>'待审核','1'=>'通过审核','2'=>'转让完成','3'=>'关闭');
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DebtSell the static model class
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
		return 'debt_sell';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('addtime', 'required'),
			array('status, category, transferred_num, sell_days', 'numerical', 'integerOnly'=>true),
			array('real_apr', 'numerical'),
			array('number', 'length', 'max'=>30),
			array('user_id, invest_id, item_id', 'length', 'max'=>11),
			array('amount, real_amount, price, transferred_amount', 'length', 'max'=>10),
			array('buyer_apr', 'length', 'max'=>6),
			array('desc', 'length', 'max'=>255),
			array('repayment_time, sell_start_time, sell_end_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, number, user_id, invest_id, item_id, status, category, amount, real_amount, buyer_apr, repayment_time, price, transferred_amount, transferred_num, addtime, sell_days, sell_start_time, sell_end_time, real_apr, desc', 'safe', 'on'=>'search'),
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
				'item_info'=>array(self::BELONGS_TO,'ItemInfo','item_id'),	
				'user'=>array(self::BELONGS_TO,'User','user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'number' => '项目号',
			'user_id' => '发布人',
			'invest_id' => '投资ID',
			'item_id' => '项目',
			'status' => '审核',
			'category' => '分类',
			'amount' => '转出份额',
			'real_amount' => '实际转出金额',
			'buyer_apr' => '年化收益',
			'repayment_time' => '还款时间',
			'price' => '转让价',
			'transferred_amount' => '已转份额',
			'transferred_num' => '认购人次',
			'addtime' => '提交时间',
			'sell_days' => '转让期限',
			'sell_start_time' => '转让开始时间',
			'sell_end_time' => '转让结束时间',
			'real_apr' => '转后实际年化',
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

		$criteria->compare('t.id',$this->id,true);
		$criteria->compare('t.number',$this->number,true);
		$criteria->compare('t.user_id',$this->user_id,true);
		$criteria->compare('t.invest_id',$this->invest_id,true);
		$criteria->compare('t.item_id',$this->item_id,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.category',$this->category);
		$criteria->compare('t.amount',$this->amount,true);
		$criteria->compare('t.real_amount',$this->real_amount,true);
		$criteria->compare('t.buyer_apr',$this->buyer_apr,true);
		$criteria->compare('t.repayment_time',$this->repayment_time,true);
		$criteria->compare('t.price',$this->price,true);
		$criteria->compare('t.transferred_amount',$this->transferred_amount,true);
		$criteria->compare('t.transferred_num',$this->transferred_num);
		$criteria->compare('t.addtime',$this->addtime,true);
		$criteria->compare('t.sell_days',$this->sell_days);
		$criteria->compare('t.sell_start_time',$this->sell_start_time,true);
		$criteria->compare('t.sell_end_time',$this->sell_end_time,true);
		$criteria->compare('t.real_apr',$this->real_apr);
		$criteria->compare('t.desc',$this->desc,true);
		$criteria->compare('user.user_name',$this->username,true);
		$criteria->compare('item_info.',$this->item_title,true);
		$criteria->with=array('user','item_info');
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder'=>'t.id DESC', 
            ),
            'pagination'=>array(
                'pageSize' => 20,
            ),
		));
	}
	
	public function getStatus($value='')
	{
		if(empty($value)){
			$value=$this->status;
		}
		
		return $this->statusAttrs[$value];
		
	}
}