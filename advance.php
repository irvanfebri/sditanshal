<?php
//Untuk memanggil database

/*
Untuk data base host dapat disesuaikan dengan alamat ip yang
dijadikan statik dikomputer yang dijadikan sebuah host local
di area network
*/
$host = "192.168.1.201";
$uname = "farras";
$pass = "farrasmuhammad";
$db = "pengajuan";
$koneksi = mysqli_connect ($host,$uname,$pass,$db);


function CookieLogin ($cookie){
    $host = $GLOBALS['host'];
    $uname = $GLOBALS['uname'];
    $pass = $GLOBALS['pass'];
    $db = $GLOBALS['db'];
    
    $koneksi = mysqli_connect ($host,$uname,$pass,$db);
    $query = "SELECT * FROM user WHERE noid = '$cookie'";
    $mysql = mysqli_query ($koneksi,$query);
    
    if (!mysqli_affected_rows ($koneksi)){
        return header("location: index.php");
    }
}

function CookieLogin02 ($cookie){
    $host = $GLOBALS['host'];
    $uname = $GLOBALS['uname'];
    $pass = $GLOBALS['pass'];
    $db = $GLOBALS['db'];
    
    $koneksi = mysqli_connect ($host,$uname,$pass,$db);
    $query = "SELECT * FROM user WHERE noid = '$cookie'";
    $mysql = mysqli_query ($koneksi,$query);
    
    if (!mysqli_affected_rows ($koneksi)){
        return header("location: ../index.php");
    }
}

// Untuk kode transaksi
function kodepengajuan (){
    $text = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $countext = strlen($text);
    $code="";
    for ($i=0 ; $i<6 ;$i++){
    
    $code .= $text[rand(0,($countext-1))];
    }

    return $code;    
}

function biodata($akses){
    $query = "SELECT * FROM biodata WHERE noid = '$akses'";
    $mysqli = mysqli_query ($GLOBALS['koneksi'],$query);
    $result = mysqli_fetch_assoc ($mysqli);
    return $result['nama'];
}

function aksespengajuan($akses){
    //chekcer
    if ($akses == "keuangan"){
        $query = "SELECT * FROM stepchecker WHERE step = 'checker'";
        return $query;
    }
    
    if ($akses == "admin"){
        $query = "SELECT * FROM stepchecker WHERE  step = 'checked' OR step = 'checker'";
        return $query;
    }
    
    //approver kesiswaan
    if ($akses == "kadiv kesiswaan"){
        $query = "SELECT * FROM stepchecker WHERE step = 'checked' AND divisi = 'Kadiv Kesiswaan'";
        return $query;
    }
    
    //approver akademik
    if ($akses == "kadiv akademik"){
        $query = "SELECT * FROM stepchecker WHERE step = 'checked' AND divisi = 'Kadiv Akademik'";
        return $query;
    }
}

function aksespengajuanapprove($akses){
    //chekcer
    if ($akses == "keuangan"){
        $query = "SELECT * FROM stepchecker WHERE step = 'checked' AND divisi = 'Keuangan'";
        return $query;
    }
    if ($akses == "admin"){
        $query = "SELECT * FROM stepchecker WHERE  step = 'checked' OR step = 'checker'";
        return $query;
    }
    
    //approver kesiswaan
    if ($akses == "kadiv kesiswaan"){
        $query = "SELECT * FROM stepchecker WHERE step = 'checked' AND divisi = 'Kadiv Kesiswaan'";
        return $query;
    }
    
    //approver akademik
    if ($akses == "kadiv akademik"){
        $query = "SELECT * FROM stepchecker WHERE step = 'checked' AND divisi = 'Kadiv Akademik'";
        return $query;
    }
}

function aksespencairan ($akses){
    if ($akses == "keuangan" or $akses == "admin"){
        $query = "SELECT * FROM stepchecker WHERE step = 'approved'";
    }
    return $query;
}

function akseslaporan ($akses){
    if ($akses == "keuangan" or $akses == "admin"){
        $query = "SELECT * FROM stepchecker WHERE step = 'report'";
    }
    return $query;
}

function statuspengajuan($akses,$id){
    
    if ($akses == "admin"){
        $query = "SELECT * FROM stepchecker WHERE step !='done'";
        return $query;    
    }
    else {
        $query = "SELECT * FROM stepchecker WHERE noid = '$id' AND step != 'done'";
        return $query;
    } 
}

function riwayatpengajuan ($akses,$id){
    if ($akses == "admin"){
        $query = "SELECT * FROM stepchecker";
        return $query;    
    }
    else {
        $query = "SELECT * FROM stepchecker WHERE noid = '$id' AND step = 'done'";
        return $query;
    }
}

function aksesprint($kode){
    $query = "SELECT * FROM stepchecker WHERE kode = '$kode'";
    return $query;
}


function sendwa ($nohp,$pesan){
        $my_apikey = "V5DMO9Z2U3JFXOPV7H0H"; 
        $destination = $nohp; 
        $message = "$pesan"; 
        $api_url = "http://panel.capiwha.com/send_message.php"; 
        $api_url .= "?apikey=". urlencode ($my_apikey); 
        $api_url .= "&number=". urlencode ($destination); 
        $api_url .= "&text=". urlencode ($message); 
        $my_result_object = json_decode(file_get_contents($api_url, false));
        
        return $my_result_object;
}

?>