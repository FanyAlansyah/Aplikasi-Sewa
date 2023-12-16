<?php

//Memanggil
include "koneksi/auth.php";
require "koneksi/db.php";

if (isset($_POST['new']) && $_POST['new'] == 1) {
     $id = $_REQUEST['id'];
     $no_plat = $_REQUEST['no_plat'];
     $merek = $_REQUEST['merek'];
     $model = $_REQUEST['model'];
     $harga = $_REQUEST['harga'];
     $status = $_REQUEST['status'];

     $submittedby = $_SESSION["username"];
     $ins_query = "INSERT INTO `mobil`(`id`, `no_plat`, `merek`, `model`, `harga`, `status`) VALUES ('$id','$no_plat','$merek','$model','$harga','$status')";
     mysqli_query($con, $ins_query)
          or die(mysqli_error($con));
?>
     <script>
          alert("Berhasil Tambah Data");
          window.location = "view.php";
     </script>
<?php
}
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

     <!-- form -->
     <div class="form">
          <h1>Tambah Data</h1>
          <form name="form-group" method="post" action="">
               <input type="hidden" name="new" value="1" />
               <label>ID</label>
               <p><input type="text" name="id" required /></p>
               <label>Nomer Plat</label>
               <p><input type="text" name="no_plat" required /></p>
               <label>Merek Mobil</label>
               <p><input type="text" name="merek" required /></p>
               <label>JModel Mobil</label>
               <p><input type="text" name="model" required /></p>
               <label>Harga Sewa</label>
               <p><input type="text" name="harga" required /></p>
               <label>Status</label>
               <p><input type="text" name="status" required /></p>

               <p><input name="submit" type="submit" value="Submit" /></p>
          </form>
     </div>
     </div>