<?
//---------  VAR  ---------------------------
$VAR_title='Цветы в вазах Fi\'ora ';
//===========================================

//---------  PHP  ---------------------------
require_once ( "php/require_files.php");
//=============================================

$HEAD_inject = '
	<script type="text/javascript">
		function owl_list() {
			$(".owl-prev").click();
		}
	</script>
';

// ----------   HEAD  ----------------------
require_once ( "html_head.php");
// ===========================================
?>

<body id='page_index' onload='owl_list();'>
<div id="wrap">
<div class="wofl">
<div class="bg_white">

<?
// ----------   HEADER  ----------------------
require_once ( "html_header.php");
// ===========================================
?>
	<div class="header-sep"></div>

	<div class="mainpage-slider">
        <div class="main-uniq container">
            <button type="button" class="open-uniq button" style="display: none">
                Видео о ценностях Fi’ora
            </button>
        </div>

		<div class="owl-carousel">
			<div class="owl-carousel-item">
				<div class="mps-item">
					<div class="img">
						<span><img src="images/banner/banner_1.png" alt="" /></span>
					</div>
                    <div class="txt half">
						<div class="container">
							<div class="title">
                                <font color='white'>ДЕКОР ИЗ ЖИВЫХ ЦВЕТОВ<br />В СТЕКЛЯННЫХ ВАЗАХ</font>
                            </div>
							<div class="description">
								<font color='white'>
                                    Сохраняются без ухода > 5 лет
								</font>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="owl-carousel-item">
                <a href="/stock.php#stock">
				<div class="mps-item">
					<div class="img">
						<span><img src="images/banner/banner_3.jpg" alt="" /></span>
					</div>
                    <div class="txt half">
                        <div class="container">
                            <div class="title">
                                Бесплатная доставка<br />по России
                            </div>
                            <div class="description">
                                подробнее в разделе «Акции»
                            </div>
                        </div>
                    </div>
				</div>
                </a>
			</div>
            <div class="owl-carousel-item">
                <div class="mps-item">
                    <div class="img">
                        <span><img src="images/banner/banner_2.jpg" alt="" /></span>
                    </div>
                    <div class="txt half">
                        <div class="container">
                            <div class="title">
                                <font color='white'>В Новый год<br />вместе с Fi’ora</font>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<!--
		<div class="mps-links">
			<a href="#" class="owl-to wwf-link" data-target="owl-carousel-item-tiger">
				<i><img src="images/wwf.png" alt="" /></i>
				Мы заботимся <br />о тигрёнке Амуре
			</a>
		</div>
		-->
		<script type="text/javascript">
			$(function(){
				$(".mainpage-slider .owl-carousel").owlCarousel({
					smartSpeed : 500,
					items : 1,
					loop : true,
					autoplay : true,
					autoplayTimeout : 10000,
				});
				$('.owl-to').on('click',function(){
					var i = $($(this).data('target')).index();
                    $(".mainpage-slider .owl-carousel").trigger('to.owl.carousel', [i]);
					return false;
				});
			});
		</script>
		<div class="uniq s1x2">
			<div class="main-uniq">
                <button type="button" class="close open-uniq" title="Закрыть"></button>
				<div class="main-uniq-box">
					<div class="text">ОСВЕЖИТ ВАШ<br />ИНТЕРЬЕР</div>
                    <div class="sepline m-c-a"></div>
                    <div class="text">ОЦЕНИТСЯ<br />С ДОСТОИНСТВОМ<br />КАК ПОДАРОК</div>
                    <div class="more" style='margin-top:250px;'>
						<a href="#" class="open-uniq h-a">Узнать об уникальности</a>
						<a href="#" class="open-uniq h-b">Закрыть</a>
					</div>
				</div>
                <div class="main-uniq-drop">

                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/n7Yat1wjiac?rel=0" frameborder="0" allowfullscreen></iframe>

