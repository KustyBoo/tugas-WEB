<?php
    require 'koneksi.php';

    if(isset($_POST['regis'])){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];

        // cek username telah digunakan atau belum

        $user = $conn->query("SELECT * FROM user WHERE USERNAME='$username'");

        if(mysqli_num_rows($user) > 0){
            echo "<script>
                    alert('username telah digunakan');
                </script>";
        }else{
            // konfirmasi password
            if($password == $konfirmasi){
                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO user (EMAIL, USERNAME, PSW)
                            VALUES ('$email', '$username', '$password')";
                $_result = $conn->query($query);

                if($_result){
                    echo "<script>
                            alert('registrasi berhasil');
                            document.location.href='login.php';
                        </script>";
                }else{
                    echo "<script>
                            alert('registrasi gagal');
                        </script>";
                }
            }else{
                echo "<script>
                        alert('konfirmasi password salah');
                    </script>";
            }
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
        <h1><b>REGISTER USER</b></h1>
            <label for="email"><b>Email</b></label>
            <input type="email" name="email" required />
            <label for="user"><b>Username</b></label>
            <input type="text" name="username" required />
            <label for="password"><b>Password</b></label>
            <input type="password" name="password" required />
            <label for="konfirmasi"><b>Konfirmasi Password</b></label>
            <input type="password" name="konfirmasi" required />
            <input type="submit" name="regis" value="REGISTRASI" />
            <label><a href="login.php" id="style-2" data-replace="Sudah punya akun?"><span>Sudah punya akun?</span></a></p></label>
        </form>
    </body>
</html>