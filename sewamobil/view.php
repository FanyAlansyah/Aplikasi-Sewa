<?php

//Memanggil
include "koneksi/auth.php";
require "koneksi/db.php";

?>

<!DOCTYPE html>
<html>

<head>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Hello, Selamat Datang</title>
    </head>

<body>
    <!--Nav-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Master Data Mobil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        </div>
    </nav>

    <!--Tabel-->
    <div class="mt-3">
        <h3 class="text-center">Data Mobil</h3>
    </div>
    <div class="card-body">

        <!-- Button -->
        <a href="index.php" class="btn btn-primary mb-3">Kembali</a>
        <a href="insert.php" class="btn btn-primary mb-3">Tambah Data</a>

        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>No.</th>
                <th>Nomer Plat</th>
                <th>Merek Mobil</th>
                <th>Model Mobil</th>
                <th>Harga Sewa</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            <?php

            //memanggil data
            $count = 1;
            $sel_query = "SELECT * FROM mobil ORDER BY id desc;";
            $result = mysqli_query($con, $sel_query);
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row["no_plat"]; ?></td>
                    <td><?php echo $row["merek"]; ?></td>
                    <td><?php echo $row["model"]; ?></td>
                    <td>Rp. <?php echo $row["harga"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-warning mb-2">Edit</a>
                        <a href="delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger mb-2">Hapus</a>
                    </td>
                </tr>
            <?php $count++;
            } ?>
        </table>
    </div>