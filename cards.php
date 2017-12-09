<?
//-------------------------------------------
//---------  VAR  ---------------------------
$VAR_title='Открытки Fi’ora';
//===========================================

//---------  PHP  ---------------------------
require_once ( "php/require_files.php");
//=============================================

$HEAD_require =	array("js/catalog.php");

$collection=get_card_collection();

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
			<div class="col-xs-12 col-sm-6">
				<div class="fs_18">Каталог открыток Fi’ora</div>
			</div>
		</div>

		<div class="marb_50 row row_50">
			<div class="col-sm-4 col-md-3">
				<div class="sidemenu">
					<div class="title">Фирменные открытки <!--span onclick="filter_clear();" id='show_all' class="color_gray" style='display:none;margin-left:30px;font-size:10px;cursor:pointer;'>все</span --></div>
					<ul>
<?
foreach ($collection as $item) {
    ?>
                        <li>
                            <label>
<!--                                <input class='filter_root' id='filter_input_root_--><?//=$item[0]?><!--' type='checkbox' onclick='filter_col(--><?//=$item[0]?>//)'>
                                <input id='filter_input_subcol_<?=$item[0]?>' class='filter_root_<?=$item[0]?>' data-col_root='<?=$item[0]?>' type='checkbox' name='' value='' onclick='filter_subcol(<?=$item[0]?>)'>
                            </label>
                            <span onclick='filter_subcol(<?=$item[0]?>); toggle_input(<?=$item[0]?>)' class='sub'><?=$item[1]?></span>
                        </li>
    <?
}
?>
					</ul>
					<div class="sep"></div>
					<div class="single"><a href="/catalog.php">Композиции Fi’ora</a></div>
				</div>
				<script>
					$(function(){
						$('.sidemenu .sub').click(function(){
							var $p = $(this).closest('li');
							if( $('ul', $p).length ){
								if( $('ul', $p).is(':hidden') ){
									$('ul', $p).addClass('open');
									$(this).find('.fa').removeClass('fa-angle-down').addClass('fa-angle-up');
								} else {
									$('ul', $p).removeClass('open');
									$(this).find('.fa').removeClass('fa-angle-up').addClass('fa-angle-down');
								}
							}
						});
						$('.sidemenu label').each(function(){
					        $('<span class="arr"></span>').appendTo($(this));
					    });
						$('.sidemenu input:checked').each(function(){
					        $(this).closest('label').addClass('active');
                            $(this).closest('ul').addClass('open');
					    });
						$('.sidemenu input').change(function(){
							var $p = $(this).closest('.mfs_labels');
							if( $(this).is(':checked') ){
								$('input[type=radio]', $p).closest('label').removeClass('active');
								$(this).closest('label').addClass('active');
							} else {
								$('input[type=radio]', $p).closest('label').removeClass('active');
								$(this).closest('label').removeClass('active');
							}
						});
					});

					function toggle_input(id) {
					    $input = $('#filter_input_subcol_' + id);

                        if( $input.val() == 1 ){
                            $input.closest('label').addClass('active');
                        } else {
                            $input.closest('label').removeClass('active');
                        }
                    }
				</script>
				<div class="m-b-2 disimg hidden-xs">
					<a href='#' onclick="banner_filter();"><img src="images/catalog/banner_left.png" alt="" /></a>
					<div style='margin-top:-35px;'>
					<center>
						<a href="trands.php" class="color_blue" style='font-size:12px;'>Узнать о трендах 2017</a>
					</center>
					</div>
				</div>
			</div>
			<div class="col-sm-8 col-md-9">

<?
foreach ($collection as $cnt => $item) {

    $cards=get_card_rest($item[0]);
    $line_cnt = 0;
    
    if (count($cards)) {
        echo "
            <div class='m-b-3 row is_filter' id='collection_head_uid_".$item[0]."'>
                <div class='col-sm-6'>
                    <div class='fs_18'>".$item[1]."</div>
                </div>
            </div>
        ";

        echo "<div class='row row_50 is_filter' id='collection_row_uid_".$item[0]."'>";

        foreach ($cards as $card) {

            $line_cnt++;

                echo "	<div class='marb_50 col-sm-4'>
                            <div class='catalog_item'>
                                <div class='box' style='z-index: 20'>
                                    <div class='mark_top_left add'></div>
                                    <div class='mark_top_right'></div>";

            $photo = file_exists("art_cards/".$card[2] . ".jpg") ?
                "art_cards/".$card[2] . ".jpg" :
                "art_500/none.jpg";

            echo "				<div class='disimg'>
                                    <a class='fancyopen' href='".$photo."'>
                                        <img src='".$photo."' alt='' />
                                    </a>
                                </div>
                                <div class='link'><span>Фирменная открытка с подставкой в конверте</span>".$card[3]."</div>
                                <div class='size'>размеры: 9 х 9 см.</div>
                                <div class='price'><span>".number_format($card[4],0,'',' ')." ₽</span></div>
                                <div class='add'>

                                <!-- add basket box -->
                                <div style='margin-left: 35px; z-index: 30'>
                                    <div class=\"tooltips top left\">
                                        <div class='tooltips_box basket_add_".$card[0]."' style='display:none; width: calc(100% + 37px)'>
                                            <div class=\"tooltips_box_arr\"></div>
                                            <div class=\"tooltips_box_body fs_12 text-left\" style='width: 100%;'>
                                                Товар добавлен в корзину.<br><br>
                                                <a href='basket.php'>Перейти в корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- add basket box -->";

            echo $card[5] == 0 ?
                "<a class='btn btn-danger btn-block'>Нет в наличии</a>" :
                "<a href='javascript:recycled_add(".$card[0].");' class='btn btn-danger btn-block'>Добавить в корзину</a>";

            echo "				</div>
                            </div>
                            <div class='hov'></div>
                        </div>
                    </div>";

            if ($line_cnt % 3 == 0 && count($cards) > $line_cnt) {
                echo "<div class='m-b-1'>&nbsp;</div>";
            }
        }

        echo "</div>";
    }

    if (count($collection) - 1 != $cnt) {
        echo "
            <div class='m-b-4 hr is_filter' style='margin-top:10px;' id='collection_hr_uid_".$item[0]."'></div>
        ";
    }
}
?>

			</div>
		</div>
	</div>
</div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".fancyopen").fancybox({
                maxHeight: 700
            });
        });
    </script>
<?
	// ----------   META  ------------------------
	require_once ( "html_footer.php"     );
	// ===========================================
?>
