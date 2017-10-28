<?
//-------------------------------------------
//---------  VAR  ---------------------------
$VAR_title='Акции';
//===========================================

//---------  PHP  ---------------------------
require_once ( "php/require_files.php");
//=============================================

// ----------   HEAD  ----------------------
require_once ( "html_head.php");
// ===========================================
?>

<body>
<div id="wrap">
<div class="bg_white">

<?
	// ----------   META  ------------------------
	require_once ( "html_header.php"     );
	// ===========================================
?>

	<div class="header-sep m-b-35"></div>

	<div class="container">

		<div class="m-b-35 row">
			<div class="col-xs-12 col-sm-6">
				<div class="fs_18">Акции</div>
			</div>
			<div class="col-xs-12 col-sm-6 text-right fs_16 hidden-xs">
				<span class="tooltips top left">
					<a href="/gallery.php" class="type-link">Фотогаллерея Fi’ora</a>
					<div class="tooltips_box">
						<div class="tooltips_box_arr"></div>
						<div class="tooltips_box_body fs_14 text-left">
							<i>Посмотрите, как это в интерьере</i>
						</div>
					</div>
				</span>
			</div>
		</div>

		<div class="stock m-b-5">
			<div class="m-b-2 disimg"><img src="images/stock/delivery.png" alt="" /></div>
			<div class="m-b-1 fs_30">Доставляем за свой счет или по выгодной цене</div>
			<div class="m-b-2 fs_18">Доставка заказов осуществляется бесплатно в городах Москва, Екатеринбург, Новосибирск, Томск, Кемерово при сумме заказа от 8000 рублей. Доставка в другие города России осуществляется транспортными компаниями по выгодной цене за счет выбора ближайшего пункта отгрузки Fi’ora к Вам.</div>
			Логистический центр Fi’ora определяет ближайший пункт отгрузки в зависимости от вашего населённого пункта (более 30 мест отгрузки по России).
		</div>

		<!-- <div class="m-b-5 hr"></div>

		<div class="stock m-b-5">
			<div class="m-b-2 disimg"><img src="images/stock/action_2.png" alt="" /></div>
			<div class="m-b-1 fs_30">Заголовок 2</div>
			<div class="m-b-2 fs_18">Подзаголовок 2</div>
			Описание акции 2
		</div> -->

		<div class="m-b-5 hr"></div>

		<div class="stock m-b-5">
			<div class="m-b-2 disimg"><img src="images/stock/action_5.png" alt="" /></div>
			<div class="m-b-1 fs_30">Делитесь и вместе получайте выгоды</div>
			<div class="m-b-2 fs_18">Наш сервис с возможностью поделиться в социальных сетях позволяет сделать ваши покупки на сайте выгоднее и помогает узнать аудитории ваших социальных сетей о модном современном аксессуаре для декорирования интерьеров.</div>
			Поделиться в
			<a title="facebook" onclick="Share.facebook()">facebook</a>
			<a title="ВКонтакте" onclick="Share.vkontakte()">ВКонтакте</a>
			<a title="Однокласники" onclick="Share.odnoklassniki()">Однокласники</a>
		</div>

	</div>

</div><!--bg_white-->

<?
	// ----------   META  ------------------------
	require_once ( "html_footer.php"     );
	// ===========================================
?>
