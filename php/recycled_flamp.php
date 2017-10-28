<?

	if (strlen($_POST['key'])==32) {
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

				".$_POST['text']." 		<br>
				".$_POST['info_1']."	<br>
				".$_POST['info_2']."	<br>
				".$_POST['info_3']."	<br>
				".$_POST['key']."	<br>
				
				</body></html>
				";

				$to  = "welcome@fiora-rf.ru";
				$subject = 'Сайт, отзыв, корзина';
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				$headers .= 'From: Fi\'ora <no_reply@myfiora.com>' . "\r\n";
				if (mail($to, $subject, $message, $headers)) {
					echo "1";
				}
	}

?>