<?php
require 'db_connect.php';
if (!isset($_POST['id'])) {
    echo 'data not passed to delete page';
} else {
    $stmt = $mysqli->prepare('DELETE FROM `todo_list` where id=?');
    $stmt->bind_param("i", $id);

    $id = (int)$_POST['id'];

    $stmt->execute();

    echo 'Record deleted successfully';
    $stmt->close();
    $mysqli->close();
}
