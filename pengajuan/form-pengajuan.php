<?php
ob_start();

//Check koneksi ke database
include ("../advance.php");

if (!$koneksi){
    die ("Mohon maaf terjadi kesalahan, harap menghubungi bagian keuangan ".mysqli_connect_error($koneksi));
}

//logout kalau masusk tanpai izin.
cookieLogin02($_COOKIE['id']);

$query = "SELECT * FROM biodata WHERE noid = '$_COOKIE[id]'";
$mysql = mysqli_query ($koneksi,$query);

if (!$result = mysqli_fetch_assoc ($mysql)){
    die ("Server bermasalah hubungi bagian keuangan");
}
mysqli_free_result ($mysql);
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
<body>
<p><a href="../home.php">Home</a> | <a href="../home.php">Back</a> | <a href="../index.php">Logout</a></p>
    <div class="containerpengajuan">
        <fieldset>
            <legend>Pengajuan Anggaran</legend>
            <form action ="form-pengajuan-true.php" method="post">
                
                <!-- Untuk Memasukan ke data base pengajuan step 1 (checker) -->
                <input hidden name="namapengaju" type="text" value="<?php echo $result['nama'] ?>">
                <input hidden name="noidpengaju" type="text" value="<?php echo $result['noid'] ?>">
                <input hidden name="waktupengaju" type="text" value="<?php echo time() ?>">
                <input hidden name="steppengaju" type="text" value="checker">
                
                
                <table>
                    <tr><td>Nama : </td>
                        <td>
                        <?php echo $result['nama'] ?>
                        </td>
                    </tr>
                    
                    <!-- Menentukan tanda tanga siapa yang dipakai -->
                    <tr>
                        <td>Kegiatan</td>
                        <td>
                            <select name="kegiatanpengaju">
                                <?php
                                
                                $query02 = "SELECT * FROM `kegiatan-divisi`";
                                $mysql02 = mysqli_query ($koneksi,$query02);
                                
                                while ($result02 = mysqli_fetch_assoc ($mysql02)){
                                    
                                    
                                    if (!empty($result02['opt'])){
                                        echo "<optgroup label=\"".$result02['opt']."\">";
                                    }
                                    //ini isinya farras
                                    echo "<option value=\"$result02[kegiatan]\">$result02[kegiatan]</option>";
                                    if (!empty($result02['opt'])){
                                        echo "</optgroup>";
                                    }
                                }                                                         
                                ?>
                            </select>
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td>Keterangan</td>
                        <td><textarea class="keterangan" name="keteranganpengaju" type="text"></textarea></td>
                    </tr>
                    <tr>
                        <td>Nominal</td>
                        <td><input name="nominalpengaju" type="number"></td>
                    </tr>
                    <tr>
                        <td>Waktu Kegiatans</td>
                        <td><input name="waktukegiatan" type="date" min="<?php echo time(); ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit"></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </div>   
</body>
</html>
<pre>
<?php
ob_end_flush ();
?>
</pre>