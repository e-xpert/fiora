<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
<script type="text/javascript">
    function recycled_add(artikul) {
        var key=<? echo "'".$session_name."'"; ?>;
        var count=$('#product_count').val();
        $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/recycled_add_from_product.php', {'artikul': artikul,'key':key, 'count': count},
            function(data) {
                if (data=='0') {
                    alert('Ошибка')
                } else {
                    $('#basket_count').text(data);
                    $('#basket_add').show();
                    setTimeout("$('#basket_add').hide()",1500);
                }
            }
        );
    }

    function show_img_full(path) {
        $('#img_full').attr('src',path);
    }

</script>