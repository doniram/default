<?php

include "function.php";
$mahasiswa = tampilkan("SELECT * FROM crud ORDER BY id DESC");

?>
<?php $i=1 ; ?>
        <?php foreach($mahasiswa AS $row) :?>
        <tr>
           
            <td><img width="50px" src="gambar/<?=$row["gambar"];?>"></td>
        
           
        </tr>
        <?php $i++ ; ?>
        <?php endforeach ;?>