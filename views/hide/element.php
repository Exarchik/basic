<?php

$this->title = 'Список элементов';

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
                <th><?=$field?><th>
        <?php
                endforeach;
        ?>
            </tr>
        <?php
                foreach ($model->products as $key=>$product) :
        ?>
            <tr>
                <td><?=$product['prod_type']?><td>
                <td><?=$product['prod_price']?><td>
                <td><?=$product['prod_qty']?><td>
                <td><?=$product['prod_name']?><td>
                <td><?=$product['prod_id']?><td>
            </tr>
        <?php
                endforeach;
            endif;
        ?>
            
        </table>
      </div>
      <div class="panel-body">
        <?=$model->summary?> денег
      </div>
    </div> 
</div>