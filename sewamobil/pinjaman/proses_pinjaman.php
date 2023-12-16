<?php

include "../koneksi/db.php";

$username      = $_GET['username'];
$tgl_pinjam    = $_GET['tgl_pinjam'];
$tgl_selesai   = $_GET['tgl_selesai'];
$harga         = $_GET['harga'];
$status        = $_GET['status'];
$model         = $_GET['model'];

$pinjam = mysqli_fetch_array(mysqli_query($conn, "SELECT username as pinjamn from tgl_pinjam"));
$pengambilan = $harga['harga'] + $tgl_selesai['tgl_selesai'];
?>
<script>
    alert("Berhasil Pinjam Mobil");
    window.location = "view.php";
</script>