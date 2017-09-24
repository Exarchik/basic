<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KavaFoodrink */

$this->title = 'Create Kava Foodrink';
$this->params['breadcrumbs'][] = ['label' => 'Kava Foodrinks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kava-foodrink-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
