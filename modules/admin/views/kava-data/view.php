<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KavaData */

$this->title = $model->id.' - '.$model->surname;
$this->params['breadcrumbs'][] = ['label' => 'Отчеты кафе', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="kava-data-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i> Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить этот отчет?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('<i class="fa fa-backward" aria-hidden="true"></i> К списку', 
            (strpos(Yii::$app->request->referrer,'update')?['index']:Yii::$app->request->referrer),
            ['class' => 'btn btn-warning']) ?>
    </p>

    <?php
        
        print DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'client_ip',
                'surname',
                [
                    'attribute' => 'products',
                    'format' => 'html',
                    'value' => function ($data){
                        return \app\models\KavaData::viewProducts($data->products);
                    }
                ],
                'order_time',
                'summary',
            ],
        ]);
        
    ?>

</div>
