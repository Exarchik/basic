<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\KavaData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kava-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?/*= $form->field($model, 'products')->textarea(['rows' => 6, 'disabled'=>'disabled', 'style'=>'color:#aaa;']) */?>
    
    <?= $form->field($model, 'products')->render(
        function ($content){
            foreach($content->model->products as $k1 => $product) :
            ?>
                <div class="KavaData_product KavaData_product_<?=$k1?>">
            <?php
                    foreach ($product as $k2 => $fieldData) :
                ?>
                    <input name="KavaData[products][<?=$k1?>][<?=$k2?>]" value="<?=$fieldData?>" />
                <?php
                    endforeach;
            ?>
                </div>
            <?php
            endforeach;
        }
    ) ?>

    <?= $form->field($model, 'order_time')->textInput() ?>
    <?//= $form->field($model, 'order_time')->widget(\yii\jui\DatePicker::classname()) ?>

    <?= $form->field($model, 'summary')->textInput(['maxlength' => true]) ?>

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
