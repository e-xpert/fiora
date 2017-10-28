<?
//---------  VAR  ---------------------------
$VAR_title='Корзина';
//===========================================

$temp_box_price=1000;
$temp_lavanda_price=1500;

$temp_box_name="Подарочная упаковка";
$temp_lavanda_name="Упаковка с подарочным комплектом LOccitane";

$temp_box_size="Размеры: 10 х 15 х 24 см.";
$temp_lavanda_size="Размеры: 20 х 25 х 54 см.";

//---------  PHP  ---------------------------
require_once ( "php/require_files.php");
require_once ( "php/product.php");
//=============================================

$HEAD_inject = '
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />

	<script type="text/javascript" src="js/jcarousel.js"></script>
';

$HEAD_require =	array("js/basket.php");

// ----------   HEAD  ----------------------
require_once ( "html_head.php");
// ===========================================
?>

<body onload="get_summ();">
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
				<div class="fs_18">
					Оформление заказа

					<? if ($time = get_reserve_time($session_name)): ?>
					<font color="grey" style="font-size: 15px;">
						(Зарезервировано до <?= date('H:i d.m.Y', strtotime($time)) ?> (мск))
					</font>
					<? endif; ?>

				</div>
			</div>
			<div class="col-xs-12 col-sm-6 text-right fs_16 hidden-xs">
				<span class="tooltips top left">
					<a href="catalog.php" class="type-link">Каталог композиций</a>
					<div class="tooltips_box">
						<div class="tooltips_box_arr"></div>
						<div class="tooltips_box_body fs_14 text-left">
							<i>Посмотреть весь ассортимент композиций Fi'ora</i>
						</div>
					</div>
				</span>
			</div>
		</div>
