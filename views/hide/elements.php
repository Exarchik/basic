<?php

$this->title = 'Список элементов';

?>
<span>__LINE__</span><code><?=__LINE__?></code><br />
<span>__FILE__</span><code><?=__FILE__?></code><br />
<span>__DIR__</span><code><?=__DIR__?></code><br />

<br />

<?php
 
    if (!empty($model)) :
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
    endif;