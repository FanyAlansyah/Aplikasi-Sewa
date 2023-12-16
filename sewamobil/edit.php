<?php

//Memanggil session
include "koneksi/auth.php";
require "koneksi/db.php";

$id = $_REQUEST['id'];

//Memanggil Data
$query = "SELECT * FROM `mobil` WHERE id='" . $id . "'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, Selamat Datang</title>
    <link rel="stylesheet" href="css/form.css">
</head>

<body>

    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="view.php">| Kembali |</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!--Form-->
    <div class="form">
        <h1>Update Data</h1>

        <?php
        if (isset($_POST['new']) && $_POST['new'] == 1) {
            $id = $_REQUEST['id'];
            $no_plat = $_REQUEST['no_plat'];
            $merek = $_REQUEST['merek'];
            $model = $_REQUEST['model'];
            $harga = $_REQUEST['harga'];
            $status = $_REQUEST['status'];

            $submittedby = $_SESSION["username"];
            $update = " UPDATE `mobil` SET `id`='[$id]',`no_plat`='[$no_plat]',`merek`='[$merek]',`model`='[$model]',`harga`='[$harga]',`status`='[$status]' WHERE `id`='[$id]'";
            mysqli_query($con, $update) or die(mysqli_error($con));

        ?>
            <script>
                alert("Berhasil Ubah Data");
                window.location = "view.php";
            </script>
        <?php
        } else {
        ?>
            <div>
                <form name="form" method="post" action="">
                    <input type="hidden" name="new" value="1" />
                    <input name="id" type="hidden" value="<?php echo $row['id']; ?>" />
                    <label>No Plat</label>
                    <p><input type="text" name="no_plat" value="<?php echo $row['no_plat']; ?>" /></p>
                    <label>Merek Mobil</label>
                    <p><input type="text" name="merek" value="<?php echo $row['merek']; ?>" /></p>
                    <label>Model Mobil</label>
                    <p><input type="text" name="model" value="<?php echo $row['model']; ?>" /></p>
                    <label>Harga Sewa</label>
                    <p><input type="text" name="harga" value="<?php echo $row['harga']; ?>" /></p>
                    <label>Status</label>
                    <p><input type="text" name="status" value="<?php echo $row['status']; ?>" /></p>

                    <p><input name="submit" type="submit" value="Update" /></p>
                </form>
            <?php } ?>
            </div>
    </div>