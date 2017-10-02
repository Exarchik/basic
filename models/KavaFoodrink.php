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
    public $priceHrn = 0;
    
    public $priceCoin = 0;
    
    public $imgFile;
    
    public $foodTypes = ['napoi'=>'Напиток','snack'=>'Снек'];
    
    public $imgPath = "elements-images/";
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_kava_foodrink';
    }

    public function imgPath()
    {
        return \Yii::$app->basePath."\\web\\".$this->imgPath;
    } 

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'img', 'type'], 'required'],
            [['price','priceHrn','priceCoin'], 'number'],
            [['priceCoin'], 'number', 'max'=>99],
            [['name'], 'string', 'max' => 50],
            [['img'], 'string', 'max' => 150],
            [['imgFile'], 'file', 'extensions' => 'gif, jpg'],
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
