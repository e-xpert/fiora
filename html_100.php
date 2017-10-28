<div class="modal fade" id="modal_hook" tabindex="-1" role="dialog" aria-labelledby="modal_hook">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<a href="#" class="cross" data-dismiss="modal" aria-label="Close"></a>
			<div class="disimg"><img src="images/examples/modal-hook-img001.jpg" alt="" /></div>
			<div class="modal-body">

				<ul class="display-toggle">
					<li class="dt-1">
						<div class="modal-hook text-center">
							<br /><br /><br />
							Зарегиструйтесь на сайте и участвуйте в розыгрыше,<br />
							который будет проведен на сайте 15 марта 2017 года.<br />
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
								который будет проведен 15 марта 2017 года.
							</div>
							<div class="row">
								<div class="m-b-2 col-sm-6 has-error">
									<input class="form-control input-lg" type="text" value="" placeholder="Имя" />
								</div><!--col-->
								<div class="m-b-2 col-sm-6">
									<input class="form-control input-lg" type="text" value="" placeholder="Электронная почта" />
								</div><!--col-->
							</div><!--row-->
							<div class="row">
								<div class="m-b-2 col-sm-6">
									<input class="form-control input-lg phone-mask" type="text" value="" placeholder="+7(___)___-__-__" />
								</div><!--col-->
								<div class="col-sm-6">
									<div class="row">
										<div class="m-b-2 col-xxs-12 col-xs-6">
											<a href="#" class="btn btn-block btn-lg btn-default">Выслать код</a>
											<div class="m-t-05 text-center">
												<a href="#" class="fs_12 color_blue">отправить код повторно</a>
											</div>
										</div>
										<div class="m-b-2 col-xxs-12 col-xs-6">
											<input class="form-control input-lg" type="text" value="" placeholder="Код из SMS" />
										</div>
									</div><!--row-->
								</div><!--col-->
							</div><!--row-->
							<div class="row">
								<div class="col-sm-9">
									<div class="checkbox">
										<label><input type="checkbox" value="" /> Подпистаться на новости и выгодные предложения</label>
									</div>
								</div><!--col-->
								<div class="col-sm-3">
									<button class="btn btn-block btn-lg btn-danger send-reg-form" data-target="dt-3">Отправить</button>
									<!--<button class="btn btn-block btn-lg btn-danger disabled send-reg-form" data-target="dt-3">Отправить</button>-->
								</div><!--col-->
							</div><!--row-->
						</div>
					</li>
					<li class="dt-3">
						<div class="modal-hook text-center">
							<br /><br /><br /><br /><br />
							Поздравляем! Вы стали участником розыгрыша 100 композиций от Fi’ora.<br />
							Розыгрыш будет проведен на сайте 15 марта 2017 года.<br />
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
		// $('#modal_hook').modal('show');

		$('.display-toggle').each(function(){
			var $p = $(this);
			if( !$('li.active', $p).length ) $('li:first-child', $p).addClass('active');
		});
		$('.display-toggle-link').click(function(){
			var $p = $(this).closest('.display-toggle');
			displayToggle($p, $(this).data('target'));
			return false;
		});
		$('.send-reg-form').click(function(){
			var $p = $(this).closest('.display-toggle');
			//AJAX HERE
			//IF AJAX DONE ->
			displayToggle($p, $(this).data('target'));
			return false;
		});
		function displayToggle($p, $target){
			$('li.active', $p).removeClass('active');
			$('.'+$target, $p).addClass('active');
		}
	});
</script>
