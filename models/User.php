<?php

namespace app\models;


use Yii;
use \yii\db\ActiveRecord;
use \yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $authKey
 * @property string $accessToken
 * @property boolean $status
 * @property string $email_confirm_token
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_WAIT = false;
    const STATUS_ACTIVE = true;

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['username', 'password', 'email', 'status'], 'required'],
            [['email'], 'email'],
            [['authKey', 'accessToken'], 'default', 'value' => ''],
            [['password', 'authKey', 'accessToken', 'email_confirm_token'], 'string'],
            [['username'], 'string', 'max' => 50],
            [['status'], 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'username'      => 'Логин',
            'password'      => 'Пароль',
            'email'         => 'Электронная почта',
            'authKey'       => 'Auth Key',
            'accessToken'   => 'Access Token',
        ];
    }

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
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findByUsername($username)
    {
        $user = self::find()->where('username = :username', [':username' => $username])->one();
        if (is_object($user) && isset($user->username) && strlen($user->username) > 1) {
            return new static($user);
        }

        return null;
    }

    public function validatePassword($password)
    {
        return $this->cryptPassword($password) === $this->password;
    }

    private function cryptPassword($password)
    {
        return md5(md5($password));
    }
}
