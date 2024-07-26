<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $role
 * @property int $id
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            [['name', 'password'], 'string', 'max' => 10],
            [['email'], 'string', 'max' => 25],
            ['email', 'email'],
            [['name', 'email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->password = md5($this->password);
        }
        return parent::beforeSave($insert);
    }
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'role' => 'Role',
            'id' => 'ID',
        ];
    }

    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    public static function findByUsername($username)
    {
        return self::find()->where(['name' => $username])->one();
    }
}
