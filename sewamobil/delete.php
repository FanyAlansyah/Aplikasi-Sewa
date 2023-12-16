<?php
require('koneksi/db.php');


$id = $_REQUEST['id'];
$query = "DELETE FROM mobil WHERE id=$id";
$result = mysqli_query($con, $query) or die(mysqli_error($con));

?>
<script>
    alert("Berhasil Hapus Data");
    window.location = "view.php";
</script>
<?php
?>