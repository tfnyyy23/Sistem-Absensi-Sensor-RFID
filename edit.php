<!----- proses edit ----->

<?php 
    include "koneksi.php";

    $id = $_GET['id'];

    $cari = mysqli_query($connect, "SELECT * FROM karyawan WHERE id='$id'");
    $hasil = mysqli_fetch_array($cari);

    if(isset($_POST['btnEdit']))
    {
        $nokartu = $_POST['nokartu'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $edit = mysqli_query($connect, "UPDATE karyawan SET nokartu='$nokartu', nama='$nama', alamat='$alamat' WHERE id='$id'");

        if($edit)
        {
            echo "
                <script>
                    alert('Data Berhasil Diubah!!');
                    location.replace('datakaryawan.php');
                </script>
            ";
        }
        else
        {
            echo "
                <script>
                    alert('Gagal Mengubah Data!!');
                    location.replace('datakaryawan.php');
                </script>
            ";
        }
    }
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
    <title>Edit Data Karyawan</title>

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

    <?php include "dashboard.php"; ?>

    <!----- isi ----->

    <div class="main-content">
        <header>
            <h2>
                <label for="">
                    <span class="las la-bars"></span>
                </label>

                Edit Data Karyawan
            </h2>

            <div class="user-wrapper">
                <img src="images/img1.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Tifany Fadilah</h4>
                    <small>Super Admin</small>
                </div>
            </div>
        </header>
    </div>

    <!----- form input ----->
        <form method="POST">
        <div id="norfid"></div>
            <!--<div class="form-single form-group">
                <label>Nomor Kartu</label>
                <input type="text" name="nokartu" id="nokartu" placeholder="scan kartu RFID" class="form-control" style="width: 250px" value="<?php echo $hasil['nokartu']; ?>">
            </div>-->

            <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="text" name="nama" id="nama" placeholder="nama lengkap karyawan" class="form-control" style="width: 250px" value="<?php echo $hasil['nama']; ?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" placeholder="alamat lengkap" style="width: 400px"><?php echo $hasil['alamat'] ?></textarea>
            </div>

            <button name="btnEdit" id="btnEdit">Edit</button>

        </form>
        
</body>
</html>