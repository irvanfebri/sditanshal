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
$query = aksespengajuanapprove($_COOKIE['akses']);
$mysql = mysqli_query ($koneksi,$query);


//langkah Akhir
if (!empty($_POST['kode'])){
    $query02 = "UPDATE stepchecker SET step = 'approved' WHERE kode = '$_POST[kode]'";
    if ($mysql02 = mysqli_query ($koneksi,$query02)){
        
        //kirim whatsapp ke para pengaju anggaran
        $query03 = "SELECT * FROM biodata WHERE noid = '$_POST[noid]'";
        $mysql03 = mysqli_query ($koneksi,$query03);
        $result03 = mysqli_fetch_assoc ($mysql03);
        
        $my_apikey = "V5DMO9Z2U3JFXOPV7H0H"; 
        $destination = $result03['nohp']; 
        $message = "Pengajuan dengan no kode *$_POST[kode]* sudah disetujui oleh Kepala Divisi, print pengajuan anggaran dan ambil dana ke bagian keuangan di ruang tatausaha"; 
        $api_url = "http://panel.apiwha.com/send_message.php"; 
        $api_url .= "?apikey=". urlencode ($my_apikey); 
        $api_url .= "&number=". urlencode ($destination); 
        $api_url .= "&text=". urlencode ($message); 
        $my_result_object = json_decode(file_get_contents($api_url, false));
        
        
        
        header ("location: approved_step.php?kode=$_POST[kode]");
    }
}
//keteranganjika sudah terupdate
if(isset($_GET['kode'])){
    echo ("Alahamdullillah kode $_GET[kode] disetujui oleh $_COOKIE[akses]");    
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Masuk Ke Porta SDIT Anak Shalih Bogor</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../mystyle/style.css">
    <style>
  

    </style>
</head>
<body>
    <p><a href="../home.php">Home</a> | <a href="../home.php">Back</a> | <a href="../index.php">Logout</a></p>
    <?php
    if (!mysqli_affected_rows ($koneksi)){
        echo "<div class=kosong>";
        echo "<fieldset>";
        echo "<legend><b>Check Pengajuan yang harus disetujui<b></legend>";
        echo "<p class=kosong>Belum ada data yang masuk</p>";
        echo "</fieldset>";
        echo "</div>";
        die();
    }
?>
    <div class="containerapproved">
        <fieldset>
            <legend>Approver Pengajuan</legend>
            <table>
                <tr>
                    <th>Kode</th>
                    <th>No Yayasan</th>
                    <th>Nama</th>
                    <th>Kegiatan</th>
                    <th>Divisi</th>
                    <th>keterangan</th>
                    <th>Nominal</th>
                    <th>Catatan</th>
                    <th>Koreksi Nominal</th>
                    <th>Waktu</th>
                </tr>
                <?php
                    while ($result = mysqli_fetch_assoc($mysql)){
                        echo "<tr>";
                        echo "<td>$result[kode]</td>";
                        echo "<td>$result[noid]</td>";
                        echo "<td>$result[nama]</td>";
                        echo "<td>$result[kegiatan]</td>";
                        echo "<td>$result[divisi]</td>";
                        echo "<td>$result[keterangan]</td>";
                        echo "<td>".number_format($result['nominal'])."</td>";
                        echo "<td>$result[catatan]</td>";
                        
                        //number format nominal 2
                        if (!empty($result['nominal2'])){
                            echo "<td>".number_format($result['nominal2'])."</td>";
                        }
                        else {
                            echo "<td>".($result['nominal2'])."</td>";
                        }
                        
                        
                        echo "<td>".date("D, j M Y",$result['waktu'])."</td>";
                        echo "<td>
                        <form method=post action=approved_step.php>
                            <input type=text hidden name=kode value=$result[kode]>
                            <input type=text hidden name=noid value=$result[noid]>
                            <input type=submit>
                        </form>
                        </td>";
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
