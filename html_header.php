<!-- START MODIFY -->
	<div id="header">
		<div class="head-container">
			<div class="inner">
                <div class="authorization">
                    <?php/* if (!isset($_COOKIE['login']) || !$_COOKIE['login']): ?>
                        <span class="link">Акция <i class="fa fa-info-circle"></i></span>
                    <?php else: ?>
                        <span class="link">Акция <i class="fa fa-info-circle"></i></span>
                    <?php endif; */?>
					<div class="drop">
						<div class="disimg"><img src="images/modal-auth-img002.png" alt="" /></div>
                        <?php if (!isset($_COOKIE['login']) || !$_COOKIE['login']): ?>
                            <div class="padd20">
    							<!-- <div class="m-b-2">
    								Зарегистрируйтесь на сайте, чтобы стать участником розыгрыша 30 бесплатных композиций
    								Fi’ora, который будет проведен 31 марта 2017 г.
    							</div> -->
                                <div class="m-b-2">
                                    Регистрация на акцию завершена. Итоги для зарегистрированных участников будут проведены 31 марта 2017 года в прямой онлине трансляции (уведомление о времени посредством sms).
    							</div>
    							<!-- <a href="#" class="btn btn-block btn-lg btn-danger" data-toggle="modal" data-target="#modal_hook">Регистрация</a>
    							<div class="m-b-2"></div> -->
    							<a href="#" class="btn btn-block btn-lg btn-default" data-toggle="modal" data-target="#modal_login">Войти</a>
    						</div>
                        <?php else: ?>
                            <div class="padd20">
    							<div class="m-b-2">
    								Вы уже являетесь участником розыгрыша 30 бесплатных композиций. Дата проведения 31 марта 2017 года.
                                    <a class="color_blue" href="http://myfioracontest.tilda.ws/" target="_blank">Перейти</a>
    							</div>
								<form id="logout" class="form-group" method="post" action="./php/auth.php">
					                <input type="hidden" name="form" value="logout">
					                <input class="btn btn-block btn-lg btn-default" type="submit" name="submit" value="Выйти">
					            </form>
    							<!-- <a href="php/logout.php" class="btn btn-block btn-lg btn-default">Выйти</a> -->
    						</div>
                        <?php endif; ?>
					</div>
				</div>
				<div class="pull-left">
					<ul class="list-inline">
						<li class="logo"><a href="https://<? echo $_SERVER['HTTP_HOST']; ?>"><img src="images/logo.png" alt="" /></a></li>
						<li class="hidden-xs"><div class="sep"></div></li>
						<li>
							<a href="#" class="mainmenu-button">
								<span class="nav"></span>
								<span class="txt">Меню</span>
								<i class="arr"></i>
							</a>
						</li>
						<li class="visible-lg">
							<span class="tooltips bottom right">
								Будьте внимательны к качеству <img src="images/icons/info.png" alt="" />
								<div class="tooltips_box">
									<div class="tooltips_box_arr"></div>
									<div class="tooltips_box_body fs_12">
										Внимание! Выявлены случаи подделки нашей продукции.<br />
										Будьте внимательны к качеству.<br />
										Узнать о наличии Fi'ora в конкретном месте продаж Вы<br />
										можете по единому контактному телефону 8-800-550-83-88.<br />
									</div>
								</div>
							</span>
						</li>
					</ul>
				</div>
				<div class="pull-right">
					<ul class="list-inline">
						<li class="visible-md visible-lg">
							<div class="header-city">
								<div class="city">

