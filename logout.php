<?php
session_start();

$_SESSION['employee_id'] = null;

session_destroy();

header("Location: ./login.php");
exit();
