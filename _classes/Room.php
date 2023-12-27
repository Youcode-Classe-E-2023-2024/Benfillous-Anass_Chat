<?php

class Room
{
    function insertRoom($roomName, $creator, $members, $db)
    {
        $sql = "INSERT INTO room (room_name, creator) VALUES (?,?)";
        $stmt = mysqli_stmt_init($db);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "si", $roomName, $creator);
        mysqli_stmt_execute($stmt);
        $roomId = mysqli_insert_id($db);

        $this->insertMember($roomId, $creator, $db);
        foreach ($members as $member) {
            $this->insertMember($roomId, $member, $db);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($db);
    }

    function insertMember($roomId, $member, $db)
    {
        $sql = "INSERT INTO room_member (room_id, user_id) VALUES (?,?)";
        $stmt = mysqli_stmt_init($db);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $roomId, $member);
        mysqli_stmt_execute($stmt);
    }

    function insertMemberRequest($roomId, $sender, $receiver, $db)
    {
        $sql = "INSERT INTO room_invitation (room_id, sender, receiver) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($db);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "iii", $roomId, $sender, $receiver);
        mysqli_stmt_execute($stmt);
    }

    static function displayInvitation($user, $db) {
        $result = $db->query("
            SELECT room_invitation.invitation_id, room.*, user.username, user.picture FROM room_invitation
            JOIN room ON room_invitation.room_id = room.room_id
            JOIN user ON room_invitation.sender = user.user_id
            WHERE room_invitation.receiver = '$user'
        ");

        if ($result)
            return $result->fetch_all(MYSQLI_ASSOC);
    }

    static function insertMesaage($roomId, $member, $message, $date, $db)
    {
        $sql = "INSERT INTO message (room_id, user_id, message, date) VALUES (?,?,?,?)";
        $stmt = mysqli_stmt_init($db);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "iisi", $roomId, $member, $message, $date);
        mysqli_stmt_execute($stmt);
    }

    static function getAll()
    {
        global $db;
        $result = $db->query("SELECT * FROM room");
        if ($result)
            return $result->fetch_all(MYSQLI_ASSOC);
    }

    static function getAllMembers($room_id)
    {
        global $db;
        $result = $db->query("
            SELECT user.* FROM room_member
            JOIN user ON room_member.user_id = user.user_id
            WHERE room_member.room_id = '$room_id'
        ");

        if ($result)
            return $result->fetch_all(MYSQLI_ASSOC);
    }

    static function getChat($room_id)
    {
        global $db;
        $result = $db->query("
            SELECT user.*, message.* FROM message
            JOIN user ON message.user_id = user.user_id
            WHERE message.room_id = '$room_id' ORDER BY message.message_id ASC
        ");

        if ($result)
            return $result->fetch_all(MYSQLI_ASSOC);
    }

    static function removeInvitation($table, $invitationId) {
        global $db;
        $sql = "DELETE FROM $table WHERE  invitation_id=?";
        $stmt = mysqli_stmt_init($db);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 'i', $invitationId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
}