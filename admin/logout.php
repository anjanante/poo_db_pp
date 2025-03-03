<?php
require_once '../config/config.php';

$session->logout();

header('Location: login.php');
?>