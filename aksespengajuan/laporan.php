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
$query = akseslaporan($_COOKIE['akses']);
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
            <form action="laporan.php" method="post">
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
                $query02 = "SELECT * FROM stepchecker WHERE kode = '$_POST[kodepengaju]' AND step = 'report'"; //jagan pakai akses pencairan
                $mysql02 = mysqli_query ($koneksi,$query02);
                
                if ($result02 = mysqli_fetch_assoc($mysql02)){
                echo "<div class=container>";
                    echo "<fieldset>";
                    echo "<legend>";
                    echo "Input Laporan Pengajuan";
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
                    
                    echo "<tr><td><b>Anggaran</b></td><td>".$nominal."</td></tr>";
                     
                    echo "<tr>";
                    echo "<td><b>Submit</b></td>";
                    echo "<td>";
                        //submit
                        echo "<form method=post action=laporan.php enctype=multipart/form-data>";
                            echo "<input name=kodepengaju type=text value=$result02[kode] hidden>";
                            echo "<input name=noid type=text value=$result02[noid] hidden>";
                            echo "<input name=nominal type=text value=$nominal hidden>";
                            echo "<input name=waktulapor type=text value=".time()." hidden>";
                            echo "<input name=realisasi type=number required placeholder='Realisasi'>";
                            echo "<br><br>";
                            echo "<input name=pelapordana type=text required placeholder='Nama Pelapor Dana'>";
                            echo "<br><br>";
                            echo "<input name=filelaporan type=file required>";
                            echo "<input type=submit name=input value=input>";
                            
                            
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                            echo "</table>";
                            echo "</fieldset>";
                            echo "</div>";
                    
                    //submit jika sudah melakukan pengambilan dana
                    
                    if (!empty($_POST['kodepengaju']) and !empty($_POST['input'])){
                        
                        
                        $error = $_FILES['filelaporan']['error'];
                        
                        if ($error === 0){
                            
                            //validasi file extension
                            $extension = (bool) strpos($_FILES['filelaporan']['type'],"pdf");
                            
                            if ($extension){
                                
                                //validasi duplicate name
                                if (!file_exists("../file_laporan/$_POST[kodepengaju].pdf")){
                                    
                                    //pindahkan lampiran ke alamat 
                                    if ($newfile = move_uploaded_file($_FILES['filelaporan']['tmp_name'],"../file_laporan/$_POST[kodepengaju].pdf")){
                                        echo "<div class=container>";
                                        echo "<fieldset>";
                                        echo "<legend>Perhatian</legend>";
                                        echo "<h3>File sudah ter upload click disini |<a href=laporan.php> Here </a>|.</h3>";
                                        echo "</fieldset>";
                                        echo "</div>";
                                        
                                        //jika file benar terupload
                                        $query03 = "UPDATE stepchecker SET step = 'done', pelapor='$_POST[pelapordana]',waktumelapor='$_POST[waktulapor]',realisasi='$_POST[realisasi]' WHERE kode ='$_POST[kodepengaju]'";
                                        $mysql03 = mysqli_query ($koneksi,$query03);
                                        header( "refresh:5;url=laporan.php" );
                                    }else {
                                        echo "<div class=container>";
                                        echo "<fieldset>";
                                        echo "<legend>Perhatian</legend>";
                                        echo "<h3>Mohon maaf ada kesalahan hubungi bagian keuangan.</h3>";
                                        echo "</fieldset>";
                                        echo "</div>";
                                    }
                                }else {
                                        echo "<div class=container>";
                                        echo "<fieldset>";
                                        echo "<legend>Perhatian</legend>";
                                        echo "<h3>Terjadi file  duplicate.</h3>";
                                        echo "</fieldset>";
                                        echo "</div>";
                                }
                            }else {
                                echo "<div class=container>";
                                echo "<fieldset>";
                                echo "<legend>Perhatian</legend>";
                                echo "<h3>Data harus PDF.</h3>";
                                echo "</fieldset>";
                                echo "</div>";
                            }
                        }
                    }
                    
                    
                    
                    
                echo "</div>";
                }
                else {
                    echo "<div class=container>";
                    echo "<fieldset>";
                    echo "<legend>";
                    echo "Informasi Pelaporan Pengajuan Dana";
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