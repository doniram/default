<?php
session_start();
if (!isset($_SESSION["login"])){ //jika cookie belum diset arahkan ke login
    header("Location:login.php");
    exit;
}
require "function.php";
$id = $_GET["id"];

$mhs = tampilkan("SELECT * FROM crud WHERE id=$id")[0];

if (isset ($_POST["submit"])){
        // var_dump($_POST); die();
        if(edit($_POST) > 0 ){
            echo "<script> alert('Data Berhasil diubah');
            document.location.href = 'tampil.php'</script>";
        }else{
            echo "<script> alert('Data Gagal diubah')</script>";
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
    <h1>UBAH DATA</h1>
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
        <input type="hidden" name="id" value="<?= $mhs["id"];?>" >    
        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"];?>" >
            <li>Nik <input type="text" name="nik" id="" value="<?= $mhs["nik"];?>"> </li>
            <li> Nama <input type="text" name="nama" id="" value="<?= $mhs["nama"];?>"></li>
            <li>Email <input type="text" name="email" id="" value="<?= $mhs["email"];?>"></li>
            <li>No. HP<input type="text" name="phone" id="" value="<?= $mhs["phone"];?>"></li>
            <li>gambar <img width="50px"src="gambar/<?=$mhs['gambar'];?>"><br>
            <input type="file" name="gambar" id="" ></li>
        </ul>
        <button type="submit" name="submit">Ubah Data</button>
        <button type="submit" name="view">View Data</button>
    </form>
</body>
</html>