<?php
    
    session_start();

    if(!isset($_SESSION['login'])){
        echo "<script>
                alert('akses ditolak, login terlebih dahulu');
                document.location.href = 'login.php';
            </script>";
    }

    require 'koneksi.php';

    date_default_timezone_set('asia/kuala_lumpur');

    if(isset($_POST['tambah'])){

        $nama = $_POST['nama'];
        $warna = $_POST['warna'];
        $brand = $_POST['brand'];
        $jenis = $_POST['jenis'];
        $ukuran = $_POST['ukuran'];
        $email = $_POST['email'];
        $tanggal = date("l, d-m-y H:i:sa");
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];

        if(empty($gambar) == false){
            $x = explode('.', $gambar);
            $ekstensi = strtolower(end($x));
    
            $gambar_baru = "$nama.$ekstensi";
    
            if(move_uploaded_file($tmp, 'img/'.$gambar_baru)){
                $result = mysqli_query($conn,
                        "INSERT INTO respon (ID, NAMA, WARNA, BRAND, JENIS, UKURAN, EMAIL, GAMBAR, TANGGAL)
                        VALUES ('','$nama','$warna','$brand','$jenis','$ukuran','$email', '$gambar_baru', '$tanggal')");
            }
        }elseif(empty($gambar) == true){
            $result = mysqli_query($conn,
                "INSERT INTO respon (ID, NAMA, WARNA, BRAND, JENIS, UKURAN, EMAIL, TANGGAL)
                VALUES ('','$nama','$warna','$brand','$jenis','$ukuran','$email', '$tanggal')");
        }

        if($result){
            echo  "
            <script>
                alert('- Your response have been recorded -');
                document.location.href = 'index1.php';
            </script>";
        } else {
            echo "
            <script>
                alert('- Failed to record your response, Try again -');
                document.location.href = 'index.php';
            </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title> EKIN </title>
        <link rel = "icon" href = "logo_web.png">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="true">
        <script>
            function alertUser(msg) {
                alert(msg);
            }
        </script>
    </head>
    
    
    <body onload="alertUser('- Selamat Datang di EKIN -')">
        <header>
            <a href="#" class="top"><img src="logo_web.png" alt="logo website" width="10%" class="tengah"></a>
        </header>
        
        <nav class="nav">
            <a href="index.php">Home</a>
            <a href="About_EKIN.php">About Us</a>
            <a href="Contact_EKIN.php">Contact</a>
        </nav>
        
        <label class="theme-switch1">
            <div class="logout">
                <a href="logout.php">LOGOUT</a>
            </div>
        </label>

        <div class="theme-switch-wrapper">
            <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox" />
                <div class="slider round"></div>
            </label>
        </div>

        <div class="kotak1"><a href="index.php"><b>EKIN</b></a></div>

        <div class="kotak2"> World's leading website for your fashion needs. </div>

        <div class="kotak3"><img src="https://hypescrape.com/wp-content/uploads/2022/07/Wethenew-Sneakers-France-Air-Jordan-1-Retro-High-Off-White-The-Ten-University-Blue-2_2000x_2532f5b3-b72f-4994-8321-0dace36c1afd.png" width="700%"></div>

        <div class="kotak4"><b> - This month's Top Picks -</b></div>

        <div class="kotak5"><img src="https://d5ibtax54de3q.cloudfront.net/eyJidWNrZXQiOiJraWNrYXZlbnVlLWFzc2V0cyIsImtleSI6InByb2R1Y3RzLzE3MjY2L2Q1MjBhMGQ3ZTM0NzA4YzZlNjVkZmYwYjMxNjA5ZGFjLnBuZyIsImVkaXRzIjp7InJlc2l6ZSI6eyJ3aWR0aCI6MTQwMH19fQ==" alt="dunk_panda" width="60%">
            <p><b> Nike Dunk Low Retro Black-White </b></p>
        </div>

        <div class="kotak6"><img src="https://d5ibtax54de3q.cloudfront.net/eyJidWNrZXQiOiJraWNrYXZlbnVlLWFzc2V0cyIsImtleSI6InByb2R1Y3RzLzMyNTI1L2QyOWY1YTg5YWY0ZTQ3MGE1Y2I0MDVjNTljY2E2ZmNhLnBuZyIsImVkaXRzIjp7InJlc2l6ZSI6eyJ3aWR0aCI6MTQwMH19fQ==" alt="low_shadow" width="60%">
            <p><b> Nike Jordan 1 Low Shadow Toe </b></p>
        </div>

        <div class="kotak7"><img src="https://d5ibtax54de3q.cloudfront.net/eyJidWNrZXQiOiJraWNrYXZlbnVlLWFzc2V0cyIsImtleSI6InByb2R1Y3RzLzM1NjU1LzY1M2I2MGE3Yzk5MDMyN2RhNTViNDg2MmYxNTkzODQ3LnBuZyIsImVkaXRzIjp7InJlc2l6ZSI6eyJ3aWR0aCI6MTQwMH19fQ==" alt="550_leon" width="60%">
            <p><b> NB 550 Aime Leon Dore Brown </b></p>
        </div>

        <div class="kotak8"><img src="https://d5ibtax54de3q.cloudfront.net/eyJidWNrZXQiOiJraWNrYXZlbnVlLWFzc2V0cyIsImtleSI6InByb2R1Y3RzLzE2ODQzL2Y3YzBiYWM1Mjk0MWE3NzRkZTkxYjU2M2MzOWMwZDE1LnBuZyIsImVkaXRzIjp7InJlc2l6ZSI6eyJ3aWR0aCI6MTQwMH19fQ==" alt="force_07" width="60%">
            <p><b> Air Force 1 '07 Triple White</b></p>
        </div>

        <div class="kotak9"><img src="https://d5ibtax54de3q.cloudfront.net/eyJidWNrZXQiOiJraWNrYXZlbnVlLWFzc2V0cyIsImtleSI6InByb2R1Y3RzLzM3NDkyL2VlN2RlYWY5MjQyNzk1ZWQyYWIzNzYwMGI2MjJjZjNlLnBuZyIsImVkaXRzIjp7InJlc2l6ZSI6eyJ3aWR0aCI6MTQwMH19fQ==" alt="yzy_slate" width="60%">
            <p><b> Adidas Yeezy Boost 350 V2 Slate</b></p>
        </div>

        <div class="kotak10"><b>- Bang for the Buck -</b></div>

        <div class="kotak11"><img src="https://static.sneakerjagers.com/news/nl/2022/02/nike-dunk-low-retro-white-black-2021-2-1000.png" alt="panda_no_bg" width="200%" ></div>

        <div class="kotak12">
            <p><b> Nike Dunk Low Retro Black-White </b></p>
            <p> With its annitial release in 2021, these<span id="dots">...</span><span id="more"> Dunks were wiped off the entire market in just about a week of its release. Its Black and White colorway made the impression that these shoes will fit into just about any outfit you have.</span></p>
            <button class="button button1" onclick="read_more()" id="myBtn"> Read More </button>
        </div>

        <div class="kotak13"><img src="https://cdn.shopify.com/s/files/1/2358/2817/products/air-force-1-low-07-triple-white-220238_600x.png?v=1638812335" alt="af_no_bg" width="200%"></div>

        <div class="kotak14">
            <p><b> Air Force 1 '07 Triple White </b></p>
            <p> A nice clean pair of AF 1 should <span id="dots1">...</span><span id="more1">be anyone's goto in this day and age. Its modest and elegant look will make any clothes, jeans, and pants look extremely neat and great.</span></p>
            <button class="button button2" onclick="read_more1()" id="myBtn1"> Read More </button>
        </div>
        
        <div class="kotak20">
            <h3> What do you wanna see next ?</h3>
        </div>
        
        <div class="kotak23"><img src="https://cdn.shopify.com/s/files/1/0259/7021/2909/products/DD1399-103-PHCFH001-2000_1360x.png?v=1620017437" alt="dh_no_bg" width="200%"></div>
        
        <div class="kotak24"><img src="https://i.pinimg.com/originals/b7/c8/93/b7c893de43c9e401057f270d4642ab0e.png" alt="ajc_no_bg" width="200%" ></div>
        
        <div class="kotak19">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="nama" placeholder="NAME OF SHOE" name="nama" value="" required>
                    </div>
                </div>
            
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="warna" placeholder="COLOUR" name="warna" value="" required>
                    </div>
                </div>
            
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="brand" placeholder="BRAND" name="brand" value="" required>
                    </div>
                </div>
            
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="jenis" placeholder="TYPE" name="jenis" value="" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="number" class="form-control" id="ukuran" placeholder="  SIZE" name="ukuran" value="" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" class="form-control" id="email" placeholder="EMAIL" name="email" value="" required>
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="label1">Add Reference Image (optional)</label><br>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                </div>

                <div class="btn-cont">
                    <button class="button3 glow-button3" type="submit" id="tambah" name="tambah">
                        <div class="alt-send-button">
                            <span class="send-text"><b>SUBMIT</b></span>
                        </div>
                    </button>
                </div>

            </form>
        </div>

        <div class="footer-basic satu-footer-basic">
            <footer>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Home</a></li>
                    <li class="list-inline-item"><a href="About_EKIN.php">About</a></li>
                    <li class="list-inline-item"><a href="Contact_EKIN.php">Contact</a></li>
                </ul>
                <p class="copyright">EKIN © 2022</p>
            </footer>
        </div>

        <script src="javascript.js"></script>

    </body>

</html>