<!--									<a href="#" class="type-link">--><?// echo $geo_city_name; ?><!--</a>-->
<!--
									<div class="drop">
										<div class="body">
											<div class="arr"></div>
											<div class="m-b-1">
												Город определился не верно?<br />
												Введите правильный город.
											</div>
											<div class="input">
												<input type="text" value="Ново" />
												<div class="input-drop">
													<ul>
														<li>
															<a href="#" class="overlink"></a>
															<div class="obl">Новосибирская обл.</div>
															Новосибирск
														</li>
														<li>
															<a href="#" class="overlink"></a>
															<div class="obl">Новосибирская обл.</div>
															Новосибирск
														</li>
														<li>
															<a href="#" class="overlink"></a>
															<div class="obl">Новосибирская обл.</div>
															Новосибирск
														</li>
														<li>
															<a href="#" class="overlink"></a>
															<div class="obl">Новосибирская обл.</div>
															Новосибирск
														</li>
														<li>
															<a href="#" class="overlink"></a>
															<div class="obl">Новосибирская обл.</div>
															Новосибирск
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									-->
								</div>
								<!--
									<a href="#" data-toggle="modal" data-target="#modal_cityes">Посмотреть в ближайших городах</a>
								-->
							</div>
						</li>
						<!--
						<li class="visible-md visible-lg">
							<div class="header-place">
								<i class="fa fa-map-marker color_red"></i>
								<div>1. ТРЦ «Лапландия», 1 этаж; <a href="#">2. ...</a></div>
								<a href="#" data-toggle="modal" data-target="#modal_feedback">Оставить отзыв</a>
							</div>
						</li>
						-->
                        <li class="visible-sm visible-md visible-lg sep nomarg"></li>
						<li class="visible-sm visible-md visible-lg">

							<div class="header-search">
								<a href="#" class="header-search-button"></a>
								<div class="drop">
									<input id="search" type="text" value="" placeholder="Поиск по каталогу" />
									<span class="header-search-close closes"></span>
									<div class="autocomplite">
										<ul>

										</ul>
									</div>
								</div>
							</div>

						</li>
						<li class="visible-sm visible-md visible-lg sep nomarg"></li>
						<li class="text-right">
							<a href="basket.php" class="user-cart">
								<span id='basket_count'>
									<? echo get_basket_count($session_name); ?>
								</span>
							</a>
								<!-- add basket box -->
								<div class="col-xs-12 col-sm-6 text-right fs_12">
									<span class="tooltips bottom right">
										<div id='basket_add' class="tooltips_box" style='display:none;'>
											<div class="tooltips_box_arr"></div>
											<div class="tooltips_box_body fs_12 text-left">
												Товар добавлен в корзину.
											</div>
										</div>
									</span>
								</div>
								<!-- add basket box -->
						</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div><!--head-container-->
		<div class="header-menu">
			<div class="container">
				<div class="mainmenu-drop">
					<div class="row with-bord">
					<!--
						<div class="search">
							<input class="form-control input-lg" type="text" value="" placeholder="Введите запрос..." />
						</div>
					-->
						<div class="row color_black hidden-md hidden-lg">
<!--							<div class="m-b-3 col-xxs-12 col-xs-6">-->
<!--								<div class="header-city">-->
<!--									<div class="city">-->
<!--										<a href="#" class="type-link">--><?// echo $geo_city_name; ?><!--</a>-->
<!--									</div>-->
<!--									<a href="#" data-toggle="modal" data-target="#modal_cityes">Посмотреть в ближайших городах</a> -->
<!--								</div>-->
<!--							</div>-->
							<!--
							<div class="m-b-3 col-xxs-12 col-xs-6">
								<div class="header-place">
									<i class="fa fa-map-marker color_red"></i>
									<div>1. ТРЦ «Лапландия», 1 этаж; <a href="#">2. ...</a></div>
									<a href="#" data-toggle="modal" data-target="#modal_feedback">Оставить отзыв</a>
								</div>
							</div>
							-->
						</div>

						<div class="col-left">
							<div class="row">
								<div class="col-xxs-12 col-xs-6 col-sm-3">
									<dl class="list-unstyled">
										<dt>Каталог</dt>
										<dd><a href="catalog.php">Композиции Фиора</a></dd>
										 <dd><a href="cards.php">Фирменные открытки</a></dd>
									</dl>
									<dl class="list-unstyled">
										<dt>Мода</dt>
