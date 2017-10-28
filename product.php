<?
//-------------------------------------------
//---------  VAR  ---------------------------
$VAR_title='Цветы в стекле';
$VAR_image_path='images/';
$VAR_icons_path='icons/';
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

$product=get_product($_GET['art'],$geo_country_id);

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
				<div class="fs_18"><a href="catalog.php" class="type-link">Назад в каталог</a></div>
			</div>

			<!-- рандом линк -->
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
			<!-- рандом линк -->

		</div>


		<div class="marb_20 row row_40">
			<div class="col-sm-7">
				<div class="marb_20 product_gallery">
					<div class="tmark" <? if ($product[2]==0) { echo "style='display:none;'"; } ?> >
						<span class="mark_price">Специальная <br />цена</span>
					</div>

					<!-- интерьерные фото -->
						<ul class="preview">
<?
							$photo="art_98/".$product[0].".jpg";
							$photo_full="art_500/".$product[0].".jpg";
							if (!file_exists($photo)) {
									$photo="art_98/none.jpg";
									echo "<li><img src='".$photo."' alt='' /></li>";
								}
								else {
									echo "<li><a href='#'><img onclick='show_img_full(\"$photo_full\")' src='".$photo."' alt='' /></a></li>";
							}
							
?>

						<!--	<li class="active"><a href="#"><img src="images/examples/img032.png" alt="" /></a></li>		-->
						</ul>
					<!-- //  интерьерные фото -->


					<div class="ofl">

<?

	$photo="art_500/".$product[0].".jpg";

	if (!file_exists($photo)) {
		$photo="art_500/none.jpg";
	}
								

echo "<div class='disimg'><img onclick='show_img_full(\"$photo\")' id='img_full' src='$photo' alt='' /></div>";

?>

						
					</div>
				</div>

				<div class="clearfix"></div>

<?
//флористика

		$photo="art_500/".$product[0].".jpg";
		if (!file_exists($photo)) {
			$photo="art_500/none.jpg";
		}

	$florist_data="";
	foreach (glob("art_detail/".$product[0]."/*.jpg") as $filename) {
		$florist_data=$florist_data.
		"<div class='owl-carousel-item'>".
		"	<a href='javascript:void(0);' onclick='show_img_full(\"".$filename."\");' class='disimg'><img src='".$filename."' alt='' /></a>".
		"</div>";    
	}

	if ($florist_data<>"") {
		echo "
				<div class='product_carousel'>
					<div class='dashtitle'><span>Флористика в композиции</span></div>
					<div class='carousel-box'>
						<div class='owl-carousel with-nav'>
		";

		echo $florist_data;

		echo "
						</div>
						<script>
						    $(function() {
							    $('.product_carousel .owl-carousel').owlCarousel({
									smartSpeed : 500,
									items : 4,
								    margin : 20,
									nav : true,
									navText : ['',''],
									dots : false,
									responsive : {
										0 : {
											items : 2,
		                                },
										440 : {
											items : 4,
		                                }
									}
								});
						    });
						</script>
					</div>
				</div>
		";
	}

                //===================================================================
                // подгружаем остатки по городам
                //===================================================================
                $city_price=get_city_price($geo_city_id,$product[0]);

                $status = 0;

                if ($city_price[0]>0)  {
                    if ($city_price[2]>0) {
                        $product[2]=$city_price[1];
                        $product[1]=$city_price[2];
                        $product[3]=$city_price[0];
                        $status = 2;
                    } else {
                        $product[2]=0;
                        if ($city_price[1]>0) {
                            $product[1]=$city_price[1];
                        }
                    }

                }
                //-------------------------------------------------------------------
                // подгружаем остатки по городам
                //===================================================================

                //---------------------------------
                // Старая цена
                //---------------------------------
                //number_format($rest[$rest_i][2],0,'',' ')." ₽
                if ($product[2]>0) {
                    $new_price="<span class=\"fs_24 color_red\">".number_format($product[1],0,'',' ').' ₽</span>';
                    $old_price="<s class='fs_30'>".number_format($product[2],0,'',' ')." ₽ </s>&nbsp;&nbsp;&nbsp;";
                } else {
                    $new_price='';
                    $old_price="<div class='fs_30'>".number_format($product[1],0,'',' ')." ₽</div>";
                }

                //---------------------------------
                ?>

				<div class="visible-xs">
					<div class="m-b-5"></div>
					<div class="pull-left">
						<? echo $old_price; ?>
						<? echo $new_price; ?>
						<div class="m-b-2 hidden-lg"></div>
					</div>
					<div class="pull-right">

                        <? if ($status == 2 || $product[3]): ?>
                            <ul class="list-inline m-b-0">
							<li>
								<div class="counter counter_v2" style="width: 60px;">
									<a class="minus fa fa-angle-down" href="#"></a>
									<a class="plus fa fa-angle-up" href="#"></a>
									<input class="form-control text-center" type="text" value="1" />
								</div>
							</li>
							<li>
								<a href="javascript:recycled_add(<?=$product[0]?>)" class="btn btn-default"><span class="type-link">В корзину</span></a>
							</li>
						</ul>
                        <? else: ?>
                            <span style="font-size: 18px">Нет в наличии</span>
                        <? endif; ?>

					</div>
					<div class="clearfix"></div>
				</div>


                <div class="row row_10 hidden-xs">

                    <?
