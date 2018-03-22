<script type="text/javascript">

    //id delivery_free - бесплатная доставка
    //id products_summa - сумма товара
    //id delivery_summa - сумма доставки

    //summa
    function get_summ() {
        var summa=0;
        var summa_prod_only=0;
        var summa_products=0;
        var box_delivery_summa=0;
        $('.fs_20.nowrap.allsumm').each(
            function(){
                var row_artikul=$('#'+this.id).data('artikul');
                if ( $('#'+this.id).is(":visible") )
                    if ( $('#'+this.id).data('prodsum')>0 ) {
                        summa=summa+$('#'+this.id).data('prodsum');
                        //summa_products=summa_products+$('#'+this.id).data('prodsum');
                        $('#product_summa_'+row_artikul).text($('#'+this.id).data('prodsum').toLocaleString()+' ₽');
                    }
                if ( $('#'+this.id).is(":visible") )
                    if ( $('#'+this.id).data('boxsum')>0 ) {
                        summa=summa+$('#'+this.id).data('boxsum');
                        $('#box_summa_'+row_artikul).text($('#'+this.id).data('boxsum').toLocaleString()+' ₽');
                    }

                if ( $('#'+this.id).is(":visible") ) {
                    // если коробок больше чем ваз + доставка
                    var box_delta=0;
                    var box_delta_delivery=0;
                    var delta_product_count=$('#product_count_'+row_artikul).val();
                    var delta_box_count=$('#box_count_'+row_artikul).val();
                    box_delta=delta_box_count-delta_product_count;
                    if (this.id=='box_summa_'+row_artikul) {
                        if (box_delta>0) {
                            box_delta_delivery=350*box_delta;
                            $('#box_delivery_summa_'+row_artikul).data('delivery',box_delta_delivery);
                            $('#box_delivery_summa_'+row_artikul).text(box_delta_delivery.toLocaleString()+' ₽');
                            box_delivery_summa=box_delivery_summa+box_delta_delivery;
                        } else {
                            box_delta_delivery=0;
                            $('#box_delivery_summa_'+row_artikul).text('');
                        }
                    }
                }
            }
        );

        var promo_discount=$('#promo_good').data('promo');
        var discount_summa = summa/100*promo_discount;
        summa=summa-discount_summa;

        // if (summa<8000) {
        //     //box_delivery_summa=box_delivery_summa+350;
        //     box_delivery_summa=0;
        //     var format_box_delivery_summa=box_delivery_summa.toLocaleString();
        //     $('#delivery_summa').text(format_box_delivery_summa+' ₽');
        // } else {
        //     var format_box_delivery_summa=box_delivery_summa.toLocaleString();
        //     $('#delivery_summa').text(format_box_delivery_summa+' ₽');
        // }

        if (summa>$('#delivery_summa').data('free_delivery_summa')) {
            $('#delivery_summa').text('0 ₽');
            $('#delivery_summa').data('delivery_summa', 0);
            $('#delivery_summa').data('delivery_summa')
        } else if ($('#delivery_summa').data('delivery_default_summa') != undefined) {
            $('#delivery_summa').text($('#delivery_summa').data('delivery_default_summa').toLocaleString()+' ₽');
            $('#delivery_summa').data('delivery_summa', $('#delivery_summa').data('delivery_default_summa'));
        }

        var box_delivery_summa=$('#delivery_summa').data('delivery_summa');
        var all_summ=summa+(isNaN(box_delivery_summa) ? 0 : box_delivery_summa);

        $('#order_summa').data('order_summa');
        var format_all_sum=all_summ.toLocaleString();
        var format_summa=summa.toLocaleString();
        $('#products_summa').text(format_summa+' ₽');
        $('#products_summa').attr('data-summa', summa);

        $('#products_discount').text(discount_summa.toLocaleString()+' ₽');
        $('#products_discount').attr('data-discount_summa', discount_summa);


        $('#order_summa').text(format_all_sum+' ₽');
        $('#order_summa').data('order_summa',all_summ);
        $('#itogo').text(format_all_sum);

        $('.fs_20.nowrap').each(
            function(){
                if ( $('#'+this.id).data('price')>0 ) {
                    var new_price=$('#'+this.id).data('price');
                    var new_price_format=new_price.toLocaleString();
                    $('#'+this.id).text(new_price_format+' ₽');
                }
            }
        );
    }

    function scrollToElement(theElement) {
        if (typeof theElement === "string")
            theElement = document.getElementById(theElement);

        var selectedPosX = 0;
        var selectedPosY = 0;
        while (theElement != null) {
            selectedPosX += theElement.offsetLeft;
            selectedPosY += theElement.offsetTop;
            theElement = theElement.offsetParent;
        }

        window.scrollTo(selectedPosX, selectedPosY);
    }

    function get_promo() {
        var promo=$('#promo_code').val();

        if (promo == 'SYN15YR' && parseInt($('#order_summa').data('order_summa')) < 5000) {
            $('#promo_match_error').show(); //
            $('#promo_match_error').text('Промокод действует при заказе от 5000 р.');
            $("#promo_error").addClass('has-error');

            return;
        }

        if (promo == 'VRT68DD' && parseInt($('#order_summa').data('order_summa')) < 6000) {
            $('#promo_match_error').show();
            $('#promo_match_error').text('Промокод действует при заказе от 6000 р.');
            $("#promo_error").addClass('has-error');

            return;
        }

        if (promo == 'VKR23TY' && parseInt($('#order_summa').data('order_summa')) < 12000) {
            $('#promo_match_error').show();
            $('#promo_match_error').text('Промокод действует при заказе от 12000 р.');
            $("#promo_error").addClass('has-error');

            return;
        }

        var key=<? echo "'".$session_name."'"; ?>;
        $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/recycled_promo_code.php', {'promo_code': promo,'key':key},
            function(data) {
                if (data>0) {
                    $('#promo_error_text').hide();
                    $("#promo_code_button").prop( "disabled", true );
                    $("#promo_code").prop("readonly", true);
                    $("#promo_error").removeClass('has-error');
                    $('#promo_div').hide();
                    $('#promo_good').html('Скидка по промокоду: '+data+'%');
                    $('#promo_good').show();
                    $('#promo_good').data('promo',data);
                    get_summ();
                } else {
                    $('#promo_error_text').show();
                    $("#promo_error").addClass('has-error');
                }
            }
        );
    }

    //удаление
    function recycled_del(artikul) {
        var key=<? echo "'".$session_name."'"; ?>;
        $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/recycled_del.php', {'artikul': artikul,'key':key},
            function(data) {
                if (data!='1') {
                    alert('Ошибка')
                } else {
                    location.reload();
                }
            }
        );
        get_summ();
    }

    // увеличиваем количество
    function artikul_minus(artikul) {
        var key=<? echo "'".$session_name."'"; ?>;
        var product_count=$('#product_count_'+artikul).val()*1-1;
        if (product_count>0) {
            $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/artikul_minus.php', {'artikul': artikul,'key':key},
                function(data) {
                    if (data=='err') {
                        alert('Ошибка')
                    } else {
                        $('#basket_count').text(data);
                        var product_price=$('#product_price_'+artikul).data('price');
                        var product_summa=product_price*product_count;
                        $('#product_summa_'+artikul).data('prodsum',product_summa);
                        get_summ();
                    }
                }
            );
        }
    }

    // уменьшаем количество
    function artikul_plus(artikul) {
        var key=<? echo "'".$session_name."'"; ?>;
        var product_count=$('#product_count_'+artikul).val()*1+1;
        $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/artikul_plus.php', {'artikul': artikul,'key':key},
            function(data) {
                if (data=='err') {
                    alert('Ошибка')
                } else {
                    $('#basket_count').text(data);
                    var product_price=$('#product_price_'+artikul).data('price');
                    var product_summa=product_price*product_count;
                    $('#product_summa_'+artikul).data('prodsum',product_summa);
                    get_summ();
                }
            }
        );
    }

    // увеличить упаковку
    function box_plus(artikul) {
        var key=<? echo "'".$session_name."'"; ?>;
        var box_count=$('#box_count_'+artikul).val()*1+1;
        var box_price=$('#box_price_'+artikul).data('price');
        var box_type=$('#box_type_'+artikul).data('type');
        $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/box_plus.php', {'artikul': artikul,'key':key,'type':box_type},
            function(data) {
                if (data=='err') {
                    alert('Ошибка')
                } else {
                    $('#basket_count').text(data);
                    var box_summa=box_count*box_price;
                    $('#box_summa_'+artikul).data('boxsum',box_summa);
                    get_summ();
                }
            }
        );
    }

    // уменьшить упаковку
    function box_minus(artikul) {
        var key=<? echo "'".$session_name."'"; ?>;
        var box_count=$('#box_count_'+artikul).val()*1-1;
        var box_type=$('#box_type_'+artikul).data('type');
        var box_price=$('#box_price_'+artikul).data('price');
        if (box_count>0) {
            $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/box_minus.php', {'artikul': artikul,'key':key,'type':box_type},
                function(data) {
                    if (data=='err') {
                        alert('Ошибка')
                    } else {
                        $('#basket_count').text(data);
                        var box_summa=box_count*box_price;
                        $('#box_summa_'+artikul).data('boxsum',box_summa);
                        get_summ();
                    }
                }
            );
        }
    }

    // добавить бокс
    function add_box(artikul) {
        var key=<? echo "'".$session_name."'"; ?>;
        var box_count=1;
        $('#box_type_'+artikul).data('type',1);
        $('#box_count_'+artikul).val(1);
        $('#box_hr_'+artikul).show();
        $('#box_data_'+artikul).show();
        $('#box_name_'+artikul).html(<? echo "'".$temp_box_name."'"; ?>);
        $('#box_size_'+artikul).html(<? echo "'".$temp_box_size."'"; ?>);
        $('#box_price_'+artikul).data('price',<? echo $temp_box_price; ?>);
        var box_summa=<? echo $temp_box_price; ?>;
        $('#box_summa_'+artikul).data('boxsum',box_summa);
        $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/box_add.php', {'artikul': artikul,'key':key},
            function(data) {
                if (data=='err') {
                    alert('Ошибка')
                } else {
                    $('#basket_count').text(data);
                    get_summ();
                }
            }
        );
    }

    // добавить лаванду
    function add_lavanda(artikul) {
        var key=<? echo "'".$session_name."'"; ?>;
        var box_count=1;
        $('#box_type_'+artikul).data('type',2);
        $('#box_count_'+artikul).val(1);
        $('#box_hr_'+artikul).show();
        $('#box_data_'+artikul).show();
        $('#box_name_'+artikul).html(<? echo "'".$temp_lavanda_name."'"; ?>);
        $('#box_size_'+artikul).html(<? echo "'".$temp_lavanda_size."'"; ?>);
        $('#box_price_'+artikul).data('price',<? echo $temp_lavanda_price; ?>);
        var box_summa=<? echo $temp_lavanda_price; ?>;
        $('#box_summa_'+artikul).data('boxsum',box_summa);
        $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/lavanda_add.php', {'artikul': artikul,'key':key},
            function(data) {
                if (data=='err') {
                    alert('Ошибка')
                } else {
                    $('#basket_count').text(data);
                    get_summ();
                }
            }
        );
    }

    function del_box(artikul) {
        var key=<? echo "'".$session_name."'"; ?>;
        $('#box_hr_'+artikul).hide();
        $('#box_data_'+artikul).hide();
        $('#box_summa_'+artikul).text(0);
        $('#box_summa_'+artikul).data('boxsum',0);
        $('#box_count_'+artikul).val(0);
        $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/box_del.php', {'artikul': artikul,'key':key},
            function(data) {
                if (data=='err') {
                    alert('Ошибка')
                } else {
                    $('#basket_count').text(data);
                    get_summ();
                }
            }
        );
    }

    // проверка ввода данных и отправка
    function check_input() {
        var key=<? echo "'".$session_name."'"; ?>;
        var summa=$('#order_summa').data('order_summa');
        var send_to=0;

        $('#agree_error_text').hide();

        //------------------------------------------------
        // я получатель
        //------------------------------------------------

        if ($('#send_me').is(':checked')) {
            send_to=1;
            var name_1=$('#name_1').val();
            var phone_1=$('#phone_1').val();
            var email_1=$('#email_1').val();
            var city_1=$('#city_1').val();
            var street_1=$('#street_1').val();
            var house_1=$('#house_1').val();
            var room_1=$('#room_1').val();
            var comment_1=$('#comment_1').val();

            if (name_1.length<5) {
                err=1;
                $('#name_1').css('border','1px solid #ff0000');
                $('#name_1').css('background-color','1px solid #ffffff');
            } else {
                $('#name_1').css('border','1px solid #b3b3b3');
                $('#name_1').css('background-color','1px solid #eeffee');
            }

            if (phone_1.length<11) {
                err=1;
                $('#phone_1').css('border','1px solid #ff0000');
                $('#phone_1').css('background-color','1px solid #ffffff');
            } else {
                $('#phone_1').css('border','1px solid #b3b3b3');
                $('#phone_1').css('background-color','1px solid #eeffee');
            }

            if (email_1.length<8) {
                err=1;
                $('#email_1').css('border','1px solid #ff0000');
                $('#email_1').css('background-color','1px solid #ffffff');
            } else {
                $('#email_1').css('border','1px solid #b3b3b3');
                $('#email_1').css('background-color','1px solid #eeffee');
            }

            if (city_1.length<2) {
                err=1;
                $('#city_1').css('border','1px solid #ff0000');
                $('#city_1').css('background-color','1px solid #ffffff');
            } else {
                $('#city_1').css('border','1px solid #b3b3b3');
                $('#city_1').css('background-color','1px solid #eeffee');
            }

            if (street_1.length<4) {
                err=1;
                $('#street_1').css('border','1px solid #ff0000');
                $('#street_1').css('background-color','1px solid #ffffff');
            } else {
                $('#street_1').css('border','1px solid #b3b3b3');
                $('#street_1').css('background-color','1px solid #eeffee');
            }

            if (house_1.length<1) {
                err=1;
                $('#house_1').css('border','1px solid #ff0000');
                $('#house_1').css('background-color','1px solid #ffffff');
            } else {
                $('#house_1').css('border','1px solid #b3b3b3');
                $('#house_1').css('background-color','1px solid #eeffee');
            }
            if (room_1.length<1) {
                err=1;
                $('#room_1').css('border','1px solid #ff0000');
                $('#room_1').css('background-color','1px solid #ffffff');
            } else {
                $('#room_1').css('border','1px solid #b3b3b3');
                $('#room_1').css('background-color','1px solid #eeffee');
            }


            if ($('#agree').is(':checked')) {
                return(err);
            } else {err=1;}
//            if (err==1)	{return(1);} else {return(10);}


        }

        //------------------------------------------------
        // отправить заказ
        //------------------------------------------------

        if ($('#send_to').is(':checked')) {
            var err=0;
            send_to=2;
            var name_2=$('#name_2').val();
            var name_3=$('#name_3').val();
            var phone_2=$('#phone_2').val();
            phone_2=phone_2.replace(/[^0-9]/gim,'');
            var phone_3=$('#phone_3').val();
            phone_3=phone_3.replace(/[^0-9]/gim,'');
            var email_2=$('#email_2').val();
            var city_2=$('#city_2').val();
            var street_2=$('#street_2').val();
            var house_2=$('#house_2').val();
            var room_2=$('#room_2').val();
            var comment_2=$('#comment_2').val();

            // имя получателя
            if (name_2.length<5) {
                err=1;
                $('#name_2').css('border','1px solid #ff0000');
                $('#name_2').css('background-color','1px solid #ffffff');
            } else {
                $('#name_2').css('border','1px solid #b3b3b3');
                $('#name_2').css('background-color','1px solid #eeffee');
            }
            // имя отправителя
            if (name_3.length<5) {
                err=1;
                $('#name_3').css('border','1px solid #ff0000');
                $('#name_3').css('background-color','1px solid #ffffff');
            } else {
                $('#name_3').css('border','1px solid #b3b3b3');
                $('#name_3').css('background-color','1px solid #eeffee');
            }
            // телефон получателя
            if (phone_2.length<11) {
                err=1;
                $('#phone_2').css('border','1px solid #ff0000');
                $('#phone_2').css('background-color','1px solid #ffffff');
            } else {
                $('#phone_2').css('border','1px solid #b3b3b3');
                $('#phone_2').css('background-color','1px solid #eeffee');
            }
            // телефон отправителя
            if (phone_3.length<11) {
                err=1;
                $('#phone_3').css('border','1px solid #ff0000');
                $('#phone_3').css('background-color','1px solid #ffffff');
            } else {
                $('#phone_3').css('border','1px solid #b3b3b3');
                $('#phone_3').css('background-color','1px solid #eeffee');
            }
            if (email_2.length<8) {
                err=1;
                $('#email_2').css('border','1px solid #ff0000');
                $('#email_2').css('background-color','1px solid #ffffff');
            } else {
                $('#email_2').css('border','1px solid #b3b3b3');
                $('#email_2').css('background-color','1px solid #eeffee');
            }
            if (city_2.length<2) {
                err=1;
                $('#city_2').css('border','1px solid #ff0000');
                $('#city_2').css('background-color','1px solid #ffffff');
            } else {
                $('#city_2').css('border','1px solid #b3b3b3');
                $('#city_2').css('background-color','1px solid #eeffee');
            }
            if (street_2.length<4) {
                err=1;
                $('#street_2').css('border','1px solid #ff0000');
                $('#street_2').css('background-color','1px solid #ffffff');
            } else {
                $('#street_2').css('border','1px solid #b3b3b3');
                $('#street_2').css('background-color','1px solid #eeffee');
            }
            if (house_2.length<1) {
                err=1;
                $('#house_2').css('border','1px solid #ff0000');
                $('#house_2').css('background-color','1px solid #ffffff');
            } else {
                $('#house_2').css('border','1px solid #b3b3b3');
                $('#house_2').css('background-color','1px solid #eeffee');
            }
            if (room_2.length<1) {
                err=1;
                $('#room_2').css('border','1px solid #ff0000');
                $('#room_2').css('background-color','1px solid #ffffff');
            } else {
                $('#room_2').css('border','1px solid #b3b3b3');
                $('#room_2').css('background-color','1px solid #eeffee');
            }

            if ($('#agree').is(':checked')) {
                return(err);
            } else {err=1;}
//            if (err==1)	{return(1);} else {return(10);}
        }

        if (send_to==0) {
            scrollToElement('to_err');
            $('#send_to_error_text').show();
            return(1);
        }

        $('#agree_error_text').show();

        return(1);
    }

