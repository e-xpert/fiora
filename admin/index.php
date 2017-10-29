<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="css/component.css">
<body class="flex-container">

<?

if (in_array($type = key($_FILES), array('products', 'items'))) {

    @set_time_limit(0);

    try {
        $data = file($_FILES[$type]['tmp_name']);
    } catch (PDOException $e) {
        echo 'Не удалось загрузить файл';
    }

    $charsets = array('ASCII', 'windows-1251', 'utf-8');
    $charset = array_reduce($charsets, function($charset, $item) use ($data) {
        return $charset = strcmp(@iconv($item, $item, $data[1]), $data[1]) == 0 ? $item : $charset;
    }) or exit('Не неизвестная кодировка');

    try {
        $mysqli = new PDO('mysql:dbname=fiora;host=127.0.0.1;charset=UTF8', 'root', '');
        $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    }

    if ($type == "products") {

        try {
            $str = 1;

            $mysqli->beginTransaction();

            $mysqli->exec('DELETE from `db_rest`');

            $fields = str_replace(';', ',', trim(array_shift($data)));

            foreach($data as $values)
            {
                ++$str;

                $values = mb_convert_encoding($values, "utf-8", $charset);
                $values = str_replace('"', '', $values);
                $values = str_replace(';', '","', $values);

                $mysqli->exec('INSERT INTO db_rest (' . $fields. ') VALUES ("' . $values . '")');
            }

            $mysqli->commit();
            echo 'Данные успешно обновлены.';

        } catch (Exception $e) {
            $mysqli->rollBack();
            echo 'Призошла ошибка (строка ' . $str . '): ',  $e->getMessage(), "\n";
        }

    } elseif ($type == "items") {

        try {
            $str = 1;

            $mysqli->beginTransaction();

            $fields = explode(';', trim(array_shift($data)));

            foreach($data as $values)
            {
                ++$str;

                $values = mb_convert_encoding($values, "utf-8", $charset);
                list($artikul, $price, $art_new, $art_action, $rest) = explode(';', $values);

                //$values = htmlspecialchars($values, ENT_COMPAT);
                $values = str_replace('"', '', $values);
                $values = str_replace(';', '","', $values);

                $mysqli->exec('UPDATE db_rest SET price='.(int)$price.', art_new='.(int)$art_new.', art_action='.(int)$art_action.', rest='.(int)$rest.' WHERE artikul='.(int)$artikul);
            }

            $mysqli->commit();
            echo 'Данные успешно обновлены.';

        } catch (Exception $e) {
            $mysqli->rollBack();
            echo 'Призошла ошибка (строка ' . $str . '): ',  $e->getMessage(), "\n";
        }
    }

    $mysqli = null;

} else {
?>
        <div>
            <form action="index.php" method="post" enctype="multipart/form-data" class="box">
                <h2>Номенклатура продукции</h2>
                <input type="file" name="products" id="file-1" class="inputfile inputfile-2">
                <label for="file-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                        <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                    </svg>
                    <span>Выберите файл…</span>
                </label>
                <input type="submit" class="inputsubmit" id="submit-1" value="Загрузить" disabled="disabled">
            </form>

            <form action="index.php" method="post" enctype="multipart/form-data" class="box">
                <h2>Остатки на складе</h2>
                <input type="file" name="items" id="file-2" class="inputfile inputfile-2">
                <label for="file-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                        <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                    </svg>
                    <span>Выберите файл…</span>
                </label>
                <input type="submit" class="inputsubmit" id="submit-2" value="Загрузить" disabled="disabled">
            </form>
        </div>

        <script>

            'use strict';

            ( function ( document, window, index )
            {
                var inputs = document.querySelectorAll( '.inputfile' );
                Array.prototype.forEach.call( inputs, function( input )
                {
                    var label	 = input.nextElementSibling,
                        labelVal = label.innerHTML;

                    input.addEventListener( 'change', function( e )
                    {
                        var fileName = '';
                        if( this.files && this.files.length > 1 )
                            fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                        else
                            fileName = e.target.value.split( '\\' ).pop();

                        if( fileName ) {
                            label.querySelector( 'span' ).innerHTML = fileName;
                            label.nextElementSibling.removeAttribute( 'disabled' )
                        }

                        else {
                            label.innerHTML = labelVal;
                            label.nextElementSibling.setAttribute( 'disabled', 'disabled' )
                        }

                    });

                    // Firefox bug fix
                    input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
                    input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
                });
            }( document, window, 0 ));

        </script>

<? } ?>

</body>
</html>