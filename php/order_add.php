<?
//==========================================
require_once ( "mysql.php"		);
require_once ( "recycled.php"	);
//==========================================

$db=db_connect();

$order = do_order($db);

$subject = 'Заказ на myfiora.com #'.$order[0].' от '.date('d.m.Y');
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From: ТМ Fi’ora<order@myfiora.com>' . "\r\n";

$filename = "../email/order/saller.html";
$body = get_order_message($filename, $order);
mail('myfiora@yandex.ru', $subject, $body, $headers);
//mail('e.xpert@mail.ru', $subject, $body, $headers);
//mail('order@myfiora.com', $subject, $body, $headers);

$email = empty($_POST['email_1']) ? $_POST['email_2'] : $_POST['email_1'];
$filename = "../email/order/customer.html";
$body = get_order_message($filename, $order);
mail($email, $subject, $body, $headers);

mysql_error($db);

echo 1;

//---------------------------------------------------------------------------------

function do_order($db)
{
	$query = "select * 
              from db_basket as b
              left join db_rest as r
                on b.artikul=r.artikul 
              LEFT JOIN db_collection as c
			    ON r.col_uid=c.col_uid
              LEFT JOIN db_form as f
                ON r.form_uid=f.form_uid
              where user_hash='" . $_POST['key'] . "'";

	$res=mysql_query($query);
	$res_count=mysql_num_rows($res);

	for ($i=0;$i<$res_count;$i++) {
		$data[$i]=mysql_fetch_row($res);
	}

	if (mysql_query(get_order_query())) {

		$order_id = mysql_insert_id($db);

		$query = "insert into db_order_list (order_id, user_hash, artikul, `count`, box_count, lavanda_count) select " . $order_id . ", db_basket.user_hash, db_basket.artikul, db_basket.`count`, db_basket.box_count, db_basket.lavanda_count from db_basket where db_basket.user_hash='" . $_POST['key'] . "'";
		mysql_query($query);

		$query = "delete from db_basket where user_hash='" . $_POST['key'] . "'";
		mysql_query($query);
	}

	return array($order_id+171300, $data);
}

function get_order_query()
{
	return $_POST['send_to']==2 ?
		"insert into db_order
			(
				user_hash,
				user_send_to,
				user_name_1,
				user_name_2,
				user_phone_1,
				user_phone_2,
				user_email_1,
				user_city_2,
				user_street_2,
				user_house_2,
				user_room_2,
				user_comment_2,
				user_summa,
				pay_status,
				pay_type,
				promo_code,
				promo_discount
			)
			values
			(
				'".$_POST['key']."',
				'Доставить по адресу',
				'".$_POST['name_2']."',
				'".$_POST['name_3']."',
				'".$_POST['phone_2']."',
				'".$_POST['phone_3']."',
				'".$_POST['email_2']."',
				'".$_POST['city_2']."',
				'".$_POST['street_2']."',
				'".$_POST['house_2']."',
				'".$_POST['room_2']."',
				'".$_POST['comment_2']."',
				'".$_POST['summa']."',
				0,
				'".$_POST['pay_type']."',
				'".$_POST['promo_code']."',
				'".$_POST['promo_discount']."'
			)" :
		"insert into db_order
			(
				user_hash,
				user_send_to,
				user_name_1,
				user_phone_1,
				user_email_1,
				user_city_1,
				user_street_1,
				user_house_1,
				user_room_1,
				user_comment_1,
				user_summa,
				pay_status,
				pay_type,
				promo_code,
				promo_discount
			)
			values
			(
				'".$_POST['key']."',
				'Я получатель заказа',
				'".$_POST['name_1']."',
				'".$_POST['phone_1']."',
				'".$_POST['email_1']."',
				'".$_POST['city_1']."',
				'".$_POST['street_1']."',
				'".$_POST['house_1']."',
				'".$_POST['room_1']."',
				'".$_POST['comment_1']."',
				'".$_POST['summa']."',
				0,
				'".$_POST['pay_type']."',
				'".$_POST['promo_code']."',
				'".$_POST['promo_discount']."'
			)";
}

