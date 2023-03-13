<?php
require "./connection.php";

if (isset($_SESSION['id'])) {
    header("location:?page=dashboard");
}

$username = "";
$password = "";

if (isset($_POST['login'])) {
    $username = $_POST['nama'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $sql = mysqli_query($db, $query);
    if (mysqli_num_rows($sql) != 0) {
        $row = mysqli_fetch_assoc($sql);

        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("location:?page=dashboard");
    } else {
        header("location:?page=login");
    }
}
?>

<div class="container center ">
    <div class="box radius shadow center login-page">
        <form method="post" action="">
            <label for="nama">Nama</label>
            <input name="nama" id="nama" placeholder="nama..." class="input " />
            <label for="password">password</label>
            <input name="password" id="password" placeholder="nama..." type="password" class="input " />
            <button name="login" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>