<?php
if (file_exists('../_config/db.php'))
    include_once '../_config/db.php';
if (file_exists('../_classes/Room.php')) {
    include_once '../_classes/Room.php';
}

if (isset($_POST["roomName"])) {
    extract($_POST);

    $creator = $_SESSION["user_id"];
    $room = new Room();
    $room->insertRoom($roomName, $creator, $members, $db);
    exit;
}

if (isset($_POST["req"]) && $_POST["req"] == "displayRooms") {
    $rooms = Room::getAll();
    echo json_encode($rooms);
    exit;
}

if (isset($_POST["members"])) {
    $members = Room::getAllMembers($_POST["roomId"]);
    echo json_encode($members);
    exit;
}

if (isset($_POST["chat"])) {
    $chat = Room::getChat($_POST["roomId"]);
    echo json_encode($chat);
    exit;
}

if (isset($_POST["message"])) {
    extract($_POST);
    $creator = $_SESSION["user_id"];
    $date = $date("U");
    Room::insertMesaage($roomId, $creator, $message, $date, $db);
    exit;
}
