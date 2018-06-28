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

$HEAD_require =	array("js/index.php");

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
                О ценностях Fi'ora в видео
            </button>
        </div>

		<div class="owl-carousel">
            <div class="owl-carousel-item">
				<div class="mps-item">
					<div class="img">
                        <a href="/about.php"><span><img src="images/banner/banner_3.png" alt="" /></span></a>
					</div>
                    <div class="txt" style="top: 200px;">
						<div class="container">
                            <a href="/about.php" style="text-decoration: none;">
							<div class="title2">
                                Вазы с натуральными цветами<br />
                                для освежения интерьера<br />
                                новым акцентом
                            </div>
							<div class="description">
                                Сохраняются без ухода > 5 лет
							</div>
                            </a>
						</div>
					</div>
				</div>
			</div>
<!--			<div class="owl-carousel-item">-->
<!--                <a href="/stock.php#stock">-->
<!--				<div class="mps-item">-->
<!--					<div class="img">-->
<!--						<span><img src="images/banner/banner_3_2.jpg" alt="" /></span>-->
<!--					</div>-->
<!--                    <div class="txt half txt-top">-->
<!--                        <div class="container">-->
<!--                            <div class="title">-->
<!--                                Бесплатная доставка<br />по России-->
<!--                            </div>-->
<!--                            <div class="description">-->
<!--                                подробнее в разделе «Акции»-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--				</div>-->
<!--                </a>-->
<!--			</div>-->
            <div class="owl-carousel-item">
                <div class="mps-item">
                    <div class="img">
                        <span><img src="images/banner/banner_22_05-2.jpg" alt="" /></span>
                    </div>
                    <div class="txt" style="top: 280px;">
                        <div class="container">
                            <div class="title2" style="margin-bottom: 5px">
                                ПОЧТИ НА ВСЁ — 30%
                            </div>
                            <div class="description">
                                Промокод до 20%<br>
                                Скидки до 10%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item">
                <div class="mps-item">
                    <div class="img">
                        <a href="/gallery.php"><span><img src="images/banner/banner_21.jpg" alt="" /></span></a>
                    </div>
                    <div class="txt half txt-top">
                        <div class="container">
                            <a href="/gallery.php" style="text-decoration: none;">
                            <div class="title">
                                <font color='#000'>Создавайте<br /> уютные решения<br />для вашего дома</font>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
		</div>
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
                    <div class="text">практичное<br />решение<br />для подарка</div>
                    <div class="more" style='margin-top:250px;'>
						<a href="#" class="open-uniq h-a">Узнать об уникальности</a>
						<a href="#" class="open-uniq h-b">Закрыть</a>
					</div>
				</div>
                <div class="main-uniq-drop">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/n7Yat1wjiac?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
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

	<div class="m-b-4"></div>

	<div class="container container-negative z-index-5">

        <div class="uniq-sm m-b-3">
            <div class="body">
                <div class="media">
                    <div class="media-body media-middle">
                        <div class="text">ОСВЕЖИТ ВАШ<br />ИНТЕРЬЕР</div>
                        <div class="sepline m-c-a"></div>
                        <div class="text">практичное<br />решение<br />для подарка</div>
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
            <div class="drop">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/n7Yat1wjiac?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>

        <div class="row">
            <div class="m-b-2 col-xxs-12 col-xs-6 col-sm-6 col-md-3">
                <div class="ns1x1 main-box-bg">
                    <div class="text-center">
                        <a class="overlink" style="cursor: pointer"></a>
                            <div class="fs_14">
                                Из живых цветов<br>
                                и растений без химии
                            </div>
                    </div>
                </div>
            </div>

            <div class="m-b-2 col-xxs-12 col-xs-6 col-sm-6 col-md-3">
                <div class="ns1x1 main-box-bg">
                    <div class="text-center">
                        <a class="overlink" style="cursor: pointer"></a>
                            <div class="fs_14">
                                Новое веяние<br>
                                в декорировании
                            </div>
                    </div>
                </div>
            </div>
