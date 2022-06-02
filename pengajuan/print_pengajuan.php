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

//ambil data yang ingin diprint
$mysql = mysqli_query ($koneksi,aksesprint($_POST['kode']));
$result = mysqli_fetch_assoc ($mysql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Masuk Ke Porta SDIT Anak Shalih Bogor</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../mystyle/style.css">
    
    <script>
    /*
    window.onload = function () {  
        document.onkeydown = function (e) {  
            return (e.which || e.keyCode) != 116;  
        };  
    };
    */
    </script>
    <style>
        @page {
            margin: 0;
        }
    </style>
</head>
<body>
    <div id="printableArea">
        <br><br><br><br><br>
        <div class="printArea" >
            <h3 class="print">Pengajuan Anggaran SDIT Anak Shalih</h3>
            <hr>
            <?php
                echo "<table class=print>";
                echo "<tr><th>Informasi</th><th>Keterangan</th></tr>";
                echo "<tr><td>Kode Anggaran</td><td>$result[kode]</td></tr>";
                echo "<tr><td>No Induk Yayasan</td><td>$result[noid]</td></tr>";
                echo "<tr><td>Nama</td><td>$result[nama]</td></tr>";
                echo "<tr><td>Kegiatan</td><td>$result[kegiatan]</td></tr>";
                echo "<tr><td>Keterangan</td><td>$result[keterangan]</td></tr>";
                echo "<tr><td>Waktu Pengajuan</td><td>".date('D, j M Y',$result['waktu'])."</td></tr>";
                
                //tambahan jika ada pengurangan dana
                if (empty($result['nominal2'])){
                    echo "<tr><td>Nominal</td><td>Rp ".number_format($result['nominal'])."</td></tr>";    
                }
                elseif (!empty($result['nominal2'])) {
                    echo "<tr><td>Nominal</td><td>Rp ".number_format($result['nominal2'])."</td></tr>";
                    
                    if ($result['nominal2'] > $result['nominal']){
                        $stat = "diatas";
                    } else {
                        $stat = "dibawah";
                    }
                    echo "<tr><td>Catatan</td><td>Anggaran dicairkan $stat dari anggaran yang diajukan, dengan alasan
                    | $result[catatan] |</td></tr>";
                }
                
                
                echo "</table>";
                
                
            ?>
            <br><br><br>
            <div class="containerket">
                <p>Assalamualaikum Warrahmatullahi Wabarakatuh</p>
                <p class="keterangan">Berikan lembaran berikut kepada bagian keuangan untuk mengambil dana yang diajukan, lakukan penghitungan uang
                sebelum meninggalkan ruangan dimana ketika pengambil dana menerima uang. kekurangan nominal yang seharusnya setelah pengambil dana
                meninggalkan ruangan menjadi tanggung jawab pengambil dana.</p>
                <p>Pengambil Dana
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                Kasir</p>
                <br><br><br><br>
                <p>__________________
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                
                __________________</p>
            </div>
            
        </div>
    </div>
    <div style="margin: 0 auto; width:200px; height: 80px;">
        <input style="margin: 0 auto; margin-top: 25px;" type="button"; onclick=printDiv('printableArea') value="click here"; />
    </div>
    
<script>
    function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    
    document.body.innerHTML = printContents;
    
    window.print();
    
    document.body.innerHTML = originalContents;
    }
    printDiv(divName);
</script>
</body>
</html>
<?php
    ob_end_flush();
?>
