<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%route}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $img
 * @property string $departure
 * @property string $destination
 * @property integer $days
 * @property double $miles
 * @property integer $start_time
 * @property integer $end_time
 * @property integer $status
 * @property string $about
 * @property string $check_list
 * @property integer $author_id
 * @property integer $create_at
 *
 * @property Comment[] $comments
 * @property Join[] $joins
 * @property User $author
 */
class Route extends \yii\db\ActiveRecord
{
    /**
     * 路线状态
     */
//    const STATUS_OPPEN = 1;
//    const STATUS_OFF = 0;
//
//    public function getStatus() {
//        return array (self::STATUS_OPPEN=>'Open',self::STATUS_OFF=>'Off');
//    }
//
//    public function getStatusLabel($status) {
//        if ($status == self::STATUS_OPPEN) {
//            return 'Open';
//        } else {
//            return 'Off';
//        }
//    }


    const STATUS_PEDALING=1;
    const STATUS_COMPLETE=2;
    const STATUS_PREPARE=3;
    const STATUS_OFF=4;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%route}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'departure', 'destination', 'miles', 'start_time', 'end_time', 'status'], 'required'],
            [['days', 'status', 'author_id', 'create_at'], 'integer'],
            [['miles'], 'number'],
            //[['about', 'check_list'], 'string'],
			[['about'], 'string'],
            [['title', 'departure', 'destination'], 'string', 'max' => 128],
            [['img', 'start_time', 'end_time', 'create_at'], 'safe'],
            [['img'],'file', 'extensions' => ['jpg','jpeg', 'png'], 'mimeTypes' => ['image/jpeg', 'image/png']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'img' => 'Img',
            'departure' => 'Departure',
            'destination' => 'Destination',
            'days' => 'Days',
            'miles' => 'Miles',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'status' => 'Status',
            'about' => 'About',
            //'check_list' => 'Check List',
            'author_id' => 'Author ID',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['route_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJoins()
    {
        return $this->hasMany(Join::className(), ['route_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($insert) {
                $this->author_id = Yii::$app->user->identity->id;
                $this->create_at = time();

            }



            //通过preg_split函数分别把2007,9,22存入$year,$month,$day,$hour,$minute,$second六个参数中
            list($year,$month,$day,$hour,$minute)=preg_split('/[-: ]/',$this->start_time);
            //根据年 月 日 时 分 秒输出时间戳
            $start=mktime($hour,$minute,0,$month,$day,$year);
            $this->start_time = $start;

            list($year,$month,$day,$hour,$minute)=preg_split('/[-: ]/',$this->end_time);
            $end=mktime($hour,$minute,0,$month,$day,$year);
            $this->end_time = $end;

            $this->days = ceil(($this->end_time - $this->start_time)/(24 * 3600)) > 0 ? ceil(($this->end_time - $this->start_time)/(24 * 3600)) : 1;


            return true;
        } else {
            return false;
        }
    }
}
