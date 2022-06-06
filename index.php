<?php
ob_start();

//Check koneksi ke database
include ("advance.php");

if (!$koneksi){
    die ("Mohon maaf terjadi kesalahan, harap menghubungi bagian keuangan ".mysqli_connect_error($koneksi));
}

$user = "";
$password = "";
if(isset($_POST['user']) and isset($_POST['user'])){
    $user = $_POST['user'];
    $password = $_POST['password'];
}

$query = "SELECT * FROM user WHERE username = '$user' and password ='$password'";
$mysql = mysqli_query ($koneksi,$query);
$result = mysqli_fetch_assoc($mysql);


$query2 = "SELECT * FROM biodata WHERE noid = '$result[noid]'";
$mysql2 = mysqli_query ($koneksi,$query2);
$result2 = mysqli_fetch_assoc ($mysql2);

if (mysqli_affected_rows ($koneksi)){
    header ("location: home.php");
    /*
     * Set cookie
     */
    setcookie ('id',$result['noid']);
    setcookie ('akses',$result2['akses']);
}

mysqli_free_result ($mysql);

//unsetcookie jika kehalaman index
if (isset($_COOKIE['id']) and isset($_COOKIE['akses'])){
    setcookie ('id',$result['noid'],time()-10000);
    setcookie ('akses',$result2['akses'],time()-10000);
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Masuk Ke Porta SDIT Anak Shalih Bogor</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);
    
    .login-page {
      width: 360px;
      padding: 10% 0 0;
      margin: auto;
    }
    .form {
      position: relative;
      z-index: 1;
      background: rgba(255, 255, 255,0.2);
      max-width: 360px;
      margin: 0 auto 100px;
      padding: 45px;
      text-align: center;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    .form input {
      font-family: "Roboto", sans-serif;
      outline: 0;
      background: #f2f2f2;
      width: 100%;
      border: 0;
      margin: 0 0 15px;
      padding: 15px;
      box-sizing: border-box;
      font-size: 14px;
    }
    .form button {
      font-family: "Roboto", sans-serif;
      text-transform: uppercase;
      outline: 0;
      background: #4CAF50;
      width: 100%;
      border: 0;
      padding: 15px;
      color: #FFFFFF;
      font-size: 14px;
      -webkit-transition: all 0.3 ease;
      cursor: pointer;
    }
    .form button:hover,.form button:active,.form button:focus {
      background: #43A047;
    }
    .form .message {
      margin: 15px 0 0;
      color: #b3b3b3;
      font-size: 12px;
    }
    .form .message a {
      color: #4CAF50;
      text-decoration: none;
    }
    .form .register-form {
      display: none;
    }
    .container {
      position: relative;
      z-index: 1;
      max-width: 300px;
      margin: 0 auto;
    }
    .container:before, .container:after {
      content: "";
      display: block;
      clear: both;
    }
    .container .info {
      margin: 50px auto;
      text-align: center;
    }
    .container .info h1 {
      margin: 0 0 15px;
      padding: 0;
      font-size: 36px;
      font-weight: 300;
      color: #1a1a1a;
    }
    .container .info span {
      color: #4d4d4d;
      font-size: 12px;
    }
    .container .info span a {
      color: #000000;
      text-decoration: none;
    }
    .container .info span .fa {
      color: #EF3B3A;
    }
    body {
      background-image: url("pic/bg9.jpg");
    
/* Background image is centered vertically and horizontally at all times */ 
    background-position: center center; 
    background-repeat: no-repeat; 
    background-attachment: fixed; 
    background-size: cover; 
    background-color: #464646; 
    /* Font Colour */ 
    color:white;     
    }
    
    @media (max-width: 600px) {
        body {
            background-image: url("pic/bgphone.jpg");
            background-position: center center; 
            background-repeat: no-repeat; 
            background-attachment: fixed; 
            background-size: cover; 
            background-color: #464646; 
            /* Font Colour */ 
            color:white;     
        }
    }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="form"> 
          <h1>Form Pengajuan Dana</h1>        
            <form action="index.php" method="post">
                <input type="text" name="user" value="" placeholder=" Username ">
                <input type="password" name="password" value="" placeholder=" Password ">
                <input type="submit" name="login" value="login">
            </form>
        </div>
    </div>
</body>
</html>
<pre>
<?php
ob_end_flush ();
?>
</pre>