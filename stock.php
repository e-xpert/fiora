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
            <div class="m-b-2 disimg"><img src="images/stock/thai.jpg" alt="" /></div>
            <div class="m-b-1 fs_30">Розыгрыш путёвки в Таиланд на сумму в 50 000 рублей</div>
            <div class="m-b-2 fs_18">Шанс выиграть путёвку в Таиланд теперь ближе! Совершите покупку композиции Fi'ora на сумму от 3399 рублей в период до 8 марта 2018 года и станьте участником второго розыгрыша. Главный приз – путевка в Таиланд номиналом в 50 000 рублей в 2018 году. Розыгрыш будет проходить в прямом эфире на выделенном интернет-канале 15 марта 2018. Правила участия в розыгрыше здесь.</div>
            <a href="http://thai.myfiora.com/" class="btn btn-thai">Зарегистрироваться</a>
        </div>
        <div class="modal fade" id="modal_oferta" tabindex="-1" role="dialog" aria-labelledby="modal_oferta">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="display: block;">
                        <a href="#" class="cross" style="top: 30%;" data-dismiss="modal" aria-label="Close"></a><br><br>
                        <div class="modal-title" style="width: 100%;">Условия акции «Подари себе путешествие в Тайланд»</div>
                    </div>
                    <div class="modal-body">

                        <?@include 'inc/oferta-thai.php';?>

                    </div>
                </div>
            </div>
        </div>
        <div class="m-b-5 hr" id="stock"></div>
<!--
        <div class="stock m-b-5">
            <div class="m-b-2 disimg"><img src="images/stock/Lyra_830.png" alt="" /></div>
            <div class="m-b-1 fs_30">Композиция в стеклянном стакане Lyra за 890 рублей</div>
            <div class="m-b-2 fs_18">Композиция Lyra за 890 рублей – при покупке товара на сумму от 3 000 руб. Малютка Lyra может преобразить любое офисное пространство, стать чудесным украшением праздничного стола и порадовать близких своей красотой. Качество стекла – Extra Glass.</div>
            <a href="/catalog.php">Перейти в каталог</a>
        </div>
        <div class="m-b-5 hr" id="stock"></div>

        <div class="stock m-b-5">
            <div class="m-b-2 disimg"><img src="images/stock/baner_akcii.jpg" alt="" /></div>
            <div class="m-b-1 fs_30">Бесплатная доставка по России</div>
            <div class="m-b-2 fs_18">Доставка заказов осуществляется бесплатно при сумме заказа от 8000 рублей. Условия акции действуют для большинства городов РФ, для некоторых городов условия акции не распространяются в зависимости от представленности транспортных компаний-партнёров. Более подробно про свой город можно уточнить по единому контактному номеру 8-800-550-83-88.</div>
            Логистический центр Fi’ora определяет ближайший пункт отгрузки в зависимости от вашего населённого пункта (более 30 мест отгрузки по России).
        </div>
        <div class="m-b-5 hr"></div>
-->
        <!--
        <div class="stock m-b-5">
            <div class="m-b-2 disimg"><img src="images/stock/action_2.png" alt="" /></div>
            <div class="m-b-1 fs_30">Заголовок 2</div>
            <div class="m-b-2 fs_18">Подзаголовок 2</div>
            Описание акции 2
        </div>
        <div class="m-b-5 hr"></div>
        -->

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
