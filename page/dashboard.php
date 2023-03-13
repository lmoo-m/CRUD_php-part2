<?php

if ($_SESSION['id'] == null) {
    header("location:?page=login");
}

$child = isset($_GET['child']) ? ($_GET['child']) : false;
?>

<div>
    <?php
    if ($child) {
        require_once "./page/child/" . $child . ".php";
    } else {
    ?>
        dashboard
    <?php
    }
    ?>
</div>