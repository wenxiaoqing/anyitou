<?php

/**
 * This is the model class for table "user_channel".
 *
 * The followings are the available columns in table 'user_channel':
 * @property integer $id
 * @property string $title
 * @property string $keyword
 * @property integer $status
 */
class UserChannelReg extends CActiveRecord
{
	public $starttime;
	public $endtime;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserChannelReg the static model class
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
		return 'user_channel_reg';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

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
			'id' => '编号ID',
			'day' => '注册时间',
			'type'=>'渠道',
			'number'=>'每日注册数',
			'updatetime'=>'修改时间',
			'starttime'=>'开始时间',
			'endtime'=>'结束时间',
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
		$criteria->compare('day',$this->day,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('number',$this->number);
		$criteria->compare('updatetime',$this->updatetime,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder' => 'id DESC', 
            ),
            'pagination'=>array(
                'pageSize' =>10,
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
	
	public function existKeyword()
	{
	    if(empty($value)) {
	        $value = $this->keyword;
	    }
	    $row = $this->findByAttributes(array('keyword' => $value));
	    if($row && $row->id != $this->id) {
	        $this->addError('keyword', '该关键词已存在');
	        return false;
	    }
	    return true;
	}
	
}