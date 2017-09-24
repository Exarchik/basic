<?php

namespace app\models;

use Yii;
use yii\base\Model;

class MyForm extends Model
{
    public $name;
    public $email;
    
    function rules(){
        return[
            [['name','email'],'required','message'=>'Поле обязательное'],
            ['email', 'email', 'message'=>'Неверный email адрес'],
        ];
    }    
}

?>