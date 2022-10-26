<?php
    include "koneksi.php";

    //baca nomor kartu dari NodeMCU
    $nokartu = $_GET['nokartu'];

    //kosongkan tabel tmprfid
    mysqli_query($connect, "DELETE FROM tmprfid");

    //simpan nomor kartu baru ke tabel tmprfid
    $simpan = mysqli_query($connect, "INSERT INTO tmprfid(nokartu) VALUES ('$nokartu')");
    if($simpan){
        echo "Berhasil";
    }
    else{
        echo "Gagal";
    }
?>