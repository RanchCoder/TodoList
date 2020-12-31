<?php

require 'db_connect.php';

if (!isset($_POST['id'])) {
    echo ('no element selected');
    die('a horrible death');
} else {
    $stmt = $mysqli->prepare("UPDATE `todo_list` SET status = ? where id = ?");
    $stmt->bind_param("si", $status, $id);
    $status = 'completed';
    $id = $_POST['id'];
    $stmt->execute();

    echo 'status updated';
    $stmt->close();
    $mysqli->close();
}