<?php
    if (time() < 1520420540) {
        ?>
        <div class="m-b-2 col-xxs-12 col-xs-6 col-sm-6 col-md-3">
            <div class="ns1x1 main-box-bg" style="color: red; border-color: red">
                <div class="text-center">
                    <a class="overlink" style="cursor: pointer"></a>
                    <div class="fs_14">
                        Успеем доставить<br>
                        к 8 марта по Москве
                    </div>
                </div>
            </div>
        </div>
        <?
    } else {
        ?>
        <div class="m-b-2 col-xxs-12 col-xs-6 col-sm-6 col-md-3">
            <div class="ns1x1 main-box-bg">
                <div class="text-center">
                    <a class="overlink" style="cursor: pointer"></a>
                    <div class="fs_14">
                        Для квартир и офисов,<br>
                        домов и дач, ресторанов...
                    </div>
                </div>
            </div>
        </div>
        <?
    }
?>
            <div class="m-b-2 col-xxs-12 col-xs-6 col-sm-6 col-md-3">
                <div class="ns1x1 march main-box-bg" style="padding: 19px 0;">
                    <div class="text-center">
                        <a class="overlink" style="cursor: pointer"></a>

                            <div class="fs_14">
                                В подарок учителю  <br>
                                на долгую память
                            </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="main_gallery">
            <div class="m-b-2 bg">
                <div class="owl-carousel">

                    <?
                    $rest=get_rest($geo_country_id,0);

                    foreach ($rest as $item) {

                        if ($item[22] && file_exists("art_500/".$item[0].".jpg")) {

                            echo '
                            <div class="owl-carousel-item">
                                <div class="padd0x10">
                                    <div class="catalog_item">
                                        <div class="box">';

                            //===================================================================
                            // подгружаем остатки по городам
                            //===================================================================
                            $city_price=get_city_price($geo_city_id,$item[0]);

                            if ($city_price[0]>0)  {
                                if ($city_price[2]>0) {
                                    $item[2]=$city_price[1];
                                    $item[1]=$city_price[2];
                                    $item[3]=$city_price[0];
                                } else {
                                    $item[2]=0;
                                    if ($city_price[1]>0) {
                                        $item[1]=$city_price[1];
                                    }
                                }
                            }
                            //-------------------------------------------------------------------
                            // подгружаем остатки по городам
                            //===================================================================

                            if ($item[20])
                                echo "<div class='mark_top_left'><span class='mark_price_".$item[21]."'>".$item[20]."</span></div>";

                            if ($item[14]==1)
                                echo "<div class='mark_top_right'><span class='mark_bg_red'>новинка</span></div>";

                            echo "<div class='link'><a href='product.php?art=".$item[0]."'><span>".$item[6]."</span><span style='color: gray;'>".$item[11]."</span></a></div>";

                            echo "<div class='fs_20'>";
                            if ($item[2]>0) {
                                echo "<s>".number_format($item[2],0,'',' ')." ₽</s>";
                                echo "<span class='fs_18 color_red'>".number_format($item[1],0,'',' ')." ₽</span>";
                            } else {
                                echo "<span>".number_format($item[1],0,'',' ')." ₽</span>";
                            }
                            echo "</div>";

                            $photo = file_exists("art_500/".$item[0].".jpg") ?
                                "art_500/".$item[0].".jpg" : "art_500/none.jpg";

                            echo "<div class='disimg'><a href='product.php?art=".$item[0]."'><img src='".$photo."' alt='' /></a></div>";

                            echo '
                                        </div>
                                    </div>
                                </div>
                                <div class="basket_gallery"><a href="javascript:recycled_add(' .$item[0]. ');"  class="color_blue">купить</a></div>
                            </div>';
                        }
                    }
                    ?>

