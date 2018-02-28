
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

	<div id="callback">
		<div class="container">
			<div class="row row_10">
				<div class="col-md-5">
					<div class="row row_10">
						<div class="col-sm-6">
							С ВНИМАНИЕМ К ВАШИМ ПОТРЕБНОСТЯМ
						</div>
						<div class="col-sm-6">
							<input id='callback_phone' class="form-control phone-mask" type="text" value="" placeholder="+7(___)___-__-__" />
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="m-b-1 visible-xs visible-sm"></div>
					<div class="row row_10">
						<div class="col-sm-4">
							Выбирите удобное время (Московское)
						</div>
						<div class="col-sm-4">
							<div class="btn-group" data-toggle="buttons">
								<label id='callback_btn_1' class="btn">
									<input id='callback_check_1' type="checkbox" /> 06:00 – 08:00
								</label>
								<label id='callback_btn_2' class="btn">
									<input id='callback_check_2' type="checkbox" /> 08:00 – 10:00
								</label>
								<label id='callback_btn_3' class="btn">
									<input id='callback_check_3' type="checkbox" /> 10:00 – 12:00
								</label>
								<label id='callback_btn_4' class="btn">
									<input id='callback_check_4' type="checkbox" /> 12:00 – 14:00
								</label>
							</div>
							<div class="m-b-1 visible-xs"></div>
						</div>
						<div class="col-sm-4">
							<a href="#bottom" id='callback_order' class="btn btn-block btn-danger">Позвонить</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="footer-separate"></div>
	<div id="footer">
		<div class="container">

<!--			<div class="m-b-3 pathway">-->
<!--				<a href="#"><img src="images/rose.png" alt="" /></a>-->
<!--				<i><img src="images/rarr.png" alt="" /></i>-->
<!--				<a href="#">Каталог</a>-->
<!--				<i><img src="images/rarr.png" alt="" /></i>-->
<!--				<span>Категория</span>-->
<!--			</div>-->

			<div class="row">
				<div class="col-sm-3">
					<dl class="list-unstyled">
						<dt>Это интересно:</dt>
						<dd><a target='_blank' href="https://www.youtube.com/watch?v=X7nKUnART-g">Видео «С Fi’ora в Новый год!»</a></dd>
						<dd><a target='_blank' href="http://www.gifts-expo.com/rus/smi/index.php?divid=3&id=1454">Выставка «Подарки. Осень 2016»</a></dd>
						<!-- <dd><a href="faq.php">FAQ</a></dd> -->
					</dl>
					<div class="m-b-3 visible-xs"></div>
				</div>
				<div class="col-sm-3">
					<dl class="list-unstyled">
						<dt>Социальные сети:</dt>
						<dd><a target='_blank' href="https://vk.com/myfiora">Вконтакте</a></dd>
						<dd><a target='_blank' href="https://www.facebook.com/myfiora">Facebook</a></dd>
						<dd><a target='_blank' href="https://www.instagram.com/my_fiora/">Instagram</a></dd>
						<dd><a target='_blank' href="https://www.youtube.com/channel/UCl8eKE-eSL8LkGRuoyF4B_w">Youtube</a></dd>
						<dd><a target='_blank' href="https://ok.ru/fiorazhivy">Одноклассники</a></dd>
					</dl>
					<div class="m-b-3 visible-xs"></div>
				</div>
				<div class="col-sm-3">
					<dl class="list-unstyled">
						<dt>Способы оплаты:</dt>
						<dd>
							<img class="img-responsive" src="images/pay.png" alt="" />
						</dd>
					</dl>
					<br />
					Вы можете оплатить покупки также <br>
                    <a class="color_blue" href="pay_and_delivery.php">другими способами оплаты</a>
					<div class="m-b-3 visible-xs"></div>
				</div>

				<div class="col-sm-3">
					<ul class="list-unstyled">
							<div class="col-xs-12 col-sm-6 text-right fs_12" style='margin-left:-87px;margin-top:3px;'>
								<span class="tooltips top left">
									<div id='callback_order_show' class="tooltips_box" style='display:none;'>
										<div class="tooltips_box_arr"></div>
										<div class="tooltips_box_body fs_12 text-left">
											Благодарим Вас за оставленную заявку, Консультанты Fi'ora свяжутся с вами в указанный интервал времени.
										</div>
									</div>
								</span>
							</div>
						<li>
							8-800-550-83-88<br />
							звонок по России бесплатный
						</li>
						<li class="hr"></li>
						<!-- li><a href="#" class="callback-button color_blue">Заказать звонок</a></li -->
						<!-- li class="hr"></li -->
						<li><a href="mailto:welcome@fiora-rf.ru" class="color_blue">Написать письмо</a></li>
						<li></li>
						<li><img src="images/footer-logo.jpg" alt="" /></li>
						<li>&copy; 2009 «Fi'ora». Все права защищены</li>
					</ul>
				</div>
			</div>
		</div>
	</div><!--#footer-->

