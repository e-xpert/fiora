$(function(){

    $('.authorization .link').click(function(){
		var $p = $(this).closest('.authorization');
		if( $('.drop', $p).is(':hidden') ){
			$('.drop', $p).slideDown();
		} else {
			$('.drop', $p).slideUp();
		}
		return false;
	});
	$('.authorization a').click(function(){
		$(this).closest('.authorization').find('.drop').slideUp();
	});

	$('.uniq-collapse .title').click(function(){
		var $p = $(this).closest('.uniq-collapse');
		if( $p.is('.open') ){
			$('.description', $p).slideUp('fast', function(){
				$p.removeClass('open');
			});
		} else {
			$('.description', $p).slideDown('fast', function(){
				$p.addClass('open');
			});
		}
	});

	$('.main-uniq .separate-item .text .title').click(function(){
		var $p = $(this).closest('.text');
		if( $p.is('.open') ){
			$('.description', $p).slideUp('fast', function(){
				$p.removeClass('open');
			});
		} else {
			$('.description', $p).slideDown('fast', function(){
				$p.addClass('open');
			});
		}
	});

	if( $(".fancybox").length ){ $(".fancybox").fancybox(); }

	if( $(".fancyvideo").length ){
		$(".fancyvideo").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '70%',
			height		: '80%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});
	}

	$('.mainmenu .fa-navicon').click(function(){
		var $p = $(this).closest('.mainmenu');
		if( $('.drop', $p).is(':hidden') ){
			$('.drop', $p).slideDown();
		} else {
			$('.drop', $p).slideUp();
		}
	});

	$('.header-search-button').click(function(){
		var $hs = $('.header-search .drop');
		if( $hs.is(':hidden') ){
			$hs.show();
			$('input', $hs).val('').focus();
		} else {
			$hs.hide();
		}
		return false;
	});

	$('.header-search-close').click(function(){
		$('.header-search .drop').hide();
		return false;
	});

	$('.counter').each(function(){
		var $p = $(this);
		var $inp = $('input', $p);
		$('.plus', $p).click(function(){
			$inp.val( Number($inp.val())+1 );
			return false;
		});
		$('.minus', $p).click(function(){
			if( $inp.val() <= 1 ){ return false; }
			$inp.val( Number($inp.val())-1 );
			return false;
		});
	});

	$('.mainmenu-button').click(function(){
		var $link = $(this);
		var $drop = $('.mainmenu-drop');
		if( $drop.is(':hidden') ){
			$link.addClass('active');
			$('body').addClass('modal-open');
			$drop.slideDown();
		} else {
			$link.removeClass('active');
			$('body').removeClass('modal-open');
			$drop.slideUp();
		}
		return false;
	});

	if( $('.inset').length ){
		$('.inset').each(function(){
			var $p = $(this);
			if( $('.inset-links input:checked', $p).length ){
				$('.inset-box:eq(' + $('.inset-links input:checked', $p).val() + ')').addClass('active');
			}
			$('.inset-links input[type=radio]', $p).change(function(){
				$('.inset-box').removeClass('active');
				$('.inset-box:eq(' + $(this).val() + ')').addClass('active');
			});
		});
	}

	if( $('.product_advantage').length ){
		$('.product_advantage .head').click(function(){
			if( $('.product_advantage .body').is(':hidden') ){
				$('.product_advantage .body').slideDown();
				$('.product_advantage .head .arrow').addClass('up');
			} else {
				$('.product_advantage .body').slideUp();
				$('.product_advantage .head .arrow').removeClass('up');
			}
		});
	}

	var $catalog_temp;
	$('.catalog_item').mouseenter(function(){
		$catalog_temp = $(this);
		$('.hov', $catalog_temp).html( $('.box', $catalog_temp).html()).show();
	}).mouseleave(function(){
		$('.hov', $catalog_temp).html('').hide();
	});

	$('.radio label, .checkbox label').each(function(){
		var $p = $(this);
		$('<i class="inpsty"></i>').appendTo( $p );
		if( $('input', $p).prop('checked') ){
			$('.inpsty', $p).addClass('active');
		}
		$('input', $p).css('opacity',0).closest('label').css('paddingLeft', 30);
		$('input', $p).change(function(){
			if( $(this).prop('checked') ){
				if( $(this).attr('type') == 'radio' ) {
					$('input[name=' + $(this).attr('name') + ']').closest('label').find('.inpsty').removeClass('active');
				}
				$(this).closest('label').find('.inpsty').addClass('active');
			} else {
				$(this).closest('label').find('.inpsty').removeClass('active');
			}
		});
	});

	if( $('.gototop').length ) {
		$('.gototop').click(function () {
			$("body, html").animate({
				scrollTop: 0
			}, 500);
			return false;
		});
		$(window).scroll(function () {
			var $h = $('#wrap').height() / 5;
			if ($(window).scrollTop() > $h) {
				$('.gototop').show();
			} else {
				$('.gototop').hide();
			}
		});
	}

	$('.imghov').click(function(){
		if( !$(this).is('.toggle') ){
			$(this).addClass('toggle');
		} else {
			$(this).removeClass('toggle');
		}
	});

	if( $('.infomodal').length ){
		$('.infomodal-button').click(function(){
			var $id = $(this).data('target');
			var $t = Math.round( $(this).offset().top ) + $(this).height() + $($id).find('.infomodal-arr').height();
			var $l = Math.round( $(this).offset().left ) + ( $(this).width()/2 ) - 15;

			$($id).css({
				'top' : $t
			}).show().find('.infomodal-arr').css({
				'left' : $l - Math.round( $($id).find('.infomodal-body').offset().left )
			});
			return false;
		});
		$('.infomodal-close').click(function(){
			$(this).closest('.infomodal').hide();
		});
		$(window).resize(function(){
			$('.infomodal').hide();
		});
	}

	$('.header-city .city .type-link').click(function(){
		var $p = $(this).closest('.city');
		var $drop = $('.drop', $p);
		if( $drop.is(':hidden') ){
			$drop.show();
		} else {
			$drop.hide();
		}
		return false;
	});

	$('#wrap').click(function(e){
		if ( $('.mainmenu-drop').is(':visible') && !$(e.target).parents().hasClass('mainmenu-drop') && !$(e.target).parents().hasClass('mainmenu-button') ){
			$('.mainmenu-button').removeClass('active');
			$('body').removeClass('modal-open');
			$('.mainmenu-drop').slideUp();
		}
		if ( $('.infomodal').is(':visible') && !$(e.target).parents().hasClass('infomodal') ){
			$('.infomodal').hide();
		}
		if ( $('.header-city .city .drop').is(':visible') && !$(e.target).parents().hasClass('header-city') ){
			$('.header-city .city .drop').hide();
		}
	});

	$('.callback-button').click(function(){
		if( $('#callback').is('.open') ){
			$('#callback').removeClass('open');
		} else {
			$('#callback').addClass('open');
		}
		return false;
	});

	$('.panel-collapse .panel-heading').click(function(){
		var $p = $(this).closest('.panel-collapse');
		if( $p.is('.panel-open') ){
			$('.panel-body', $p).slideUp('fast', function(){
				$p.removeClass('panel-open');
			});
		} else {
			$('.panel-body', $p).slideDown('fast', function(){
				$p.addClass('panel-open');
			});
		}
	});

	if( $('.blindbox').length ){
		$('.blindbox').each(function(){
			var $p = $(this);
			var $b = $('.before', $p);
			var $a = $('.after', $p);
			var $sep = '<div class="blind"><div class="mover"></div></div>';
			$p.append($sep);

			combination(10);

			$('.blind', $p).draggable({
				scroll: 'true',
				axis: "x",
				containment: "parent",
				handle: "div",
				create : startFunc,
				drag: dragThis,
				stop: dragThis
			});

			$(window).resize(function(){
				combination(10);
			});

			function startFunc(){
				var $speed = 750;
				var $start = $('.blind', $p).position().left;
				var $stop  = $p.width() - 50;
				$('.blind', $p)
					.animate({'left' : $stop}, $speed)
					.animate({'left' : $start}, $speed);
				$('.before', $p)
					.animate({'width' : 50}, $speed)
					.animate({'width' : $p.width() - $start }, $speed);
			}

			function combination($x){
				var $x = Math.round($p.width() / 100 * $x);
				$('.blind', $p).css({ 'left' : $x });
				dragThis();
			}

			function dragThis(){
				var $w = Math.round($('.blind', $p).position().left);
				//var $per = 100 - Math.round(($w / $p.width())*100);
				var $w = $p.width() - $w;
				$('.before', $p).css({ width: $w });
			}
		});
	}

	$('.uniq-sm .more').click(function(){
		var $p = $(this).closest('.uniq-sm');
		if( !$p.is('.open') ){
			$('.drop', $p).slideDown('fast', function(){
				$p.addClass('open');
			});
		} else {
			$('.drop', $p).slideUp('fast', function(){
				$p.removeClass('open');
			});
		}
		return false;
	});

	if( $('.main-treasure-sm').length ){
		$('.main-treasure-sm').each(function(){
			var $p = $(this);
			$('.list li', $p).hide().first().addClass('active');
			//$('.navi', $p).html('');
			/*for(var i = 1; i <= $('.list li', $p).length; i++){
				$('.navi', $p).append('<span>'+i+'</span>');
			}*/
			//beActive(0);
			$('.navi span', $p).click(function(){
				beActive( $(this).index() );
			});
			function beActive($x){
				var $next = $('li.active', $p).next();
				if( $('li.active', $p).is(':last-child') ){
					$next = $('li:first-child', $p);
				}
				$('li.active', $p).removeClass('active');
				$next.addClass('active')
				/*$('.list li:eq('+$x+')', $p).addClass('active');
				$('.navi span:eq('+$x+')', $p).addClass('active');*/
			}
		});
	}

	if( $('.half').length ){
		halfFunc( $('.half') );
		$(window).resize(function(){
			halfFunc( $('.half') );
		});
		setTimeout(function(){
			halfFunc( $('.half') );
		}, 1500);
	}

	//===============================================
	// callback footer
	function hide_callback() {
		$('#callback_order_show').hide();
	}


	$('#callback_order').click(function(){
		if( $('#callback').is('.open') )
			$('#callback').removeClass('open');
		$('#callback_order_show').show();
		setTimeout(hide_callback,3000);



		var callback_period_1=$('#callback_check_1').attr('checked');
		var callback_period_2=$('#callback_check_2').attr('checked');
		var callback_period_3=$('#callback_check_3').attr('checked');
		var callback_period_4=$('#callback_check_4').attr('checked');

		var callback_phone=$('#callback_phone').val();

		$.post('https://myfiora.com/php/callback.php', {'phone': callback_phone,'period_1':callback_period_1,'period_2':callback_period_2,'period_3':callback_period_3,'period_4':callback_period_4},
			function(data) {
				if (data='err') console.log('!!! err_callback !!!');
			}
		);



	});


	$('#callback_btn_1').click(function(){
		if (!$('#callback_check_1').attr('checked')) {
			$('#callback_check_1').attr('checked',true);
		} else {
			$('#callback_check_1').attr('checked',false);
		}
	});

	$('#callback_btn_2').click(function(){
		if (!$('#callback_check_2').attr('checked')) {
			$('#callback_check_2').attr('checked',true);
		} else {
			$('#callback_check_2').attr('checked',false);
		}
	});

	$('#callback_btn_3').click(function(){
		if (!$('#callback_check_3').attr('checked')) {
			$('#callback_check_3').attr('checked',true);
		} else {
			$('#callback_check_3').attr('checked',false);
		}
	});

	$('#callback_btn_4').click(function(){
		if (!$('#callback_check_4').attr('checked')) {
			$('#callback_check_4').attr('checked',true);
		} else {
			$('#callback_check_4').attr('checked',false);
		}
	});

	// callback footer
	//===============================================



	$('#agree').click(function(){
		if (!$('#agree').attr('checked')) {
			$('#agree').attr('checked',true);
		} else {
			$('#agree').attr('checked',false);
		}
	});

	$('#send_me').click(function(){
		$('#send_to_error_text').hide();
	});

	$('#send_to').click(function(){
		$('#send_to_error_text').hide();
	});


	$('#pay_type_1').click(function(){
		if (!$('#pay_type_1').attr('checked')) {
			$('#pay_type_1').attr('checked',true);
			$('#pay_type').data('pay_type',1);
			$('#pay_type_2').attr('checked',false);
		}
	});

	$('#pay_type_2').click(function(){
		if (!$('#pay_type_2').attr('checked')) {
			$('#pay_type_2').attr('checked',true);
			$('#pay_type').data('pay_type',2);
			$('#pay_type_1').attr('checked',false);
		}
	});




});

function halfFunc( $arr ){
	$arr.each(function(){
		var $p = $(this);
		$p.css({ 'top' : Math.round(($p.parent().outerHeight()/2) - ($p.outerHeight()/2)) });
	});
}