<!--                    <div class="owl-carousel-item">-->
<!--                        <div class="padd0x10">-->
<!--                            <div class="catalog_item">-->
<!--                                <div class="box">-->
<!--                                    <div class='link'>-->
<!--                                        <a href='/stock.php'>-->
<!--                                            <span style="font-weight: bold">Примите участие в розыгрыше</span>-->
<!--                                            <span style='color: gray;'>подробности внутри</span>-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                    <div class='fs_20'>-->
<!--                                        <span>&nbsp;</span>-->
<!--                                    </div>-->
<!--                                    <div class='disimg'>-->
<!--                                        <a href='stock.php'><img src='images/main/thai1.png' alt='' /></a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
                <script type="text/javascript">
                    $(function(){
                        $(".main_gallery .owl-carousel").owlCarousel({
                            startPosition: 1,
                            autoplay: true,
                            smartSpeed : 500,
                            items : 4,
                            loop : true,
                            nav : true,
                            navText : ['',''],
                            dots : false,
                            responsive : {
                                0 : {
                                    items : 1,
                                },
                                500 : {
                                    items : 2,
                                },
                                800 : {
                                    items : 3,
                                },
                                1000 : {
                                    items : 4,
                                },
                            }
                        });
                    });
                </script>
            </div s>
            <div class="bottom">
                <a href="catalog.php" class="btn btn-blue" style="padding: 12px 80px 9px;">Перейти в каталог</a>
            </div>
        </div>

        <div class="main-interier">
            <div class="row">
                <div class="col-xs-12 col-sm-6" style="padding: 35px 0 0 50px;">
                    <strong class="hidden-xs">
                        <div class="m-b-2 title">
                            Оцените,<br />
                            как преобразится<br />
                            интерьер благодаря<br />
                            композиции Fi`ora
                        </div>
                        <div class="description">
                            Добавьте акцент одним движением
                        </div>

                    </strong>

                    <div class="m-b-5 hidden-xs"></div>
                    <div class="m-b-2 visible-xs" style="margin: -70px 0 0 -35px;">
                        <div style="font-size: 18px; text-transform: uppercase;">
                            Оцените, как преобразится<br />
                            интерьер благодаря <nobr>композиции Fi`ora</nobr>
                        </div>
                        <div class="sepline"></div>
                        Добавьте акцент одним движением
                    </div>
                    <a href="after-before.php" class="hidden-xs color_blue">Попробовать ещё варианты</a>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="blindbox">
                        <div class="before"><img src="images/main/b3.jpg" alt="" /></div>
                        <div class="after"><img src="images/main/a3.jpg" alt="" /></div>
                    </div>
                </div>
            </div><a name="discount20"></a>
            <div class="m-t-2 text-center visible-xs">
                <a href="after-before.php" class="color_blue">Попробовать ещё варианты</a>
            </div>
        </div>

        <div class="visible-sm m-b-2"></div>

	</div>


	<div class="m-b-2 main-negin-slider z-index-1">
		<ul>
			<li class="slide-1 active">
				<div class="container">
					<div class="pos">
                        <div class="img" align='left'><img src="images/main/discount101520.png" alt="" /></div>
                        <a name="spring"></a>
                        <div class="txt">

                            <div class="title-1">
                                <strong>Лови лето и <nobr> скидки от Fi’ora!</nobr></strong>
                            </div>

                            <div class="m-b-1 fs_16">
                                <strong>прямо сейчас получите скидку до 20% на ваш заказ</strong>
                            </div>
                            <div>
                                Мы хотим, чтобы солнце дарило нам всё больше теплых дней, и число довольных людей от покупок увеличивалось с геометрической прогрессией. Укажите свой номер телефона и ваш промокод придёт в смс. Воспользовавшись промокодом вы получите скидку 10% на любую покупку, 15% — на покупку от 6 000 рублей и 20% — на заказ свыше 12 000 рублей.
                            </div>
                            <div style="color: #8f8f8f">
                                Срок действия промокода — до 31 декабря 2018 года.
                            </div>

                            <div class="m-b-2"></div>
                            <div class="hidden-sm m-t-3"></div>

                            <div class="fleft book">
                                <input type="text" name="name" id="book_fio" placeholder="Имя" class="i-tr book-input" />
                            </div>

                            <div class="fright book">
                                <input class="i-tr book-input phone-mask" type="text" name="phone" id="book_name" placeholder="+7(___)___-__-__" />
                            </div>

                            <div class="fleft book">
                                <div class="checkbox gray">
                                    <label><input type="checkbox" name="spam" checked="true" value="1" class="book-input" />
                                        Я согласен с правилами обработки
                                        <a href="#" data-toggle="modal" data-target="#modal_public" style="color: #929292;">персональных данных</a>
                                    </label>
                                </div>
                            </div>

                            <div class="m-b-3 fright bottom prm book">
                                <a id="book_button" href="#" class="m-t-1 btn btn-blue book-order" style="width: 100%; padding: 11px 0 10px;">
                                    Получить промокод
                                </a>
                            </div>

                            <script type="text/javascript">
                                $(function(){

                                    $('.book-input').on('change', function() {
                                        if ($(this).val() === '') {
                                            $(this).addClass('has-error');
                                        } else {
                                            $(this).removeClass('has-error');
                                        }
                                    });

                                    $('.book-order').click(function(event) {
                                        event.preventDefault();

                                        err = 0;

                                        $(this).closest('.slide-1').find('.book-input').each(function(){
                                            if ($(this).val() === '') {
                                                $(this).addClass('has-error');
                                                err = 1;
                                            }
                                        });

                                        $(this).closest('.slide-1').find('.inpsty').each(function(){
                                            if (!$(this).hasClass('active')) {
                                                $(this).addClass('has-error');
                                                err = 1;
                                            }
                                        });

                                        if (!err) {

                                            $name = $('#book_fio');
                                            $phone = $('#book_name');
                                            $button = $('#book_button');

                                            $.post('/php/auth.php', {
                                                'form': 'sms20',
                                                'phone': $phone.val()
                                            }).done(function() {
                                                console.log('done');
                                            });

                                            $.ajax({
                                                type: 'POST',
                                                url: '/php/send_book.php',
                                                data: 'name='+$name.val()+'&'+'phone='+$phone.val(),
                                                success: function(response) {

                                                    $name.val('');
                                                    $phone.val('');
                                                    $button.text('Промокод отправлен');

                                                    setTimeout(function() {
                                                        $button.text('Получить промокод')
                                                    }, 5000);
                                                },
                                                error: function() {
                                                    alert('Ошибка');
                                                }
                                            });
                                        }
                                    });
                                });
                            </script>
						</div>
					</div>
				</div>
