<?php

    session_start();
    if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
        echo "<script>alert('Maaf untuk mengakses halaman ini anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
    }else if($_SESSION['level'] != "Admin"){
        echo "<script>alert('Maaf untuk mengakses halaman ini anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
    }

    include "koneksi.php";
    if(isset($_GET['username'])){
        
        $query = mysqli_query($link,"SELECT*FROM login where username = '$_GET[username]'");
        while($hasil=mysqli_fetch_array($query)){
            $tmpusername = $hasil['username'];
            $tmpnama = $hasil['nama_lengkap'];
            $tmplevel = $hasil['level'];
        }
    }
    if(isset($_POST['update'])){
        $nama = $_POST['nama'];
        $password = $_POST['password'];        
        $level = $_POST['level'];        
        if($password == ''){
            $query = mysqli_query($link,"UPDATE login set
                                        nama_lengkap = '$nama',
                                        level = '$level'
                                        WHERE username = '$_GET[username]'
                                ");
        }else {
            $pass = md5($password);            
            $query = mysqli_query($link,"UPDATE login set
                                        nama_lengkap = '$nama',
                                        level = '$level',
                                        password = '$pass'
                                        WHERE username = '$_GET[username]'
                                        ");
        }
        
        if($query){
            echo "<script>
                        alert('Update data Akun berhasil');
                        document.location = 'akun.php';
                </script>";
        }else{
            echo "<script>
                        alert('Update data Akun gagal');
                        document.location = 'akun.php';
                </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style2.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
    <div class="dashboard-main-wrapper">        
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">DNA</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-down-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
            <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="admin.php"><i class="fa fa-fw fa-user-circle"></i>Home<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pesanan.php" ><i class="fa fa-fw fa-rocket"></i>Daftar Pesanan</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Akun <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="akun.php" aria-expanded="false">Daftar Akun</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="update.php" aria-expanded="false">Ubah Password</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                       
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header bg-primary">Basic Form</h5>
                            <div class="card-body">
                            <form class="form-signin regis" method="POST" action="" enctype="multipart/form-data">    
                                <div class="form-label-group baris">
                                    <div class="row">
                                    <div class="col-1">
                                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="no" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>            
                                    </div>
                                    <div class="col-11">
                                        <input type="text" class="form-control trans" name="username" placeholder="Username" value="<?=@$tmpusername?>">
                                    </div>
                                    </div>
                                </div>
                                <div class="form-label-group baris">
                                    <div class="row">
                                    <div class="col-1">
                                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="no" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>            
                                    </div>
                                    <div class="col-11">
                                        <input type="text" class="form-control trans" name="nama" placeholder="Nama Lengkap" value="<?=@$tmpnama?>" autofocus required>
                                    </div>
                                    </div>
                                </div>
                                
                                <div class="form-label-group baris">
                                    <div class="row">
                                    <div class="col-1">
                                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-lock-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z"/>
                                        <path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
                                        </svg>        
                                    </div>
                                    <div class="col-11">
                                    <input type="password" class="form-control trans" name="password" placeholder="Kosongi jika tidak ingin merubah Password">
                                    </div>
                                    </div>  
                                </div>
                                
                                <div class="form-label-group baris">
                                    <div class="row">
                                    <div class="col-1">
                                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-key-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                        </svg>        
                                    </div>
                                    <div class="col-11">
                                        <select class="form-control trans" name="level">
                                        <?php
                                          if($tmplevel=='Kasir'){
                                              echo '
                                              <option value="Kasir" selected>Kasir</option>
                                              <option value="Admin">Admin</option>';
                                          }elseif ($tmplevel=='Admin') {
                                                echo '
                                                <option value="Kasir">Kasir</option>
                                                <option value="Admin" selected>Admin</option>';
                                          }
                                        ?>
                                        
                                        </select>
                                    </div>
                                    </div>  
            
                                </div>
            
                                <button class="btn btn-lg btn-warning btn-block" type="submit" name="update">Update</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>