<?php

//fungsi koneksi ke engine database
$server="localhost";
$user="root";
$pass="";
$dbase="crud";
$conn = mysqli_connect($server,$user,$pass,$dbase);
if(!$conn){
    die("konesi ke database engine gagal");
}else{
    echo "";
}


//tampilkan data
function tampilkan($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[]= $row;
        }
        return $rows;
}

//fungsi tambah data
function tambah($data){
        global $conn;
        $nik  =htmlspecialchars($data["nik"]);
        $nama  =htmlspecialchars($data["nama"]);
        $email =htmlspecialchars($data["email"]);
        $phone =htmlspecialchars($data["phone"]);       
        $gambar = upload();

        if(!$gambar){
            return false;
        }
        
        $query= "INSERT INTO crud VALUES('','$nik','$nama','$email','$phone', '$gambar')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
}

//Fungsi Upload
function upload(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];
        

        //mengecek apakh tidak ada gambar yang di upload
        if($error === 4)
        {
            echo"<script>alert('pilih gambar dahulu')</script>";
            return false;
        }

        //validasi apakah yang dupload adalah gambar
        $ekstensiGambarValid = ['jpg','jpeg','png'];
        $ekstensiGambar = explode('.', $namaFile);//fungsi explode disini untuk mengubah string menjadi suatatu pecahan dari array
        $ekstensiGambar = strtolower(end($ekstensiGambar));//end_ berfungsi untuk mengambil string terakhir array strtoloswer_ konversi huruf besar dan kecil dari string   
        if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
            echo"<script>alert('jenis file yang tidak dizinkan')</script>";
            return false;
        }

        //validasi ukuran file
        if( $ukuranFile > 1000000){
            echo"<script>alert('ukuran file terlalu besar [ >1 MB ]')</script>";
            return false;
        }

        //lolos validasi , siap di upload
        //genarate nama baru untuk sebuuah file
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .=$ekstensiGambar;
         move_uploaded_file($tmpName, 'gambar/' . $namaFileBaru);
        return $namaFileBaru;
    }
//fungsi haopus data
function hapus($data){
    global $conn;
    $sql = "DELETE FROM crud WHERE id=$data";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

//fungsi edit
function edit($data){
    global $conn;
    $id = $data["id"];
    $nik  = $data["nik"];
    $nama  = $data["nama"];
    $email = $data["email"];
    $phone = $data["phone"];
    $gambarLama= $data["gambarLama"];

    

    if ( $_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    if(!$gambar){
        return false;
    }

    $query= "UPDATE crud SET nik='$nik', nama='$nama', email='$email', phone='$phone', gambar='$gambar' WHERE id=$id ";
    mysqli_query($conn,$query);

                                                                            
    return mysqli_affected_rows($conn);
}

//fungsi cari
function cari($keyword){
    $query = "SELECT * FROM crud WHERE 
    nama LIKE '%$keyword%' OR email LIKE '%$keyword%' OR nik LIKE '%$keyword%'
     "; //penggunaan % di depan agar hasil pencarian kata kunci pertama diketikan tampil , tanda % di belakang '%$katakunci, agar pencarian kata bekakang tampil
    return tampilkan($query);
}


function register($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));//stipsslalshes dan strtolower tidak mengizinkan user untuk memasukan backslash dan mengkonversi semua menjadi hurug kecil
    $password = mysqli_real_escape_string($conn, $data["password"]);//nysqli real escape untuk memberikan izin user menggunakan karakter tertentu seperti blackslash
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah dipakai
    $result = mysqli_query($conn,"SELECT username FROM users WHERE username = '$username' ");
    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('username sudah digunakan')</script>";
        return false;
    }

    //cek konfirmasi password
    if ( $password !== $password2){
        echo "<script>alert('konfirm password tidak sesuai')</script>";
        return false;
    }

    //eckripsi passwprd
    $password = password_hash($password, PASSWORD_DEFAULT);

    //menambahkan user kedalam database
    $query = "INSERT INTO users VALUES('','$username','$password',CURRENT_TIMESTAMP())";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);

}
?>