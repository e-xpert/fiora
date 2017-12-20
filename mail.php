<?

    $to = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    $text_type = htmlspecialchars($_POST['text_type']);

    if ($_POST['subscribe']) {
        require_once("php/mysql.php");

        $db=db_connect();

        $res = mysql_query("select * from db_subscribe where email = '".$to."'");

        if (mysql_num_rows($res) == 0) {
            mysql_query("insert into db_subscribe (email)values ('".$to."')");
        }

        mysql_close($db);
    }

    switch ($text_type) {
        case 'main':
            $text = 'Благодарим Вас за проявленный интерес к цветочным композициям Fi`ora. Вы узнали основные ценности продукта и теперь ваша покупка станет выгоднее, используя промокод, приведенный ниже.';
            $promo_code = 'AC1710F';
            break;
        case 'follower':
            $text = 'Благодарим Вас за использование нашего сервиса, позволяющего покупать композиции Fi`ora выгоднее и за то, что перешли по ссылке, чтобы узнать о модном современном аксессуаре для декорирования интерьеров из живых цветов.';
            $promo_code = 'VALUE5F';
            break;
        case 'share':
            $text = 'Благодарим Вас за использование нашего сервиса, позволяющего покупать композиции Fi`ora выгоднее и возможность узнать аудитории вашей социальной сети о модном современном аксессуаре для декорирования интерьеров из живых цветов.';
            break;
        default:
            # code...
            break;
    }

    $subject = 'Ваш промокод на myfiora.com';
    $message = '
        <!DOCTYPE html>
        <html lang="ru">
        <head>
            <title>Ваш промокод на myfiora.com</title>
        </head>
        <body>

            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; margin:0 auto; font-family: Arial, Helvetica, sans-serif; font-size:15px; color:#000;">
            <tr>
            <td>
    
                <table width="630" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; margin: 0 auto; border-bottom: 1px solid #aeaeae;">
                <tr>
                <td style="padding: 20px 0px;">
                    <a href="https://myfiora.com"><img src="https://myfiora.com/email/logo.png" alt="" /></a>
                </td>
                <td style="padding: 20px 0px; text-align: right; font-size: 18px; color: #aeaeae;">
                    Ваш промокод на следующую покупку.
                </td>
                </tr>
                </table>
    
                <table width="630" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; margin: 0 auto;">
                <tr>
                <td style="padding: 30px 0px;">
                    Здравствуйте, '.$name.'!
                    <br /><br />
                    '.$text.'
                </td>
                </tr>
                <tr>
                <td style="">
                    <div style="background: url(https://myfiora.com/email/promo_bg.jpg) no-repeat 0 0 / 100% 100%; margin-bottom: 20px; padding: 30px 100px; text-align: center;">
                        <div style="margin-bottom: 20px; font-size: 25px;">Ваш промокод на скидку 10%:</div>
                        <div style="background: #fff; margin-bottom: 20px; padding: 20px 10px; font-size: 32px;">
                            '.$promo_code.'
                        </div>
                        <div style="font-size: 12px;">Скопируйте промокод и вставьте его в соответствующее поле при оформлении заказа.</div>
                    </div>
                    <div style="font-size: 12px; color: #aeaeae;">
                        • указанный промокод действует на сайте myfiora.com;<br />
                        • промокод не распространяется на позиции со специальной ценой;<br />
                        • срок действия промокода - 31 марта 2018 года.
                    </div>
                </td>
                </tr>
                </table>
    
                <table width="630" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; margin: 0 auto; border-top: 1px solid #aeaeae;">
                <tr>
                <td style="padding: 25px 0px; font-size: 12px; text-align: center;">
                    <div style="margin-bottom: 20px; font-size: 15px;">Мы в соцсетях:</div>
                    <div style="margin-bottom: 20px;">
                        <a href="https://vk.com/myfiora"><img width="35" src="https://myfiora.com/images/soc/soc-vk.png" alt="" /></a>
                        <a href="https://ok.ru/fiorazhivy"><img width="35" src="https://myfiora.com/images/soc/soc-ok.png" alt="" /></a>
                        <a href="https://www.facebook.com/myfiora"><img width="35" src="https://myfiora.com/images/soc/soc-fb.png" alt="" /></a>
                        <a href="https://www.instagram.com/my_fiora/"><img width="35" src="https://myfiora.com/images/soc/soc-ig.png" alt="" /></a>
                    </div>

                    Мы рады ответить на Ваши вопросы по электронной почте <a href="mailto:welcome@myfiora.ru" style="color: #0078ff;">welcome@myfiora.ru</a>
                    <br />
                    или по телефонам 8-800-550-8388

                    <div style="background: #aeaeae; display: block; width: 200px; height: 1px; margin: 20px auto;"></div>

                    <a href="https://myfiora.com/legend.php" style="color: #0078ff;">Легенда о бренде Fi`ora</a>
                    <br /><br />
                    &copy; 2017 «Fi`ora». Все права защищены
                </td>
                </tr>
                </table>
    
            </td>
            </tr>
            </table>

        </body>
        </html>
    ';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: ТМ Fi’ora<order@myfiora.com>' . "\r\n";

    mail($to, $subject, $message, $headers, '-forder@myfiora.com');

// Уведомление магазину
    $to  = 'myfiora@yandex.ru ';
    $subject = 'Отпрален промокод на myfiora.com';
    $message="
        <html><head><meta charset='utf-8'></head>
            <body>
            
            " . $subject . "<br><br>
            Имя: <b>".$_POST['name']."</b><br><br>
            e-mail: <b>".$_POST['email']."</b><br><br>
        
            </body>
        </html>
    ";

    mail($to, $subject, $message, $headers, '-forder@myfiora.com');
?>