<!--				<div class="mgs-pagination">-->
<!--					<a href="#" class="goto active" data-target="slide-1"></a>-->
<!--					<a href="#" class="goto" data-target="slide-2"></a>-->
<!--				</div>-->
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
						</div>
					</div>
				</div>
<!--				<div class="mgs-pagination">-->
<!--					<a href="#" class="goto" data-target="slide-1"></a>-->
<!--					<a href="#" class="goto active" data-target="slide-2"></a>-->
<!--				</div>-->
			</li>
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
		<div class="owl-carousel">
			<div class="owl-carousel-item">
				<div class="disimg">
                    <a href="#discount20"><img src="images/main/discount101520.png" alt="" /></a>
                </div>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				$(".main-pack .owl-carousel").owlCarousel({
					smartSpeed : 500,
					items : 1,
					loop : false,
				});
			});
		</script>
	</div>

	<div class="container container-negative z-index-5">

		<div class="m-b-2 bg_gray">
			<div class="media media-responsive text-xs-center">
				<div style='background:#f2f2f2;' class="media-left media-middle hidden-xs"><img src="images/index/538.jpg" alt="" /></div>
				<div class="media-body media-middle">
					<div class="m-b-5 hidden-xs"></div>
					<div class="padd20">
						<div class="m-b-2 fs_35 granity591" style="line-height: 40px; font-weight: bold;">
                            Летнее настроение в коллекции Oriety 538
                        </div>
						<div class="m-b-2 color_dark_gray">
                            В коллекции Oriety 538 уникальное сочетании нежных и насыщенных оттенков одновременно. Данная композиция придаст динамики вашему интерьеру и впишется в любое пространство!, Вы сможете периодически сменять её локацию и придавать летний вид остальным помещениям. Добавьте в свой дом одну ключевую деталь, чтобы подчеркнуть достоинства или придать интерьеру неповторимый стиль и характер.
                        </div>
                        <div class="m-b-3"><i>Количество композиций ограничено</i></div>
						<div class="bottom">
                            <a href="/catalog.php#Oriety538" class="btn btn-blue">Купить</a>
                        </div>
					</div>
					<div class="m-b-5 hidden-xs"></div>
				</div>
				<div class="media-right visible-xs"><img class="img-responsive img-center" src="images/index/538.jpg" alt="" /></div>
			</div>
		</div>

            <div class="m-b-2 col-xxs-12  col-xs-12 col-sm-12 col-md-6">
                <div class="s1x1 main-box-bg">
                    <a href="after-before.php" class="overlink"></a>
                    <div class="bg">
                        <img src="images/index/sofa.png" alt="">
                    </div>
                    <div class="half txt padd50">
                        <div class="m-b-2 fs_30" style="font-weight: bold">
                            Простые хитрости<br>
                            обустройства интерьера
                        </div>
                        <div class="m-b-1" style="font-weight: bold; max-width: 70%">
                            Советы от дизайнеров о том, как легко и без лишних затрат сделать из своего домашнего интерьера нечто особенное.
                        </div>
                    </div>
                </div>
            </div>
            <div class="visible-xs clearfix"></div>

            <div class="m-b-2 col-xxs-12 col-xs-6 col-sm-6 col-md-3">
                <div class="s1x1 main-trend main-box-bg">
                    <a href="gallery.php" class="overlink"></a>
                    <div class="bg visible-xs"><img src="images/index/photo_mobile.png" alt="" /></div>
                    <div class="half text-center">
                        <div class="padd40" style="padding: 28px;">
                            <div class="m-b-1 hidden-xs"><img src="images/index/photo_web.png" alt="" /></div>
                            <div class="fs_18 text-uppercase"><br>Фотогалерея</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="m-b-2 col-xxs-12 col-xs-6 col-sm-6 col-md-3">
                <div class="s1x1 main-brand main-box-bg main-trend">
                    <a href="about.php" class="overlink"></a>
                    <div class="bg" style="background-color: #adca51">
                        <img class="hidden-xs" src="images/index/about2.png" alt="" />
                        <img class="visible-xs" src="images/index/about2-xs.png" alt="" />
                    </div>
                    <div class="half text-center">
                        <div class="padd40">
                            <div class="hidden-xs" style="padding-top: 146px">&nbsp;</div>
                            <div class="fs_18 text-uppercase">О бренде</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	</div>

	<div class="main-testimonials">
		<div class="container">
            <div class="m-b-3 text-center hidden-xs" style="font-weight: bold; font-size: 28px">Отзывы клиентов, которые выбирают Fi'ora</div>
            <div class="m-b-3 fs_18 text-center visible-xs">Отзывы клиентов, которые выбирают Fi'ora</div>
			<div class="testimonials">
				<div class="owl-carousel with-nav">

					<div class="owl-carousel-item">
						<div class="media m-b-3">
							<div class="media-left">&nbsp;<img width="75" class="img-circle" src="images/main/50.png" alt="" /></div>
						</div>
						<div class="color_dark fleft">Владислав</div>
