<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $login
 * @property string $pass
 * @property string $auth_key
 * @property string $access_token
 * @property string $role
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'login', 'pass', 'auth_key', 'access_token', 'role'], 'required'],
            [['first_name', 'last_name'], 'string', 'max' => 150],
            [['login'], 'string', 'max' => 20],
            [['pass'], 'string', 'max' => 50],
            [['auth_key', 'access_token'], 'string', 'max' => 32],
            [['role'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'login' => 'Login',
            'pass' => 'Pass',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'role' => 'Role',
        ];
    }
}
