<?php

use yii\helpers\Html;

?>
<div class="container">
    <div class="admin-default-index">
        <h1>Кафетерий. Админка</h1>
        <div class="container">
            <div class="col-md-2 col-sm-3 col-xs-6">
                <?= Html::a('<i class="fa fa-sticky-note-o fa-4" aria-hidden="true"></i> Отчеты', 
                    ['/admin/kava-data'], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <?= Html::a('<i class="fa fa-shopping-basket fa-4" aria-hidden="true"></i> Товары', 
                    ['/admin/kava-foodrink'], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <?= Html::a('<i class="fa fa-users fa-4" aria-hidden="true"></i> Клиенты', 
                    ['/admin/kava-persons'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>