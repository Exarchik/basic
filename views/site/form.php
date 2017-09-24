<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;


print_r($data);

?>

<?php $f = ActiveForm::begin(); ?>
<?php print $f->field($form, 'name'); ?>
<?php print $f->field($form, 'email'); ?>

<?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>

<?php ActiveForm::end(); ?>