<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список товаров';
$this->params['breadcrumbs'][] = Html::encode($this->title);
?>
<div class="kava-foodrink-index">

    <?= Html::tag('h1', $this->title ); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-square-o" aria-hidden="true"></i> Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'name',
                'format'=>'html',
            ],
            'price',
            [
                'attribute'=>'img',
                'format'=>'image',
                'options'=>['style'=>'width:70px'],
            ],
            [
                'attribute' => 'type',
                'value' => function ($data){
                    return $data->foodTypes[$data->type];
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
