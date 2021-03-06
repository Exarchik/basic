<?php
use yii\bootstrap\Modal;

/* @var $this yii\web\View */

$this->title = 'My Yii Application ';
$remote_addr = $_SERVER['REMOTE_ADDR'];

Modal::begin([
    'id' => 'login-modal',
    'header' => 'Login',
    'toggleButton' => [
       'label' => 'Label Button',
       'class' => 'btn btn-success',
       'style' => 'position: absolute'
    ],
    //'footer' => 'Footer modal',
]);

echo $form;

Modal::end();

?>
<style>
.navbar-kaffee{
    top:104px;
}
</style>
<script> var remote_addr='<?=$remote_addr?>'; var keyboard_list = [0,1,2,3,4,5,6,7,8,9,10];
function pull_in(_array,_data){
	if (_data.length){
		_array.shift();
		_array.push(_data);
	}
}
function detect_enter_push(kl){
	if (kl[kl.length-1]=='Enter'){
		//console.log('enter detected!');
		var _keys = kl;
		//console.log(_keys);
		var _keycode = _keys.join('');
		//console.log(_keycode.slice(0,10));
		var _s_code = _keycode.slice(0,10);
		if (surnames_codes[_s_code]!=undefined){
			getName(surnames_codes[_s_code]);
		}
	}
}
</script>
<div class="darkness">&nbsp;</div>
<div class="kava-loader" style="display:none;" ><img src='images/img_loader.gif'></div>
<div class="kava-msg kava-success" style="display:none;">
	<div class="kava-msg-block">
		<div style="font-size: 100px;"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
		<div><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&nbsp;&nbsp;Замовлення успішно відправлено</div>
		<div class="btn btn-success cancel-order end-order">Дякую!</div>
		<div class="timer" >&nbsp;</div>
	</div>
</div>
<div class="kava-msg kava-error" style="display:none;">
	<div class="kava-msg-block">
		<div style="font-size: 100px; color: red;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>
		<div style="color: red;">Помилка на сервері<br/>Вибачте за технічні незручності!</div>
		<div class="btn btn-warning cancel-order end-order">Закрити</div>
	</div>
</div>
<div class="kava-msg kava-confirm-order" style="display:none;">
	<div class="kava-msg-block">
		<div style="font-size: 28px;color: #18b156;"><i class="fa fa-shopping-basket" aria-hidden="true"></i><div style="display: inline-block ;margin-left: 20px;">Ваше замовлення</div></div>
		<hr class="hr-order" />
		<div class="tmp-order-list"><div class="div-inline-block tmp-order-list-inner"></div></div>
		<hr class="hr-order" />
		<div class="tmp-order-list"><div class="div-inline-block tmp-order-sum"></div></div>
		<div class="btn btn-success make-order end-order" style="margin-right: 100px;" ><i class="fa fa-check-square-o" aria-hidden="true"></i> Підтвердити</div>
		<div class="btn btn-warning hide-order end-order"><i class="fa fa-backward" aria-hidden="true"></i> Назад</div>
	</div>
</div>
<div class="main-container container" style="padding:20px;">
	<div class="row">
        <?php
        /*
        $sum = 12234242.141;
        echo \Yii::t('app', 'Balance: {0, number, ##,#,###,####.##} <br/>', $sum);
        echo \Yii::t('app', 'Today is {0, date,yyyy-MM-dd} ({0, date, short}) <br/>', time());
        echo \Yii::t('app', 'Число {n,number} прописью: {n, spellout} или {n, ordinal} --- {n, duration}<br/>', ['n' => 42]);
        echo \Yii::t('app', 'I am a message!')." - ".\Yii::$app->language;
        
        echo \Yii::t(
            'app',
            ' <br/> На диване {n, plural, =0{нет кошек} =1{лежит одна кошка} one{лежит # кошка} few{лежит # кошки} many{лежит # кошек} other{лежит # кошки}}!', 
            ['n' => 52]
        );
        
        echo \Yii::t('app', '<br/> {name} - {gender} и {gender, select, женщина{ей} мужчина{ему} other{ему}} нравится Yii!', [
            'name'   => 'Василиса',
            'gender' => 'женщина',
        ]); 
        */
        ?>
		<div class="form-group">
		  <label for="surname-data">Прізвище:</label>
		  <span class="errors error-surname"></span>
		  <input class="form-control" rows="5" id="surname-data" type="text" placeholder="Введіть прізвище" />
		  <div class="surnames_list" id="surnames-list" style="display:none;"></div>
		</div>
		<span class="errors error-kava-snack"></span>
		<div class="form-group">
		  <label for="kava-data">Кава, молоко, вершки:</label>
		  <div id="kava-data" >
		  </div>
		</div>
		<div class="form-group">
		  <label for="snack-data">Снеки:</label>
		  <div id="snack-data" >
		  </div>
		</div>
		<div class="navbar-fixed-top col-sm-12 col-lg-12" >
			<div class="btn all_prices"  ><span><span id="all_prices_sum">0.00</span> грн.</span></div>
			<div class="btn btn-success try-make-order" >Замовити</div>
			<div class="btn btn-warning cancel-order" >Скасувати</div>
		</div>
	</div>
</div>
