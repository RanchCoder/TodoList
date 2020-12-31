<?php

$mysqli = new mysqli('localhost', 'root', '', 'practise_work');
if ($mysqli->connect_error) {
    die("connection failed" . $mysqli->connect_error);
}