function get_order_message($filename, $order = array())
{
	$f_body = fopen($filename, 'r');
	$body = fread($f_body, filesize($filename));
	fclose($f_body);

	$body = str_replace('[*order_number*]', $order[0], $body);
	$body = str_replace('[*order_date*]', date('d.m.Y'), $body);

    $product_list = '';
    $order_list = '';
    $product_sum = 0;
	foreach ($order[1] as $product) {

        $product_list .= '<tr>
            <td style="padding: 15px 30px;">
                <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                <tr>
                <td><a href="https://myfiora.com/product.php?art=' . $product[2] . '"><img src="https://myfiora.com/art_70/' . $product[2] . '.jpg" alt="" width="70px" /></a></td>
                <td style="padding-left: 10px; font-size: 12px;">
                    <div style="padding-bottom: 5px; font-size: 15px; font-weight: bold;">' . $product[33] . '</div>
                    ' . $product[44] . '
                    <div style="padding-top: 5px; color: #aeaeae;">Артикул: ' . $product[2] . '</div>
                </td>
                </tr>
                </table>
            </td>
            <td style="border-right: 1px solid #dcdcdc; padding: 15px 30px; text-align: center; white-space: nowrap;">' . $product[20] . ' Р</td>
            <td style="border-right: 1px solid #dcdcdc; padding: 15px 30px; text-align: center;">' . $product[3] . '</td>
            <td style="padding: 15px 30px; text-align: right; white-space: nowrap;">' . $product[20] * $product[3]  . ' Р</td>
        </tr>';

        $product_sum += $product[20] * $product[3];

		$order_list .= $product[2] . ' - ' . $product[3] . '<br />';
	}

	$body = str_replace('[*order_products*]', $product_list, $body);
    $body = str_replace('[*order_list*]', $order_list, $body);

    $pay[1] = 'Оплата курьеру наличными';
    $pay[2] = 'Онлайн оплата';

    $product_sum += $_POST['delivery'];
    $discount_sum = $_POST['promo_discount'] / 100 * $product_sum;
    $total_sum = $product_sum - $discount_sum;

    $body = str_replace('[*order_summa*]', $total_sum, $body);
    $body = str_replace('[*order_delivery*]', $_POST['delivery'] ? $_POST['delivery'] . ' Р' : '-', $body);
    $body = str_replace('[*order_discount*]', $discount_sum ? $discount_sum . ' Р' : '-', $body);
    $body = str_replace('[*order_discount_code*]', $_POST['promo_code'], $body);
    $body = str_replace('[*order_pay*]', $pay[$_POST['pay_type']], $body);

	if ($_POST['send_to']==2) {
		$body = str_replace('[*order_name*]', $_POST['name_3'], $body);
		$body = str_replace('[*order_phone*]', $_POST['phone_3'], $body);
		$body = str_replace('[*order_name_to*]', $_POST['name_2'], $body);
		$body = str_replace('[*order_phone_to*]', $_POST['phone_2'], $body);
		$body = str_replace('[*order_city*]', $_POST['city_2'], $body);
		$body = str_replace('[*order_address*]', $_POST['street_2'] . ", " . $_POST['house_2'] . ", " . $_POST['room_2'], $body);
		$body=str_replace('[*order_comment*]',$_POST['comment_2'],$body);
	} else {
		$body=str_replace('[*order_name*]',$_POST['name_1'],$body);
		$body=str_replace('[*order_phone*]',$_POST['phone_1'],$body);
		$body=str_replace('[*order_name_to*]',$_POST['name_1'],$body);
		$body=str_replace('[*order_phone_to*]', $_POST['phone_1'], $body);
		$body=str_replace('[*order_city*]',$_POST['city_1'],$body);
		$body=str_replace('[*order_address*]',$_POST['street_1'].", ".$_POST['house_1'].", ".$_POST['room_1'],$body);
		$body=str_replace('[*order_comment*]',$_POST['comment_1'],$body);
	}

	return $body;
}

?>