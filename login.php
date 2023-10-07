<?php
session_start();
require 'function.php';

if ( isset( $_COOKIE['id']) && isset($_COOKIE['sex']) ){
  $id = $_COOKIE['id'];
  $sex= $_COOKIE['sex'];
  
  //ambil username berdasarkan id
    $result = mysqli_query($conn,"SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    //cek cookie dan username
    if( $sex === hash('sha256',$row['username'])){
        $_SESSION['login']= true; 
    }
}
//jika sudah login arahkan user ke halaman index
if (isset($_SESSION["login"])){
    header("Location:tampil.php");
    exit;
}
//Login Start
if( isset ($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1){

        $row= mysqli_fetch_assoc($result);
        //cek password
       if ( password_verify($password,$row["password"])){
        $_SESSION["login"] = true ;
        //jika ceklis remmber me (menggunakan Cookie)
         if ( isset ($_POST['remember'])){
            //buat cookie
            
            setcookie('id',$row['id'],time()+60);
            setcookie('sex',hash('sha256',$row['username'] ),time()+60); 
         }
            header("Location:tampil.php"); 
            exit;
       }
    }
    $error = true;
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
    
<h1>halaman login</h1><hr>
<?php if(isset($error)):?>
<p>Password / username salah</p>
<?php endif; ?>

<form action="" method="post">
    
    <li>Username <input type="text" name="username" id=""></li>
    <li>password <input type="password" name="password" id=""></li>
    <li><input type="checkbox" name="remember" id=""> Remember Me</li>
    <li><button name="submit">Login</button></li>

</form>
</body>
</html>