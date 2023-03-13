<?php
require "./connection.php";
require "./helper/helper.php";

$query = "SELECT * FROM majors";
$get = mysqli_query($db, $query);

$i = 1;

if (isset($_POST['tambah'])) {
    $majorName = $_POST['majorName'];
    $q = "INSERT INTO majors (majorName) VALUES ('$majorName')";
    $post = mysqli_query($db, $q);
    header("location:?page=dashboard&child=jurusan");
}
?>


<div class="jurusan">
    <div>
        <div class="head">
            <h3>Jurusan</h3>
            <form method="post" action="">
                <input name="majorName" placeholder="Nama Jurusan..." class="input" />
                <button class="btn btn-secondary" name="tambah">Tambah</button>
            </form>
        </div>
        <div class="center">
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_array($get)) {
                        ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $data['majorName'] ?></td>
                                <td>
                                    <a href="<?php echo $base_url ?>?page=dashboard&child=jurusann&id=<?php echo $data['majorId'] ?>">Edit</a>
                                    <a href="<?php echo $base_url ?>?page=dashboard&child=deleteMajors&id=<?php echo $data['majorId'] ?>">
                                        <button>Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>