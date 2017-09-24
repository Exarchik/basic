<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kava Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kava-data-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kava Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'client_ip',
            [
                'attribute' => 'surname',
                'format' => 'html',
                'value' => function($data){
                    return Html::a($data->surname, ['update','id' => $data->id]);
                },
            ],
            //'products:ntext',
            'order_time',
             'summary',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
