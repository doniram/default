<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./template/style.css">
    <title>Aplikasi Crud</title>

</head>
<body>
    <div class="container">
        <?php include "template/header.php";?>
        <?php include "template/sidebar.php";?>
       <div class="content">
        <h3>Content</h3>
            
<table id="viewdata">
  <tr>
    <th>Nik</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Alamat</th>
    <th>Jenis Kelamin</th>
    <th>No.Hp</th>
    <th>Aksi</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
    <td>German</td>
    <td>German</td>
    <td>German</td>
    <td><a href="edit.php?id=<?= $row['id'];?>"><button class="btn">Edit</button></a> |
                <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakiin');" class="">Hapus</a></td>
  </tr>
  <tr>
  <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
    <td>German</td>
    <td>German</td>
    <td>German</td>
    <td>German</td>
  </tr>
  <tr>
  <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
    <td>German</td>
    <td>German</td>
    <td>German</td>
    <td>German</td>
  </tr>
  <tr>
</table>
       </div>
        <?php include "template/footer.php";?>
    </div>
</body>
</html>