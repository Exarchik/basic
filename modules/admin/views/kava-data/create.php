<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KavaData */

$this->title = 'Create Kava Data';
$this->params['breadcrumbs'][] = ['label' => 'Kava Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kava-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