<?
$total =0;
$basket=get_basket($session_name);
$basket_size=count($basket);
for ($basket_i=0;$basket_i<$basket_size;$basket_i++) {
	$product_artikul=$basket[$basket_i][2];
	$product_count=$basket[$basket_i][3];
	$product=get_product($product_artikul,$geo_country_id);


	//===================================================================
	// подгружаем остатки по городам
	//===================================================================
	$city_price=get_city_price($geo_city_id,$product[0]);
	$city_rest_rest=$city_price[0];
	$city_rest_price=$city_price[1];
	$city_rest_price_new=$city_price[2];
	if ($city_rest_rest>0)  {
		if ($city_rest_price_new>0) {
			$product[2]=$city_rest_price;
			$product[1]=$city_rest_price_new;
		} else {
			$product[2]=0;
			if ($city_rest_price>0) {
				$product[1]=$city_rest_price;
			}										
		}
	}
	//-------------------------------------------------------------------
	// подгружаем остатки по городам
	//===================================================================


	// специальная цена
	if ($product[2]>0) {
		$product_price=$product[1];
		$product_price_special='';
	} else {
		$product_price=$product[1];
		$product_price_special='display:none;';
	}
	// упаковка
	if ($product[18]==1) {
		$product_upak='';
	} else { $product_upak='display:none;'; }
	// лаванда
	if ($product[19]==1) {
		$product_lavanda='';
	} else { $product_lavanda='display:none;'; }


$photo="art_120/".$product[0].".jpg";
if (!file_exists($photo)) {
	$photo="art_120/none.jpg";
}

echo "

<div class='cart-item'>
			<div class='cart-box'>
				<div class='media cart-line'>
					<div class='media-left media-middle'>
						<div class='media cart-catitem'>
							<div class='media-left'>
								<img width='120' src='".$photo."' alt=''>
							</div>
							<div class='media-body media-middle'>
								<a href='product.php?art=".$product[0]."'>".$product[6]."<br><font color='grey'>".$product[11]."</font></a>
								<div class='mart_10 color_gray'>Размеры: ".$product[15]." x ".$product[16]." x ".$product[17]." см.</div>
							</div>
						</div>
					</div>
					<div class='media-body media-middle'>
						<div class='xs-scroll'>
						<table class='basket-table'>
							<tbody><tr>
								<td class='color_gray'>стоимость</td>
								<td class='color_gray'>количество</td>
								<td class='color_gray'>сумма</td>
								<td rowspan='2'><a href='javascript:recycled_del(".$product[0].");' class='closes'></a></td>
							</tr>
							<tr>
								<td width='30%'>
									<div class='fs_20 nowrap' id='product_price_".$product[0]."' data-price='".$product_price."'>".$product_price." ₽</div>
									<br>
									<span style='".$product_price_special."' class='mark_price'>специальная цена</span>
								</td>
								<td width='30%'>
									<div class='counter counter_v1 img-center'>
										<a onclick='artikul_minus(".$product[0].");' href='' class='minus' data-artikul='".$product[0]."'></a>
										<a onclick='artikul_plus(".$product[0].");' href='' class='plus' data-artikul='".$product[0]."'></a>
										<input type='text' id='product_count_".$product[0]."' value='".$product_count."'>
									</div>
								</td>
								<td width='30%'>
									<div class='fs_20 nowrap allsumm' data-artikul='".$product[0]."' data-prodsum='".($product_price*$product_count)."' id='product_summa_".$product[0]."'>".number_format($product_price*$product_count,0,'',' ')." ₽</div>
									<div class='mart_5 fs_12 color_gray' id='delivery_free'></div>
								</td>
							</tr>
						</tbody></table>
						</div>
					</div>
				</div>
				";

	$total += $product_price*$product_count;
//-------------------------------------------------------------------
// Упаковка

$temp_box_style="display:none;";

if ($basket[$basket_i][4]>0) {
	$temp_box_style="";
	$temp_box_name=$temp_box_name;
	$temp_box_size=$temp_box_size;
	$temp_box_price=$temp_box_price;
	$temp_box_count=$basket[$basket_i][4];
	$temp_box_summa=$temp_box_count*$temp_box_price;
	// тип упаковки 1-бокс, 2-лаванда
	$temp_box_type=1;
}

if ($basket[$basket_i][5]>0) {
	$temp_box_style="";
	$temp_box_name=$temp_lavanda_name;
	$temp_box_size=$temp_lavanda_size;
	$temp_box_price=$temp_lavanda_price;
	$temp_box_count=$basket[$basket_i][5];
	$temp_box_summa=$temp_box_count*$temp_box_price;
	$temp_box_type=2;
}

		echo "
				<div style='display:none;' id='box_type_".$product[0]."' data-type='".$temp_box_type."'></div>

				<div class='mart_15 hr' id='box_hr_".$product[0]."' style='".$temp_box_style."'></div>
				<div class='media cart-line' id='box_data_".$product[0]."' style='".$temp_box_style."'>
					<div class='media-left media-middle'>
						<div class='media cart-catitem'>
							<div class='media-left'>
								<img width='120' src='images/examples/img027.png' alt='' />
							</div>
							<div class='media-body media-middle'>
								<span id='box_name_".$product[0]."'>".$temp_box_name."</span>
								<div id='box_size_".$product[0]."' class='mart_10 color_gray'>".$temp_box_size."</div>
							</div>
						</div>
					</div>
					<div class='media-body media-middle'>
						<div class='xs-scroll'>
						<table class='basket-table basket-table-td'>
							<tr>
								<td width='30%'>
									<div class='fs_20 nowrap' id='box_price_".$product[0]."' data-price='".$temp_box_price."'>".$temp_box_price." ₽</div>
								</td>
								<td width='30%'>
									<div class='counter counter_v1 img-center'>
										<a onclick='box_minus(".$product[0].");' href='' class='minus' data-artikul='".$product[0]."'></a>
										<a onclick='box_plus(".$product[0].");' href='' class='plus' data-artikul='".$product[0]."'></a>
										<!--
										<a href='#' class='minus'></a>
										<a href='#' class='plus'></a>
										-->
										<input type='text' id='box_count_".$product[0]."' value='".$temp_box_count."'>
									</div>
								</td>
								<td width='30%'><div class='fs_20 nowrap allsumm' data-artikul='".$product[0]."' data-boxsum='".$temp_box_summa."' id='box_summa_".$product[0]."'>".number_format($temp_box_summa,0,'',' ')." ₽</div>
								<div class='mart_10 color_gray' style='font size=12px;' id='box_delivery_summa_".$product[0]."' data-delivery='0'></div>
								</td>
								<td><a class='closes' onclick='del_box(".$product[0].");'></a></td>
							</tr>
						</table>
						</div>
					</div>
				</div>
";

// упаковка
//==============================================================================
echo "
			</div>

			<div class='cart-line-bottom'>
				<ul class='list-inline'>
					<li style='".$product_upak."'>
						<div class='tooltips top right' style=''>
							<!-- <div class='icon ico_24' onclick='add_box(".$product[0].");'> -->
							<div class='icon ico_24'>
								<div class='ico'><img src='images/icons/add_24.png' alt=''></div>
								Добавить подарочную коробку
							</div>
							<div class='tooltips_box'>
								<div class='tooltips_box_arr'></div>
								<div class='tooltips_box_body'>
									К сожалению в вашем городе<br>
									коробки в наличии временно нет
								</div>
							</div>
						</div>
					</li>
					<li style='".$product_lavanda."'>";

//						<a href='javascript:false' class='icon ico_24'  onclick='add_lavanda(".$product[0].");'><i class='ico'><img src='images/icons/add_24.png' alt=''></i>Добавить лимитированнную упаковку с подарочным комплектом <span class='color_orange'>L'Occitane</span></a>
//						&nbsp;
//						<a href='#' class='infomodal-button' data-target='#loccitane'><img src='images/icons/qwes.png' alt=''></a>
echo "
						<!-- Временно убирается отображение коробки -->
						<div class='tooltips top right' style=''>
							<div class='icon ico_24'>

								<i class='ico'><img src='images/icons/add_24.png' alt=''></i>Добавить лимитированнную упаковку с подарочным комплектом <span class='color_orange'>L'Occitane</span>
							</div>
							<div class='tooltips_box'>
								<div class='tooltips_box_arr'></div>
								<div class='tooltips_box_body'>
									К сожалению в вашем городе<br>
									коробки в наличии временно нет
								</div>
							</div>
						</div>
						<!-- // -->

					</li>
				</ul>
			</div>
</div>
";
}

