<?php
if (file_exists('../_config/db.php'))
    include_once '../_config/db.php';
if (file_exists('../_classes/User.php')) {
    include_once '../_classes/User.php';
    include_once '../_classes/Authentication.php';
}

if (isset($_POST['login'])) {
    extract($_POST);
    $userChecker = User::user_checker($email, $db);
    if ($userChecker) {
        if (password_verify($password, $userChecker["password"])) {
            $authentication = new Authentication();
            $authentication->login($userChecker["user_id"]);
        }
        else
            throw new Exception("password_incorrect");
    } else {
        throw new Exception("User_doesnt_exist");
    }
}

if (isset($_GET['logout'])) {
    $authentication = new Authentication();
    $authentication->logout();
}