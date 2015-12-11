<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%join}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $route_id
 *
 * @property Route $route
 * @property User $user
 */
class Join extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%join}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'route_id'], 'required'],
            [['user_id', 'route_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'route_id' => 'Route ID',
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
}