//                    if ($status == 0) {
//                        echo '
//                        <div class="col-xs-6 col-lg-4 mart_7">
//                            <span style="font-size: 18px">Нет в наличии</span>
//                        </div>';
//                    } else {
//                        echo '
//                        <div class="col-xs-3 col-lg-2 mart_7">
//                            <div class="counter counter_v2">
//                                <a class="minus fa fa-angle-down" href="#"></a>
//                                <a class="plus fa fa-angle-up" href="#"></a>
//                                <input class="form-control text-center" type="text" value="1" id="product_count" />
//                            </div>
//                        </div>
//                        <div class="col-xs-6 col-lg-4 mart_7">
//                            <a href="javascript:recycled_add(' . $product[0] . ')" class="btn btn-block btn-default"><span class="type-link">В корзину</span></a>
//                        </div>';
//                    }
                    ?>

                </div>

			</div>
			<div class="col-sm-5">
				<div class="m-b-3 visible-xs"></div>
				<ul class="marb_20 list-inline">
				<?
					if ($product[14]==1) { echo "<li><span class='mark_bg_red'>новинка</span></li> "; }

//					if ($status == 2)  { echo "<li><span class='color_gray'>в наличии</span></li> "; }
//                    elseif ($product[3]) { $status = 1; echo "<li><span class='color_gray'>под заказ до 5 дней</span></li>"; }
//                    else { echo "<li><span class='color_gray'>нет в наличии</span></li>"; }
				?> 				
				</ul>

				<div class="lh-2">
					<div class="m-b-2">
						<div class="product-title">
							<div class="a"><? echo $product[6]; ?></div>
							<div class="b"><? echo $product[11]; ?></div>
							<div class="c">арт: <? echo $product[0]; ?></div>						
						</div>
					</div>

					<dl class="m-b-2">
						<dt class="fs_16">Флористика:</dt>
						<dd>Основные цветы: <span class="color_gray"><? echo $product[23]; ?></span></dd>
						<dd>Дополнительные растения: <span class="color_gray"><? echo $product[24]; ?></span></dd>
					</dl>

					<dl class="m-b-2">
						<dt class="fs_16">Ваза:</dt>
						<dd>Размеры: <span class="color_gray"><? echo $product[15]." x ".$product[16]." x ".$product[17]." см."; ?></span></dd>
						<dd>Форма: <span class="color_gray"><? echo $product[20]; ?></span></dd>
						<dd>Материал: <span class="color_gray"><? echo $product[21].$add_info_extglass; ?></span></dd>
					</dl>

					<div class="m-b-5">
						<div class="fs_16"><strong>Описание:</strong></div>
						<div class="color_gray">
							<? echo $product[25]; ?>
						</div>
					</div>
				</div>

				<div class="mtitle m-b-2"><strong class="fs_16">В другом цвете</strong></div>

				<div class="m-b-4">
					<div class="carousel-color owl-carousel with-nav">
                    <?
                        // в другом цвете
                        $other=get_other_color($product[10],$product[0],$geo_country_id);
                        $other_size=count($other);
                        for ($other_i=0;$other_i<$other_size;$other_i++) {
                            if ($other[$other_i][0]>0) {
                                $photo="art_250/".$other[$other_i][0].".jpg";
                                if (!file_exists($photo)) {
                                    $photo="art_250/none.jpg";
                                }
                                echo "<div class='owl-carousel-item'><a class='disimg' href='product.php?art=".$other[$other_i][0]."'><img src='$photo' alt='' /></a></div>";
                            }
                        }
                        // END в другом цвете
                    ?>
					</div>
					<script>
					    $(function() {
						    $(".carousel-color").owlCarousel({
								smartSpeed : 500,
								items : 4,
								nav : true,
								navText : ['',''],
								dots : false,
								responsive : {
									0 : {
										items : 2,
	                                },
									440 : {
										items : 4,
	                                },
									768 : {
										items : 2,
	                                },
									992 : {
										items : 4,
	                                },
								}
							});
					    });
					</script>
				</div>



				<div class="row row_10 hidden-xs">
					<div class="col-lg-6">
			<?
					//---------------------------------
					// Старая цена
					//---------------------------------
					//number_format($rest[$rest_i][2],0,'',' ')." ₽
					if ($product[2]>0) {
							$new_price=number_format($product[1],0,'',' ').' ₽ ';
							$old_price="<s class='fs_30'>".number_format($product[2],0,'',' ')." ₽ </s>";
						} else {
							$new_price='';
							$old_price="<div class='fs_30'>".number_format($product[1],0,'',' ')." ₽</div>";
					}

					echo $old_price;

					//---------------------------------
			?>

						&nbsp;&nbsp;&nbsp;
						<span class="fs_24 color_red"><? echo $new_price; ?></span>
						<div class="m-b-2 hidden-lg"></div>
					</div>

                    <?
