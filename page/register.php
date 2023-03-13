<?php

require './connection.php';

if (isset($_POST['register'])) {
    $username = $_POST['nama'];
    $password = md5($_POST['password']);
    $konfpassword = md5($_POST['konfpassword']);

    if ($password === $konfpassword) {
        $register = mysqli_query($db, "INSERT INTO users (username, password) VALUES ('$username','$password')");
        header("location:?page=login");
    } else {
        header("location:?page=register");
    }
}
?>

<div class="container center ">
    <div class="box radius shadow center login-page">
        <form method="post" action="">
            <label for="nama">Nama</label>
            <input name="nama" id="nama" placeholder="nama..." class="input " />
            <label for="password">Password</label>
            <input name="password" id="password" placeholder="Password..." type="password" class="input " />
            <label for="password">Konfirmasi Password</label>
            <input name="konfpassword" id="password" placeholder="Konifrm..." type="password" class="input " />
            <button name="register" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>