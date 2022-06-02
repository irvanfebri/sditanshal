<?php
ob_start();

//Check koneksi ke database
include ("../advance.php");

if (!$koneksi){
    die ("Mohon maaf terjadi kesalahan, harap menghubungi bagian keuangan ".mysqli_connect_error($koneksi));
}

$query = "SELECT * FROM biodata WHERE noid = '$_COOKIE[id]'";
$sql = mysqli_query ($koneksi,$query);
$result = mysqli_fetch_assoc($sql);

cookieLogin02($_COOKIE['id']);


//just for my wife InsyaAllah
//just for my wife InsyaAllah
//just for my wife InsyaAllah
  $disable = "";
  $color = "";
  if ($_COOKIE['id'] == "1440.06.03.01"){
     $disable = "disabled";
     $color = "rgb(255, 234, 234)";
  }

      

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
      
      th, td {
        background-color: <?php echo $color;?>;
      }
    
    </style>
    
    
</head>
<body>
    <p><a href="../home.php">Home</a> | <a href="../home.php">Back</a> | <a href="../index.php">Logout</a></p>
        <div class="containerakun">
            <fieldset>
                <legend>
                    <b>Data Pribadi</b>
                </legend>
                <table>
                    <tr><td><b>NIY</b></td><td><?php echo $result['noid'] ?></td></tr>
                    <tr><td><b>Nama</b></td><td><?php echo $result['nama'] ?></td></tr>
                    <tr><td><b>Jabatan</b></td><td><?php echo $result['jabatan'] ?></td></tr>
                    <tr><td><b>Email</b></td><td><?php echo $result['email'] ?></td></tr>
                    <tr><td><b>No HandPhone</b></td><td><?php echo $result['nohp'] ?></td></tr>
                    <form action=gantidata.php method="post">
                        <tr><td></td><td><input type="submit" name="changebutton" value="ganti password" <?php echo $disable; ?>></td></tr>
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