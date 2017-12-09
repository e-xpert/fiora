<?
//-------------------------------------------
//---------  VAR  ---------------------------
$VAR_title='Каталог композиций Fi’ora';
//===========================================

//---------  PHP  ---------------------------
require_once ( "php/require_files.php");
//=============================================

$HEAD_require =	array("js/catalog.php");

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
				<div class="fs_18">Каталог композиций Fi’ora</div>
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

		<div class="marb_50 row row_50">
			<div class="col-sm-4 col-md-3">
				<div class="sidemenu">
					<div class="title">Композиции Fi’ora <span onclick="filter_clear();" id='show_all' class="color_gray" style='display:none;margin-left:30px;font-size:10px;cursor:pointer;'>все</span></div>
					<ul>
<?

//---------------------------------------
// GET Collection
//---------------------------------------
$collection=get_collection($geo_country_id);
$collection_size=count($collection);

for ($collection_i=0;$collection_i<$collection_size;$collection_i++) {
		// видимые и root=0
		if ( ($collection[$collection_i][4]==1)and($collection[$collection_i][9]==0) ) {
			echo "
				<li>
				<label><input class='filter_root' id='filter_input_root_".$collection[$collection_i][0]."' type='checkbox' name='' value=''  onclick='filter_col(".$collection[$collection_i][0].")'></label>
				<span class='sub'>".$collection[$collection_i][1]." <i class='fa fa-angle-down'></i></span>
			";
			// подколлекции
			echo "<ul>";
			for ($collection_y=0;$collection_y<$collection_size;$collection_y++) {
				//echo $collection[$collection_y][9];
				// подколлекция=коллекции
				if ( ($collection[$collection_y][4]==1)and($collection[$collection_y][9]==$collection[$collection_i][0]) ) {
					// получаем кол-во позиций в коллекции, результат 1=0
					$rest=get_rest($geo_country_id,$collection[$collection_y][0]);
					$rest_size=count($rest);
					if ($rest_size>1) {
						echo "
							<li><label><input id='filter_input_subcol_".$collection[$collection_y][0]."' class='filter_root_".$collection[$collection_i][0]."' data-col_root='".$collection[$collection_i][0]."' type='checkbox' name='' value='' / onclick='filter_subcol(".$collection[$collection_y][0].")'></label> ".$collection[$collection_y][2]."</li>
						";
					}

				}
			}
				echo "</ul>";
			echo "</li>";
		}
}


