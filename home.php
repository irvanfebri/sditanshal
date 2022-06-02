<?php
ob_start();

//Check koneksi ke database
include ("advance.php");

if (!$koneksi){
    die ("Mohon maaf terjadi kesalahan, harap menghubungi bagian keuangan ".mysqli_connect_error($koneksi));
}

cookieLogin($_COOKIE['id']);
//setcookie ('id',null,time()-1000);
//setcookie ('akses',null,time()-1000);

$nama = biodata ($_COOKIE['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Masuk Ke Porta SDIT Anak Shalih Bogor</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle/style.css">
    <style>
    @media only screen and (max-width: 600px){
        div.containerhome {
        margin: 0 auto;
        width: 380px;
        background-color: white;
        border: groove 1px;
      }
      
      div.headerhome {
        padding: 1px;
        margin: 0 auto;
        width: 380px;
        background-color: black;
        color: white;
        height: 40px;
        }
        
      fieldset {
        width: 300px;
      }
    }
    </style>
</head>
<body>
    <div class="containerhome">
        <div class="headerhome">
            <p style="text-align: center;" >Ahlan Wa Sahlan <b><?php echo $nama; ?></b></p>
        </div>
      <div class="isihome">
         <p><a href="informasi/akun.php">Akun</a></p>
         <p><a href="pengajuan/form-pengajuan.php">Pengajuan Form</a></p>
         <p><a href="pengajuan/status-pengajuan.php">Status Pengajuan</a></p>
         <p><a href="pengajuan/riwayat-pengajuan.php">Riwayat Pengajuan</a></p>
         
         <?php
         if ($_COOKIE['akses'] == "keuangan"){
            echo "<fieldset>";
            echo "<legend>Panel Keuangan</legend>";
            echo "<p><a href=aksespengajuan/checker.php abbr=>Check Pengajuan</a></p>";
            echo "<p><a href=aksespengajuan/approved_step.php>Approve Pengajuan Keuangan</a></p>";
            echo "<p><a href=aksespengajuan/pencairan.php>Pencairan Dana</a></p>";
            echo "<p><a href=aksespengajuan/laporan.php>Laporan Pertanggung Jawaban</a></p>";
            echo "</fieldset>";
         }
         if ($_COOKIE['akses'] == "kadiv kesiswaan"){
            echo "<p><a href=aksespengajuan/approved_step.php>Approve Pengajuan</a></p>";
         }
         if ($_COOKIE['akses'] == "kadiv akademik"){
            echo "<p><a href=aksespengajuan/approved_step.php>Approve Pengajuan</a></p>";
         }
         //admin add akun
         if ($_COOKIE['akses'] == "admin"){
            echo "<p><a href=admincon/addakun.php>Tambah Akun</a></p>";
            echo "<p><a href=aksespengajuan/checker.php>Check Pengajuan</a></p>";
            echo "<p><a href=aksespengajuan/approved_step.php>Approve Pengajuan</a></p>";
            echo "<p><a href=aksespengajuan/pencairan.php>Pencairan Dana</a></p>";
            echo "<p><a href=aksespengajuan/laporan.php>Laporan Pertanggung Jawaban</a></p>";
         }
         
         ?>
        <p><a href="index.php">Keluar</a></p> 
      </div>
    </div>
</body>
</html>
<pre>
<?php
ob_end_flush ();
?>
</pre>