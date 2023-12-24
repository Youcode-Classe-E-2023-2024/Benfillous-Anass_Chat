<?php
class Room {
    function insertRoom($roomName, $creator, $members, $db) {
        $sql = "INSERT INTO room (room_name, creator) VALUES (?,?)";
        $stmt = mysqli_stmt_init($db);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "si", $roomName, $creator);
        mysqli_stmt_execute($stmt);
        $roomId = mysqli_insert_id($db);

        foreach ($members as $member) {
            $this->insertMember($roomId, $member, $db);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($db);
    }
    function insertMember($roomId, $member, $db) {
        $sql = "INSERT INTO room_member (room_id, user_id) VALUES (?,?)";
        $stmt = mysqli_stmt_init($db);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $roomId, $member);
        mysqli_stmt_execute($stmt);
    }

    static function getAll()
    {
        global $db;
        $result = $db->query("SELECT * FROM room");
        if ($result)
            return $result->fetch_all(MYSQLI_ASSOC);
    }
}