?>


					</ul>
					<div class="sep"></div>
					<div class="single"><a href="/cards.php">Фирменные открытки</a></div>
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
//---------------------------------------
// GET Collection
//---------------------------------------
$collection=get_collection($geo_country_id);
$collection_size=count($collection);
for ($collection_i=0;$collection_i<$collection_size;$collection_i++) {
		// видимые и root=0
		if ( ($collection[$collection_i][4]==1)and($collection[$collection_i][9]==0) ) {
			echo "
				<!-- START COLLECTION Root# ".$collection[$collection_i][0]." -->
			";
			// подколлекции
			for ($collection_y=0;$collection_y<$collection_size;$collection_y++) {
				// подколлекция=коллекции
				if ( ($collection[$collection_y][4]==1)and($collection[$collection_y][9]==$collection[$collection_i][0]) ) {
					// получаем кол-во позиций в коллекции, результат 1=0
					$rest=get_rest($geo_country_id,$collection[$collection_y][0]);
					$rest_size=count($rest);
					if ($rest_size>1) {
						// Заголовок коллекций!!!!!!
						echo "
							<!-- Sub Collection Header Root# ".$collection[$collection_i][0]." -->
							<div class='m-b-4 row is_filter' id='collection_head_uid_".$collection[$collection_y][0]."'>
								<div class='col-sm-6'>
									<div class='fs_18'>".$collection[$collection_y][1]."</div>
								</div>
								<div class='col-sm-6 text-right'>
									<span class='color_gray'>".$collection[$collection_y][2]."</span>
								</div>
							</div>
							<!-- Sub Collection Root#  ".$collection[$collection_i][0]." -->
						";

						echo "<div class='row row_50 is_filter' id='collection_row_uid_".$collection[$collection_y][0]."'>";

						// кратность 3, разрыв
						$collection_3_i=0;
						for ($rest_i=0;$rest_i<$rest_size;$rest_i++) {

							// ВРЕМЕННАЯ ЗАГЛУШКА БЕЗ КАРТИНОК
							if (!file_exists("art_500/".$rest[$rest_i][0].".jpg"))
								continue;

							if ($rest[$rest_i][5]==$collection[$collection_y][0]) {
								// счетчик позици кратных 3
								$collection_3_i=$collection_3_i+1;
									echo "	<div class='marb_50 col-sm-4'>
												<div class='catalog_item'>
													<div class='box'>
														<div class='mark_top_left add'>";


                                //===================================================================
                                // подгружаем остатки по городам
                                //===================================================================
                                $city_price=get_city_price($geo_city_id,$rest[$rest_i][0]);

                                $status = 0;

                                if ($city_price[0]>0)  {
                                    if ($city_price[2]>0) {
                                        $rest[$rest_i][2]=$city_price[1];
                                        $rest[$rest_i][1]=$city_price[2];
                                        $rest[$rest_i][3]=$city_price[0];
                                        $status = 2;
                                    } else {
                                        $rest[$rest_i][2]=0;
                                        if ($city_price[1]>0) {
                                            $rest[$rest_i][1]=$city_price[1];
                                        }
                                    }
                                }
                                //-------------------------------------------------------------------
                                // подгружаем остатки по городам
                                //===================================================================

                                //Временное решение (только по центральному складу)
                                if ($rest[$rest_i][3])
                                    $status = 2;


//                                if ($status == 2) {
//									echo "<p style='margin-top:-18px;'>в наличии</p>";
//								} elseif ($rest[$rest_i][3]) {
//                                    $status = 1;
//                                    echo "<p style='margin-top:-18px;'>под заказ<br /> до 5 дней</p>";
//                                } else {
//                                    echo "<p style='margin-top:-18px;'>нет в наличии</p>";
//                                }

								echo "</div>";

								if ($rest[$rest_i][20]) {
                                    echo "
                                        <div class='mark_top_left'>
                                            <span class='mark_price'>".$rest[$rest_i][20]."</span>
                                        </div>";
                                }

                                echo "<div class='mark_top_right'>";

								if ($rest[$rest_i][14]==1) {
									echo "					<span class='mark_bg_red'>новинка</span>";
								}

								if (file_exists("art_500/".$rest[$rest_i][0].".jpg")) {
										$photo="art_500/".$rest[$rest_i][0].".jpg";
									}
									else {
										$photo="art_500/none.jpg";

								}

								echo "				</div>
													<div class='disimg'><a href='product.php?art=".$rest[$rest_i][0]."'><img src='".$photo."' alt='' /></a></div>
													<div class='link'>
														<a href='#'><span>".$rest[$rest_i][6]."</span>".$rest[$rest_i][11]."</a>
													</div>
													<div class='size'>размеры: ".$rest[$rest_i][15]." х ".$rest[$rest_i][16]." х ".$rest[$rest_i][17]." см.</div>
													<div class='price'>
								";

								if ($rest[$rest_i][2]>0) {

									echo "					<s>".number_format($rest[$rest_i][2],0,'',' ')." ₽</s>
														<span class='fs_20 color_red'>".number_format($rest[$rest_i][1],0,'',' ')." ₽</span>";
								} else {
									echo "<span>".number_format($rest[$rest_i][1],0,'',' ')." ₽</span>";
								}


								echo "					</div>
													<div class='add'>
													
													<!-- add basket box -->
                                                    <div style='margin-left: 35px'>
                                                        <div class=\"tooltips top left\">
                                                            <div class='tooltips_box basket_add_".$rest[$rest_i][0]."' style='display:none; width: calc(100% + 37px)'>
                                                                <div class=\"tooltips_box_arr\"></div>
                                                                <div class=\"tooltips_box_body fs_12 text-left\" style='width: 100%;'>
                                                                    Товар добавлен в корзину.<br><br>
                                                                    <a href='basket.php'>Перейти в корзину</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- add basket box -->";

                                if ($status == 0) {
                                    echo "<a class='btn btn-danger btn-block'>Нет в наличии</a>";
                                } else {
                                    echo "<a href='javascript:recycled_add(".$rest[$rest_i][0].");' class='btn btn-danger btn-block'>Добавить в корзину</a>";
                                }

								echo "					</div>
												</div>
												<div class='hov'></div>
											</div>
										</div>
								";

								if ($collection_3_i==3) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==6) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==9) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==12) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==15) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==18) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==21) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==24) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==27) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==30) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==33) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==36) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==39) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==42) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==45) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==48) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==51) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==54) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==57) {echo "<div class='m-b-4'>&nbsp;</div>";}
								if ($collection_3_i==60) {echo "<div class='m-b-4'>&nbsp;</div>";}

							}
						} // for rest
						echo "</div>";
						$collection_3_i=0;
					}

				if ($collection_size - 1 != $collection_y)
                    echo "
                        <div class='m-b-4 hr is_filter' style='margin-top:10px;' id='collection_hr_uid_".$collection[$collection_y][0]."'></div>
                        <!-- END Sub Collection Root#  ".$collection[$collection_i][0]." -->
                    ";
			}

		}
			echo "<!-- !!!!! END COLLECTION -->";
	}
}

?>

			</div>
		</div>
	</div>
</div><!--bg_white-->

<?
	// ----------   META  ------------------------
	require_once ( "html_footer.php"     );
	// ===========================================
?>
