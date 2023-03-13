<?php
require './connection.php';

$id = isset($_GET['id']) ? ($_GET['id']) : false;
$query = "SELECT * FROM majors WHERE majorId = '$id'";
$get = mysqli_query($db, $query);
$data = mysqli_fetch_array($get);

if (isset($_POST['edit'])) {
    $majorName = $_POST['majorName'];
    $post = mysqli_query($db, "UPDATE majors SET majorName = '$majorName' WHERE majorId = '$id'");
    header("location:?page=dashboard&child=jurusan");
}
?>

<div class="jurusan center">
    <div class="form radius shadow">
        <h1>Edit Jurusan</h1>
        <form class="edit" action="" method="post">
            <input class="input" name="majorName" value="<?php echo $data['majorName'] ?>" />
            <button class="btn btn-primary" name="edit">Edit</button>
        </form>
    </div>
</div>