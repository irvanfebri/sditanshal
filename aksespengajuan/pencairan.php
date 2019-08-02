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
$query = aksespencairan($_COOKIE['akses']);
$mysql = mysqli_query ($koneksi,$query);
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
            width: 200px;
        }
    </style>
</head>
<p><a href="../home.php">Home</a> | <a href="../home.php">Back</a> | <a href="../index.php">Logout</a></p>

<body>
    <div>
        <div class="containerpencairan">
            <form action="pencairan.php" method="post">
                <datalist id="kodepengaju">
                    <?php
                        while ($result = mysqli_fetch_assoc($mysql)){
                            echo "<option label=$result[kode] value=$result[kode]>";
                            
                        }
                    ?>
                </datalist>
                
                <input type="text" list="kodepengaju" name="kodepengaju">
                
                <input type="submit">
            </form>
            <hr>
            <?php
                if (empty($_POST['kodepengaju'])){
                    $_POST['kodepengaju'] = "";
                }
                $query02 = "SELECT * FROM stepchecker WHERE kode = '$_POST[kodepengaju]' AND step = 'approved'"; //jagan pakai akses pencairan
                $mysql02 = mysqli_query ($koneksi,$query02);
                
                if ($result02 = mysqli_fetch_assoc($mysql02)){
                echo "<div class=container>";
                    echo "<fieldset>";
                    echo "<legend>";
                    echo "Input Pencairan Pengajuan";
                    echo "</legend>";
                    echo "<table class=pencairan>";
                    echo "<tr><th>Keterangan</th><th>Isi</th></tr>";
                    echo "<tr><td><b>Kode</b></td><td>$result02[kode]</td></tr>";
                    echo "<tr><td><b>Nama</b></td><td>$result02[nama]</td></tr>";
                    echo "<tr><td><b>Kegiatan</b></td><td>$result02[kegiatan]</td></tr>";
                    echo "<tr><td><b>Keterangan</b></td><td>$result02[keterangan]</td></tr>";
                    echo "<tr><td><b>Catatan</b></td><td>$result02[catatan]</td></tr>";
                    
                        if ($result02['nominal2'] > 0){
                            $nominal = number_format($result02['nominal2']);
                        }
                        else {
                            $nominal = number_format($result02['nominal']);
                        }
                    
                    echo "<tr><td><b>Nominal</b></td><td>".$nominal."</td></tr>";
                     
                    echo "<tr>";
                    echo "<td><b>Submit</b></td>";
                    echo "<td>";
                        //submit
                        echo "<form method=post action=pencairan.php>";
                            echo "<input name=kodepengaju type=text value=$result02[kode] hidden>";
                            echo "<input name=noid type=text value=$result02[noid] hidden>";
                            echo "<input name=nominal type=text value=$nominal hidden>";
                            echo "<input name=waktupengambildana type=text value=".time()." hidden>";
                            echo "<input name=pengambildana type=text required placeholder='Nama pengambil dana'>";
                            
                            
                            //lihat 'submit jika sudah melakkan pengambilan dana
                            
                            if (!empty($_POST['kodepengaju']) and !empty($_POST['input'])){
                                $disable = "disabled";
                            }
                            else {
                                $disable="";
                            }
                            echo "<input type=submit name=input value=input $disable>";
                            
                            
                        echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "</fieldset>";
                    echo "</div>";
                    
                    //submit jika sudah melakukan pengambilan dana
                    
                    if (!empty($_POST['kodepengaju']) and !empty($_POST['input'])){
                        $query03 = "UPDATE stepchecker SET step = 'report', pengambildana='$_POST[pengambildana]',waktupengambildana='$_POST[waktupengambildana]' WHERE kode ='$_POST[kodepengaju]'";
                        $mysql03 = mysqli_query ($koneksi,$query03);
                        if (mysqli_affected_rows ($koneksi)){
                            
                            
                            //ambil data no pegawai
                            $query04 = "SELECT * FROM biodata WHERE noid = '$_POST[noid]'";
                            $mysql04 = mysqli_query ($koneksi,$query04);
                            $result04 = mysqli_fetch_assoc ($mysql04);
                            $pesan = "Alhamdulillah\n\nkode : *$_POST[kodepengaju]*\n\nPengaambil Dana : *$_POST[pengambildana]*\n\nNominal Pengambilan : *$_POST[nominal]*\n\nTelah dilakukan pengambilan dana sesuai dengan data diatas pada ".date("l,d F Y / H : i")."\n\n _Harap jika kegiatan sudah selesai agar melaporkan pertanggung jawaban ke bagian keuangan_.";
                            $nohp = $result04['nohp'];
                            
                            //kirim ke no whatsapp pengaju
                            sendwa ($nohp,$pesan);
                        }
                     echo "<p>Update berhasil kembali ke |<a href=pencairan.php>Sini</a>|</p>";
                    }
                    
                    
                    
                    
                echo "</div>";
                }
                else {
                    echo "<div class=container>";
                    echo "<fieldset>";
                    echo "<legend>";
                    echo "Informasi";
                    echo "</legend>";
                    echo "data dengan kode <b>$_POST[kodepengaju]</b> tidak ditemukan";
                    echo "</fieldset>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</body>
</html>
<pre>
<?php
ob_end_flush ();
?>
</pre>