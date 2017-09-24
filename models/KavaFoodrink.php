<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "_kava_foodrink".
 *
 * @property integer $id
 * @property string $name
 * @property string $price
 * @property string $img
 * @property string $type
 */
class KavaFoodrink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_kava_foodrink';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'img', 'type'], 'required'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 50],
            [['img'], 'string', 'max' => 150],
            [['type'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'img' => 'Img',
            'type' => 'Type',
        ];
    }
}
