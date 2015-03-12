<?php

/**
 * This is the model class for table "statistics_csai".
 *
 * The followings are the available columns in table 'statistics_csai':
 * @property integer $id
 * @property integer $user_id
 * @property string $user_name
 * @property string $real_name
 * @property string $mobile
 * @property string $invest_total
 * @property string $statistical_time
 */
class StatisticsCsai extends CActiveRecord
{
    public $is_invest_month;

    public $is_invested_month = array(
        '0' =>  '否',
        '1' =>  '是'
    );
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'statistics_csai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, user_name, real_name, mobile, invest_total, statistical_time', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('user_name, real_name, mobile', 'length', 'max'=>20),
			array('invest_total', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, user_name, real_name, mobile, invest_total, statistical_time', 'safe', 'on'=>'search'),
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
			'user_id' => '用户ID',
			'user_name' => '用户名',
			'real_name' => '真实姓名',
			'mobile' => '手机号码',
			'invest_total' => '用户的投资总额',
			'statistical_time' => '统计时间',
            'is_invest_month'   =>  '当前月是否投资',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('real_name',$this->real_name,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('invest_total',$this->invest_total,true);
		$criteria->compare('statistical_time',$this->statistical_time,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'`user_id` DESC',
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
	 * @return StatisticsCsai the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * @param $mobile
     * @return string
     */
    public function replaceMobile($mobile)
    {
        $p = substr($mobile,0,4)."****".substr($mobile,8,3);
        return $p;
    }

    public function getStatusInvestMonth($user_id){
        $date = date('Y-m-d',time());
        $time = $this->getthemonth($date);
        $result = Yii::app()->db->createCommand("select count(id) from user_invest where success_time BETWEEN '".$time['first']."' AND '".$time['last']."' and loans_flag = 1 and user_id=".$user_id)
            ->queryScalar();
        if($result <= 0){
            return $this->is_invested_month[0];
        }
        return $this->is_invested_month[1];
    }

    /**
     * 根据时间获取所属月份的第一天和最后一天
     * @param $date
     * @return array
     */
    public function getthemonth($date){
        $firstday = date('Y-m-01', strtotime($date));
        $lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day"));
        return array('first'=>$firstday,'last'=>$lastday);
    }
}
