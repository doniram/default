<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
}
require "function.php";

if (isset ($_POST["submit"])){
        if(tambah($_POST) > 0 ){
            echo "<script> alert('Data Berhasil ditambahkan');
            document.location.href = 'tampil.php'</script>";
        }else{
            echo "<script> alert('Data Gagal ditambahkan')</script>";
        }
    }
  
    if(isset($_POST["view"])){
        header("Location:tampil.php");
        exit;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Crud</title>
</head>
<body>
<table>
  
  <tr>
      <th>Nik</th>
      <th>Nama</th>
      <th>Email</th>
      <th>No HP</th>
  </tr>
</table>
<br><hr>
    <form action="" method="post" enctype="multipart/form-data"> 
        <ul>
            <li>Nik <input type="text" name="nik" id=""> </li>
            <li> Nama <input type="text" name="nama" id=""></li>
            <li>Email <input type="text" name="email" id=""></li>
            <li>No. HP<input type="text" name="phone" id=""></li>
            <li>Gambar <input type="file" name="gambar" id=""></li>
        </ul>
        <button type="submit" name="submit">Kirim Data</button>
        <button type="submit" name="view">View Data</button>
    </form>
</body>
</html>