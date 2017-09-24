<?php

namespace app\models; 


use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Kava extends ActiveRecord
{
    public static function tableName(){
        return "_kava_data";
    }
    
}