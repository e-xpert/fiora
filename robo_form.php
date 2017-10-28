<html>
<head>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type='text/javascript'>
		$(document).ready(function() {
			$('#fmain_submit').click();
		});
	</script>
</head>
<body>

<?

	$mrh_login = "myfioracom";
	$mrh_pass1 = "PD8xNqafDpn1F173BKlQ";
	$crc  = md5($mrh_login.":".$_POST['OutSum'].":".$_POST['InvId'].":".$mrh_pass1.":Shp_item=1");

echo "
<div style='display:none;'>
	<form id='fmain' method='post' action='https://auth.robokassa.ru/Merchant/Index.aspx'>
		<input type='hidden' name='SignatureValue' 				value=".$crc.">
		<input type='hidden' name='Shp_item' 					value=1>
		<input type='hidden' name='IncCurrLabel' 				value=''>
		<input type='hidden' name='Culture' 					value='ru'>
		<input type='hidden' name='Desc' 						value='MyFiora.com'>
		<input type='hidden' name='Encoding' 					value='utf-8'>
		<input type='hidden' name='MrchLogin' 					value='".$mrh_login."'>
		<input id='robo_order' type='hidden' name='InvId' 		value='".$_POST['InvId']."'>
		<input id='robo_summa' type='hidden' name='OutSum' 		value='".$_POST['OutSum']."'>
		<input id='robo_email' type='hidden' name='Email' 		value='".$_POST['Email']."'>		
		<input id='fmain_submit' type='submit'>
	</form>
</div>	
</body>	
</html>
";



?>