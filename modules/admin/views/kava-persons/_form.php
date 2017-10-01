<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KavaPersons */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kava-persons-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deps_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
         <?= ($model->isNewRecord ? '' : Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i> Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить этого клиента?',
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
