<?php

/**
 * This is the model class for table "questionnaire".
 *
 * The followings are the available columns in table 'questionnaire':
 * @property integer $id
 * @property string $q_title
 * @property string $q_answer
 * @property integer $q_category
 * @property integer $q_type
 * @property integer $q_sort
 * @property integer $q_status
 * @property integer $q_answer_long
 * @property string $add_time
 * @property string $update_time
 */
class Questionnaire extends CActiveRecord
{
    public $status_info = array(
        '0' => '正常',
        '1' => '已删除',
    );
    public $is_too_long = array(
        '0' => '否',
        '1' => '是',
    );
    public $question_type = array(
        '0' =>  '未设置',
        '1' =>  '单项选择题',
        '2' =>  '多项选择题',
        '3' =>  '问答题',
        '4' =>  '综合题',
    );

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'questionnaire';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('q_title,q_category, q_sort','required','on'=>'create'),
			array('q_title, q_category, q_sort, q_status', 'required'),
			array('q_category, q_type, q_sort, q_status, q_answer_long', 'numerical', 'integerOnly'=>true),
			array('q_title', 'length', 'max'=>200),
			array('q_answer', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, q_title, q_answer, q_category, q_type, q_sort, q_status, q_answer_long, add_time, update_time', 'safe', 'on'=>'search'),
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
			'q_title' => '题目',
			'q_answer' => '选项(问答题默认为空)',
			'q_category' => '题目所属问卷',
			'q_type' => '题目类型',
			'q_sort' => '题目排序',
			'q_status' => '题目状态',
			'q_answer_long' => '是否超长',
			'add_time' => '添加时间',
			'update_time' => '修改时间',
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
		$criteria->compare('q_title',$this->q_title,true);
		$criteria->compare('q_answer',$this->q_answer,true);
		$criteria->compare('q_category',$this->q_category);
		$criteria->compare('q_type',$this->q_type);
		$criteria->compare('q_sort',$this->q_sort);
		$criteria->compare('q_status',$this->q_status);
		$criteria->compare('q_answer_long',$this->q_answer_long);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'`q_category` ASC,`q_sort` ASC',
            ),
            'pagination'=>array(
                'pageSize' => 20,
            ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Questionnaire the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * json_encode 构造答案存储方式
     */
    public function setQuestionsAnswer(){
        if(!empty($this->q_answer)){
            $answers = explode('|',$this->q_answer);
            $answers_arr = array();
            foreach($answers as $key=>$value){
                $list = explode('[]',$value);
                if(empty($list)) continue;
                $answers_arr[$list[0]] = $list[1];
            }
            if(empty($answers_arr)){
                return false;
            }
            return json_encode($answers_arr);
        }else{
            return '';
        }
    }

    /**
     * json_decode 解析答案输出
     */
    public function getQuestionAnswer(){
        if(!empty($this->q_answer)){
            $answers = json_decode($this->q_answer,true);
            $text='';
            foreach($answers as $key=>$value){
                $text .=$key.'[]'.$value.'|';
            }
            //去除最后一个|
            $text = rtrim($text, "|");
            if($text === ''){
                return false;
            }
            return $text;
        }
    }

    /**
     * 根据类型获取状态信息
     */
    public function getInfoByKey($key,$num){
        switch($num){
            case 1:
                //根据key 返回题目状态
                if(!isset($this->status_info[$key]) || $this->status_info[$key] == ''){
                    return '未知';
                }
                return $this->status_info[$key];
                break;
            case 2:
                //根据key 返回题目答案是否属于超长选项
                if(!isset($this->is_too_long[$key]) || $this->is_too_long[$key] == ''){
                    return '未知';
                }
                return $this->is_too_long[$key];
                break;
            case 3:
                //根据key 返回题目类型
                if(!isset($this->question_type[$key]) || $this->question_type[$key] == ''){
                    return '未知';
                }
                return $this->question_type[$key];
                break;
            default:
                //如果什么类型都没设置，则默认返回key值
                return $key;
        }
    }
}
