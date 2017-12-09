<script type="text/javascript">

    function banner_filter(){
        $('#filter_input_root_41').click();
    }

    var basket_tooltips_timeout;

    function recycled_add(artikul) {
        var key=<? echo "'".$session_name."'"; ?>;
        $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/recycled_add_from_catalog.php', {'artikul': artikul,'key':key},
            function(data) {
                if (data=='0') {
                    alert('Ошибка')
                } else {
                    $('#basket_count').text(data);

                    $('.basket_add_' + artikul).show();
                    $('.hov').css('z-index', '20');

                    clearTimeout(basket_tooltips_timeout);
                    basket_tooltips_timeout = setTimeout("hide_basket_tooltips()",1500);

                    // $('#basket_add').show();
                    // setTimeout("$('#basket_add').hide()",1500);
                }
            }
        );
    }

    function hide_basket_tooltips() {
        $('.hov').css('z-index', '10');
        $('.tooltips_box').hide();
    }

    function filter_clear() {
        //$("label").removeClass('active');
        // show all ---------------------

        $('.is_filter').each(
            function(){
                var subcol=this.id;
                $('#'+subcol).show();
            }
        );

        $('.filter_root').each(
            function(){
                var col=this.id;
                var col_val=$('#'+col).val();
                if (col_val==1) {
                    $('#'+col).click();
                }
            }
        );

        //-------------------------------

        $('input[type=checkbox]').each(
            function(){
                var col=this.id;
                if (col!='') {
                    var col_val=$('#'+col).val();
                    var col_root=$('#'+col).attr('class');
                    if (col_root!='filter_root');
                    if (col_val==1) {
                        $('#'+col).click();
                    }
                }
            }
        );

        $('#filtered').val(0);
        $('#show_all').hide();

    }

    function filter_col(col_root) {
        // filter - flag check
        var filter_on=$('#filtered').val();
        // hide all
        if (filter_on==0) {
            $('.is_filter').each(
                function(){
                    var subcol=this.id;
                    $('#'+subcol).hide();
                }
            );
            $('#filtered').val(1);
        }

        var col_check=$('#filter_input_root_'+col_root).val();
        if (col_check==1) {
            $('#filter_input_root_'+col_root).val(0);
            $('.filter_root_'+col_root).each(
                function(){
                    var subcol=this.id;
                    if ($('#'+subcol).val()==1) {
                        $('#'+subcol).click();
                    }
                }
            );

        } else {
            $('#filter_input_root_'+col_root).val(1);
            $('.filter_root_'+col_root).each(
                function(){
                    var subcol=this.id;
                    if ($('#'+subcol).val()!=1) {
                        $('#'+subcol).click();
                    }
                }
            );
        }


        //----------------------------------------------------------
        // если был фильтр и все отключили
        filter_on=$('#filtered').val();
        if (filter_on==1) {
            var all_hide=1;
            $('.is_filter').each(
                function(){
                    var subcol=this.id;
                    if ( $('#'+subcol).is(":visible") ) {
                        all_hide=all_hide*1+1;
                    }
                }
            );
            if (all_hide==1) {
                // show all -----------------------------------
                $('.is_filter').each(
                    function(){
                        var subcol=this.id;
                        $('#'+subcol).show();
                    }
                );
                $('#filtered').val(0);
                //----------------------------------------------
            }
        }
        //============================================================


        if ($('#filtered').val()==1) {
            $('#show_all').show();
        } else {
            $('#show_all').hide();
        }



    }


    function filter_subcol(subcol) {
        var filter_on=$('#filtered').val();
        // hide all -----------------------------------
        if (filter_on==0) {
            $('.is_filter').each(
                function(){
                    var subcol=this.id;
                    $('#'+subcol).hide();
                }
            );
            $('#filtered').val(1);
            $('#show_all').show();
        } else {
            $('#show_all').hide();
        }
        //----------------------------------------------

        var subcol_check=$('#filter_input_subcol_'+subcol).val();
        if (subcol_check==1) {
            $('#filter_input_subcol_'+subcol).val(0);
            $('#collection_head_uid_'+subcol).hide();
            $('#collection_row_uid_'+subcol).hide();
            $('#collection_hr_uid_'+subcol).hide();
        } else {
            $('#filter_input_subcol_'+subcol).val(1);
            $('#filtered').val(1);
            $('#show_all').show();
            $('#collection_head_uid_'+subcol).show();
            $('#collection_row_uid_'+subcol).show();
            $('#collection_hr_uid_'+subcol).show();
        }



        //----------------------------------------------------------
        // если был фильтр и все отключили
        filter_on=$('#filtered').val();
        if (filter_on==1) {
            var all_hide=1;
            $('.is_filter').each(
                function(){
                    var subcol=this.id;
                    if ( $('#'+subcol).is(":visible") ) {
                        all_hide=all_hide*1+1;
                        $('#show_all').show();
                    }
                }
            );
            if (all_hide==1) {
                // show all -----------------------------------
                $('.is_filter').each(
                    function(){
                        var subcol=this.id;
                        $('#'+subcol).show();
                    }
                );
                $('#filtered').val(0);
                //----------------------------------------------
            }
        }
        //============================================================


    }
</script>