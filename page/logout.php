<?php
require './helper/helper.php';

session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);
header("location:?page=login");
