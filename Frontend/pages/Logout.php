<?php

include("./Admin/conn.php");

session_start();
session_unset();
session_destroy();
header('location:./User-Login.php');

?>