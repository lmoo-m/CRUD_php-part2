<?php
require "./helper/helper.php";

session_start();
?>

<nav>
    <h3>
        <a href="<?php echo $base_url ?>">
            Test
        </a>
    </h3>
    <ul>
        <?php
        if (isset($_SESSION['id'])) {
        ?>
            <li><a href="<?php echo $base_url ?>?page=dashboard&child=jurusan">Jurusan</a></li>
            <li><a href="<?php echo $base_url ?>?page=dashboard&child=siswa">Siswa</a></li>
            <li><a href="<?php echo $base_url ?>?page=logout">Logout</a></li>
        <?php
        } else {
        ?>
            <li><a href="<?php echo $base_url ?>?page=login">Login</a></li>
            <li><a href="<?php echo $base_url ?>?page=register">Register</a></li>
        <?php
        }
        ?>
    </ul>
</nav>