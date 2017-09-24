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

    <?= $form->field($model, 'products')->textarea(['rows' => 6, 'disabled'=>'disabled', 'style'=>'color:#aaa;']) ?>

    <?= $form->field($model, 'order_time')->textInput() ?>

    <?= $form->field($model, 'summary')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(
                $model->isNewRecord ? 
                '<i class="fa fa-plus-square-o" aria-hidden="true"></i> Создать' : 
                '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Изменить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Отмена', Yii::$app->request->referrer, ['class'=>'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
