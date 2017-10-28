<?
    $to = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    $text_type = htmlspecialchars($_POST['text_type']);
    $subject = 'Ваш промокод на myfiora.com';

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
                        • срок действия промокода - 31 марта 2017 года.
                    </div>
                </td>
                </tr>
                </table>

                <table width="630" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; margin: 0 auto; border-top: 1px solid #aeaeae;">
                <tr>
                <td style="padding: 25px 0px; font-size: 12px; text-align: center;">
                    <div style="margin-bottom: 20px; font-size: 15px;">Мы в соцсетях:</div>
                    <div style="margin-bottom: 20px;">
                        <a href="#"><img width="35" src="https://myfiora.com/email/soc-vk.png" alt="" /></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#"><img width="35" src="https://myfiora.com/email/soc-ok.png" alt="" /></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#"><img width="35" src="https://myfiora.com/email/soc-fb.png" alt="" /></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#"><img width="35" src="https://myfiora.com/email/soc-ig.png" alt="" /></a>
                    </div>

                    Мы рады ответить на Ваши вопросы по электронной почте <a href="mailto:welcome@myfiora.ru" style="color: #0078ff;">welcome@myfiora.ru</a>
                    <br />
                    или по телефонам 8-800-550-8388

                    <div style="background: #aeaeae; display: block; width: 200px; height: 1px; margin: 20px auto;"></div>

                    <a href="https://myfiora.com/legend.php" style="color: #0078ff;">Легенда о бренде Fi`ora</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="http://land.fiora-rf.ru/" style="color: #0078ff;">Бизнес с Fi`ora</a>
                    <br /><br />
                    &copy; 2016 «Fi`ora». Все права защищены
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
    $headers .= 'From: Ваш промокод на myfiora.com <info@myfiora.com>'."\r\n";

    mail($to, $subject, $message, $headers);
?>
