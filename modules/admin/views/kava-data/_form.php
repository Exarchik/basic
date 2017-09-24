<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KavaData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kava-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'products')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'order_time')->textInput() ?>

    <?= $form->field($model, 'summary')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
