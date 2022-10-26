<?php
    include "koneksi.php";
    
    //membaca isi tabel tmprfid
    $sql = mysqli_query($connect, "SELECT * FROM tmprfid");
    $data = mysqli_fetch_array($sql);
    //baca nokartu
    $nokartu = $data['nokartu'];
?>

<link rel="stylesheet" href="css/style.css">
<div class="form-group form-single">
    <label>Nomor Kartu</label>
    <input type="text" name="nokartu" id="nokartu" placeholder="Scan Kartu RFID Anda" class="form-control" style="width: 250px" value="<?php echo $nokartu; ?>">
</div>


