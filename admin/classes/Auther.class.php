<?php

    class Auther{

        const LOGIN_CHK_KEY = "isLogin";

        //　非公開
        private $sessionId = null;

        //　公開
        public function __construct()
        {
            session_start();
            $this->sessionId = session_id();
        }

        public function login_chk($is_top = false)
        {
            session_start();
            if($is_top) {
                if(!empty ($_SESSION[ Auther::LOGIN_CHK_KEY ])) {
                    header("Location: ./list.php");
                    exit;
                }
            }else{
                if(!empty($_SESSION[ Auther::LOGIN_CHK_KEY ])) {
                    header("Location: ./login.php");
                    exit;
                }
            }
        }
        
        public function login($user_name, $pass_word) 
        {
            if($user_name === "" && $pass_word === ""){
                return true;
            }else{
                return false;
            }
        }
    }

?>