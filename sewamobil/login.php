<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
    <style type="text/css">
        #wrapper {

            background-color: #fff;
            width: 400px;
            height: 335px;
            margin-top: 100px;
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

    // If form submitted, insert values into the database.
    if (isset($_POST['username'])) {

        // removes backslashes
        $username = stripslashes($_REQUEST['username']);

        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;

            //Masuk ke user index.php
            header("Location: index.php");
            exit();
        } else {
    ?>
            <script>
                alert("Username Atau Password Salah");
                window.location = "login.php";
            </script>
        <?php
        }
    } else {
        ?>


        <!-- From -->
        <div id="wrapper">
            <h1>Login</h1>
            <form action="" method="post" name="login">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username" required />
                <label>Password </label>
                <input type="password" name="password" placeholder="Password" required />
                <input name="submit" type="submit" value="Login" />
            </form>
            <p>Belum Mempunyai Akun? <a href='register.php'>Register!</a></p>
        </div>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>