<?php
date_default_timezone_set ('Asia/Jakarta');
ob_start();

//Check koneksi ke database
include ("../advance.php");

if (!$koneksi){
    die ("Mohon maaf terjadi kesalahan, harap menghubungi bagian keuangan ".mysqli_connect_error($koneksi));
}

//logout kalau masusk tanpai izin.
cookieLogin02($_COOKIE['id']);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Masuk Ke Porta SDIT Anak Shalih Bogor</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../mystyle/style.css">
    <script>  
    window.onload = function () {  
        document.onkeydown = function (e) {  
            return (e.which || e.keyCode) != 116;  
        };  
    };
    </script>
    <style>
        legend {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div>
        <div class="container">
            <?php
                //prosesan terakhir untuk mengecheak apakah semua data terisi jika terisi masukan kedalam database.    
                if (!empty($_POST['keteranganpengaju']) and ($_POST['nominalpengaju'] >= 0)){
             
                
                //memberikan divisi pengaju
                $query = "SELECT divisi FROM `kegiatan-divisi` WHERE kegiatan = '$_POST[kegiatanpengaju]'";
                $mysql = mysqli_query ($koneksi,$query);
                $result = mysqli_fetch_assoc ($mysql);
                $_POST['divisipengaju'] = $result['divisi'];
                //memberikan kode pengajuan
                $_POST['kodepengaju'] = kodepengajuan();
                mysqli_free_result ($mysql);
                
                //masukan kedatabase
                $query02 = "INSERT INTO stepchecker (kode,noid,nama,kegiatan,divisi,keterangan,nominal,waktu,catatan,nominal2,pengambildana,waktupengambildana,pelapor,waktumelapor,realisasi,step) VALUES
                ('$_POST[kodepengaju]','$_POST[noidpengaju]','$_POST[namapengaju]','$_POST[kegiatanpengaju]'
                ,'$_POST[divisipengaju]','$_POST[keteranganpengaju]','$_POST[nominalpengaju]','$_POST[waktupengaju]'
                ,'',0,'',0,'',0,0, '$_POST[steppengaju]')";
                
                //notifikasi jika sudah masuk kedalam datbase
                if ($mysql02 = mysqli_query ($koneksi,$query02)){
                    echo "<fieldset>";
                    echo "<legend>";
                    echo "Info";
                    echo "</legend>";
                    echo "<table>";
                    echo "<tr><th>Keterangan</th><th>Informasi</th></tr>";
                    echo "<tr><td>Nama</td><td>$_POST[namapengaju]</td></tr>";
                    echo "<tr><td>NIY</td><td>$_POST[noidpengaju]</td></tr>";
                    echo "<tr><td>Kode</td><td><b>$_POST[kodepengaju]</b></td></tr>";
                    echo "<tr><td>Kegiatan</td><td>$_POST[kegiatanpengaju]</td></tr>";
                    echo "<tr><td>Keterangan</td><td>$_POST[keteranganpengaju]</td></tr>";
                    echo "<tr><td>Waktu Pengajuan</td><td>".date("D, j M Y",$_POST['waktupengaju'])."</td></tr>";
                    echo "<tr><td>Nominal</td><td>Rp ".number_format($_POST['nominalpengaju'])."</td></tr>";
                    echo "</table>";
                    echo "<p>Data sudah terupdate, antum dapat mengetahui status pengajuan di
                    |<a href=status-pengajuan.php><b>Status Pengajuan</b></a> |</p>";
                    echo "</fieldset>";
                
                
                
                }
                else {
                    echo "Tidak terupdate ".mysqli_error ($koneksi);
                }
                
                }
                ?>
        </div>
    </div>    
</body>
</html>