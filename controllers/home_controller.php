<?php
if (file_exists('../_config/db.php'))
    include_once '../_config/db.php';
if (file_exists('../_classes/Room.php')) {
    include_once '../_classes/Room.php';
    session_start();
}

$user = new User($_SESSION["user_id"]);

if (isset($_POST["roomName"])) {
    extract($_POST);

    $creator = $_SESSION["user_id"];
    $room = new Room();
    $room->insertRoom($roomName, $creator, $members, $db);
    exit;
}

if (isset($_POST["req"]) && $_POST["req"] == "displayRooms") {
    $rooms = Room::getAll($_SESSION["user_id"]);
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
    $date = date("U");
    Room::insertMesaage($roomId, $creator, $message, $date, $db);
    exit;
}

if (isset($_POST["membersArray"])) {
    extract($_POST);
    $room = new Room();
    $sender = $_SESSION["user_id"];
    foreach ($membersArray as $member) {
        $room->insertMemberRequest($_POST["currentRoom"], $sender, $member, $db);
    }
    exit;
}

if (isset($_POST["req"]) && $_POST["req"] == "displayInvite") {
    $receiver = $_SESSION["user_id"];
    $roomInvite = Room::displayInvitation($receiver, $db);
    echo json_encode($roomInvite);
    exit;
}


if (isset($_POST["acceptRoomInvitation"])) {
    extract($_POST);
    $room = new Room();
    $receiver = $_SESSION["user_id"];
    $room->insertMember($roomInvitationRoomId, $receiver, $db);
    Room::removeInvitation("room_invitation", $roomInvitationId);
    exit;
}

if (isset($_POST["rejectRoomInvitation"])) {
    extract($_POST);
    Room::removeInvitation("room_invitation", $roomInvitationId);
    exit;
}

if (isset($_POST["ban"])) {
    extract($_POST);
    Room::banMember($currentRoom, $memberId);
    echo ("nadi");
    exit;
}

if (isset($_POST["req"]) && $_POST["req"] === "getRoomId") {
    $_SESSION["currentRoomId"] = $_POST["roomId"];
    echo $_SESSION["currentRoomId"];
    exit;
}

if (isset($_POST["req"]) && $_POST["req"] === "displayUsers") {
    $membersData = [];

    foreach ($users as $user) {
        if (!(Room::memberChecker($_SESSION["currentRoomId"], $user["user_id"])))
            $membersData[] = $user;
    }
    echo json_encode($membersData);
    exit;
}

if(isset($_POST["connected"])) {
    echo $_SESSION["user_id"];
    exit;
}

if (isset($_POST['logout'])) {
    $authentication = new Authentication();
    $authentication->logout();
}