<!--										<dd><a href="trands.php">Тренды 2017</a></dd>-->
										<dd><a href="idea.php">Идеи для Fi’ora</a></dd>
									</dl>
								</div>
								<div class="col-xxs-12 col-xs-6 col-sm-3">
									<dl class="list-unstyled">
										<dt>Fi’ora (Фиора)</dt>
										<dd><a href="about.php">О бренде</a></dd>
										<dd><a href="energy.php">Вечная энергия живых цветов</a></dd>
										<dd><a href="legend.php">Легенда</a></dd>
										<dd><a href="allday.php">Fiora каждый день</a></dd>
									</dl>
								</div>
								<div class="clearfix visible-xs"></div>
								<div class="col-xxs-12 col-xs-6 col-sm-3">
									<dl class="list-unstyled">
										<dt>Галерея</dt>
										<dd><a target='_blank' href="https://www.youtube.com/channel/UCl8eKE-eSL8LkGRuoyF4B_w/videos">Видео</a></dd>
										<dd><a href="gallery.php">Фото в интерьере</a></dd>
										<dd><a href="after-before.php">Фото «до и после»</a></dd>
									</dl>
								</div>
								<div class="col-xxs-12 col-xs-6 col-sm-3">
									<dl class="list-unstyled">
										<dt>Почти ваша Fi’ora</dt>
										<dd><a href="pay_and_delivery.php">Оплата и доставка</a></dd>
										<dd><a href="clients.php">Корпоративным клиентам</a></dd>
										<dd><a href="stock.php">Акции</a></dd>
										<dd>
											<span class="with-fiora">
                                                <a id="formfeedbackopen" href="javascript:void(0)" data-toggle="modal" data-target="#formfeedback" rel="nofollow" class="type-link">Бизнес с Fi’ora</a>
											</span>
										</dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="col-right">
							<div class="m-b-3 visible-xs"></div>
							<div class="certificate">
								<a href="#" class="img"><img class="img-responsive img-center" src="images/certificate.png" alt="" /></a>
								<div class="txt">Официальное <br />представительство в РФ</div>
								<a href="contacts.php">Контакты</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--#header-->

    <div class="modal modal-main fade" id="formfeedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <h5 class="modal-title brown">Ваши данные</h5><img src="/images/modal-header.png" alt="">
                </div>
                <div class="modal-body">
                    <form id="send_order" action="/php/send_order.php" method="post">
                        <input type="hidden" name="form" value="Заказать звонок">
                        <div class="form-group">
                            <input type="text" name="city" placeholder="Укажите ваш город" class="form-control required" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Как к вам обращатся" class="form-control required" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" placeholder="+7 (___) ___-__-__" class="form-control input-phone required" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" placeholder="Укажите e-mail" class="form-control required" required>
                        </div>
                        <div class="form-group last">
                            <textarea type="text" name="comment" placeholder="Дополнительные комментарии" class="form-control"></textarea>
                        </div>
                        <div class="container-form-error">
                            <div class="form-group form-error-msg" style="display: none;"><span>Заполните выделенные поля</span></div>
                        </div>
                        <div class="form-group text-center form-submit">
                            <input type="submit" name="submit" value="Отправить заявку" class="btn btn-danger">
                        </div>
                    </form>
                    <div id="success_order" style="display: none">
                        <p>Ваша заявка отправлена.<br> Наш консультант по ТМ Fi’ora<br> свяжется с вами сегодня или завтра<br> (кроме выходных дней).</p>
                        <button type="button" data-dismiss="modal" class="btn btn-close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $("#formfeedbackopen").click(function() {
            $('#send_order').show();
            $('#success_order').hide();
        });

        $("#send_order").submit(function() {
            $.ajax({
                type: 'POST',
                url: $("#send_order").attr('action'),
                data: $("#send_order").serialize(),
                success: function(response) {
                    $('#send_order')[0].reset();
                    $('#send_order').hide();
                    $('#success_order').show();
                },
                error: function() {
                    alert('Ошибка');
                }
            });
            return false;
        });
    </script>

    <div class="modal fade" id="modal_hook" tabindex="-1" role="dialog" aria-labelledby="modal_hook">
    	<div class="modal-dialog modal-md" role="document">
    		<div class="modal-content">
    			<a href="#" class="cross" data-dismiss="modal" aria-label="Close"></a>
    			<div class="disimg"><img src="images/modal__banner.png" alt="" /></div>
    			<div class="modal-body">

    				<ul class="display-toggle">
    					<li class="dt-1">
    						<div class="modal-hook text-center">
    							<br /><br /><br />
    							Зарегиструйтесь на сайте и участвуйте в розыгрыше,<br />
    							который будет проведен на сайте 31 марта 2017 года.<br />
    							<br /><br />
    							<a href="#" class="display-toggle-link btn btn-lg btn-danger padd" data-target="dt-2">Участвовать</a>
    							<br /><br /><br />
    						</div>
    					</li>
    					<li class="dt-2">
    						<div class="modal-hook">
    							<div class="m-b-3 text-center">
    								<br />
    								Зарегиструйтесь на сайте и участвуйте в розыгрыше,<br />
    								который будет проведен 31 марта 2017 года.
    							</div>
                                <form id="reg" class="" action="php/auth.php" method="post">
									<input type="hidden" name="form" value="reg">
        							<div class="row">
        								<div class="m-b-2 col-sm-6">
        									<input class="form-control input-lg" type="text" name="name" value="" placeholder="Имя" required="" pattern="^[А-Яа-яЁё\s]+$" />
        								</div><!--col-->
        								<div class="m-b-2 col-sm-6">
        									<input class="form-control input-lg" type="email" name="email" value="" placeholder="Электронная почта" required="" />
        								</div><!--col-->
        							</div><!--row-->
        							<div class="row">
        								<div class="m-b-2 col-sm-6">
        									<input class="form-control input-lg phone-mask" type="text" name="phone" value="" placeholder="+7(___)___-__-__" required="" />
        								</div><!--col-->
        								<div class="col-sm-6">
        									<div class="row">
        										<div class="m-b-2 col-xxs-12 col-xs-6">
        											<a href="./php/auth.php" class="btn btn-block btn-lg btn-default send-sms">Выслать код</a>
        											<div class="m-t-05 text-center">
        												<a href="./php/auth.php" class="fs_12 color_blue send-sms">отправить код повторно</a>
        											</div>
        										</div>
        										<div class="m-b-2 col-xxs-12 col-xs-6">
        											<input class="form-control input-lg" type="text" name="code" value="" placeholder="Код из SMS" required="" pattern="[0-9]" maxlength="5" />
        										</div>
        									</div><!--row-->
        								</div><!--col-->
        							</div><!--row-->
        							<div class="row">
        								<div class="col-sm-9">
        									<div class="checkbox">
        										<label><input type="checkbox" name="spam" value="1" checked="true" /> Подпистаться на новости и выгодные предложения</label>
        									</div>
        								</div><!--col-->
        								<div class="col-sm-3">
        									<!-- <input type="submit" name="submit" class="btn btn-block btn-lg btn-danger send-reg-form" data-target="dt-3">Отправить</button> -->
        									<input type="submit" name="submit" class="btn btn-block btn-lg btn-danger send-reg-form" data-target="dt-3" value="Отправить" />
        								</div><!--col-->
        							</div><!--row-->
                                </form>
    						</div>
    					</li>
    					<li class="dt-3">
    						<div class="modal-hook text-center">
    							<br /><br /><br /><br /><br />
    							Поздравляем! Вы стали участником розыгрыша 30 композиций от Fi’ora.<br />
    							Розыгрыш будет проведен на сайте 31 марта 2017 года.<br />
    							Ссылка на страницу будет отправлена на указанный электоронный адрес.<br />
    							Благодарим Вас за регистрацию.
    							<br /><br /><br /><br /><br />
    						</div>
    					</li>
    				</ul>

    			</div>
    		</div>
    	</div>
    </div>
    <script type="text/javascript">
    	$(function(){

            <?php// if (!empty($action_show)): ?>
                // setTimeout(function() {
                //     $('#modal_hook').modal('show');
                // }, 10000);
            <?php //endif; ?>


    		$('.display-toggle').each(function() {
    			var $p = $(this);
    			if(!$('li.active', $p).length) $('li:first-child', $p).addClass('active');
    		});

    		$('.display-toggle-link').click(function() {
    			var $p = $(this).closest('.display-toggle');
    			displayToggle($p, $(this).data('target'));
    			return false;
    		});

            $('#registration input[type="text"]').on('change', function() {
                if ($(this).val() === '') {
                    $(this).parent().addClass('has-error');
                } else {
                    $(this).parent().removeClass('has-error');
                }
            });

    		$('.send-reg-form').click(function(event) {
                event.preventDefault();
    			var $p = $(this).closest('.display-toggle');
				var $this = $(this);
    			// AJAX HERE
                var form = $(this).closest('form');
                var method = form.attr('method');
                var url = form.attr('action');
                var data = form.serialize();
				$.ajax({
		            method: method,
		            url: url,
		            data: data
		        }).done(function(response) {
		            var result = JSON.parse(response);

		            $('#reg input[type="text"]').parent().removeClass('has-error');

		            if (result.status == 'success') {
		                displayToggle($p, $this.data('target'));
						setTimeout(function() {
							location.href = '/';
						}, 2000);
		            } else {
		                result.fields.forEach(function(field) {
		                    $('#reg input[name="' + field + '"]').parent().addClass('has-error');
		                });
		            }
		        });
    			// IF AJAX DONE
    		});

			$('.send-sms').on('click', function(event) {
		        event.preventDefault();
		        var form = $(this).closest('form');
		        var phone = form.find('input[name="phone"]').val();
		        var url = $(this).attr('href');
		        if (phone !== '') {
		            $.post(url, {'form': 'sms', 'phone': phone}).done(function() {
		                console.log('send sms');
		            });
		        } else {
		            form.find('input[name="phone"]').parent().addClass('has-error');
		        }
		    });

    		function displayToggle($p, $target) {
    			$('li.active', $p).removeClass('active');
    			$('.'+$target, $p).addClass('active');
    		}
    	});
    </script>
    <div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="modal_login">
    	<div class="modal-dialog modal-md" role="document">
    		<div class="modal-content">
    			<a href="#" class="cross" data-dismiss="modal" aria-label="Close"></a>
    			<div class="disimg"><img src="images/modal-banner-img002.png" alt="" /></div>
    			<div class="modal-body">

    				<div class="row">
    					<div class="col-sm-6 col-sm-offset-3">
    						<div class="m-b-2 text-center">
    							Выполните вход, используя электронный адрес<br />
    							и номер телефона указанные при регистрации.
    						</div>
                            <form id="login" class="" action="php/auth.php" method="post">
								<input type="hidden" name="form" value="login">
                                <div class="m-b-2">
                                    <input class="form-control input-lg text-center email-mask" type="text" name="email" value="" placeholder="Электронная почта" />
                                </div>
                                <div class="m-b-2">
                                    <input class="form-control input-lg text-center phone-mask" type="text" name="phone" value="" placeholder="+7(___)___-__-__" />
									<div class="text-center color_red login__failed"></div>
                                </div>
                                <div class="text-center">
                                    <input href="http://myfioracontest.tilda.ws/" type="submit" name="submit" class="btn btn-lg btn-danger padd" value="Войти" />
                                </div>
                            </form>
    					</div>
    				</div>

    			</div>
    		</div>
    	</div>
    </div>
    <script type="text/javascript">
        $(function() {
            
			$('#login').on('submit', function(event) {
		        event.preventDefault();
		        var form = $(this);
		        var method = form.attr('method');
		        var url = form.attr('action');
		        var data = form.serialize();
                var newWindow = window.open();
                
		        $.ajax({
		            method: method,
		            url: url,
		            data: data
		        }).done(function(response) {
		            var result = JSON.parse(response);

		            $('#login input[type="text"]').parent().removeClass('has-error');

		            if (result.status == 'success') {
						if (!result.login) {
							$('.login__failed').text('Указанная пара не зарегистрирована');
						} else {
                            newWindow.location = 'http://myfioracontest.tilda.ws/';
							location.href = '/';
						}
		            } else {
		                result.fields.forEach(function(field) {
		                    $('#login input[name="' + field + '"]').parent().addClass('has-error');
		                });
		            }
		        });
		    });
			$('#logout').on('submit', function(event) {
		        event.preventDefault();
		        var form = $(this);
		        var method = form.attr('method');
		        var url = form.attr('action');
		        var data = form.serialize();
		        $.ajax({
		            method: method,
		            url: url,
		            data: data
		        }).done(function(response) {
		            var result = JSON.parse(response);
		            if (result.status == 'success') {
		                location.href = '/';
		            }
		        });
		    });
        });
    </script>

    <div class="modal fade" id="modal_sale" tabindex="-1" role="dialog" aria-labelledby="modal_sale">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<a href="#" class="cross" data-dismiss="modal" aria-label="Close"></a>
    			<div class="disimg">
    				<img src="images/examples/modal-sale-img001.jpg" alt="" />
    			</div>
    			<div class="modal-body">
    				<div class="m-b-1"></div>
    				<div class="m-b-2 fs_18 text-center">
    					Укажите свой e-mail, на который<br />
    					мы отправим вам промокод на скидку 10%
    				</div>
    				<div class="m-b-3 text-center">Использовать промокод вы сможете <br />как только его получите</div>
    				<div class="row">
    					<div class="col-sm-10 col-sm-offset-1">
                            <form id="promo" class="" action="mail.php" method="post">
								<input type="hidden" name="text_type" value="main">
                                <div class="m-b-3">
                                    <input class="form-control input-lg" type="text" name="name" value="" placeholder="Полное имя" required="" pattern="^[А-Яа-яЁё\s]+$" />
                                </div>
                                <div class="m-b-3">
                                    <input class="form-control input-lg" type="email" name="email" value="" placeholder="E-mail" required="" />
                                </div>
                                <div class="m-b-3 text-center">
                                    <span class="checkbox">
                                        <label>
                                            <input type="checkbox" name="subscribe" checked="true" value="true" />
                                            Подпистаться на новости и выгодные предложения
                                        </label>
                                    </span>
                                </div>
                                <div class="m-b-2 text-center">
                                    <input type="submit" name="submit" class="btn btn-lg btn-danger padd" value="Получить промокод" />
                                </div>
                            </form>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

	<?php if (isset($_GET['share']) && $_GET['share'] == '123'): ?>
		<script type="text/javascript">
			$(function() {
				$('#modal_sale input[name="text_type"]').val('follower');
				$('#modal_sale').modal('show');
			});
		</script>
	<?php endif; ?>
    <script type="text/javascript">
        $(function() {
            $('#promo').on('submit', function(event) {
                event.preventDefault();
                var form = $(this);
                var method = form.attr('method');
                var url = form.attr('action');
                var data = form.serialize();
                $.ajax({
                    method: method,
                    url: url,
                    data: data
                }).done(function(response) {
					$('#modal_sale').modal('hide');
		        });
            });
        });
    </script>
<!-- END MODIFY -->
<? //var_dump($_COOKIE['geo_region_id']); ?>
