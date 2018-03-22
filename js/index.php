<script type="text/javascript">

    function recycled_add(artikul, from = null) {
        var key=<? echo "'".$session_name."'"; ?>;
        $.post('https://<? echo $_SERVER['HTTP_HOST']; ?>/php/recycled_add_from_catalog.php', {'artikul': artikul,'key':key,'from':from},
            function(data) {
                if (data=='0') {
                    alert('Ошибка')
                } else {
                    location.href = '/basket.php';
                }
            }
        );
    }

</script>