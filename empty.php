<?
//---------  VAR  ---------------------------
$VAR_title='Fi`ora каждый день';
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
<div class="wofl">
<div class="bg_white">

<?
// ----------   META  ------------------------
require_once ( "html_header.php"     );
// ===========================================
?>

    <div class="header-sep m-b-3"></div>
    <div class="header-sep m-b-3"></div>

    <div class="container">
        <div class="m-b-3 text-center"><img src="images/empty.png" alt="" /></div>
        <div class="m-b-5 fs_24 text-center">В корзине нет ни одного товара</div>
        <div class="m-b-5 text-center">
            <a href="catalog.php">Перейти в каталог</a><br><br>
            <a href="after-before.php">Посмотреть ценность на примерах</a><br><br>
            <a href="<?=$_SERVER["HTTP_REFERER"]?>">← вернуться назад</a>
        </div>
    </div>
    <div class="header-sep m-b-3"></div>

</div><!--bg_white-->


<?
	// ----------   META  ------------------------
	require_once ( "html_footer.php"     );
	// ===========================================
?>
