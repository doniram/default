<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
}
    include "function.php";
    $jumlahDataPerHalaman = 2;
    $jumlahData = count(tampilkan("SELECT * FROM crud"));
    $jumlahHal = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif =( isset( $_GET["halaman"])) ? $_GET["halaman"] : 1;
    $awalData =( $jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman ;




    $mahasiswa = tampilkan("SELECT * FROM crud ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman");

    if (isset ($_POST["cari"])){
        $mahasiswa = cari($_POST["keyword"]);
    }

    if(isset($_POST["submit"])){
        if(tambah($_POST)>0){
            echo "Data berhasil di input";
        }else{
            echo "Data gagal di input";
        }
    }

    if(isset($_POST["view"])){
        $mahasiswa = tampilkan("SELECT * FROM crud ORDER BY id DESC");
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
<body>
    <a href="logout.php" class="">logout</a>
    <form action="" method="post">
        <input type="text" name="keyword" placeholder="Cari disini">
        <button type="submit" name="cari">cari</button>
        
    </form>
    <?php if ($halamanAktif > 1):?>
    <a href="?halaman=<?= $halamanAktif -1 ;?>">&laquo;</a>
    <?php endif ; ?>

    <?php for($i = 1;$i <= $jumlahHal;$i++) :?>
        <?php if ($i == $halamanAktif):?>
        <a href="?halaman=<?= $i; ?>" style="font-weight:bold ; color:red;"><?= $i;?></a>
        <?php else :?>
        <a href="?halaman=<?= $i ;?>"><?= $i ;?></a>
        <?php endif ;?>
    <?php endfor;?>

    <?php if ($halamanAktif < $jumlahHal):?>
    <a href="?halaman=<?= $halamanAktif + 1 ;?>">&raquo;</a>
    <?php endif ; ?>

    <table>
  
        <tr>
            <th>NO</th>
            <th>Nik</th>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Email</th>
            <th>No HP</th>
            <th>aksi</th>
        </tr>
        <?php $i=1 ; ?>
        <?php foreach($mahasiswa AS $row) :?>
        <tr>
            <td><?= $i;?></td>
            <td><?=$row["nik"];?></td>
            <td><?=$row["nama"];?></td>
            <td><img width="50px" src="gambar/<?= $row["gambar"];?>"></td>
            <td><?=$row["email"];?></td>
            <td><?=$row["phone"];?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'];?>" class="">Edit</a> |
                <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakiin');" class="">Hapus</a>
            </td>
           
        </tr>
        <?php $i++ ; ?>
        <?php endforeach ;?>
        
      
    </table>
    <p>  <a href="index.php" class="">tambah data</a></p>
<br><hr>
   
</body>
</html>
</body>
</html>