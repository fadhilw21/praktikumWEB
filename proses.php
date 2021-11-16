<?php
include "connection.php";
$no_pelanggan = $_POST['no_pelanggan'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$krisan = $_POST['krisan'];
$query = mysqli_query($connection, "UPDATE pelanggan SET nama='$nama',
email='$email',krisan='$krisan' where no_pelanggan='$no_pelanggan'")
    or die(mysqli_error($connection));
if ($query) {
    echo "Proses update berhasil, ingin lihat hasil
<a href='coba-output.php'> disini </a>";
} else {
    echo "Proses Input gagal";
}
