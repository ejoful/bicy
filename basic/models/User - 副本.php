<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $img
 * @property string $profile
 * @property string $regdate
 *
 * @property Comment[] $comments
 * @property Join[] $joins
 * @property Route[] $routes
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'username', 'password', 'regdate'], 'required'],
            [['profile'], 'string'],
            [['regdate'], 'safe'],
            [['email'], 'string', 'max' => 40],
            [['username'], 'string', 'max' => 15],
            [['password'], 'string', 'max' => 32],
            [['img'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'img' => 'Img',
            'profile' => 'Profile',
            'regdate' => 'Regdate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJoins()
    {
        return $this->hasMany(Join::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoutes()
    {
        return $this->hasMany(Route::className(), ['author_id' => 'id']);
    }
}
