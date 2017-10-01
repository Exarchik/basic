<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KavaPersons */

$this->title = 'Create Kava Persons';
$this->params['breadcrumbs'][] = ['label' => 'Kava Persons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kava-persons-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
