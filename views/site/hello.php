<?php

if (Yii::$app->session->hasFlash("q-msg"))
{
    ?>
    <div class="alert alert-danger" role="alert">
        <?= Yii::$app->session->getFlash('q-msg') ?>
    </div>
    <?
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-3 hidden-xs">Левый блок</div>
        <div class="col-md-4 col-sm-4 col-xs-12"><?php echo $message; ?></div>
        <div class="col-md-5 col-sm-5 col-xs-12"><?php echo $flash; ?></div>
    </div>
</div>