<!--                        <div class="fs_10 fright">27.01.2018</div>-->
                        <div class="cboth"></div>
							Руководитель журнала «Авторский проект»
						<div class="m-b-2"></div>
							Цветы в стеклянных вазах от Fi’ora стали прекрасным вариантом подарка для наших многочисленных партнеров, особенно в индустрии моды и красоты. Изысканный сувенир неизменно вызывает интерес, удивление и восторг, и способен долгие годы напоминать о позитивных результатах нашего сотрудничества.
					</div>
					<div class="owl-carousel-item">
						<div class="media m-b-3">
							<div class="media-left">&nbsp;<img width="75" class="img-circle" src="images/main/48.png" alt="" /></div>
						</div>
                        <div class="color_dark fleft">Марина</div>
<!--                        <div class="fs_10 fright">27.01.2018</div>-->
                        <div class="cboth"></div>
							Сотрудник банка «Банк Хоум Кредит»
						<div class="m-b-2"></div>
							Нашла это чудо, которое отлично украшает интерьер и при этом сохраняет свою красоту действительно долго. А необычная форма стекла подчеркивает красоту натуральных цветов. Для начала купила себе и решила проверить: действительно ли 5 лет хранятся… Сейчас моей композиции уже 3 года, купила в начале марта 2014 года и ничего с ней не случилось, только время от времени вытираю пыль. Поэтому сделала вывод, что 5 лет простоит точно.
					</div>
					<div class="owl-carousel-item">
						<div class="media m-b-3">
							<div class="media-left">&nbsp;<img width="75" class="img-circle" src="images/main/50.png" alt="" /></div>
						</div>
						<div class="color_dark fleft">Светлана</div>
