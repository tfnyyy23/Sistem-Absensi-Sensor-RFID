<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>

    <!-- Font Awsome Icons-->
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="css/style.css">
 
</head>
<body>

    <?php include "dashboard.php"; ?>
    <!----- isi ----->
<input type="checkbox" id="nav-toggle">
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>

                Data Karyawan
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
        <div class="projects">
            <div class="card-employee">
                <div class="card-body">
                    <div class="table-responsive">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td class="td5">No.</td>
                                    <td class="td2">Nomor Kartu</td>
                                    <td class="td3">Nama Lengkap</td>
                                    <td class="td4">Alamat Lengkap</td>
                                    <td class="td1">Aksi</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    //koneksi database
                                    include "koneksi.php";

                                    //baca data karyawan
                                    $sql = mysqli_query($connect, "SELECT * FROM karyawan");
                                    $no = 0;
                                    while($data = mysqli_fetch_array($sql))
                                    {
                                        $no++;
                                ?>

                                <tr>
                                    <td class="td5"> <?php echo $no; ?> </td>
                                    <td class="td2"> <?php echo $data['nokartu']; ?> </td>
                                    <td class="td3"> <?php echo $data['nama']; ?> </td>
                                    <td class="td4"> <?php echo $data['alamat']; ?> </td>
                                    <td class="td1">
                                        <center>
                                            <a href="edit.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a> | <a href="hapus.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-trash" style="color: red"></i></a>
                                        </center>
                                    </td>
                                    </tr>
                                <?php    } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!--<div class="container-fluid">
        <h3 class="font">Data Karyawan</h3>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: grey; color: white">
                    <th style="width: 10px; text-align: center">No.</th>
                    <th style="width: 200px; text-align: center">Nomor Kartu</th>
                    <th style="width: 350px; text-align: center">Nama</th>
                    <th style="text-align: center">Alamat</th>
                    <th style="width: 100px; text-align: center">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    //koneksi database
                    include "koneksi.php";

                    //baca data karyawan
                    $sql = mysqli_query($connect, "SELECT * FROM karyawan");
                    $no = 0;
                    while($data = mysqli_fetch_array($sql))
                    {
                        $no++;
                ?>

                <tr>
                    <td> <?php echo $no; ?> </td>
                    <td> <?php echo $data['nokartu']; ?> </td>
                    <td> <?php echo $data['nama']; ?> </td>
                    <td> <?php echo $data['alamat']; ?> </td>
                    <td>
                        <center>
                        <a href="edit.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a> | <a href="hapus.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-trash" style="color: red"></i></a>
                    </center>
                    </td>
                </tr>
                <?php    } ?>
            </tbody>
        </table>-->

        <!----- tambah data karyawan ----->
        <div class="save-button">
            <a href="tambah.php"> <button>Tambah Data Karyawan</button> </a>
        </div>
        
    </div>
    
</body>
</html>