</script>


<script type="text/javascript">
    $(document).ready(function() {

        // корзина оставить отзыв
        $('#flamp_send').click(function() {
            var flamp_text=$('#flamp_text').val();
            var flamp_info_1=$('#flamp_info_1').val();
            var flamp_info_2=$('#flamp_info_2').val();
            var flamp_info_3=$('#flamp_info_3').val();
            var key=<? echo "'".$session_name."'"; ?>;
            $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/recycled_flamp.php', {
                    'text'	 : flamp_text,
                    'info_1' : flamp_info_1,
                    'info_2' : flamp_info_2,
                    'info_3' : flamp_info_3,
                    'key'	 : key
                },
                function(data) {
                    if (data!='1') {
                        alert('Ошибка')
                    } else {
                        $(".cross").click();
                    }
                }
            );
        });

        // я получатель заказа
        $('#button_buy').click(function() {
            var summa=$('#order_summa').data('order_summa');
            var delivery=$('#delivery_summa').data('delivery_summa');
            var error=check_input();
            var pay_type=$('#pay_type').data('pay_type');
            var promo_code=$('#promo_code').val();
            var promo_discount=$('#promo_good').data('promo');
            if (error!=1) {
                if ($('#send_me').is(':checked')) {
                    var name_1=$('#name_1').val();
                    var phone_1=$('#phone_1').val();
                    var email_1=$('#email_1').val();
                    var city_1=$('#city_1').val();
                    var street_1=$('#street_1').val();
                    var house_1=$('#house_1').val();
                    var room_1=$('#room_1').val();
                    var comment_1=$('#comment_1').val();
                    //-----------------------------------------------
                    // post
                    $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/order_add.php', {
                            'key' 				: <? echo "'".$session_name."'"; ?>,
                            'send_to' 			: 1,
                            'name_1' 			: name_1,
                            'phone_1'			: phone_1,
                            'email_1'			: email_1,
                            'city_1'			: city_1,
                            'street_1'			: street_1,
                            'house_1'			: house_1,
                            'room_1'			: room_1,
                            'comment_1'			: comment_1,
                            'summa'				: summa,
                            'delivery'			: delivery,
                            'pay_type'			: pay_type,
                            'promo_code' 		: promo_code,
                            'promo_discount'	: promo_discount
                        },
                        function(data) {
                            if (data=='1') {
                                var robo_pay=$('#pay_type').data('pay_type');
                                // оплата наличными
                                if (robo_pay==1 || robo_pay==3) {
                                    window.location="https://<? echo $_SERVER['HTTP_HOST']; ?>/confirm.php";
                                }
                                // robokassa
                                if (robo_pay==2) {
                                    // получаем номер заказа
                                    $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/robo_order_num.php', {
                                            'key' : <? echo "'".$session_name."'"; ?>,
                                        },
                                        function(data2) {
                                            if (data>0) {
                                                $('#robo_email').val(email_1);
                                                $('#robo_order').val(data2);
                                                $('#robo_summa').val(summa);
                                                $('#fmain_submit').click();
                                            }
                                        }
                                    );
                                }
                            } else {
                                console.log('<!-- DEBUG -->'+data+'<!-- DEBUG -->');
                            }
                        }
                    );
                }

                // доставить получателю
                if ($('#send_to').is(':checked')) {
                    var name_2=$('#name_2').val();
                    var name_3=$('#name_3').val();
                    var phone_2=$('#phone_2').val();
                    phone_2=phone_2.replace(/[^0-9]/gim,'');
                    var phone_3=$('#phone_3').val();
                    phone_3=phone_3.replace(/[^0-9]/gim,'');
                    var email_2=$('#email_2').val();
                    var city_2=$('#city_2').val();
                    var street_2=$('#street_2').val();
                    var house_2=$('#house_2').val();
                    var room_2=$('#room_2').val();
                    var comment_2=$('#comment_2').val();
                    //-----------------------------------------------
                    // post
                    $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/order_add.php', {
                            'key' 				: <? echo "'".$session_name."'"; ?>,
                            'send_to' 			: 2,
                            'name_2' 			: name_2,
                            'name_3' 			: name_3,
                            'phone_2'			: phone_2,
                            'phone_3'			: phone_3,
                            'email_2'			: email_2,
                            'city_2'			: city_2,
                            'street_2'			: street_2,
                            'house_2'			: house_2,
                            'room_2'			: room_2,
                            'comment_2'			: comment_2,
                            'summa'				: summa,
                            'delivery'			: delivery,
                            'pay_type'			: pay_type,
                            'promo_code' 		: promo_code,
                            'promo_discount'	: promo_discount
                        },
                        function(data) {
                            if (data=='1') {
                                var robo_pay=$('#pay_type').data('pay_type');
                                // оплата наличными
                                if (robo_pay==1 || robo_pay==3) {
                                    window.location="https://<? echo $_SERVER['HTTP_HOST']; ?>/confirm.php";
                                }
                                // robokassa
                                if (robo_pay==2) {
                                    // получаем номер заказа
                                    $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/robo_order_num.php', {
                                            'key' : <? echo "'".$session_name."'"; ?>,
                                        },
                                        function(data2) {
                                            if (data>0) {
                                                $('#robo_email').val(email_2);
                                                $('#robo_order').val(data2);
                                                $('#robo_summa').val(summa);
                                                $('#fmain_submit').click();
                                            }
                                        }
                                    );
                                }
                            } else {
                                console.log('<!-- DEBUG -->'+data+'<!-- DEBUG -->');
                            }
                        }
                    );
                }
            }
        });
    });

</script>