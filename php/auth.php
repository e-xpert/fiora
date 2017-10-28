<?php

    require_once('./validation.php');
    require_once('./mysql.php');

    /**
     *
     */
    class Auth extends Validation
    {
        protected $name;
        protected $email;
        protected $phone;
        protected $code;
        protected $spam;

        function __construct($name = '', $email = '', $phone = '', $code = '', $spam = '') {
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->code = $code;
            $this->spam = $spam;
        }

        public function reg()
        {
            $response = array();

            if ($this->ValidName() == false) {
                $response['fields'][] = 'name';
            }
            if ($this->ValidEmail() == false) {
                $response['fields'][] = 'email';
            }
            if ($this->ValidPhone() == false) {
                $response['fields'][] = 'phone';
            }
            if ($this->ValidCode() == false) {
                $response['fields'][] = 'code';
            }
            if ($this->ValidName() && $this->ValidEmail() && $this->ValidPhone() && $this->CheckSms()) {
                $response['status'] = 'success';
                setcookie('login', 1, strtotime('+30 days'), '/');
                $result = mysql_query('
                    INSERT INTO
                        db_users (name, email, phone, spam, date_reg)
                    VALUES
                        ("'.$this->name.'", "'.$this->email.'", "'.$this->phone.'", '.$this->spam.', "'.date("Y-m-d H:i:s").'")');
            } else {
                $response['status'] = 'error';
            }
            echo json_encode($response);
        }

        public function sms()
        {
            $response = array();

            if ($this->ValidPhone() == false) {
                $response['fields'][] = 'phone';
            }
            if ($this->ValidPhone()) {
                $response['status'] = 'success';
                $code = rand(10000, 99999);
                $result = mysql_query('
                    INSERT INTO
                        db_sms (phone, code)
                    VALUES
                        ("'.$this->phone.'", "'.$code.'")');
                // mail('39df7538-f730-f064-8173-417d4f19c183+'.$this->phone.'@sms.ru', 'from:Fi`ora', $code);
                $ch = curl_init("https://sms.ru/sms/send");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_POSTFIELDS, array(
                	"api_id" => "39df7538-f730-f064-8173-417d4f19c183",
                	"to" => "'.$this->phone.'",
                    "from" => "Fiora",
                	"text" => $code
                ));
                $body = curl_exec($ch);
                curl_close($ch);
                var_dump($body);
            } else {
                $response['status'] = 'error';
            }
            echo json_encode($response);
        }

        public function CheckSms()
        {
            $result = mysql_query('
                SELECT
                    *
                FROM
                    db_sms
                WHERE
                    phone = "'.$this->phone.'" AND code = "'.$this->code.'"');
            if (mysql_num_rows($result) != 0) {
                return true;
            } else {
                return false;
            }
        }

        public function login()
        {
            $response = array();

            if ($this->ValidEmail() == false) {
                $response['fields'][] = 'email';
            }
            if ($this->ValidPhone() == false) {
                $response['fields'][] = 'phone';
            }
            if ($this->ValidEmail() && $this->ValidPhone()) {
                $response['status'] = 'success';
                $result = mysql_query('
                    SELECT
                        *
                    FROM
                        db_users
                    WHERE
                        email LIKE "'.$this->email.'" AND phone LIKE "'.$this->phone.'"');
                if (mysql_num_rows($result) != 0) {
                    $response['login'] = true;
                    setcookie('login', 1, strtotime('+30 days'), '/');
                } else {
                    $response['login'] = false;
                }
            } else {
                $response['status'] = 'error';
            }
            echo json_encode($response);
        }
        public function logout()
        {
            $response = array();
            $response['status'] = 'success';
            $response['logout'] = true;
            setcookie('login', 0, strtotime('+30 days'), '/');
            echo json_encode($response);
        }
    }

    $db = db_connect();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $form = (isset($_POST['form'])) ? $_POST["form"] : null;
        $name = (isset($_POST['name'])) ? $_POST["name"] : null;
        $email = (isset($_POST['email'])) ? $_POST["email"] : null;
        $phone = (isset($_POST['phone'])) ? $_POST["phone"] : null;
        $code = (isset($_POST['code'])) ? $_POST['code'] : null;
        $spam = (isset($_POST['spam'])) ? $_POST['spam'] : null;
    }

    $Auth = new Auth($name, $email, $phone, $code, $spam);
    switch ($form) {
        case 'reg':
            $Auth->reg();
            break;
        case 'sms':
            $Auth->sms();
            break;
        case 'login':
            $Auth->login();
            break;
        case 'logout':
            $Auth->logout();
            break;
        default:
            # code...
            break;
    }

    mysql_close($db);

?>
