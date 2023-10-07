<?php
require 'function.php';

if ( isset ($_POST["register"])){
    if(register($_POST) > 0){
        echo "<script> alert('userbaru berhasil ditambahkan');</script>";
        
    }else{
        ;
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Login</h1><hr>
<br>
<form action="" method="post" >
<li>username :
    <input type="text" name="username" id="">
</li>
<li>password :
    <input type="password" name="password" id="">
</li>
<li> 
konfirmasi password :
<input type="password" name="password2" id=""></li>
<li><input type="hidden" name="$tanggal"></li>
<button name="register">Register Now !</button>
</form>
</body>
</html>