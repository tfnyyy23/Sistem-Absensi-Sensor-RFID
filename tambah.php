<!----- proses simpan ----->

<?php 
    include "koneksi.php";

    if(isset($_POST['btnSimpan']))
    {
        $nokartu = $_POST['nokartu'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $simpan = mysqli_query($connect, "INSERT INTO karyawan(nokartu, nama, alamat)VALUES('$nokartu', '$nama', '$alamat')");

        if($simpan)
        {
            echo "
                <script>
                    alert('Data Berhasil Disimpan!!');
                    location.replace('datakaryawan.php');
                </script>
            ";
        }
        else
        {
            echo "
                <script>
                    alert('Data Gagal Tersimpan!!');
                    location.replace('datakaryawan.php');
                </script>
            ";
        }
    }

    //kosongkan tabel tmprfid
    mysqli_query($connect, "DELETE FROM tmprfid");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Tambah Data Karyawan</title>

    <!-- pembacaan nomor kartu otomatis -->
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $("#norfid").load('nokartu.php')
            }, 0); //pembacaan file nokartu.php tiap 1 detik = 1000
        });
    </script>
    
</head>
<body>
    <header>
        <h2>
            <label for="">
                <span class="las la-bars"></span>
            </label>

            Tambah Data Karyawan
        </h2>

        <div class="user-wrapper">
            <img src="images/img1.jpg" width="40px" height="40px" alt="">
            <div>
                <h4>Tifany Fadilah</h4>
                <small>Super Admin</small>
            </div>
        </div>
    </header>

    <?php include "dashboard.php"; ?>
    <!----- isi ----->

        <!----- form input ----->
        <form method="POST">
            <div id="norfid"></div>
            <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="text" name="nama" id="nama" placeholder="Nama Lengkap Karyawan" class="form-control" style="width: 250px">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Lengkap" style="width: 400px"></textarea>
            </div>

                <button name="btnSimpan" id="btnSimpan">Simpan</button>

            

        </form>
    </div>
    
</body>
</html>