<?php
require 'db_connect.php';
$errors = array();
$data = array();


if (!$_POST['nameOfTodo']) {
    echo 'please fill the input box';
} else {

    $stmt = $mysqli->prepare('INSERT INTO `todo_list` (name,status) values (?,?)');
    $stmt->bind_param("ss", $name, $status);

    $name = $_POST['nameOfTodo'];
    $status = 'pending';
    $stmt->execute();

    echo 'New Records Added successfully';
    $stmt->close();
    $mysqli->close();
}
