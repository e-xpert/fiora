<?
//---------  VAR  ---------------------------
$VAR_title='Страница не найдена!';
//===========================================

//---------  PHP  ---------------------------
require_once ( "php/require_files.php");
//=============================================

$HEAD_inject = '<script type="text/javascript" src="js/jcarousel.js"></script>';

// ----------   HEAD  ----------------------
require_once ( "html_head.php");
// ===========================================
?>

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

		<div class="sep_50"></div>

		<div class="text-center">
			<div class="m-b-2"><img src="images/i404.jpg" alt="" /></div>
			<div class="m-b-3 fs_20 color_gray">Страница не найдена!</div>
			<a href="index.php" class="color_blue">Вернуться на главную</a>
		</div>

		<div class="sep_100"></div>

	</div>

</div><!--bg_white-->


<?
	// ----------   FOOTER   ---------------------
	require_once ( "html_footer.php"     );
	// ===========================================
?>
