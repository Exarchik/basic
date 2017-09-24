<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KavaData */

$this->title = 'Изменить отчет: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Отчеты кафе', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="kava-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
