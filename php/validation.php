<?php
    /**
     * Validation Class
     */
    class Validation
    {
        protected function ValidData($data = '')
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = strip_tags($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public function ValidName()
        {
            $this->name = $this->ValidData($this->name);
            $pattern = '/([a-z\d])/i';

            if (!preg_match($pattern, $this->name) && $this->name != '') {
                return true;
            } else {
                return false;
            }
        }

        public function ValidEmail()
        {
            $this->email = $this->ValidData($this->email);

            if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                return false;
            }
        }

        public function ValidPhone()
        {
            $this->phone = $this->ValidData($this->phone);

            $pattern = '/(\+7)|([\(\)])|(\s)|(-)/i';
            $replacement = '';

            if (strlen(preg_replace($pattern, $replacement, $this->phone)) == 10) {
                return true;
            } else {
                return false;
            }
        }

        public function ValidCode()
        {
            $this->code = $this->ValidData($this->code);
            $pattern = '/([0-9])/i';

            if (!preg_match($pattern, $this->code) && $this->code != '') {
                return true;
            } else {
                return false;
            }
        }
    }
?>
