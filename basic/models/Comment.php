<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property integer $id
 * @property string $content
 * @property integer $create_time
 * @property integer $user_id
 * @property integer $route_id
 * @property integer $miles
 *
 * @property Route $route
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'route_id', 'miles'], 'required'],
            [['content'], 'string'],
            [['create_time', 'user_id', 'route_id', 'miles'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'create_time' => 'Create Time',
            'user_id' => 'User ID',
            'route_id' => 'Route ID',
            'miles' => 'Miles',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoute()
    {
        return $this->hasOne(Route::className(), ['id' => 'route_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($insert) {
                $this->user_id = Yii::$app->user->identity->id;
                $this->create_time = time();
            }
            return true;
        } else {
            return false;
        }
    }
}
