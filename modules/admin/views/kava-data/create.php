<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KavaData */

$this->title = 'Создать отчет';
$this->params['breadcrumbs'][] = ['label' => 'Отчеты кафе', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kava-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
