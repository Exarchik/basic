<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "_kava_data".
 *
 * @property integer $id
 * @property string $client_ip
 * @property string $surname
 * @property string $products
 * @property string $order_time
 * @property string $summary
 */
class KavaData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_kava_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_ip', 'surname', 'products', 'summary'], 'required'],
            [['products'], 'string'],
            [['order_time'], 'safe'],
            [['summary'], 'number'],
            [['client_ip'], 'string', 'max' => 15],
            [['surname'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_ip' => 'Client Ip',
            'surname' => 'Surname',
            'products' => 'Products',
            'order_time' => 'Order Time',
            'summary' => 'Summary',
        ];
    }
    
    
    public static function viewProducts($data)
    {
        $html = '<table class="table table-stripped">';
        $html .= "<tr>";
        foreach (array_keys($data[0]) as $key=>$field) :
            $html .= "<th>$field</th>";
        endforeach;
        foreach ($data as $key=>$product) :
            $html .= "<tr>";
            $html .= "<td class='even'>".$product['prod_type']."</td>";
            $html .= "<td class='odd'>".$product['prod_price']."</td>";
            $html .= "<td class='even'>".$product['prod_qty']."</td>";
            $html .= "<td class='odd'>".$product['prod_name']."</td>";
            $html .= "<td class='even'>".$product['prod_id']."</td>";
            $html .= "</tr>";
        endforeach;
        $html .= "</tr>";
        $html .= '</table>';
        return $html;
    }
    
}