<!--                    <div class="separate-item">-->
<!--                        <div class="headline">Уникальность продукции</div>-->
<!--                        <div class="text n1 open">-->
<!--                            <div class="title">-->
<!--                                Герметичность внутреннего пространства-->
<!--                                <i class="fa fa-angle-up"></i>-->
<!--                                <i class="fa fa-angle-down"></i>-->
<!--                            </div>-->
<!--                            <div class="description">-->
<!--                                Наличие чистой среды внутри ваз ограничивает доступ вредных воздействий окружающей-->
<!--                                среды. Это ещё один фактор увеличивающий срок жизни цветов.-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="text n2">-->
<!--                            <div class="title">-->
<!--                                Долговечность на срок от 5-ти лет-->
<!--                                <i class="fa fa-angle-up"></i>-->
<!--                                <i class="fa fa-angle-down"></i>-->
<!--                            </div>-->
<!--                            <div class="description">-->
<!--                                Специальная техника удаления влаги позволяет остановить время для их естественной красоты.-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="text n3">-->
<!--                            <div class="title">-->
<!--                                Живые цветы в первозданном виде-->
<!--                                <i class="fa fa-angle-up"></i>-->
<!--                                <i class="fa fa-angle-down"></i>-->
<!--                            </div>-->
<!--                            <div class="description">-->
<!--                                Пристальное отношение уделяется качеству природной фактуры и пигменту цветов.-->
<!--                                Поэтому вы видите их как-будто они только только-что произросли.-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="text n4">-->
<!--                            <div class="title">-->
<!--                                Детальная флористика в дизайне Fi’ora-->
<!--                                <i class="fa fa-angle-up"></i>-->
<!--                                <i class="fa fa-angle-down"></i>-->
<!--                            </div>-->
<!--                            <div class="description">-->
<!--                                Более 80 дополнительных растений используются при составлении коллекций.-->
<!--                                Основная миссия дизайна – наполнение композиций природным многообразием-->
<!--                                как в естественной природе (различные цветы и растения живут рядом если это-->
<!--                                не конвейерное производство.-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="text n5">-->
<!--                            <div class="title">-->
<!--                                Качество прозрачности в стекле Fi’ora-->
<!--                                <i class="fa fa-angle-up"></i>-->
<!--                                <i class="fa fa-angle-down"></i>-->
<!--                            </div>-->
<!--                            <div class="description">-->
<!--                                Максимальное внимание уделяется свойствам прозрачности стекла для более лучшей передачи цвета.-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="image n1"><img src="images/separate-item-img01.png" alt="" /></div>-->
<!--                        <div class="image n2"><img src="images/separate-item-img02.png" alt="" /></div>-->
<!--                        <div class="image n3"><img src="images/separate-item-img03.png" alt="" /></div>-->
<!--                        <div class="image n4"><img src="images/separate-item-img04.png" alt="" /></div>-->
<!--                        <div class="image n5"><img src="images/separate-item-img05.png" alt="" /></div>-->
<!--                    </div>-->
<!--                    <div class="bosign">-->
<!--                        Гермитичные свойства продукции помогают удовлетворить ряд потребностей: простой уход, можно мыть в воде, отсутствие аллергических реакций.-->
<!--                    </div>-->
                </div>
<!--				<div class="main-uniq-drop">-->
<!--					<div class="dashtitle"><span>Уникальность продукции:</span></div>-->
<!--					<div class="left separate-item">-->
<!--						<div class="text rt n1"><span>Герметичность</span> позволяет обеспечить отсутствие ухода</div>-->
<!--						<div class="text lt n2"><span>Живые цветы</span> отборные цветы только 33% от урожая </div>-->
<!--						<div class="text rt n3"><span>Детальная флористика</span> из 80 дополнительных растений</div>-->
<!--						<div class="text lt n4"><span>Сохраняются более 5 лет</span></div>-->
<!--						<div class="text rt n5"><span>Ваза из прозрачного стекла</span></div>-->
<!--						<div class="image n1"><img src="images/separate-item-img01.png" alt="" /></div>-->
<!--						<div class="image n2"><img src="images/separate-item-img02.png" alt="" /></div>-->
<!--						<div class="image n3"><img src="images/separate-item-img03.png" alt="" /></div>-->
<!--						<div class="image n4"><img src="images/separate-item-img04.png" alt="" /></div>-->
<!--						<div class="image n5"><img src="images/separate-item-img05.png" alt="" /></div>-->
<!--					</div>-->
<!--					<div class="right">-->
<!--						<div class="disimg"><img src="images/examples/img039.png" alt="" /></div>-->
<!--						<div class="m-b-2"></div>-->
<!--						<div class="disimg"><img src="images/examples/img039.png" alt="" /></div>-->
<!--						<div class="m-b-2"></div>-->
<!--						<div class="disimg"><img src="images/examples/img039.png" alt="" /></div>-->
<!--					</div>-->
<!--					<div class="clearfix"></div>-->
<!--				</div>-->
			</div>
			<script>
				$(function(){
					$('.main-uniq').each(function(){
						var $p = $(this);
						var $drop = $('.main-uniq-drop');
						var $speed = 500;
						var $opt1 = {};
						var $opt2 = {};
						$('.open-uniq').click(function(){
							if( $p.is('.main-uniq-open1') ){
								$drop.hide('slide', { direction: "right" }, function(){
									$('.image.n1').stop().animate({ top : 119 }, $speed);
									$('.image.n2').stop().animate({ top : 150 }, $speed);
									$('.image.n3').stop().animate({ top : 170 }, $speed);
									$('.image.n4').stop().animate({ top : 185 }, $speed);
									$('.image.n5').stop().animate({ top : 120 }, $speed);
									$p.removeClass('main-uniq-open1');
								});
							} else {
								$drop.show('slide', { direction: "right" }, function(){
									$('.image.n1').stop().animate({ top : 12 }, $speed);
									$('.image.n2').stop().animate({ top : 60 }, $speed);
									$('.image.n3').stop().animate({ top : 120 }, $speed);
									$('.image.n4').stop().animate({ top : 185 }, $speed);
									$('.image.n5').stop().animate({ top : 260 }, $speed);
									$p.addClass('main-uniq-open1');
								});
							}
							return false;
						});
					});
				});
			</script>
		</div>
	</div>

	<div class="m-b-2"></div>

	<div class="container container-negative z-index-5">

		<div class="uniq-sm m-b-3">
			<div class="body">
				<div class="media">
					<div class="media-body media-middle">
						<div class="text">ОСВЕЖИТ ВАШ<br />ИНТЕРЬЕР</div>
						<div class="sepline m-c-a"></div>
						<div class="text">ОЦЕНИТСЯ<br />С ДОСТОИНСТВОМ<br />КАК ПОДАРОК</div>
					</div>
					<div class="media-right media-bottom">
						<img src="images/index/rose.png" alt="" />
					</div>
				</div>
				<a href="#" class="more">
					<span class="a">Узнать больше</span>
					<span class="b">Свернуть</span>
				</a>
			</div>
<!--			<div class="drop">-->
<!--				<div class="disimg hidden-xs"><img src="images/examples/img095.jpg" alt="" /></div>-->
<!--				<div class="disimg visible-xs"><img src="images/examples/img096.jpg" alt="" /></div>-->
<!--			</div>-->
            <div class="drop">

                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/n7Yat1wjiac?rel=0" frameborder="0" allowfullscreen></iframe>

<!--                <div class="fs_18 text-center text-uppercase">Уникальность продукции</div>-->
<!--                <div class="uniq-collapse open">-->
<!--                    <div class="title">-->
<!--                        Герметичность внутреннего пространства-->
<!--                        <i class="fa fa-angle-up"></i>-->
<!--                        <i class="fa fa-angle-down"></i>-->
<!--                    </div>-->
<!--                    <div class="description">-->
<!--                        Наличие чистой среды внутри ваз ограничивает доступ вредных воздействий окружающей-->
<!--                        среды. Это ещё один фактор увеличивающий срок жизни цветов.-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="uniq-collapse">-->
<!--                    <div class="title">-->
<!--                        Долговечность на срок от 5-ти лет-->
<!--                        <i class="fa fa-angle-up"></i>-->
<!--                        <i class="fa fa-angle-down"></i>-->
<!--                    </div>-->
<!--                    <div class="description">-->
<!--                        Специальная техника удаления влаги позволяет остановить время для их естественной красоты.-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="uniq-collapse">-->
<!--                    <div class="title">-->
<!--                        Живые цветы в первозданном виде-->
<!--                        <i class="fa fa-angle-up"></i>-->
<!--                        <i class="fa fa-angle-down"></i>-->
<!--                    </div>-->
<!--                    <div class="description">-->
<!--                        Пристальное отношение уделяется качеству природной фактуры и пигменту цветов.-->
<!--                        Поэтому вы видите их как-будто они только только-что произросли.-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="uniq-collapse">-->
<!--                    <div class="title">-->
<!--                        Детальная флористика в дизайне Fi’ora-->
<!--                        <i class="fa fa-angle-up"></i>-->
<!--                        <i class="fa fa-angle-down"></i>-->
<!--                    </div>-->
<!--                    <div class="description">-->
<!--                        Более 80 дополнительных растений используются при составлении коллекций.-->
<!--                        Основная миссия дизайна – наполнение композиций природным многообразием-->
<!--                        как в естественной природе (различные цветы и растения живут рядом если это-->
<!--                        не конвейерное производство.-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="uniq-collapse">-->
<!--                    <div class="title">-->
<!--                        Качество прозрачности в стекле Fi’ora-->
<!--                        <i class="fa fa-angle-up"></i>-->
<!--                        <i class="fa fa-angle-down"></i>-->
<!--                    </div>-->
<!--                    <div class="description">-->
<!--                        Максимальное внимание уделяется свойствам прозрачности стекла для более лучшей передачи цвета.-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="m-b-2"></div>-->
<!--                <div class="fs_13 text-center color_gray">-->
<!--                    Гермитичные свойства продукции помогают удовлетворить ряд потребностей: простой уход, можно мыть в воде, отсутствие аллергических реакций.-->
<!--                </div>-->
            </div>
		</div>

		<div class="row">
			<div class="m-b-2 col-xs-12 col-sm-6 col-md-3">
				<div class="s1x1 fix pos">
					<a href="catalog.php" class="overlink"></a>
					<div class="half text-center">
						<div class="padd10">
							<div class="m-b-2 disimg"><img src="images/index/catalog.png" alt="" /></div>
							<div class="m-b-2 fs_18">КАТАЛОГ</div>
							47 форм ваз в 9 коллекциях
							<!--<a href="#" class="btn btn-default"><span class="type-link">Каталог</span></a>-->
						</div>
					</div>
				</div>
			</div>
			<div class="m-b-2 col-xs-12 col-sm-6 col-md-3">
				<div class="s1x1 fix main-fiora-ideas main-box-bg">
					<a href="idea.php" class="overlink"></a>
					<div class="bg">
						<img class="hidden-xs" src="images/index/idea.png" alt="" />
						<img class="visible-xs" src="images/examples/img099.jpg" alt="" />
					</div>
					<div class="half text-center">
						<div class="padd20">
							<div class="m-b-5 hidden-xs"></div>
							<div class="fs_18 text-uppercase">идеи <br />для fi’ora</div>
						</div>
					</div>
				</div>
			</div>
			<div class="m-b-2 col-xs-12 col-md-6">
				<div class="s2x1 fix main-video">
                    <iframe width="100%" class="s2x1 fix" src="https://www.youtube.com/embed/X7nKUnART-g?rel=0" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div>

		<div class="main-treasure">
			<ul>
				<li class="active">
					<div class="text icori">
						<div class="ico"><img src="images/main-treasure-arr.gif" alt="" /></div>
						<strong>Все ценности Fi’ora в Лира за 999 ₽</strong>
					</div>
				</li>
				<li class="withnum">
					<div class="num"><span>1</span></div>
					<div class="text icori">
						<div class="ico"><img src="images/main-treasure-plus.png" alt="" /></div>
						Натуральные цветы, которые сохранены в первозданном виде
					</div>
				</li>
				<li class="withnum">
					<div class="num"><span>2</span></div>
					<div class="text icori">
						<div class="ico"><img src="images/main-treasure-plus.png" alt="" /></div>
						Детальная флористика с применением различных растений
					</div>
				</li>
				<li class="withnum">
					<div class="num"><span>3</span></div>
					<div class="text icori">
						<div class="ico"><img src="images/main-treasure-plus.png" alt="" /></div>
						Долговечность естественной красоты
					</div>
				</li>
				<li class="withnum">
					<div class="num"><span>4</span></div>
					<div class="text icori">
						<div class="ico"><img src="images/main-treasure-plus.png" alt="" /></div>
						Свежие эмоции в вашем интерьере
					</div>
				</li>
				<li class="withnum">
					<div class="num"><span>5</span></div>
					<div class="text icori">
						<div class="ico"><img src="images/main-treasure-plus.png" alt="" /></div>
						Модное направление в декорировании
					</div>
				</li>
				<li>
					<div class="text">
						<div class="row">
							<div class="col-xs-7">
								<strong>... и всё это от 999 ₽ на долгие годы.</strong>
							</div>
							<div class="col-xs-5">
								<div class="doubl">
									Вы узнали основные ценности.<br />
									Дарим вам <a href="#" class="color_blue" data-toggle="modal" data-target="#modal_sale">скидку -10%</a>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
			<script type="text/javascript">
				$(function(){
					$('.main-treasure').each(function(){
						var $p = $(this);
						$('.num, .ico', $p).click(function(){
							var $curr = $('li.active', $p);
							var $index = $(this).closest('li').index();
							if( $(this).is('.num') && $(this).closest('li').is('.active') ){ $index -= 1; }
							if( $(this).is('.ico') ){ $index += 1; }
							if( $index > $curr.index() ){
								var $need = $curr.next();
							} else {
								var $need = $curr.prev();
							}
							$curr.removeClass('active');
							$need.addClass('active');
							return false;
						});
					});
				});
			</script>
		</div>

		<div class="main-treasure-sm">
			<ul class="list list-unstyled">
				<li>
					<div class="text text-uppercase">Все ценности Fi’ora в Лира за 999 Р</div>
					<div class="navi">
						<span>1</span>
						<span>2</span>
						<span>3</span>
						<span>4</span>
						<span>5</span>
					</div>
				</li>
				<li>
					<div class="text">Натуральные цветы, которые сохранены в первозданном виде</div>
					<div class="navi">
						<span class="active">1</span>
						<span>2</span>
						<span>3</span>
						<span>4</span>
						<span>5</span>
					</div>
				</li>
				<li>
					<div class="text">Детальная флористика с применением различных растений</div>
					<div class="navi">
						<span>1</span>
						<span class="active">2</span>
						<span>3</span>
						<span>4</span>
						<span>5</span>
					</div>
				</li>
				<li>
					<div class="text">Долговечность естественной красоты</div>
					<div class="navi">
						<span>1</span>
						<span>2</span>
						<span class="active">3</span>
						<span>4</span>
						<span>5</span>
					</div>
				</li>
				<li>
					<div class="text">Свежие эмоции в вашем интерьере</div>
					<div class="navi">
						<span>1</span>
						<span>2</span>
						<span>3</span>
						<span class="active">4</span>
						<span>5</span>
					</div>
				</li>
				<li>
					<div class="text">Модное направление в декорировании</div>
					<div class="navi">
						<span>+</span>
					</div>
				</li>
				<li>
					<div class="text">
						<strong>... и всё это от 999 ₽ на долгие годы.</strong>
						<br />
						Вы узнали основные ценности.<br />
						Дарим вам <a href="#" class="color_blue" data-toggle="modal" data-target="#modal_sale">скидку -10%</a>
					</div>
					<div class="navi">
						<span></span>
					</div>
				</li>
			</ul>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-6">
				<div class="m-b-2 main-news">
					<div class="owl-carousel">
						<!-- <div class="owl-carousel-item">
							<div class="main-news-item">
								<a href="#" class="overlink"></a>
								<div class="txt">
									<div class="date"><span>8</span> марта</div>
									<div class="sepline"></div>
									<div class="m-b-1">
										Международный женский день – популярный праздник, когда женщины ожидают от вас Фиору
									</div>
									<a href="#">Купить</a>
								</div>
								<div class="img"><img src="images/index/8mart.png" alt="" /></div>
							</div>
						</div> -->
						<div class="owl-carousel-item">
							<div class="main-news-item">
								<a class="overlink"></a>
								<div class="txt">
									<div class="date"><span>31</span> декабря</div>
									<div class="sepline"></div>
									<div class="m-b-1">
                                        Новый Год – пожалуй самый душевный из праздников. В канун нового года возникает естественное ожидание чего-то большого, нового и замечательного…
									</div>
									<!-- <a href="#">Купить</a> -->
								</div>
								<div class="img"><img src="images/index/new_year.png" alt="" /></div>
							</div>
						</div>
					</div>
					<script type="text/javascript">
						$(function(){
							$(".main-news .owl-carousel").owlCarousel({
								smartSpeed : 500,
								items : 1,
								loop : true,
							});
						});
					</script>
				</div><!--main-news-->
			</div>
			<div class="visible-xs clearfix"></div>


			<div class="m-b-2 col-xxs-12 col-xs-6 col-sm-6 col-md-3">
				<div class="s1x1 main-trend main-box-bg">
					<a href="trands.php" class="overlink"></a>
					<div class="bg visible-xs"><img src="images/index/trands_mobile.png" alt="" /></div>
					<div class="half text-center">
						<div class="padd40">
							<div class="m-b-1 hidden-xs"><img src="images/index/trands_web.png" alt="" /></div>
							<div class="fs_18 text-uppercase">Тренд 2017</div>
						</div>
					</div>
				</div>
			</div>

			<div class="m-b-2 col-xxs-12 col-xs-6 col-sm-6 col-md-3">
				<div class="s1x1 main-brand main-box-bg">
					<a href="about.php" class="overlink"></a>
					<div class="bg">
						<img class="hidden-xs" src="images/index/about.png" alt="" />
						<img class="visible-xs" src="images/examples/img101.jpg" alt="" />
					</div>
					<div class="half text-center">
						<div class="padd40">
							<div class="fs_18 text-uppercase">О бренде</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="main-negin-slider z-index-1">
		<ul>
			<li class="slide-1 active" style='background-color:#ecf1f6;'>
				<div class="container">
					<div class="pos" style='background-color:#ecf1f6;'>
						<div class="img" align='left'><img src="images/box/box.png" alt="" /></div>
						<div class="txt">
							<div class="title fs_24" style='margin-top:-30px;'>УЛУЧШИТЕ ВПЕЧАТЛЕНИЕ<br>ФИРМЕННЫМИ ОТКРЫТКАМИ. <br>ВКУС И СТИЛЬ ПРОЯВЛЯЮТСЯ В ДЕТАЛЯХ.</div>
							<div class="text-right">
								<span class="inline-block">
									<a href="#" class="goto block m-b-1" data-target="slide-2"><img src="images/index/llc.png" alt="" /></a>
									<span class="block text-center"><a href="#" class="goto color_blue" data-target="slide-2">Подробнее</a></span>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="mgs-pagination">
					<a href="#" class="goto active" data-target="slide-1"></a>
					<a href="#" class="goto" data-target="slide-2"></a>
				</div>
			</li>
			<li class="slide-2" style='background-color:#e2ecf2;'>
				<div class="container">
					<div class="pos" style='background-color:#e2ecf2;'>
						<div class="img" align='left'><img src="images/box/llc.png" alt="" /></div>
						<div class="txt">
							<div class="title fs_24" style='margin-top:-10px;'>ВАРИАНТ УПАКОВКИ FI'ORA<br>С ПОДАРОЧНЫМ НАБОРОМ</div>
							<div style='margin-top:-40px;'>
								(добавляется в корзине с товаром, подходит к определенным формам ваз)
								<br><br>
									F'ORA совместно со всемирно известной парфюмерной компанией L`OCCITANE разработала лимитированную подарочную коллекцию в фирменной упаковке, которая по достоинству дополнит ваш подарок атмосферой долгоиграющей свежести.
								<br><br>
								<a href="#" class="infomodal-button color_blue" data-target="#loccitane">Содержимое набора</a>
								<br><br>
							</div>
							<!-- <a href="#" class="goto" data-target="slide-3">Узнать какие композиции подойдут к набру</a> -->
						</div>
					</div>
				</div>
				<div class="mgs-pagination">
					<a href="#" class="goto" data-target="slide-1"></a>
					<a href="#" class="goto active" data-target="slide-2"></a>
				</div>
			</li>
			<!--
			<li class="slide-3">
				<div class="container">
					<div class="main-negin-owl owl-carousel">

						<div class="owl-carousel-item">
							<div class="media catalog_mini">
								<div class="media-left media-middle">
									<img width="160" src="images/examples/img008.jpg" alt="" />
								</div>
								<div class="media-body media-middle">
									<div class="a">
										<div class="fs_16">Белые розы 1</div>
										<div class="hidden-xs">
											<div class="m-b-1 color_gray">в среднем бутоне тюльпана</div>
											<div class="m-b-1 fs_12 color_gray">Размеры: 10 х 15 х 24 см.</div>
										</div>
										<div class="fs_24">4 390 ₽</div>
									</div>
									<div class="b">
										<a href="#">Добавить в корзину <br />вместе с набором <br />L’Occitane</a>
									</div>
								</div>
							</div>
							<div class="media catalog_mini">
								<div class="media-left media-middle">
									<img width="160" src="images/examples/img008.jpg" alt="" />
								</div>
								<div class="media-body media-middle">
									<div class="a">
										<div class="fs_16">Белые розы</div>
										<div class="hidden-xs">
											<div class="m-b-1 color_gray">в среднем бутоне тюльпана</div>
											<div class="m-b-1 fs_12 color_gray">Размеры: 10 х 15 х 24 см.</div>
										</div>
										<div class="fs_24">4 390 ₽</div>
									</div>
									<div class="b">
										<a href="#">Добавить в корзину <br />вместе с набором <br />L’Occitane</a>
									</div>
								</div>
							</div>
						</div>


					</div>
					<div class="mgs-pagination">
						<a href="#" class="goto" data-target="slide-1"></a>
						<a href="#" class="goto" data-target="slide-2"></a>
					</div>
				</div>
			</li>
			-->
		</ul>
		<script type="text/javascript">
			$(function(){
				$('.main-negin-slider').each(function(){
					var $p = $(this);
					$('.goto', $p).click(function(){
						var $need = $(this).data('target');
						$('li.active', $p).removeClass('active');
						$('.'+$need, $p).addClass('active');
						halfFunc( $('.half') );
						return false;
					});
				});
				//
				$(".main-negin-owl").owlCarousel({
					smartSpeed : 500,
					items : 3,
					nav : true,
					navText : ['',''],
					dots : false,
				});
			});
		</script>
	</div>
	<div class="clearfix"></div>

	<div class="m-b-2 main-pack">
		<div class="title">Фирменные упаковки Fi’ora для большего впечатления</div>
		<div class="owl-carousel">
			<div class="owl-carousel-item">
				<div class="disimg"><img src="images/index/mobile_box.png" alt="" /></div>
			</div>
			<div class="owl-carousel-item">
				<div class="disimg"><img src="images/index/mobile_lls.png" alt="" /></div>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				$(".main-pack .owl-carousel").owlCarousel({
					smartSpeed : 500,
					items : 1,
					loop : true,
				});
			});
		</script>
	</div>

	<div class="container container-negative z-index-5">

		<div class="m-b-2 main-interier">
			<div class="row">
				<div class="half col-xs-12 col-sm-6">
					<div class="fs_24 text-uppercase">
						Дополните интерьер <br />прямо сейчас
					</div>
					<div class="sepline"></div>
					Кликните на фото
					<div class="m-b-5 hidden-xs"></div>
					<div class="m-b-2 visible-xs"></div>
					<a href="after-before.php" class="hidden-xs color_blue">Попробовать ещё варианты</a>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="imghov">
						<div class="a"><img src="images/main/main__before.gif" alt="" /></div>
						<div class="b"><img src="images/main/main__after.jpg" alt="" /></div>
					</div>
				</div>
			</div>
			<div class="m-t-2 text-center visible-xs">
				<a href="after-before.php" class="color_blue">Попробовать ещё варианты</a>
			</div>
		</div>

		<div class="m-b-5 bg_gray">
			<div class="media media-responsive text-xs-center">
				<div style='background:#f2f2f2;' class="media-left media-bottom hidden-xs"><img src="images/index/granity.png" alt="" /></div>
				<div class="media-body media-middle">
					<div class="m-b-5 hidden-xs"></div>
					<div class="padd20">
						<div class="m-b-2 fs_24" style="text-transform: uppercase">Коллекция в трендах уходящего года,<br>последние остатки коллекции, которой больше не будет</div>
						<div class="m-b-2 color_dark_gray">
                            В 2017 году ТМ Fi`ora разработала цветочную коллекцию Granity 591,
                            которая учитывает все модные тенденции уходящего года. Насыщенная во всех смыслах композиция не требует никаких дополнений.
                            Обеспечьте ей небольшую цветовую поддержку в интерьере – и он заиграет новыми красками.
                            А главное – обретет собственный, неповторимый стиль.
						</div>
						<a href="/catalog.php#Granity591" class="btn btn-default"><span class="type-link">Купить</span></a>
					</div>
					<div class="m-b-5 hidden-xs"></div>
				</div>
				<div class="media-right visible-xs"><img class="img-responsive img-center" src="images/index/granity.png" alt="" /></div>
			</div>
		</div>

		<div class="main_gallery">
			<div class="bg">
				<div class="owl-carousel">

					<?php for ($i=1; $i<10; $i++): ?>
					<div class="owl-carousel-item">
						<div class="padd0x10">
							<div class="title">
								Розовая роза<br />
								в средней круглой вазе
							</div>
							<div class="disimg">
								<a class="fancybox" href="/images/gallery/main/<?=$i?>.jpg" rel="gallery">
									<img src="/images/gallery/main/<?=$i?>.jpg">
								</a>
							</div>
						</div>
					</div>
					<?php endfor; ?>

				</div>
				<script type="text/javascript">
					$(function(){
						$(".main_gallery .owl-carousel").owlCarousel({
							smartSpeed : 500,
							items : 3,
							loop : true,
							nav : true,
							navText : ['',''],
							dots : false,
							responsive : {
								0 : {
									items : 1,
                                },
								600 : {
									items : 2,
                                },
								800 : {
									items : 3,
                                },
							}
						});
					});
				</script>
			</div>
<!--			<div class="bottom">-->
<!--				<a href="gallery.php" class="btn btn-default"><span class="type-link">Фото в интерьере</span></a>-->
<!--			</div>-->
		</div>

	</div>

	<div class="main-testimonials">
		<div class="container">
			<div class="m-b-3 fs_18 text-center">Отзывы клиентов, которые выбирают Fi'ora</div>
			<div class="testimonials">
				<div class="owl-carousel with-nav">



					<div class="owl-carousel-item">
						<div class="media m-b-3">
							<div class="media-left">&nbsp;<img width="75" class="img-circle" src="images/index/ball_50.png" alt="" /></div>
							<!--
							<div class="media-body media-bottom">
								<img src="images/examples/img044.png" alt="" />
							</div>
							-->
						</div>
						<div class="color_dark">Владислав</div>
							Руководитель журнала «Авторский проект»
						<div class="m-b-2"></div>
							Цветы в стеклянных вазах от Fi’ora стали прекрасным вариантом подарка для наших многочисленных партнеров, особенно в индустрии моды и красоты. Изысканный сувенир неизменно вызывает интерес, удивление и восторг, и способен долгие годы напоминать о позитивных результатах нашего сотрудничества.
					</div>
					<div class="owl-carousel-item">
						<div class="media m-b-3">
							<div class="media-left">&nbsp;<img width="75" class="img-circle" src="images/index/ball_48.png" alt="" /></div>
							<!--
							<div class="media-body media-bottom">
								<img src="images/examples/img044.png" alt="" />
							</div>
							-->
						</div>
						<div class="color_dark">Милана</div>
							Сотрудник банка «Банк Хоум Кредит»
						<div class="m-b-2"></div>
							Нашла это чудо, которое отлично украшает интерьер и при этом сохраняет свою красоту действительно долго. А необычная форма стекла подчеркивает красоту натуральных цветов. Для начала купила себе и решила проверить: действительно ли 5 лет хранятся… Сейчас моей композиции уже 3 года, купила в начале марта 2014 года и ничего с ней не случилось, только время от времени вытираю пыль. Поэтому сделала вывод, что 5 лет простоит точно.
					</div>
					<div class="owl-carousel-item">
						<div class="media m-b-3">
							<div class="media-left">&nbsp;<img width="75" class="img-circle" src="images/index/ball_50.png" alt="" /></div>
							<!--
							<div class="media-body media-bottom">
								<img src="images/examples/img044.png" alt="" />
							</div>
							-->
						</div>
						<div class="color_dark">Светлана</div>
							Сотрудник салона красоты «Арабика»
						<div class="m-b-2"></div>
							У моей свекрови аллергия на цветы… И на каждое день рождения мы с мужем долго думали, чем порадовать свекровь и удивить….. И вот это свершилось! Восемь лет назад мы подари цветы Fiora, которые не вызывают аллергию и стоят долгие годы, радуя своей красотой.  Свекровь была очень довольна… Цветы в вазе уже стоят 8 лет и они не потеряли свой внешний вид! И кстати, у свекрови дома уже целая коллекция композиций Fi’ora.
					</div>
					<div class="owl-carousel-item">
						<div class="media m-b-3">
							<div class="media-left">&nbsp;<img width="75" class="img-circle" src="images/index/ball_41.png" alt="" /></div>
							<!--
							<div class="media-body media-bottom">
								<img src="images/examples/img044.png" alt="" />
							</div>
							-->
						</div>
						<div class="color_dark">Кристина</div>
							Сотрудник автосалоана KIA
						<div class="m-b-2"></div>
							Первое о чём подумала, увидев подобные вазы, что это хороший вариант подарка, особенно, когда хочешь удивить. Но для себя не стала бы приобретать, дороговато мне кажется. Мне как-то подарили, стоят да стоят просто, украшают интерьер, в тумбочку спрятать точно не захотелось.
					</div>


					<div class="owl-carousel-item">
						<div class="media m-b-3">
							<div class="media-left">&nbsp;<img width="75" class="img-circle" src="images/index/ball_45.png" alt="" /></div>
							<!--
							<div class="media-body media-bottom">
								<img src="images/examples/img044.png" alt="" />
							</div>
							-->
						</div>
						<div class="color_dark">Екатерина</div>
							Сотрудник компании Кузбасское ПМЭС
						<div class="m-b-2"></div>
							Оригинальные! Красивые такие, будто ненастоящие. Главное, думаю, что вазы могут вписаться в абсолютно любой интерьер, что очень удобно.
					</div>



					<div class="owl-carousel-item">
						<div class="media m-b-3">
							<div class="media-left">&nbsp;<img width="75" class="img-circle" src="images/index/ball_47.png" alt="" /></div>
							<!--
							<div class="media-body media-bottom">
								<img src="images/examples/img044.png" alt="" />
							</div>
							-->
						</div>
						<div class="color_dark">Мария</div>
							Сотрудник стоматологической поликлиники
						<div class="m-b-2"></div>
							У меня есть круглая, овальная, эллипс и хорошо смотрятся. В форме сердца очень интересно, но к грядущим праздникам классно было бы, если они были побольше, ну содержали по 3 цветочка. Приятно было бы такое получить в подарок. А еще видела квадратную: он как-то жестковата что ли, для какого-то более серьезного случая, или под определенный интерьер.
					</div>

					<div class="owl-carousel-item">
						<div class="media m-b-3">
							<div class="media-left">&nbsp;<img width="75" class="img-circle" src="images/index/ball_45.png" alt="" /></div>
							<!--
							<div class="media-body media-bottom">
								<img src="images/examples/img044.png" alt="" />
							</div>
							-->
						</div>
						<div class="color_dark">Марина</div>
							Сотрудник МОУ Средняя общеобразовательная школа
						<div class="m-b-2"></div>
							Цветы Fi`ora – это красота, которая завораживает. Да, стоимость у них приличная, но я прекрасно понимаю, что это ручная работа и бренд, которые не могут стоить меньше. Заработная плата учителя не очень располагает к дорогим покупкам, но когда вещь западает в душу, устоять невозможно. Подарила Fi`orу подруге на юбилей. Другие подарки в виде денег давно потрачены, обычные цветы завяли и забыты, а мой подарок стоит уже несколько месяцев, и подруга постоянно им восхищается. Теперь намекаю своим детям, что тоже хочу такую вазу :)
					</div>


				</div>
				<script type="text/javascript">
					$(function(){
						$(".main-testimonials .owl-carousel").owlCarousel({
							smartSpeed : 500,
							items : 3,
							margin : 30,
							loop : true,
							nav : true,
							navText : ['',''],
							dots : false,
							autoHeight : true,
							responsive : {
								0 : {
									items : 1,
                                },
								640 : {
									items : 2,
                                },
								992 : {
									items : 3,
									margin : 50,
                                },
							}
						});
					});
				</script>
			</div>
			<div class="m-b-2"></div>
			<!--
			<div class="text-center">
				<a href="#" data-toggle="modal" data-target="#modal_feedback">Оставить отзыв</a>
			</div>
			-->
		</div>
	</div>

</div><!--bg_white-->

<div id="loccitane" class="infomodal">
	<div class="container">
		<div class="infomodal-body">
			<div class="infomodal-arr"></div>
			<div class="infomodal-close"></div>
			<div class="row">
				<div class="col-md-4">
					<img class="img-responsive" src="images/examples/img049.jpg" alt="" />
				</div>
				<div class="col-md-8">
					<div class="m-b-5 fs_18">В составе набора лежит принцип долговечности, где каждая<br> составляющая  набора многие годы не изменит внешнего вида и<br> сохранит свою яркость и красоту.</div>
					<img class="img-responsive img-center" src="images/examples/img050.jpg" alt="" />
				</div>
			</div>
		</div>
	</div>
</div>

<?
// ----------   FOOTER   ---------------------
	require_once ( "html_footer.php"     );
// ===========================================
?>
