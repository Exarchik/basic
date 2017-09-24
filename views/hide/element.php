<?php

$this->title = 'Список элементов';
$this->params['breadcrumbs'][] = [
            'label' => 'Элементы',
            'url' => ['hide/elements']
];
$this->params['breadcrumbs'][] = "($model->id) $model->surname";

?>
<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">(<?=$model->id?>) <?=$model->surname?></h3>
      </div>
      <div class="panel-body">
        <table class="table table-striped">
            <tr> 
        <?php
            if (!empty($model->products)) :
                foreach (array_keys($model->products[0]) as $key=>$field) :
        ?>
                <th><?=$types[$field]?><th>
        <?php
                endforeach;
        ?>
            </tr>
        <?php
                foreach ($model->products as $key=>$product) :
        ?>
            <tr>
                <td class="even"><?=$types[$product['prod_type']]?><td>
                <td class="odd"><?=$product['prod_price']?><td>
                <td class="even">x <?=$product['prod_qty']?><td>
                <td class="odd"><?=$product['prod_name']?><td>
                <td class="even"><?=$product['prod_id']?><td>
            </tr>
        <?php
                endforeach;
            endif;
        ?>
            
        </table>
      </div>
      <div class="panel-body">
        <div class="well">
            <?=$model->summary?> денег
        </div>
      </div>
    </div> 
</div>