<!--                        <div class="fs_10 fright">27.01.2018</div>-->
                        <div class="cboth"></div>
							Сотрудник салона красоты «Арабика»
						<div class="m-b-2"></div>
							У моей свекрови аллергия на цветы… И на каждое день рождения мы с мужем долго думали, чем порадовать свекровь и удивить….. И вот это свершилось! Восемь лет назад мы подари цветы Fiora, которые не вызывают аллергию и стоят долгие годы, радуя своей красотой.  Свекровь была очень довольна… Цветы в вазе уже стоят 8 лет и они не потеряли свой внешний вид! И кстати, у свекрови дома уже целая коллекция композиций Fi’ora.
					</div>
					<div class="owl-carousel-item">
						<div class="media m-b-3">
							<div class="media-left">&nbsp;<img width="75" class="img-circle" src="images/main/41.png" alt="" /></div>
						</div>
						<div class="color_dark fleft">Кристина</div>
<!--                        <div class="fs_10 fright">27.01.2018</div>-->
                        <div class="cboth"></div>
							Сотрудник автосалоана KIA
						<div class="m-b-2"></div>
							Первое о чём подумала, увидев подобные вазы, что это хороший вариант подарка, особенно, когда хочешь удивить. Но для себя не стала бы приобретать, дороговато мне кажется. Мне как-то подарили, стоят да стоят просто, украшают интерьер, в тумбочку спрятать точно не захотелось.
					</div>

					<div class="owl-carousel-item">
						<div class="media m-b-3">
							<div class="media-left">&nbsp;<img width="75" class="img-circle" src="images/main/45.png" alt="" /></div>
						</div>
						<div class="color_dark fleft">Екатерина</div>
<!--                        <div class="fs_10 fright">27.01.2018</div>-->
                        <div class="cboth"></div>
							Сотрудник компании Кузбасское ПМЭС
						<div class="m-b-2"></div>
							Оригинальные! Красивые такие, будто ненастоящие. Главное, думаю, что вазы могут вписаться в абсолютно любой интерьер, что очень удобно.
					</div>

					<div class="owl-carousel-item">
						<div class="media m-b-3">
							<div class="media-left">&nbsp;<img width="75" class="img-circle" src="images/main/47.png" alt="" /></div>
						</div>
						<div class="color_dark fleft">Мария</div>
<!--                        <div class="fs_10 fright">27.01.2018</div>-->
                        <div class="cboth"></div>
							Сотрудник стоматологической поликлиники
						<div class="m-b-2"></div>
							У меня есть круглая, овальная, эллипс и хорошо смотрятся. В форме сердца очень интересно, но к грядущим праздникам классно было бы, если они были побольше, ну содержали по 3 цветочка. Приятно было бы такое получить в подарок. А еще видела квадратную: он как-то жестковата что ли, для какого-то более серьезного случая, или под определенный интерьер.
					</div>

					<div class="owl-carousel-item">
						<div class="media m-b-3">
							<div class="media-left">&nbsp;<img width="75" class="img-circle" src="images/main/45.png" alt="" /></div>
						</div>
						<div class="color_dark fleft">Марина</div>
<!--                        <div class="fs_10 fright">27.01.2018</div>-->
                        <div class="cboth"></div>
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
