<?php

/**
 * This is the model class for table "corp_freeze_log".
 *
 * The followings are the available columns in table 'corp_freeze_log':
 * @property integer $id
 * @property integer $user_id
 * @property string $UsrCustId
 * @property string $OrdId
 * @property string $OrdDate
 * @property string $TransAmt
 * @property integer $is_guar
 * @property integer $status
 * @property integer $item_id
 * @property string $TrxId
 * @property integer $is_unfreeze
 */
class CorpFreezeLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CorpFreezeLog the static model class
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
		return 'corp_freeze_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, UsrCustId, OrdId, OrdDate, TransAmt, item_id', 'required'),
			array('user_id, is_guar, status, item_id, is_unfreeze', 'numerical', 'integerOnly'=>true),
			array('UsrCustId', 'length', 'max'=>30),
			array('OrdId', 'length', 'max'=>50),
			array('TransAmt', 'length', 'max'=>10),
			array('TrxId', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, UsrCustId, OrdId, OrdDate, TransAmt, is_guar, status, item_id, TrxId, is_unfreeze', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'UsrCustId' => 'Usr Cust',
			'OrdId' => 'Ord',
			'OrdDate' => 'Ord Date',
			'TransAmt' => 'Trans Amt',
			'is_guar' => 'Is Guar',
			'status' => 'Status',
			'item_id' => 'Item',
			'TrxId' => 'Trx',
			'is_unfreeze' => 'Is Unfreeze',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('UsrCustId',$this->UsrCustId,true);
		$criteria->compare('OrdId',$this->OrdId,true);
		$criteria->compare('OrdDate',$this->OrdDate,true);
		$criteria->compare('TransAmt',$this->TransAmt,true);
		$criteria->compare('is_guar',$this->is_guar);
		$criteria->compare('status',$this->status);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('TrxId',$this->TrxId,true);
		$criteria->compare('is_unfreeze',$this->is_unfreeze);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}