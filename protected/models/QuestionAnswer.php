<?php

/**
 * This is the model class for table "question_answer".
 *
 * The followings are the available columns in table 'question_answer':
 * @property integer $id
 * @property integer $q_id
 * @property string $answer
 * @property string $answer_time
 * @property string $real_name
 * @property string $mobile
 * @property string $address
 * @property integer $lucky
 * @property integer $status
 */
class QuestionAnswer extends CActiveRecord
{
    public $status_info = array(
        '0' =>  '正常',
        '1' =>  '已删除',
    );

    public $is_lucky = array(
        '0' =>  '否',
        '1' =>  '是'
    );


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'question_answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('q_id, answer, answer_time, real_name, mobile, address', 'required'),
			array('q_id, lucky, status', 'numerical', 'integerOnly'=>true),
			array('answer', 'length', 'max'=>500),
			array('real_name', 'length', 'max'=>20),
			array('mobile', 'length', 'max'=>11),
			array('address', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, q_id, answer, answer_time, real_name, mobile, address, lucky, status', 'safe', 'on'=>'search'),
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
			'q_id' => '题目ID',
			'answer' => '答案',
			'answer_time' => '调查时间',
			'real_name' => '姓名',
			'mobile' => '手机',
			'address' => '用户的快件地址',
			'lucky' => '是否中奖',
			'status' => '状态',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('q_id',$this->q_id);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('answer_time',$this->answer_time,true);
		$criteria->compare('real_name',$this->real_name,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('lucky',$this->lucky);
		$criteria->compare('status',$this->status);
        $criteria->group = 'mobile';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'`answer_time` DESC',
            ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuestionAnswer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * 根据类型获取状态信息
     */
    public function getInfoByKey($key,$num){
        switch($num){
            case 1:
                //根据key 返回用户状态
                if(!isset($this->status_info[$key]) || $this->status_info[$key] == ''){
                    return '未知';
                }
                return $this->status_info[$key];
                break;
            case 2:
                //根据key 返回题目答案是否中奖
                if(!isset($this->is_lucky[$key]) || $this->is_lucky[$key] == ''){
                    return '未知';
                }
                return $this->is_lucky[$key];
                break;
            default:
                //如果什么类型都没设置，则默认返回key值
                return $key;
        }
    }
}
