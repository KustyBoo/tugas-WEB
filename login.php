<?php

    session_start();

    require 'koneksi.php';

    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $password = $_POST['password'];

        $query = "SELECT * FROM user WHERE USERNAME='$user' OR EMAIL='$user'";
        
        $result = $conn->query($query);

        $row = mysqli_fetch_array($result);

        $username = $row['USERNAME'];

        if(password_verify($password, $row['PSW'])){
            $_SESSION['login'] = true;
            echo "<script>
                    document.location.href='index.php';
                </script>";
        }else{
            echo "<script>
                    alert('username atau password salah');
                </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> EKIN </title>
        <link rel = "icon" href = "logo_web.png">
        <link rel="stylesheet" href="style1.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form id="login-form" method="post" target="_self" action="">
        <h1><b>LOGIN USER</b></h1>
            <label for="user"><b>Username</b></label>
            <input type="text" name="user" required />
            <label for="password"><b>Password</b></label>
            <input type="password" name="password" required />
            <input type="submit" name="login" value="login" />
            <label><a href="register.php" id="style-2" data-replace="Belum punya akun?"><span>Belum punya akun?</span></a></p></label>
        </form>
    </body>
</html>

