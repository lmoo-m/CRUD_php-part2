<?php
require "./connection.php";

$nis = isset($_GET['id']) ? ($_GET['id']) : false;

$sql = mysqli_query($db, "SELECT students.*, majors.* FROM students INNER JOIN majors ON students.majorId = majors.majorId  WHERE nis = '$nis'");
$student = mysqli_fetch_array($sql);

$majors = mysqli_query($db, "SELECT * FROM majors");

if (isset($_POST['submit'])) {
    $nama = isset($_POST['nama']) ? ($_POST['nama']) : ($student['nama']);
    $gender  = isset($_POST['gender']) ? ($_POST['gendr']) : ($student['gender']);
    $tgl = isset($_POST['date']) ? ($_POST['date']) : ($student['tanggalLahir']);
    $jurusan = isset($_POST['jurusan']) ? ($_POST['jurusan']) : ($student['majorId']);
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp, "public/" . $foto);

    $post = mysqli_query($db, "INSERT INTO students (nama, gender, tanggalLahir, foto, majorId) VALUES ('$nama', '$gender', '$tgl', '$foto', '$jurusan')");
    header("location:?page=dashboard&child=siswa");
}
?>

<div class="student-add center">
    <form class="box radius shadow " action="" method="post" enctype="multipart/form-data">
        <label>Nama Lengkap</label>
        <input name="nama" placeholder="nama..." class="input" value="<?php echo $student['nama'] ?>" />
        <label>Gender</label>
        <div>
            <input type="radio" id="lk" name="gender" value="Laki-Laki" />
            <label for="lk">Laki-Laki</label>
            <input type="radio" name="gender" id="pr" value="Perempuan" />
            <label for="pr">Perempuan</label>
        </div>
        <label>Tanggal Lahir</label>
        <input type="date" class="input" name="date" value="<?php echo $student['tanggalLahir'] ?>" />
        <label>Jurusan</label>
        <select name="jurusan" class="input">
            <option value="<?php echo $student['majorId'] ?>"><?php echo $student['majorName'] ?></option>
            <?php
            while ($data = mysqli_fetch_array($majors)) {
            ?>
                <option value="<?php echo $data['majorId'] ?>"><?php echo $data['majorName'] ?></option>
            <?php
            }
            ?>
        </select>
        <label for="foto">Foto</label>
        <input type="file" id="foto" name="foto" />
        <button class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>