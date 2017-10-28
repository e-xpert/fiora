<?
//---------  VAR  ---------------------------
$VAR_title='Цветы в стекле';
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
require_once ( "html_header.php"     );
// ===========================================
?>
	<div class="header-sep m-b-35"></div>

	<div class="container">

		<div class="m-b-35 row">
			<div class="col-xs-12 col-sm-6">
				<div class="fs_16"><a href="index.php" class="type-link">Назад</a></div>
			</div>
			<div class="col-xs-12 col-sm-6 text-right fs_16 hidden-xs">
				<span class="tooltips top left">
					<a href="/after-before.php" class="type-link">Fi’ora до и после</a>
					<div class="tooltips_box">
						<div class="tooltips_box_arr"></div>
						<div class="tooltips_box_body fs_14 text-left">
							<i>Посмотрите, как это в интерьере</i>
						</div>
					</div>
				</span>
			</div>
		</div>

	</div>

	<ul id="gallery">
		<li>
			<div class="img"><span><img src="images/gallery/1.jpg" alt=""/></span></div>
			<div class="txt">
				<div class="arr"></div>
				<div class="title">Яркий акцент вашего интерьера</div>
				<!-- <div class="description">Красная роза в вазе формы ангела с сердцем</div> -->
<!--				<ul class="list-inline list-inline-padd-2 m-b-0">-->
<!--					<li><a href="#" class="color_blue">Подробнее</a></li>-->
<!--					<li><a href="#" class="color_blue">Купить</a></li>-->
<!--				</ul>-->
			</div>
		</li>
		<li>
			<div class="img"><span><img src="images/gallery/2.png" alt=""/></span></div>
			<div class="txt">
				<div class="arr"></div>
				<div class="title">Ненавязчивое тепло домашнего уюта</div>
				<!-- <div class="description">Красная роза в вазе формы ангела с сердцем</div> -->
<!--				<ul class="list-inline list-inline-padd-2 m-b-0">-->
<!--					<li><a href="#" class="color_blue">Подробнее</a></li>-->
<!--					<li><a href="#" class="color_blue">Купить</a></li>-->
<!--				</ul>-->
			</div>
		</li>
		<li>
			<div class="img"><span><img src="images/gallery/3.jpg" alt=""/></span></div>
			<div class="txt">
				<div class="arr"></div>
				<div class="title">Когда слова излишни.<br>И всё избыточно. Кроме Fi'ora.</div>
				<!-- <div class="description">Красная роза в вазе формы ангела с сердцем</div> -->
<!--				<ul class="list-inline list-inline-padd-2 m-b-0">-->
<!--					<li><a href="#" class="color_blue">Подробнее</a></li>-->
<!--					<li><a href="#" class="color_blue">Купить</a></li>-->
<!--				</ul>-->
			</div>
		</li>
		<li>
			<div class="img"><span><img src="images/gallery/5.jpg" alt=""/></span></div>
			<div class="txt">
				<div class="arr"></div>
				<div class="title">Бокал красного вина и жизненная энергия красных роз. </div>
				<!-- <div class="description">Красная роза в вазе формы ангела с сердцем</div> -->
<!--				<ul class="list-inline list-inline-padd-2 m-b-0">-->
<!--					<li><a href="#" class="color_blue">Подробнее</a></li>-->
<!--					<li><a href="#" class="color_blue">Купить</a></li>-->
<!--				</ul>-->
			</div>
		</li>
		<li>
			<div class="img"><span><img src="images/gallery/6.jpg" alt=""/></span></div>
			<div class="txt">
				<div class="arr"></div>
				<div class="title">Изысканный вкус с нотками аристократизма</div>
				<!-- <div class="description">Красная роза в вазе формы ангела с сердцем</div> -->
<!--				<ul class="list-inline list-inline-padd-2 m-b-0">-->
<!--					<li><a href="#" class="color_blue">Подробнее</a></li>-->
<!--					<li><a href="#" class="color_blue">Купить</a></li>-->
<!--				</ul>-->
			</div>
		</li>
		<li>
			<div class="img"><span><img src="images/gallery/9.jpg" alt=""/></span></div>
			<div class="txt">
				<div class="arr"></div>
				<div class="title">Гармония внешнего и внутреннего.<br>Такая редкость для современного мира.</div>
				<!-- <div class="description">Красная роза в вазе формы ангела с сердцем</div> -->
<!--				<ul class="list-inline list-inline-padd-2 m-b-0">-->
<!--					<li><a href="#" class="color_blue">Подробнее</a></li>-->
<!--					<li><a href="#" class="color_blue">Купить</a></li>-->
<!--				</ul>-->
			</div>
		</li>
		<li>
			<div class="img"><span><img src="images/gallery/10.jpg" alt=""/></span></div>
			<div class="txt">
				<div class="arr"></div>
				<div class="title">Прекрасное должно быть рядом.<br>Особенно за утренним кофе.</div>
				<!-- <div class="description">Красная роза в вазе формы ангела с сердцем</div> -->
<!--				<ul class="list-inline list-inline-padd-2 m-b-0">-->
<!--					<li><a href="#" class="color_blue">Подробнее</a></li>-->
<!--					<li><a href="#" class="color_blue">Купить</a></li>-->
<!--				</ul>-->
			</div>
		</li>
	</ul>

</div><!--bg_white-->

<?
	// ----------   FOOTER   ---------------------
	require_once ( "html_footer.php"     );
	// ===========================================
?>