</div>
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

<div class="modal fade" id="modal_cityes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
		    <a href="#" class="cross" data-dismiss="modal" aria-label="Close"></a>
		    <div class="modal-title">Выберите город</div>
		  </div>
		  <div class="modal-body">

			  <div class="row">
				  <div class="col-sm-4">
					  <ul class="list-unstyled m-b-0">
						  <li><a href="#">Амурск</a></li>
						  <li><a href="#">Белозерск</a></li>
						  <li><a href="#">Владикавказ</a></li>
						  <li><a href="#">Гвардейск</a></li>
						  <li><a href="#">Дудинка</a></li>
						  <li><a href="#">Екатеринбург</a></li>
						  <li><a href="#">Кемерово</a></li>
						  <li><a href="#">Красноярск</a></li>
						  <li><a href="#">Москва</a></li>
						  <li><a href="#">Нижний Новгород</a></li>
					  </ul>
				  </div>
				  <div class="col-sm-4">
					  <ul class="list-unstyled m-b-0">
						  <li><a href="#">Амурск</a></li>
						  <li><a href="#">Белозерск</a></li>
						  <li><a href="#">Владикавказ</a></li>
						  <li><a href="#">Гвардейск</a></li>
						  <li><a href="#">Дудинка</a></li>
						  <li><a href="#">Екатеринбург</a></li>
						  <li><a href="#">Кемерово</a></li>
						  <li><a href="#">Красноярск</a></li>
						  <li><a href="#">Москва</a></li>
						  <li><a href="#">Нижний Новгород</a></li>
					  </ul>
				  </div>
				  <div class="col-sm-4">
					  <ul class="list-unstyled m-b-0">
						  <li><a href="#">Амурск</a></li>
						  <li><a href="#">Белозерск</a></li>
						  <li><a href="#">Владикавказ</a></li>
						  <li><a href="#">Гвардейск</a></li>
						  <li><a href="#">Дудинка</a></li>
						  <li><a href="#">Екатеринбург</a></li>
						  <li><a href="#">Кемерово</a></li>
						  <li><a href="#">Красноярск</a></li>
						  <li><a href="#">Москва</a></li>
						  <li><a href="#">Нижний Новгород</a></li>
					  </ul>
				  </div>
			  </div>

		  </div>
		</div>
	</div>
</div>

<a href="#" class="gototop"></a>


<div style='display:none;'>
	<input id='filtered' value='0'>
</div>

<script type="text/javascript" src="js/jquery.validate.min.js" charset="utf-8"></script>
<script type="text/javascript" src="js/additional-methods.min.js" charset="utf-8"></script>
<script type="text/javascript" src="js/messages_ru.min.js" charset="utf-8"></script>
<script type="text/javascript" src="js/script.js"></script>

</div>
<!-- Rating@Mail.ru counter -->
<script type="text/javascript">
var _tmr = window._tmr || (window._tmr = []);
_tmr.push({
    id: "2867314",
    type: "pageView",
    start: (new Date()).getTime()
});
(function(d, w, id) {
    if (d.getElementById(id)) return;
    var ts = d.createElement("script");
    ts.type = "text/javascript";
    ts.async = true;
    ts.id = id;
    ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
    var f = function() {
        var s = d.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(ts, s);
    };
    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else {
        f();
    }
})(document, window, "topmailru-code");
</script>
<noscript>
    <div>
        <img src="//top-fwz1.mail.ru/counter?id=2867314;js=na" style="border:0;position:absolute;left:-9999px;" alt="" />
    </div>
</noscript>
<!-- //Rating@Mail.ru counter -->
</body>
</html>
