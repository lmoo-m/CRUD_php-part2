<?php
require "./connection.php";
require "./helper/helper.php";

$page = isset($_GET['page']) ? ($_GET['page']) : "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Test</title>
</head>

<body>
    <div class="content">
        <?php
        require_once "./components/navbar.php";
        ?>

        <?php
        if ($page) {
            require_once "./page/" . $page . ".php";
        } else {
        ?>

            <h1>home</h1>
        <?php
        }
        ?>
    </div>
</body>

</html>