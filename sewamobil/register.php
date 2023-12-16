<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, Selamat Datang</title>
    <style type="text/css">
        #wrapper {
            background-color: #fff;
            width: 400px;
            height: 400px;
            margin-top: 80px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            border-radius: 4px;
        }

        input[type='text'],
        input[type='email'],
        input[type='password'] {
            border: 1px solid #ddd;
            padding: 8px;
            width: 95%;
            border-radius: 2px;
            outline: none;
            margin-top: 5px;
            margin-bottom: 3px;
        }

        label,
        h1 {
            text-transform: Arial;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            font-size: 40px;
            color: #66656d;
        }

        input[type='submit'] {
            outline: 0;
            padding: 8px 20px 8px;
            color: #fff;
            background-color: #0067ab;
            text-shadow: rgba(0, 0, 0, 0.24) 0 1px 0;
            font-size: 16px;
            box-shadow: rgba(255, 255, 255, 0.24) 0 2px 0 0 inset, #fff 0 1px 0 0;
            border: 1px solid #0164a5;
            border-radius: 2px;
            margin-top: 20px;
            cursor: pointer;
        }

        input[type='submit']:hover {
            background-color: #024978;
        }
    </style>
</head>

<body>
    <?php
    require('koneksi/db.php');

    // If form submit, insert values into the database.
    if (isset($_REQUEST['username'])) {

        // hapus
        $username = stripslashes($_REQUEST['username']);

        //spesial karakter
        $username = mysqli_real_escape_string($con, $username);
        $alamat = stripslashes($_REQUEST['alamat']);
        $alamat = mysqli_real_escape_string($con, $alamat);
        $telepon = stripslashes($_REQUEST['telepon']);
        $telepon = mysqli_real_escape_string($con, $telepon);
        $no_sim = stripslashes($_REQUEST['no_sim']);
        $no_sim = mysqli_real_escape_string($con, $no_sim);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query = "INSERT into `users` (`username`, `alamat`, `telepon`, `no_sim`, `password`) VALUES ('$username', '$alamat', '$telepon', '$no_sim', '$password')";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'><h3> Sukses Registrasi!!.</h3><br/> Silahkan Klik <a href='login.php' class='btn btn-info'>Login</a></div>";
        }
    } else {
    ?>

        <!-- From -->
        <div id="wrapper">
            <h1>Register</h1>
            <form name="registration" action="" method="post">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username" required />
                <label>Alamat</label>
                <input type="text" name="alamat" placeholder="Alamat" required />
                <label>Telepon</label>
                <input type="text" name="telepon" placeholder="Telepon" required />
                <label>Nomer SIM</label>
                <input type="text" name="no_sim" placeholder="Nomer SIM" required />
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" name="submit" value="Register" />
                <p>Sudah Punya Akun! <a href='login.php'>Login!</a></p>
            </form>
        </div>
    <?php } ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>