<?php

//panggil koneksi database
include "koneksi.php";

$pass = md5($_POST['password']);
$username = mysqli_escape_string($link, $_POST['username']);
$password = mysqli_escape_string($link, $pass);
$level = mysqli_escape_string($link, $_POST['level']);

//cek username, terdaftar atau tidak
$cek_user = mysqli_query($link, "SELECT * FROM login WHERE username = '$username' and level='$level' ");
$user_valid = mysqli_fetch_array($cek_user);
//uji jika username terdaftar
if ($user_valid) {
    //jika username terdaftar
    //cek password sesuai atau tidak
    if ($password == $user_valid['password']) {
        //jika password sesuai
        //buat session
        session_start();
        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
        $_SESSION['level'] = $user_valid['level'];

        //uji level user
        if ($level == "Kasir") {
            header('location:menu.php');
        } elseif ($level == "Admin") {
            header('location:admin.php');
        }
    } else {
        echo "<script>alert('Maaf login gagal, password anda tidak sesuai');document.location='index.php'</script>";
    }
} else {
    echo "<script>alert('Maaf login gagal, username anda tidak terdaftar');document.location='index.php'</script>";
}
