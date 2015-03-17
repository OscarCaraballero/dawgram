<?php

session_start();

$_SESSION['username'] = $_POST['username'];
$_SESSION['id'] = $_POST['id'];

echo json_encode($_POST);