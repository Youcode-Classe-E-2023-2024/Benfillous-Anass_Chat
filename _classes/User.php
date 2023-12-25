<?php
class User
{
    public $id;
    public $email;
    public $username;
    private $password;

    public function __construct($id)
    {
        global $db;

        $result = $db->query("SELECT * FROM user WHERE user_id = '$id'");

        $user = $result->fetch_assoc();

        $this->id = $user['users_id'];
        $this->email = $user['users_email'];
        $this->username = $user['users_username'];
        $this->password = $user['users_password'];
    }

    static function getAll()
    {
        global $db;
        $result = $db->query("SELECT * FROM user");
        if ($result)
            return $result->fetch_all(MYSQLI_ASSOC);
    }

    static function user_checker($email, $db)
    {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $stmt = mysqli_stmt_init($db);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result)
            return $result->fetch_assoc();
        return false;
    }

    static function insertUser($username, $email, $password, $picture, $db)
    {
        $sql = "INSERT INTO user (username, email, password, picture) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($db);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $password, $picture);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($db);
    }

    function edit()
    {
        global $db;
        return $db->query("UPDATE users SET users_email = '$this->email', users_username = '$this->username' WHERE users_id = '$this->id'");
    }

    public function setPassword($pwd)
    {
        $this->password = password_hash($pwd, PASSWORD_DEFAULT);
    }
}