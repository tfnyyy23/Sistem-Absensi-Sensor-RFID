<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scan Kartu</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap.min.js"></script>
    
    <!-- scanning membaca kartu RFID -->
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $("#cekkartu").load('bacakartu.php')
            },1000);
        });
    </script>
</head>

<body>

    <?php include "dashboard.php" ?>
    <input type="checkbox" id="nav-toggle">
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>

                Scan Kartu
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

    <!-- isi -->
    <div class="container-fluid" style="padding-top: 10%">
        <div id="cekkartu"></div>
    </div>
    <br>

</body>
</html>