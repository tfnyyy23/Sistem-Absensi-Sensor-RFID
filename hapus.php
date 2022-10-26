<!----- proses hapus ----->

<?php 
    include "koneksi.php";

    $id = $_GET['id'];

    $hapus = mysqli_query($connect, "DELETE FROM karyawan WHERE id='$id'");
    
    if($hapus)
    {
        echo "
                <script>
                    alert('Data Berhasil Dihapus!!');
                    location.replace('datakaryawan.php');
                </script>
            ";
    }
    else
    {
        echo "
                <script>
                    alert('Data Gagal Terhapus!!');
                    location.replace('datakaryawan.php');
                </script>
            ";
    }
?>