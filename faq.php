<?
//---------  VAR  ---------------------------
$VAR_title='Цветы в стекле';
//===========================================

//---------  PHP  ---------------------------
require_once ( "php/require_files.php");
require_once ( "php/product.php");
//=============================================

if ( !isset($_GET['art']) || $_GET['art'] < 100 ) {
	Header('Location: catalog.php');
	exit;
}

if (isset($_COOKIE['geo_country_id']) && get_product($_GET['art'], $_COOKIE['geo_country_id']) == 0) {
	Header('Location: catalog.php');
	exit;
}

$HEAD_require =	array("js/product.php");

// ----------   HEAD  ----------------------
require_once ( "html_head.php");
// ===========================================
?>




<?
//---------  VAR  ---------------------------
$VAR_title='Цветы в стекле';
//===========================================

//---------  PHP  ---------------------------
require_once ( "php/require_files.php");
//=============================================

$HEAD_inject = '<script type="text/javascript" src="js/jcarousel.js"></script>';

// ----------   HEAD  ----------------------
require_once ( "html_head.php");
// ===========================================
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

		<div class="m-b-35 row">
			<div class="col-xs-6">
				<div class="fs_18">FAQ</div>
			</div>
			<div class="col-xs-6 text-right fs_16">
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

		<div class="m-b-5 text-center">
			<div class="m-b-3 fs_32">Часто задаваемые вопросы</div>
			На данной странице приведены ответы на наиболее частые вопросы касающиеся как работы нашего интернет-магазина, так и специфики товара. Мы постарались дать максимально понятные и подробные ответы. Если у вас остались сомнения по какому-либо поводу, или вашего вопроса нет в списке, то вы всегда можете позвонить по горячей линии и окончательно прояснить для себя все нюансы.
		</div>

		<div class="marb_50 row row_50">
			<div class="col-sm-4 col-md-3">
				<div class="m-b-2 color_gray">Фильтровать по теме:</div>
				<ul class="list-unstyled list-padd-2">
					<li>
						<div class="checkbox">
							<label><input type="checkbox" name="agree" value="" /> Доставка</label>
						</div>
					</li>
					<li>
						<div class="checkbox">
							<label><input type="checkbox" name="agree" value="" /> Заказ</label>
						</div>
					</li>
					<li>
						<div class="checkbox">
							<label><input type="checkbox" name="agree" value="" /> Оплата</label>
						</div>
					</li>
					<li>
						<div class="checkbox">
							<label><input type="checkbox" name="agree" value="" /> Состав композиций</label>
						</div>
					</li>
					<li>
						<div class="checkbox">
							<label><input type="checkbox" name="agree" value="" /> О бренде</label>
						</div>
					</li>
					<li>
						<div class="checkbox">
							<label><input type="checkbox" name="agree" value="" /> Уход за композициями</label>
						</div>
					</li>
				</ul>
			</div>
			<div class="col-sm-8 col-md-9">
				<div class="panel panel-collapse panel-open">
					<div class="panel-heading">Можно ли тереть композиции вихоткой?<i class="arr"></i></div>
					<div class="panel-body">
						Бывают люди, которые, несмотря на все уговоры, будут делать все так как считают нужным, они же,
						зачастую задают подобные вопросы. Получив ответ не соответствующий их представлению о ситуации,
						они опытным путем, непременно, станут убеждаться в том, что они не правы.
						Поэтому, если вы человек претендующий на адекватность, не стоит тереть композиции вихоткой.
						Удаляйте пыль и отпечатки рук специальной фирменной салфеткой.
					</div>
				</div>
				<div class="panel panel-collapse">
					<div class="panel-heading">Можно ли мыть композиции в посудомоечной машине?<i class="arr"></i></div>
					<div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
				<div class="panel panel-collapse">
					<div class="panel-heading">Можно ли разводить прощальный костер вокруг композиции?<i class="arr"></i></div>
					<div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
				<div class="panel panel-collapse">
					<div class="panel-heading">Если произойдет разгерметизация, произойдет ли смещение пространства-времени?<i class="arr"></i></div>
					<div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
				<div class="panel panel-collapse">
					<div class="panel-heading">Можно ли использовать вазы в качестве формы для запекания тестяных полусфер?<i class="arr"></i></div>
					<div class="panel-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>

				<div class="text-center">
					<a href="#" class="color_blue">Задать свой вопрос</a>
				</div>
			</div><!--col-->
		</div>

	</div>

</div><!--bg_white-->



<?
	// ----------   META  ------------------------
	require_once ( "html_footer.php"     );
	// ===========================================
?>