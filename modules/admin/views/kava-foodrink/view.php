<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KavaFoodrink */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = Html::decode($this->title);
?>
<div class="kava-foodrink-view">

    <?= Html::tag('h1', "Товар: #".$this->title ); ?>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'name',
                'format'=>'html',
            ],
            'price',
            [
                'attribute'=>'img',
                'format'=>'image',
            ],
            [
                'attribute' => 'type',
                'value' => function ($data){
                    return $data->foodTypes[$data->type];
                }
            ],
        ],
    ]) ?>

</div>
