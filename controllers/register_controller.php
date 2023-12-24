<?php
if (file_exists('../_config/db.php'))
    include_once '../_config/db.php';
if(file_exists('../_classes/User.php'))
    include_once '../_classes/User.php';
if (isset($_POST['signup'])) {
    extract($_POST);

    $password = password_hash($password, PASSWORD_BCRYPT);
    $targetDir = "../assets/img/";
    $fileName = basename($_FILES["picture"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    // Upload file to server
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFilePath)) {

        $userChecker = User::user_checker($email, $db);
        if ($userChecker) {
            throw new Exception("User_exist");
        } else {
            User::insertUser($username, $email, $password, $fileName, $db);
        }
    }
}