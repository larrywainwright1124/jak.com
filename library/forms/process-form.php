<?php

class ProcessForm {

    static public function process() {
        if(isset($_POST['btn_login'])) {
            self::processLogin();
        }
    }

    static public function processLogin() {
        global $db, $router;

        if(isset($_POST['user_name']) && isset($_POST['user_password'])) {
            $sql = $db->prepare("select user_id from users where user_name=%s and user_pass=md5(%s)", [
                $_POST['user_name'], $_POST['user_password']
            ]);
            $row = $db->get_row($sql, OBJECT);
            if($row != null && isset($row->user_id)) {
                $_SESSION['user_id'] = $row->user_id;
                $_SESSION['user_name'] = $_POST['user_name'];
                header('location: /');
            }
            else {
                unset($_SESSION['user_id']);
                unset($_SESSION['user_name']);
//                $rt = $router->navToDefault();
//                $_SERVER['REQUEST_URI'] = $rt->getUrl();
            }
        }
        else {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
//            $rt = $router->navToDefault();
//            $_SERVER['REQUEST_URI'] = $rt->getUrl();
        }
    }
}