?>
		<div class="media">
			<div class="media-left media-left-lg media-middle"><img src="images/examples/img028.png" alt="" /></div>
			<div class="media-body media-bottom">
				<div class="fs_12 color_gray">
<!--					Стоимость доставки по территории России является единной в зависимости от формы вазы.<br />-->
<!--					Логистический центр Fi’ora определяет ближайший пункт отгрузки в зависимости от вашего населённгого пункта.<br />-->
<!--					Узнать <a href="#" data-toggle="modal" data-target="#modal_delivery">сроки доставки</a>.-->

					<br />
                    Доставка в городах Москва, Екатеринбург, Новосибирск, Кемерово, Томск осуществляется курьерами,
                    стоимость является единой к заказу. В другие города России доставка осуществляется транспортными компаниями
                    от ближайшего к вам пункта отгрузки (более 30 пунктов, срок доставки обычно – не более 5 дней).

                    <!-- <b>Заказы к «8 Марта» в указанных городах доставляются в определенные дни:</b>
                    3, 4, 6, 7 марта в течение рабочего дня по согласованию с менеджером.
                    8 марта доставка будет осуществляться с 10:00 до 16:00 по местному времени.<br /> -->

                </div>
			</div>
		</div>
		<div class="m-b-4"></div>
		<div class="m-b-5">
			<div class="pull-left">
				<div class="m-b-05"></div>
				<div id='promo_good' style='display:none;' data-promo='0'></div>
				<ul class="m-b-0 list-inline list-inline-top" id='promo_div'>
					<li id='promo_error'>
						<input id='promo_code' class="form-control" type="text" value="" placeholder="У вас есть промокод?" />
						<div id='promo_error_text' class="help-block text-center" style='display:none;'><small>Промокод не существует</small></div>
					</li>
					<li><button id='promo_code_button' onclick="get_promo();" type="submit" class="btn btn-default" style="height: 34px"><i class="fa fa-angle-right"></i></button></li>
				</ul>
			</div>
			<div class="pull-right">
				<ul class="m-b-0 list-unstyled text-right">
					<li class="color_gray">Сумма за товар: <span id='products_summa'>0</span></li>
					<li class="color_gray">Сумма доставки:

                        <?
                        // 1503901 - кемерово
                        // 1489425 - томск
                        // 1496747 - новосиб
                        // 524901  - москва
                        // 1486209 - екб
                        //geo_city_id

                        $main_city_ids = array(1503901, 1489425, 1496747, 524901, 1486209);

                        if (in_array($geo_city_id, $main_city_ids)) {
                            $delivery_default_summa = $geo_city_id == 524901 ? 450 : 350;
							$delivery_summa = $total > 8000 ? 0 : $delivery_default_summa;
                            echo '<span id="delivery_summa" data-delivery_default_summa="' . $delivery_default_summa . '" data-delivery_summa="' . $delivery_summa . '">' . $delivery_summa . ' ₽</span>';
                        } else {
                            echo 'расчету ТК';
                        }
                        ?>

                        </li>
					<li class="fs_24">Сумма заказа: <span id='order_summa' data-order_summa="">0</span></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>

