<?php
ob_start();

//Check koneksi ke database
include ("../advance.php");

if (!$koneksi){
    die ("Mohon maaf terjadi kesalahan, harap menghubungi bagian keuangan ".mysqli_connect_error($koneksi));
}

cookieLogin02($_COOKIE['id']);

if ($_COOKIE['akses'] !== "admin"){
    die ("Click this link, or i will destroy your computer <a href=../home.php>Click Here </a>");
}

/*
    Setelah username dan password terisi pindah ke addbiodata
*/
if (!empty($_POST['newuser']) and !empty($_POST['newpass']) and !empty($_POST['newniy'])){
    setcookie('newuser',$_POST['newuser']);
    setcookie('newpass',$_POST['newpass']);
    setcookie('newniy',$_POST['newniy']);
    header ("location: addbiodata.php");
}
elseif (isset($_COOKIE['newuser']) and isset($_COOKIE['newpass']) and isset($_COOKIE['newniy'])){
    setcookie('newuser',$_POST['newuser'],time()-1000);
    setcookie('newpass',$_POST['newpass'],time()-1000);
    setcookie('newniy',$_POST['newniy'],time()-1000); 
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Masuk Ke Porta SDIT Anak Shalih Bogor</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <p><a href="../home.php">Home</a> | <a href="../home.php">Back</a> | <a href="../index.php">Logout</a></p>
    <div class="containeraddakun">
        <fieldset>
            <legend>Tambah Akun</legend>
            <table>
                <h3>Daftar Akun Baru</h3>
                <form action="addakun.php" method="post">
                    <tr><td>User name</td><td><input name="newuser" type="text"></td></tr>
                    <tr><td>Password</td><td><input name="newpass" type="password"></td></tr>
                    <tr><td>NIY</td><td><input name="newniy" type="text"></td></tr>
                    <tr><td><input type="submit"</td></tr>
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