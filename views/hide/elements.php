<?php

$this->title = 'Список элементов';

?>
<div class="container">

<?php
 
    if (!empty($model)) :
?>
    <div class="container">
<?php
        foreach ($model as $element) :
?>
        <div class="panel panelko panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><a href="<?=yii\helpers\Url::to(['hide/element','id'=>$element->id])?>">(<?=$element->id?>) <?=$element->surname?></a></h3>
          </div>
          <div class="panel-body">
            <?=$element->summary?> денег
          </div>
        </div> 

<?php
        endforeach;
?>
    </div>
    <div class="container">
<?php       
        print \yii\widgets\LinkPager::widget(['pagination'=>$pages]);
?>
    </div>
<?php     
    endif;
?>
</div>