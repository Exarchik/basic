<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "_kava_persons".
 *
 * @property integer $id
 * @property string $fio
 * @property string $deps_code
 */
class KavaPersons extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_kava_persons';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fio'], 'required'],
            [['fio'], 'string', 'max' => 250],
            [['deps_code'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'deps_code' => 'Deps Code',
        ];
    }
}
