<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Absensi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php include "dashboard.php"; ?>
<!--
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span> Sistem Absensi RFID</h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-igloo"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="datakaryawan.php"><span class="las la-users"></span><span>Data Karyawan</span></a>
                </li>
                <li>
                    <a href="absensi.php"><span class="las la-clipboard-list"></span><span>Rekapitulasi Absensi</span></a>
                </li>
                <li>
                    <a href="scan.php"><span class="las la-receipt"></span><span>Scan Kartu</span></a>
                </li>
            </ul>
        </div>
    </div>
-->
<input type="checkbox" id="nav-toggle">
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                
                Dashboard
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div>
            
            <div class="user-wrapper">
                <img src="images/img1.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Tifany Fadilah</h4>
                    <small>Super Admin</small>
                </div>
            </div>
        </header>

        <main>
            
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>8</h1>
                        <span>Karyawan</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>  
                    </div>
                    
                </div>

                <div class="card-single">
                    <div>
                        <h1>12</h1>
                        <span>Rekap Absen</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>20</h1>
                        <span>Scan Kartu</span>
                    </div>
                    <div>
                        <span class="las la-receipt"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="card">
                    <div class="card-header">
                        <h3>Rekap Absen</h3>

                        <button>See all <span class="las la-arrow-right"></span></button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                           <table width="100%">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>Nama</td>
                                        <td>Tanggal</td>
                                        <td>Masuk</td>
                                        <td>Istirahat</td>
                                        <td>Kembali</td>
                                        <td>Pulang</td>
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
                                        <td> <?php echo $no; ?> </td>
                                        <td> <?php echo $data['nama']; ?> </td>
                                        <td> <?php echo $data['tanggal']; ?> </td>
                                        <td> <?php echo $data['jam_masuk']; ?> </td>
                                        <td> <?php echo $data['jam_istirahat']; ?> </td>
                                        <td> <?php echo $data['jam_kembali']; ?> </td>
                                        <td> <?php echo $data['jam_pulang']; ?> </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
                        

                <div class="card">
                    <div class="card-header">
                        <h3>Employee</h3>

                        <button>See all <span class="las la-arrow-right"></span></button>
                    </div>

                    <div class="card-body">
                        <div class="karyawan">
                            <div class="info">
                                <img src="images/img2.jpg" width="40px" height="40px" alt="">
                                <div>
                                    <h4>Tifany Fadilah Ahnaf</h4>
                                    <small>Siswa PKL</small>
                                </div>
                            </div>
                            <div class="contact">
                                <span class="las la-user-circle"></span>
                                <span class="las la-comment"></span>
                                <span class="las la-phone"></span>
                            </div>
                        </div>

                        <div class="karyawan">
                            <div class="info">
                                <img src="images/img3.jpg" width="40px" height="40px" alt="">
                                <div>
                                    <h4>Suci Amalia</h4>
                                    <small>Siswa PKL</small>
                                </div>
                            </div>
                            <div class="contact">
                                <span class="las la-user-circle"></span>
                                <span class="las la-comment"></span>
                                <span class="las la-phone"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

</body>
</html>