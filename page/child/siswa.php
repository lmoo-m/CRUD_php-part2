<?php
require "./connection.php";
require "./helper/helper.php";

$query = "SELECT students.*, majors.* FROM students INNER JOIN majors ON students.majorId = majors.majorId";
$get = mysqli_query($db, $query);

$i = 1;

?>

<div class="jurusan">
    <div>
        <div class="head">
            <h3>Siswa</h3>
            <a class="btn btn-secondary" href="<?php echo $base_url ?>?page=dashboard&child=form">Tambah</a>
        </div>
        <div class="center">
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Tanggal Lahir</th>
                            <th>Jurusan</th>
                            <th>foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_array($get)) {
                        ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $data['nama'] ?></td>
                                <td><?php echo $data['gender'] ?></td>
                                <td><?php echo $data['tanggalLahir'] ?></td>
                                <td><?php echo $data['majorName'] ?></td>
                                <td><img src="./public/<?php echo $data['foto'] ?>" width="60" height="60" /></td>
                                <td>
                                    <a href="<?php echo $base_url ?>?page=dashboard&child=siswaa&id=<?php echo $data['nis'] ?>">Edit</a>
                                    <a href="<?php echo $base_url ?>?page=dashboard&child=deleteStudents&id=<?php echo $data['nis'] ?>">
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