<!--
		<div class="add-postcard">
			<div class="postcard"></div>
			<a href="#">Добавить фирменную открытку Fi’ora</a>
		</div>
-->		

		<div class="m-b-3 fs_16" id='to_err'><strong>Оплата и доставка</strong></div>
		<div class="inset">
			<div class="inset-links">
				<ul class="list-unstyled m-b-2">
					<li class="radio">
						<label><input id='send_me' type="radio" name="radio-inset" value="0" /> Я получатель заказа</label>
					</li>
					<li class="radio">
						<label><input id='send_to' type="radio" name="radio-inset" value="1" /> Доставить другому получателю</label>
					</li>
					<li id='send_to_error_text' style='display:none;'>
						<div class="help-block text-left"><small><font color='#a94442'>Необходимо указать получателя</font></small></div>
					</li>					
				</ul>
			</div>
			<div class="m-b-3 inset-boxes">
				<div class="inset-box">
					<div class="m-b-2 hr"></div>
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="m-b-1 fs_16"><strong>Контактные данные</strong></div>
							<div class="m-b-2 inpbox">
								<input id='name_1' onblur="check_input();" class="form-control" type="text" value="" placeholder="Имя Фамилия" />
								<span class="required">*</span>
							</div>
							<div class="m-b-2 inpbox">
								<input id='phone_1' onblur="check_input();" class="form-control phone-mask" type="text" value="" placeholder="+7(___)___-__-__" />
								<span class="required">*</span>
							</div>
							<div class="m-b-2 inpbox">
								<input id='email_1' onblur="check_input();" class="form-control" type="text" value="" placeholder="e-mail" />
								<span class="required">*</span>
							</div>
						</div>
					</div>

					<div class="m-b-2 hr"></div>
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="m-b-1 fs_16"><strong>Адрес доставки</strong></div>
							<div class="m-b-2 inpbox">
								<input id='city_1' onblur="check_input();" class="form-control" type="text" value="" placeholder="Город" />
								<span class="required">*</span>
							</div>
							<div class="m-b-2 inpbox">
								<input id='street_1' onblur="check_input();" class="form-control" type="text" value="" placeholder="Улица" />
								<span class="required">*</span>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="m-b-2">
										<input id='house_1' onblur="check_input();" class="form-control" type="text" value="" placeholder="Дом" />
									</div>
								</div>
								<div class="col-sm-6">
									<div class="m-b-2 inpbox">
										<input id='room_1' onblur="check_input();" class="form-control" type="text" value="" placeholder="Квартира/офис" />
										<span class="required">*</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="m-b-2 hr"></div>
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="m-b-1 fs_16"><strong>Коментарии</strong></div>
							<div class="m-b-2">
								<textarea id='comment_1' class="form-control" name="" id="" cols="30" rows="10" onblur="check_input();"></textarea>
							</div>
							Поля отмеченные <span class="color_red">*</span> обязательны для заполнения
						</div>
					</div>
				</div><!--inset-box-->
				<div class="inset-box">
					<div class="m-b-2 hr"></div>
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="m-b-1 fs_16"><strong>Данные получателя</strong></div>
							<div class="m-b-2 inpbox">
								<input id='name_2' onblur="check_input();" class="form-control" type="text" value="" placeholder="Имя Фамилия" />
								<span class="required">*</span>
							</div>
							<div class="m-b-2 inpbox">
								<input id='phone_2' onblur="check_input();" class="form-control phone-mask" type="text" value="" placeholder="+7(___)___-__-__" />
								<span class="required">*</span>
							</div>
						</div>
					</div>
					<br />
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="m-b-1 fs_16"><strong>Ваши контактные данные</strong></div>
							<div class="m-b-2 inpbox">
								<input id='name_3' onblur="check_input();" class="form-control" type="text" value="" placeholder="Имя Фамилия 3" />
								<span class="required">*</span>
							</div>
							<div class="m-b-2 inpbox">
								<input id='phone_3' onblur="check_input();" class="form-control phone-mask" type="text" value="" placeholder="+7(___)___-__-__" />
								<span class="required">*</span>
							</div>
							<div class="m-b-2 inpbox">
								<input id='email_2' onblur="check_input();" class="form-control" type="text" value="" placeholder="e-mail" />
								<span class="required">*</span>
							</div>
						</div>
					</div>

					<div class="m-b-2 hr"></div>
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="m-b-1 fs_16"><strong>Адрес доставки</strong></div>
							<div class="m-b-2 inpbox">
								<input id='city_2' onblur="check_input();" class="form-control" type="text" value="" placeholder="Город" />
								<span class="required">*</span>
							</div>
							<div class="m-b-2 inpbox">
								<input id='street_2' onblur="check_input();" class="form-control" type="text" value="" placeholder="Улица" />
								<span class="required">*</span>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="m-b-2">
										<input id='house_2' onblur="check_input();" class="form-control" type="text" value="" placeholder="Дом" />
									</div>
								</div>
								<div class="col-sm-6">
									<div class="m-b-2 inpbox">
										<input id='room_2' onblur="check_input();" class="form-control" type="text" value="" placeholder="Квартира/офис" />
										<span class="required">*</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="m-b-2 hr"></div>
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="m-b-1 fs_16"><strong>Коментарии</strong></div>
							<div class="m-b-2">
								<textarea id='comment_2' class="form-control" name="" id="" cols="30" rows="10"></textarea>
							</div>
							Поля отмеченные <span class="color_red">*</span> обязательны для заполнения
						</div>
					</div>
				</div><!--inset-box-->
			</div>
		</div><!--inset-->
		
		<div class="m-b-3 hr"></div>

		<div class="m-b-2 fs_16"><strong>Способ оплаты</strong></div>











				<div class='m-b-1' id='pay_type' data-pay_type='1'>
					<div class='radio'>
						<label><input id='pay_type_1' type='radio' name='pay' value='1' checked /> Оплата курьеру наличными</label>
					</div>
				</div>



