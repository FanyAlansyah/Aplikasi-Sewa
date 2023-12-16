<?php

//koneksi database
$con = mysqli_connect("localhost", "root", "", "sewamobil");

// cek koneksi
if (mysqli_connect_errno()) {
  echo "Gagal Connect SQL " . mysqli_connect_error();
}
