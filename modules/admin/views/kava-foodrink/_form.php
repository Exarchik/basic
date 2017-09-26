<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KavaFoodrink */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kava-foodrink-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'priceHrn')->textInput(['style'=>'width:60px'])->label(false) ?>
    
    <?= $form->field($model, 'priceCoin')->textInput(['style'=>'width:60px'])->label(false) ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(['napoi'=>'napoi','snack'=>'snack']) ?>

    <div class="form-group">
        <?= ($model->isNewRecord ? '' : Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i> Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить этот отчет?',
                'method' => 'post',
            ],
        ])) ?>
        <?= Html::submitButton(
                $model->isNewRecord ? 
                '<i class="fa fa-plus-square-o" aria-hidden="true"></i> Создать' : 
                '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Изменить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Отмена', Yii::$app->request->referrer, ['class'=>'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
