<?php
if (file_exists('../_config/db.php'))
    include_once '../_config/db.php';
if (file_exists('../_classes/Room.php')) {
    include_once '../_classes/Room.php';
}

if (isset($_POST["roomName"])) {
    session_start();
    extract($_POST);

    $creator = $_SESSION["user_id"];
    $room = new Room();
    $room->insertRoom($roomName, $creator, $members, $db);

    echo"nadi";
}

if (isset($_POST["req"]) && $_POST["req"] == "displayRooms") {
    $rooms = Room::getAll();
    echo json_encode($rooms);
}
