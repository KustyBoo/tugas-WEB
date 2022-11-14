<?php

    require 'koneksi.php';

    $result = mysqli_query($conn, "DELETE FROM respon ORDER BY ID DESC LIMIT 1");

    if($result){
        echo"
        <script>
            alert('- Response have been deleted -');
            document.location.href = 'index.php';
        </script>";
    } else{
        echo"
        <script>
            alert('- Responce cannot be deleted, Try again -');
            document.location.href = 'index2.php';
        </script>";
    }

?>