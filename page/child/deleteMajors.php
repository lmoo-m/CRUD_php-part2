<?php
require "./connection.php";

$id = $_GET['id'];
$query = "DELETE FROM majors WHERE majorId = '$id'";
$delete = mysqli_query($db, $query);
header("location:?page=dashboard&child=jurusan");