<?
/*

		if (in_array($geo_city_id, $main_city_ids)) {
			echo "
				<div class='m-b-1' id='pay_type' data-pay_type='2'>
					<div class='radio'>
						<label><input id='pay_type_1' type='radio' name='pay' value='1' checked /> Оплата курьеру наличными</label>
					</div>
				</div>
				<div class='m-b-1'>
					<div class='radio'>
						<label><input id='pay_type_2' type='radio' name='pay' value='2' /> Онлайн оплата</label>
					</div>
				</div>
			";
		} else {
			echo "
				<div class='m-b-1' id='pay_type' data-pay_type='2'>
					<div class='radio'>
						<label><input type='radio' name='pay' value='1' checked/> Онлайн оплата</label>
					</div>
				</div>
			";			
		}
*/
?>
		
        <?php /*
		<div class="m-b-2 fs_12">
			Процессинговый центр Robokassa – это высоконадежный сервис по приему платежей. Все данные, введенные Вами на платежной форме процессингового центра Robokassa, полностью защищены в соответствии с требованиями стандарта безопасности PCI DSS. Мы получаем информацию только о совершенном Вами платеже.
		</div>
		<div class="m-b-2"><img src="images/examples/img029.png" alt="" /></div>
        */?>
		<div class="m-b-3 hr"></div>

		<div class="m-b-2">
			<div class="checkbox">
				<label><input id='agree' type="checkbox" name="agree" value="1" checked /> Я ознакомлен и согласен с <a href="#" data-toggle="modal" data-target="#modal_oferta">условиями оферты</a></label>
			</div>
            <div id='agree_error_text' style='display:none;'>
                <div class="help-block text-left"><small><font color='#a94442'>Необходимо принять условие оферты</font></small></div>
            </div>
		</div>

		<div class="m-b-2">
			<div class="checkbox">
				<label><input id='spam' type="checkbox" name="spam" value="1" checked /> Подпистаться на новости и выгодные предложения.</label>
			</div>
		</div>		

		<div class="m-b-3">
			<div class="m-b-1 fs_12">Итого к оплате: <span id='itogo'>0</span> Р</div>
			<button id='button_buy' class="btn btn-danger btn-lg">Оформить заказ</button>
		</div>

	</div>

