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

if (empty ($_COOKIE['newuser']) and empty ($_COOKIE['newpass']) and empty ($_COOKIE['newniy'])){
    header ("location: addakun.php");
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Masuk Ke Porta SDIT Anak Shalih Bogor</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        select,input {
            width: 170px;
        }
        
    </style>
</head>
<body>
    <div>
        <fieldset>
            <legend>Masukan Biodata</legend>
            <table>
                <h3>Daftar Akun Baru</h3>
                <form action="addbiodata.php" method="post">
                    <tr><td>Nama</td><td><input name="newnama" type="text"></td></tr>
                    
                    <tr><td>Jabatan</td><td>
                    <select name="newjabatan">
                        <option value=""><i>Pilih</i></option>
                        <option value="Kepala Divisi Kesiswaan">Kepala Divisi Kesiswaan</option>
                        <option value="Kepala Divisi Akademik">Kepala Divisi Akademik</option>
                        <option value="Guru">Guru</option>
                        <option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
                    </select>
                    </td></tr>
                    
                    <tr><td>Akses</td><td>
                    <select name="newakses">
                        <option value=""><i>Pilih</i></option>
                        <option value="admin">Admin</option>
                        <option value="kadiv akademik">Kepala Divisi Akademik</option>
                        <option value="kadiv kesiswaan">Kepala Divisi Kesiswaan</option>
                        <option value="keuangan">Keuangan</option>
                        <option value="guru">Guru</option>
                    </select>
                    </td></tr>
                    
                    <tr><td>Email</td><td><input name="newemail" type="email"></td></tr>
                    <tr><td>No Handphone</td><td><input name="newnohp" type="text"></td></tr>
                    <tr><td></td><td><input type="submit"</td></tr>
                </form>
            </table>
        </fieldset>
    </div>
    
    
    
    
</body>
</html>
<pre>
<?php
//Masukan ke database
$peringatan = "";
if (!empty($_POST['newnama']) and !empty($_POST['newjabatan']) and !empty($_POST['newakses']) and !empty($_POST['newemail'])
    and !empty($_POST['newnohp'])){
    
        //masukan kedatabase user
        
        $query = "INSERT INTO user(noid,username,password) VALUES ('$_COOKIE[newniy]','$_COOKIE[newuser]','$_COOKIE[newpass]')";
        $mysql = mysqli_query ($koneksi,$query);
        if (mysqli_error ($koneksi)){
            
            $peringatan .= "Terjadi Duplicat NIY diuser"."<br>";
        }
        else {
            echo "Data sudah di input [<a href=../home.php>Home</a>] [<a href=addakun.php>Buat akun baru</a>]";
            //mysqli_free_result ($query);
        }
        
        $query02 = "INSERT INTO biodata(noid,nama,jabatan,akses,email,nohp)
        VALUES ('$_COOKIE[newniy]','$_POST[newnama]','$_POST[newjabatan]','$_POST[newakses]','$_POST[newemail]','$_POST[newnohp]')";
        $mysql = mysqli_query ($koneksi,$query02);
        if (mysqli_error ($koneksi)){
            $peringatan .= "Terjadi Duplicat NIY di biodata"."<br>";
        }
        else {
            //mysqli_free_result ($query02);
        }
    }
    else {
        $peringatan .= "Isi Keseluruhan masukan diatas";
    }
    
    if (!empty($peringatan)){
        echo $peringatan;
    }
ob_end_flush ();
?>
</pre>