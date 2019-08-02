<?php
ob_start();

//Check koneksi ke database
include ("../advance.php");

if (!$koneksi){
    die ("Mohon maaf terjadi kesalahan, harap menghubungi bagian keuangan ".mysqli_connect_error($koneksi));
}

$query = "SELECT * FROM user WHERE noid = '$_COOKIE[id]'";
$sql = mysqli_query ($koneksi,$query);
$result = mysqli_fetch_assoc($sql);
$query02 = "SELECT * FROM biodata WHERE noid = '$_COOKIE[id]'";
$sql02 = mysqli_query ($koneksi,$query02);
$result02 = mysqli_fetch_assoc($sql02);

cookieLogin02($_COOKIE['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Masuk Ke Porta SDIT Anak Shalih Bogor</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../mystyle/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      @media (max-width: 600px){
         div.containerakun {
           margin: 0 auto;
           width: 350px;
           box-shadow: 5px 10px rgb(186, 186, 186);
         }
      }
      
    </style>
</head>
<body>
<?php
   if (!empty($_POST['passwordlama']) and !empty($_POST['passwordbaru']) and !empty($_POST['passwordbaru2'])){
    
    $warn = "";
    if ($result['password'] != $_POST['passwordlama']){
        
        $warn .="Password antum salah";
        
    }
    elseif ($_POST['passwordbaru'] != $_POST['passwordbaru2']){
        
        $warn .="Password tidak sama";
        
    }
    elseif (($_POST['passwordbaru'] == $result['password']) and ($_POST['passwordbaru2'] == $result['password'])){
        
        $warn .="Password lama dan baru antum sama, niat ganti tidak !!!";
        
    }
    
    //ganti password dan kirim wa
    
    else {
        $query03 = "UPDATE user SET password = '$_POST[passwordbaru2]' WHERE noid = '$_COOKIE[id]'";
        
        echo mysqli_error($koneksi);
        
        if ($mysqli03 = mysqli_query($koneksi,$query03)){
            
            //kirim no hape
            $pesan = "Password antum sudah diganti *$_POST[passwordbaru2]*";
            sendwa ($result02['nohp'],$pesan);
            echo "berhasil";
        }
    }   
   }
   
   
?>

    
    <p><a href="../home.php">Home</a> | <a href="../informasi/akun.php">Back</a> | <a href="../index.php">Logout</a></p>
        <div class="containerakun">
            <fieldset>
                <legend>
                    <b>Data Pribadi</b>
                </legend>
                <form method="post">
                    <table>
                        <tr><td>Password lama</td><td><input name="passwordlama" type="password" required></td></tr>
                        <tr><td>Password Baru</td><td><input name="passwordbaru" type="password" pattern=".{6,15}" required></td></tr> 
                        <tr><td>Password Baru</td><td><input name="passwordbaru2" type="password" pattern=".{6,15}" required></td></tr>
                        <?php
                            if (!empty($warn)){
                                echo "<tr><td></td><td>$warn</td></tr>";
                            }
                        ?>
                        <tr><td></td><td><input type="submit"></td></tr>
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