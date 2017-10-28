<?
$phone=$_POST['phone'];
$period_1=$_POST['period_1'];
$period_2=$_POST['period_2'];
$period_3=$_POST['period_3'];
$period_4=$_POST['period_4'];

if (strlen($period_1)>4) $period_1='Да';
if (strlen($period_2)>4) $period_2='Да';
if (strlen($period_3)>4) $period_3='Да';
if (strlen($period_4)>4) $period_4='Да';

	$message="<html><head><meta charset='utf-8'><style>
	body {
		-moz-background-size: 100%;
		-webkit-background-size: 100%;
		-o-background-size: 100%;
		background-size: 100%;
		background-color: #ffffff;
		padding: 0px;
		margin: 0;
	}
	</style></head><body>

	Телефон: <b>".$_POST['phone']."</b><br><br>

	06-08: <b>".$period_1."</b><br><br>
	08-10: <b>".$period_2."</b><br><br>
	10-12: <b>".$period_3."</b><br><br>
	12-14: <b>".$period_4."</b><br><br>

	</center></div></body></html>
";

$to  = 'myfiora@yandex.ru';
$subject = 'САЙТ!!! - обратный звонок';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From: ТМ Fi’ora <no_reply@myfiora.com>' . "\r\n";
mail($to, $subject, $message, $headers);
?>