</div><!--bg_white-->

<!-- Modal -->
<div class="modal fade" id="modal_feedback" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<a href="#" class="cross" data-dismiss="modal" aria-label="Close"></a>
				<div class="modal-title text-center color_black">Оставить отзыв</div>
			</div>
			<div class="modal-body">
				В данном окне вы можете оставить отзыв о конкретной торговой точке.
				Нам важно любое ваше мнение, мы открыты для общения. Скаждым вашим письмом мы стараемся стать лучше
				<br /><br />
				<div class="row">
					<div class="col-md-8">
						<div class="marb_5">Торговая точка:</div>
						<div class="m-b-2">
							<select class="form-control" name="select">
								<option>г. Кемерово, ТРК «Лапландия»</option>
								<option>г. Кемерово, ТРК «Лапландия»</option>
								<option>г. Кемерово, ТРК «Лапландия»</option>
							</select>
						</div>
						<div class="m-b-2 has-error">
							<input class="form-control" type="text" value="" placeholder="Имя" />
							<span class="help-block">Необходимо заполнить поле</span>
						</div>
						<div class="m-b-2">
							<input class="form-control phone-mask" type="text" value="" placeholder="+7(___)___-__-__" />
						</div>
						<div class="m-b-2">
							<input class="form-control" type="text" value="" placeholder="Электроная почта" />
						</div>
					</div>
				</div>
				<div class="m-b-2">
					<textarea class="form-control" name="" id="" cols="" rows="7" placeholder="Сообщение"></textarea>
				</div>
				<div class="text-right">
					<button class="btn btn-default"><span class="type-link">Отправить</span></button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_oferta" tabindex="-1" role="dialog" aria-labelledby="modal_oferta">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="cross" data-dismiss="modal" aria-label="Close"></a>
                <div class="modal-title">Публичная оферта</div>
            </div>
            <div class="modal-body">

                <?@include 'inc/oferta.php';?>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_delivery" tabindex="-1" role="dialog" aria-labelledby="modal_delivery">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<a href="#" class="cross" data-dismiss="modal" aria-label="Close"></a>
				<div class="modal-title">Сроки доставки</div>
			</div>
			<div class="modal-body">

				Доставка продукции ТМ Fi’ora осуществляется ведущими курьерскими службами, зарекомендовавшими себя, как надежные перевозчики, соблюдающие установленные сроки доставки и обеспечивающие сохранность продукции.
				<br /><br />
				Доставка заказов осуществляется во все города России.<br />
				Стоимость доставки рассчитывается по тарифам курьерской службы при оформлении заказа на сайте с   учётом региона доставки и веса заказа. Доставка оплачивается курьеру в момент получения заказа.<br />
				Условия оплаты доставки товара в пользу третьего лица согласовываются индивидуально с менеджером клиентской службы Fi’ora.<br />
				Доставка заказов курьерской службой «DPD» осуществляются только в будние дни с 09.00 до 18.00.<br />
				В таблице указаны максимальные сроки и стоимость доставки. Они могут быть скорректированы в меньшую сторону, в зависимости от наличия заказа в ближайших к Вам региональных складах продукции Fi’ora.
				<br /><br />
				Точные срок и стоимость доставки уточняйте у менеджеров Fi’ora по телефону 8-800-550-83-88.<br />
				Доставка продукции ТМ Fi’ora осуществляется ведущими курьерскими службами, зарекомендовавшими себя, как надежные перевозчики, соблюдающие установленные сроки доставки и обеспечивающие сохранность продукции.
				<br /><br />
				Доставка заказов осуществляется во все города России.<br />
				Стоимость доставки рассчитывается по тарифам курьерской службы при оформлении заказа на сайте с   учётом региона доставки и веса заказа. Доставка оплачивается курьеру в момент получения заказа.<br />
				Условия оплаты доставки товара в пользу третьего лица согласовываются индивидуально с менеджером клиентской службы Fi’ora.<br />
				Доставка заказов курьерской службой «DPD» осуществляются только в будние дни с 09.00 до 18.00.<br />
				В таблице указаны максимальные сроки и стоимость доставки. Они могут быть скорректированы в меньшую сторону, в зависимости от наличия заказа в ближайших к Вам региональных складах продукции Fi’ora.
				<br /><br />
				Точные срок и стоимость доставки уточняйте у менеджеров Fi’ora по телефону 8-800-550-83-88.

			</div>
		</div>
	</div>
</div>

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
					<div class="m-b-5 fs_18">Ограниченная серия Fi’ora Lavander Limited Series совместно с L’Occitane</div>
					<img class="img-responsive" src="images/examples/img050.jpg" alt="" />
				</div>
			</div>
			<div class="text-right">
				<a href="#" class="btn btn-default"><span class="type-link">Добавить к вазе</span></a>
			</div>
		</div>
	</div>
</div>




<div style='display:none;'>
	<form id='fmain' method='post' action='robo_form.php'>
		<input id='robo_order' type='hidden' name='InvId' 		value=''>
		<input id='robo_summa' type='hidden' name='OutSum' 		value=''>
		<input id='robo_email' type='hidden' name='Email' 		value=''>		
		<input id='fmain_submit' type='submit'>
	</form>
</div>

<?
	// ----------   META  ------------------------
	require_once ( "html_footer.php"     );
	// ===========================================
?>
