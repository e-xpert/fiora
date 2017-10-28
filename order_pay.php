<?
//-------------------------------------------
//---------  VAR  ---------------------------
$VAR_title='Цветы в стекле';
//===========================================

$temp_box_price=1000;
$temp_lavanda_price=1500;

$temp_box_name="Подарочная упаковка";
$temp_lavanda_name="Упаковка с подарочным комплектом LOccitane";

$temp_box_size="Размеры: 10 х 15 х 24 см.";
$temp_lavanda_size="Размеры: 20 х 25 х 54 см.";

//---------  PHP  ---------------------------
require_once ( "php/require_files.php");
require_once ( "php/product.php");
//=============================================

// ----------   HEAD  ----------------------
require_once ( "html_head.php");
// ===========================================

$order=get_order($session_name);
unset($_COOKIE[ 'SESSION_NAME' ]);
setcookie('SESSION_NAME', null, -1, '/');
?>

<body>
<div id="wrap">
<div class="wofl">
<div class="bg_white">

<?
// ----------   META  ------------------------
require_once ( "html_header.php"     );
// ===========================================
?>
	<div class="header-sep m-b-35"></div>

	<div class="container">

		<div class="sep_75"></div>

		<div class="text-center color_black">
			<div class="m-b-3 fs_24">Ваш заказ № <? echo $order[0]; ?></div>
			<div class="m-b-3">Заказ успешно оплачен!<br>Спасибо за оформление заказа в интернет-магазине Myfiora.com </div>
			<ul class="list-inline list-inline-padd-2">
				<li><a href="catalog.php" class="btn btn-default"><span class="type-link">Продолжить покупку</span></a></li>
				<li><a href="index.php" class="btn btn-default"><span class="type-link">Вернуться на главную</span></a></li>
			</ul>
		</div>

		<div class="sep_75"></div>

<?
	// ----------   FOOTER   ---------------------
	require_once ( "html_confirm.php"     );
	// ===========================================
?>

		<div class="sep_100"></div>

	</div>

</div><!--bg_white-->

<?
	// ----------   META  ------------------------
	require_once ( "html_footer.php"     );
	// ===========================================
?>