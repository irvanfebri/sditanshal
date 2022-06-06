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
$query = riwayatpengajuan($_COOKIE['akses'],$_COOKIE['id']);
$mysql = mysqli_query ($koneksi,$query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Masuk Ke Porta SDIT Anak Shalih Bogor</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../mystyle/style.css">
</head>
<body>
    <p><a href="../home.php">Home</a> | <a href="../home.php">Back</a> | <a href="../index.php">Logout</a></p>
    <?php
        if (!mysqli_affected_rows ($koneksi)){
            echo "<div class=kosong>";
            echo "<fieldset>";
            echo "<legend><b>Informasi Riwayat Pengajuan<b></legend>";
            echo "<p class=kosong>Anda belum membuat pengajuan atau pengajuan anda belum selesai.</p>";
            echo "</fieldset>";
            echo "</div>";
            die();
        }
    ?>
    <div class="containerriwayat">
        <fieldset>
            <legend>Status Pengajuan</legend>
            <table>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kegiatan</th>
                    <th>keterangan</th>
                    <th>Waktu Pengajuan</th>
                    <th>Waktu Pengambilan Dana</th>
                    <th>Waktu Pelaporan Pengambilan Dana</th>
                    <th>Nominal Pengajuan yang disetujui</th>
                    <th>Realisasi</th>
                </tr>
                <?php
                    while ($result = mysqli_fetch_assoc($mysql)){
                        echo "<tr>";
                        echo "<td>$result[kode]</td>";
                        echo "<td>$result[nama]</td>";
                        echo "<td>$result[kegiatan]</td>";
                        echo "<td>$result[keterangan]</td>";
                        echo "<td>".date("d F Y ( H:i:s )",$result['waktu'])."</td>";
                        echo "<td>".date("d F Y ( H:i:s )",$result['waktupengambildana'])."</td>";
                        echo "<td>".date("d F Y ( H:i:s )",$result['waktumelapor'])."</td>";
                        
                        //jika ada perubahan nominal
                        
                        if (!empty($result['nominal2']) and ($result['nominal2'] > 0)){
                            echo "<td>Rp ".number_format($result['nominal2'])."</td>";    
                        }
                        else {
                            echo "<td>Rp ".number_format($result['nominal'])."</td>";    
                        }
                        //realisasi
                        echo "<td>Rp ".number_format($result['realisasi'])."</td>";
                        
                        //staus pengechekan
                        switch ($result['step']){
                            case "checker":
                                echo "<td>Menunggu persetujuan bendahara sekolah</td>";
                                break;
                            case "checked":
                                echo "<td>Menunggu persetujuan $result[divisi]</td>";
                                break;
                            case "approved":
                                echo "<form method=post action=print_pengajuan.php target=_blank>";
                                echo "<td>";
                                echo "<input name=kode value=$result[kode] hidden>";
                                echo "<input type=submit>";
                                echo "</td>";
                                echo "</form>";
                                break;
                            case "report":
                                echo "<form method=post action=laporan.php>";
                                echo "<td>";
                                echo "Dana sudah diambil, lapor jika kegiatan sudah selesai<hr>";
                                echo "<input name=kode value=$result[kode] hidden>";
                                echo "<input type=submit value=laporan>";
                                echo "</td>";
                                echo "</form>";
                                break;
                            case "done":
                                echo "<td><a href=../file_laporan/$result[kode].pdf target=_blank>Bukti Transaksi</a></td>";
                                break;
                                
                        }
                        echo"<tr>";
                    }
                ?>
            </table>
        </fieldset>
    </div>    
</body>
</html>
<?php
    ob_end_flush ();
?>