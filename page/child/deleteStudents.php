<?php
require './connection.php';

$id = isset($_GET['id']) ? ($_GET['id']) : false;

$delete = mysqli_query($db, "DELETE FROM students WHERE nis = '$id'");
header("location:?page=dashboard&child=siswa");
