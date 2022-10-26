<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <title>Rekapitulasi Absensi</title>
</head>
<body>

    <?php include "dashboard.php"; ?>

    <!-- isi -->
    <input type="checkbox" id="nav-toggle">
    <div class="main-content">
    <header>
        <h2>
            <label for="nav-toggle">
                <span class="las la-bars"></span>
            </label>

            Rekapitulasi Absensi
        </h2>
    

        <div class="user-wrapper">
            <img src="images/img1.jpg" width="40px" height="40px" alt="">
            <div>
                <h4>Tifany Fadilah</h4>
                <small>Super Admin</small>
            </div>
        </div>
    </header>
                               
    <div class="recent-flex">
        <div class="card-employee">
        <div class="table-responsive">
           <div class="card-body">
                <table width="100%">
                <thead>
                        <tr>
                            <td class="td5">No.</td>
                            <td class="td2">Nama</td>
                            <td class="td1">Tanggal</td>
                            <td class="td1">Masuk</td>
                            <td class="td1">Istirahat</td>
                            <td class="td1">Kembali</td>
                            <td class="td1">Pulang</td>
                        </tr>
                    </thead>
                        <tbody>
                            <?php
                                include "koneksi.php";

                                //baca tabel absensi dan relasikan dengan tabel karyawan berdasarkan nomor kartu RFID untuk tanggal hari ini

                                //baca tanggal saat ini
                                date_default_timezone_set('Asia/Jakarta');
                                $tanggal = date('Y-m-d');

                                //filter absensi berdasarkan tanggal saat ini
                                $sql = mysqli_query($connect, "SELECT b.nama, a.tanggal, a.jam_masuk, a.jam_istirahat, a.jam_kembali, a.jam_pulang FROM absensi a, karyawan b WHERE a.nokartu=b.nokartu AND a.tanggal='$tanggal'");

                                $no = 0;
                                while($data = mysqli_fetch_array($sql))
                                {
                                    $no++;

                            ?>

                            <tr>
                                <td class="td5" style="text-align: center"> <?php echo $no; ?> </td>
                                <td class="td6"> <?php echo $data['nama']; ?> </td>
                                <td class="td6"> <?php echo $data['tanggal']; ?> </td>
                                <td class="td6"> <?php echo $data['jam_masuk']; ?> </td>
                                <td class="td6"> <?php echo $data['jam_istirahat']; ?> </td>
                                <td class="td6"> <?php echo $data['jam_kembali']; ?> </td>
                                <td class="td6"> <?php echo $data['jam_pulang']; ?> </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                </table>       
            </div> 
        </div>
            
        </div>
    </div>

    <!--<div class="container-fluid">
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: grey; color: white">
                <th style="width: 10px; text-align: center">No.</th>
                <th style="text-align: center">Nama</th>
                <th style="text-align: center">Tanggal</th>
                <th style="text-align: center">Jam Masuk</th>
                <th style="text-align: center">Jam Istirahat</th>
                <th style="text-align: center">Jam Kembali</th>
                <th style="text-align: center">Jam Pulang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";

                    //baca tabel absensi dan relasikan dengan tabel karyawan berdasarkan nomor kartu RFID untuk tanggal hari ini

                    //baca tanggal saat ini
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d');

                    //filter absensi berdasarkan tanggal saat ini
                    $sql = mysqli_query($connect, "SELECT b.nama, a.tanggal, a.jam_masuk, a.jam_istirahat, a.jam_kembali, a.jam_pulang FROM absensi a, karyawan b WHERE a.nokartu=b.nokartu AND a.tanggal='$tanggal'");

                    $no = 0;
                    while($data = mysqli_fetch_array($sql))
                    {
                        $no++;

                ?>
                <tr>
                    <td style="text-align: center"> <?php echo $no; ?> </td>
                    <td> <?php echo $data['nama']; ?> </td>
                    <td style="text-align: center"> <?php echo $data['tanggal']; ?> </td>
                    <td style="text-align: center"> <?php echo $data['jam_masuk']; ?> </td>
                    <td style="text-align: center"> <?php echo $data['jam_istirahat']; ?> </td>
                    <td style="text-align: center"> <?php echo $data['jam_kembali']; ?> </td>
                    <td style="text-align: center"> <?php echo $data['jam_pulang']; ?> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>-->


</body>
</html>