//                    if ($status == 0) {
//                        echo '
//                        <div class="col-xs-6 col-lg-4 mart_7">
//                            <span style="font-size: 18px">Нет в наличии</span>
//                        </div>';
//                    } else {
                        echo '
                        <div class="col-xs-3 col-lg-2 mart_7">
                            <div class="counter counter_v2">
                                <a class="minus fa fa-angle-down" href="#"></a>
                                <a class="plus fa fa-angle-up" href="#"></a>
                                <input class="form-control text-center" type="text" value="1" id="product_count" />
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-4 mart_7">
                            <a href="javascript:recycled_add(' . $product[0] . ')" class="btn btn-block btn-default"><span class="type-link">В корзину</span></a>
                        </div>';
//                    }
                    ?>

				</div>

			</div>
		</div>
		<div class="marb_30"></div>

		<div class="marb_30">
			<div class="dashtitle"><span>Другие формы ваз</span></div>
			<div class="scrollbar">
				<div class="shd_left"></div>
				<div class="shd_right"></div>
				<ul class="scrollbar_list">
			<?
				//======================================================================
				// формы ваз
				$other=get_other_forms($product[5],$product[10],$geo_country_id);
				$other_size=count($other);
				for ($other_i=0;$other_i<$other_size;$other_i++) {

					// ВРЕМЕННАЯ ЗАГЛУШКА БЕЗ КАРТИНОК
					if (!file_exists("art_250/".$other[$other_i][0].".jpg"))
						continue;

					$photo="art_250/".$other[$other_i][0].".jpg";
					if (!file_exists($photo)) {
						$photo="art_250/none.jpg";
					}
					echo "
					<li style='margin-left:40px;'>
						<div class='catalog_item'>
							<div class='disimg'><a href='product.php?art=".$other[$other_i][0]."'><img src='$photo' alt='' /></a></div>
							<div class='link'>
								<a href='product.php?art=".$other[$other_i][0]."'><span>".$other[$other_i][4]."</span> ".$other[$other_i][7]."</a>
							</div>
							<div class='size'>Размеры: ".$other[$other_i][8]." х ".$other[$other_i][9]." х ".$other[$other_i][10]." см.</div>
							<div class='price'>
								".number_format($other[$other_i][1],0,'',' ')." ₽
							</div>
						</div>
					</li>
					";
				}
				// формы ваз
				//======================================================================
			?>
				</ul>
			</div>
			<script>
			    $(function(){
		            $(".scrollbar").mCustomScrollbar({
			            axis:"x",
			            scrollButtons:{
				            enable : true,
				            scrollAmount : 10
			            },
			            mouseWheel:{ scrollAmount : 100 },
			            advanced:{autoExpandHorizontalScroll:true},
			            autoDraggerLength: false
		            });
			    });
			</script>
		</div>

	</div>

	<div class="product_advantage">
		<div class="head">
			Преимущества оформления заказа на сайте Fi’ora
			<span class="arrow"></span>
		</div>
		<div class="body">
			<div class="container">
				<div class="row row_50">
					<div class="col-sm-6">
						<div class="icon ico_24">
							<div class="ico top"><img src="images/tick24.png" alt="" /></div>
							<div class="title">Уверенность в подлиности</div>
							При заказе с сайта fiora-rf, вы гарантированно получаете подлинную
							композициию «Фиора», так как мы являемся <a href="#">официальными представителями
							ТМ Fi’ora на территории РФ</a>.
						</div>
					</div>
					<div class="col-sm-6">
						<div class="icon ico_24">
							<div class="ico top"><img src="images/tick24.png" alt="" /></div>
							<div class="title">Уверенность в подлиности</div>
							При заказе с сайта fiora-rf, вы гарантированно получаете подлинную
							композициию «Фиора», так как мы являемся <a href="#">официальными представителями
							ТМ Fi’ora на территории РФ</a>.
						</div>
					</div>
				</div>
				<div class="m-b-3"></div>
				<div class="row row_50">
					<div class="col-sm-6">
						<div class="icon ico_24">
							<div class="ico top"><img src="images/tick24.png" alt="" /></div>
							<div class="title">Гарантия качественной доставки</div>
							Мы сотрудничаем только с проверенными транспортными компаниями.
							Композиции «Фиора» надёжно упакованны в плотную коробку, тем самым
							гисключает брак при транспортировке.
						</div>
					</div>
					<div class="col-sm-6">
						<div class="icon ico_24">
							<div class="ico top"><img src="images/tick24.png" alt="" /></div>
							<div class="title">Гарантия качественной доставки</div>
							Мы сотрудничаем только с проверенными транспортными компаниями.
							Композиции «Фиора» надёжно упакованны в плотную коробку, тем самым
							гисключает брак при транспортировке.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="dashtitle"><span>Улучшить впечатление легко</span></div>
		<div class="ofl">
			<div class="m-b-5 row row_30">
				<div class="col-sm-6">
					<div class="m-b-2">
						<div class="pull-left">Оригинальная брендовая коробка Fi’ora</div>
						<div class="pull-right">1350 р.</div>
						<div class="clearfix"></div>					
					</div>
					<div class="addprodbox">
						<div class="disimg"><img src="images/product/box.png" alt="" /></div>
						<!--
						<div class="mark_bottom_left">
							<a href="#" class="btn btn-default"><span class="type-link">Добавить</span></a>
						</div>
						-->
					</div>
				</div>
				<div class="col-sm-6">
					<div class="m-b-5 visible-xs"></div>
					<div class="m-b-2">
						<div class="pull-left">Лимитированная упаковка с подарочным комплектом <span class="color_orange">L'Occitane</span></div>
						<div class="pull-right">1540 р.</div>
						<div class="clearfix"></div>
					</div>
					<div class="addprodbox">
						<div class="disimg"><img src="images/product/llc.png" alt="" /></div>
						<!--
						<div class="mark_bottom_left">
							<a href="#" class="btn btn-default"><span class="type-link">Добавить</span></a>
						</div>
						-->
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!--bg_white-->

<?
	// ----------   META  ------------------------
	require_once ( "html_footer.php"     );
	// ===========================================
?>