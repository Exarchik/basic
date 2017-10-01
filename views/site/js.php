var surnames = [
<?php
    foreach ($persons as $person):
    ?>
        '<?=$person->fio?>',
    <?php
    endforeach;
?>
];

var napoi = [
<?php
    foreach ($napois as $napoi) :
    ?>
        {name:'<?=$napoi->name?>', price:<?=$napoi->price?>, img: '<?=$napoi->img?>' },
    <?php
    endforeach;
?>
];

var snacks = [
<?php
    foreach ($snacks as $snack) :
    ?>
        {name:'<?=$snack->name?>', price:<?=$snack->price?>, img: '<?=$snack->img?>' },
    <?php
    endforeach;
?>
];