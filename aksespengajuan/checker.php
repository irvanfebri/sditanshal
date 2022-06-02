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

//ambil semua data yang harus di check
$query = aksespengajuan($_COOKIE['akses']);
$mysql = mysqli_query ($koneksi,$query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Masuk Ke Porta SDIT Anak Shalih Bogor</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../mystyle/style.css">
    <style>
        .keterangan {
            width: 500px;
            height: 80px;
        }
        input {
            width: 200px;
        }
    </style>
</head>
<p><a href="../home.php">Home</a> | <a href="../home.php">Back</a> | <a href="../index.php">Logout</a></p>
<?php
    if (!mysqli_affected_rows ($koneksi)){
        echo "<div class=kosong>";
        echo "<fieldset>";
        echo "<legend><b>Check Pengajuan<b></legend>";
        echo "<p class=kosong>Belum ada data yang masuk</p>";
        echo "</fieldset>";
        echo "</div>";
        die();
    }
?>
<body>
    
    <div>
        <div>
            <table>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kegiatan</th>
                    <th>Divisi</th>
                    <th>keterangan</th>
                    <th>Nominal</th>
                    <th>Waktu</th>
                    <th>Posisi persetujuan</th>
                    <th>Jalankan</th>
                </tr>
                <?php
                    while ($result = mysqli_fetch_assoc($mysql)){
                        echo "<tr>";
                        echo "<td>$result[kode]</td>";
                        echo "<td>$result[nama]</td>";
                        echo "<td>$result[kegiatan]</td>";
                        echo "<td>$result[divisi]</td>";
                        echo "<td>$result[keterangan]</td>";
                        echo "<td>Rp ".number_format($result['nominal'])."</td>";
                        echo "<td>".date("D, j M Y",$result['waktu'])."</td>";
                        
                        //Posisi pengajuan anggaran
                        if ($result['step'] == "checker"){
                            $step = "Menunggu persetujuan bagian keuangan";
                        }
                        elseif ($result['step'] == "checked"){
                            $step = "Menunggu persetujuan $result[divisi]";
                        }
                        echo "<td>$step</td>";
                        // =====================================
                        
                        
                        echo "<td>
                        <form method=post action=checked_step.php>
                            <input type=text hidden name=kode value=$result[kode]>
                            <input type=submit>
                        </form>
                        </td>";
                        echo"<tr>";
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
<?php
ob_end_flush ();
?>