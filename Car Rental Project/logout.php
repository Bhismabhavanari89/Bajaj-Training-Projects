<?php

session_start();

unset($_SESSION['car-user']);
session_destroy();

header('location:index.php');

?>