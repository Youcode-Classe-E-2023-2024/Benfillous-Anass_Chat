<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once '_config/config.php';
include_once '_functions/functions.php';
include_once '_config/db.php';

/*dd($_SERVER['PHP_SELF']);*/

spl_autoload_register(function ($class) {
    include_once '_classes/' . $class . '.php';
});

if (!isset($_SESSION["login"])) {
    if (isset($_GET['page']) && $_GET['page'] == "login")
        $page = 'login';
    else if (isset($_GET['page']) && $_GET['page'] == "register")
        $page = 'register';
    else $page = 'login';
} else if (isset($_SESSION["login"])) {
    $page = 'home';
} else if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = trim(strtolower($_GET['page']));
} else {
    $page = 'home';
}
$all_pages = scandir('controllers');

if (in_array($page . '_controller.php', $all_pages)) {
    include_once 'models/' . $page . '_model.php';
    include_once 'controllers/' . $page . '_controller.php';
    include_once 'views/_layout.php';
} else {
    header('Location: 404.html');
}

