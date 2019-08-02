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
$query = "SELECT * FROM stepchecker WHERE kode = '$_POST[kode]'";
$mysql = mysqli_query ($koneksi,$query);
$result = mysqli_fetch_assoc($mysql);


//langka akhir
if(!isset($_POST['button'])){
    $_POST['button'] = "";
}
if (($_POST['button'] == "checked") and !empty($_POST['catatan'])){
    echo "<div class=containercheck>";
    echo "<fieldset>";
    echo "<legend>";
    echo "Info";
    echo "</legend>";
    echo "<table>";
    echo "<tr><td><b>Nama Pengaju</b></td><td> : $result[nama]</td></tr>";
    echo "<tr><td><b>Kegiatan</b></td><td> : $result[kegiatan]</td></tr>";
    echo "<tr><td><b>Keterangan</b></td><td> : $result[keterangan]</td></tr>";
    echo "<tr><td><b>Waktu</b></td><td> : ".date("D, j M Y",$result['waktu'])."</td></tr>";
    
    if (!empty($_POST['nominal2'])){
        echo "<tr><td><b>Keterangan</b></td><td> : Rp ".number_format($_POST['nominal2'])."</td></tr>";
    }
    else {
        echo "<tr><td><b>Keterangan</b></td><td> : Rp ".number_format($result['nominal'])."</td></tr>";
    }
    
    echo "<tr><td><b>Keterangan</b></td><td> : $_POST[catatan]</td></tr>";
    echo "<table>";
    echo "</fieldset>";
    echo "</div>";
    
    
    //masukan kedatabase checker to checked
    $query02 = "UPDATE stepchecker SET nominal2='$_POST[nominal2]' , catatan='$_POST[catatan]' , step='checked' WHERE kode ='$_POST[kode]'";
    if ($mysql = mysqli_query ($koneksi,$query02)){
        
        $query03 = "SELECT * FROM biodata WHERE akses = '$_POST[akses]' ";
        $mysql03 = mysqli_query ($koneksi,$query03);
        $result03 = mysqli_fetch_assoc ($mysql03);
        
        $my_apikey = "V5DMO9Z2U3JFXOPV7H0H"; 
        $destination = $result03['nohp']; 
        $message = "Assalamualaikum, mohon untuk mengecheck persetujuan pengajuan anggaran kode *$result[kode]*."; 
        $api_url = "http://panel.apiwha.com/send_message.php"; 
        $api_url .= "?apikey=". urlencode ($my_apikey); 
        $api_url .= "&number=". urlencode ($destination); 
        $api_url .= "&text=". urlencode ($message); 
        $my_result_object = json_decode(file_get_contents($api_url, false));
        
       die ("data sudah terupdate kembali ke [<a href=checker.php >sini</a>]");
    }
}
else {
    echo "<p style=color:red;>Catatan Harus Diisi</p>";
}

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
        .keterangan {
            width: 500px;
            height: 80px;
        }
        input {
            width: 250px;
        }
        
        textarea{
            height: 60px;
            width: 250px;
        }
    </style>
</head>
<body>
    <div class="containercheck">
        <table>
        <?php
            echo "<tr><td><b>Nama Pengaju</b></td><td> : $result[nama]</td></tr>";
            echo "<tr><td><b>Kegiatan</b></td><td> : $result[kegiatan]</td></tr>";
            echo "<tr><td><b>Keterangan</b></td><td> : $result[keterangan]</td></tr>";
            echo "<tr><td><b>Waktu</b></td><td> : ".date("D, j M Y",$result['waktu'])."</td></tr>";
            echo "<tr><td><b>Nominal</b></td><td> : Rp ".number_format($result['nominal'])."</td></tr>";
        ?>
        </table>
        <hr>
        <fieldset>
            <table>
                <legend>Check Pengajuan Anggaran</legend>
                <form action="checked_step.php" method="post">
                    <tr><td><b>Catatan</b></td><td><textarea placeholder="Catatan" name="catatan"></textarea></td></tr>
                    <input name="nominal" value="<?php echo $result['nominal'];?>" hidden>
                    <input name="kode" value="<?php echo $_POST['kode'];?>" hidden>
                    <input name="akses" value="<?php echo $result['divisi'];?>" hidden> <!--Untuk kirim no wa-->
                    <tr><td>Nominal Koreksi</td><td><input name="nominal2" type="number" placeholder="Masukan Nominal jika ada koreksi"></input></td></tr>
                    <tr><td></td><td><input type="submit" name="button" value="checked"></input></td></tr>
                    <!--Lihat ke note [langkah akhir]-->
                </form>
            </table>
        </fieldset>
    </div>    
</body>
</html>
<pre>
    

<?php
ob_end_flush ();
?>
</pre>