<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf untuk mengakses halaman ini anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
}else if($_SESSION['level'] != "Admin"){
    echo "<script>alert('Maaf untuk mengakses halaman ini anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
}
include "koneksi.php";
//tampilan update
if(isset($_GET['page'])){
    if($_GET['page']=='update'){
        $data = mysqli_query($link,"select*from menu where nama = '$_GET[menu]' ");
        $update = mysqli_fetch_array($data);
        if($update){
            $tmpid = $update['id'];
            $tmpname = $update['nama'];
            $tmpharga = $update['harga'];
            $tmpdeskripsi = $update['deskripsi'];
            $tmpjenis = $update['jenis'];
            $tmpfoto = $update['foto'];
        }
    }elseif($_GET['page']=='delete'){
        $query = mysqli_query($link,"SELECT foto from menu where nama = '$_GET[menu]'");
        $delfoto = mysqli_fetch_array($query);
        unlink ("./img/$delfoto[foto]");
        $delete = mysqli_query($link,"delete from menu WHERE nama = '$_GET[menu]' ");
        if($delete){
            echo "<script>alert('Hapus data berhasil');document.location ='admin.php'</script>";
        }
    }
}
//simpan data
if(isset($_POST['simpan'])){
    if(!isset($_GET['page'])){
        if($_POST['id'] ==''){
            echo '<script>alert("field kosong");
            document.location = "admin.php"
            </script>';
        }
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $deskripsi= $_POST['deskripsi'];
        $jenis = $_POST['jenis'];
    
        $fotoname=$_FILES['foto']['name'];
        $fototmpname=$_FILES['foto']['tmp_name'];
        $direktori="./img";
        move_uploaded_file($fototmpname,$direktori."/$fotoname");
        
        include "koneksi.php";
        $perintah = mysqli_query($link,"INSERT into menu(id,nama,harga,deskripsi,foto,jenis) 
        values ('$id','$nama',$harga,'$deskripsi','$fotoname','$jenis')");
        if($perintah){
            echo "<script>
                        alert('Inputan data berhasil');
                        document.location = 'admin.php';
                </script>";
        }else{
            echo "<script>
                        alert('Inputan data gagal');
                        document.location = 'admin.php';
                </script>";
        }
    }else{
        echo "<script>
        alert('sedang berada dalam update data')
        </script>";
    }

}else if(isset($_POST['update'])){
    if(!isset($_GET['page'])){
        echo '<script>alert("pilih menu yang akan di update");
            document.location = "admin.php";
        </script>';
    }
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $deskripsi= $_POST['deskripsi'];
        $jenis = $_POST['jenis'];
    
        $fotoname=$_FILES['foto']['name'];
        $fototmpname=$_FILES['foto']['tmp_name'];
        $direktori="./img";
        if($fotoname ==""){
            $perintah = mysqli_query($link,"UPDATE menu set
                                            id = '$id',
                                            nama = '$nama',
                                            harga = $harga,
                                            deskripsi = '$deskripsi',
                                            jenis = '$jenis'
                                        where nama = '$_GET[menu]'");
        }else{
            unlink ("./img/$tmpfoto");
            move_uploaded_file($fototmpname,$direktori."/$fotoname");
            $perintah = mysqli_query($link,"UPDATE menu set
                                            id = '$id',
                                            nama = '$nama',
                                            harga = $harga,
                                            deskripsi = '$deskripsi',
                                            jenis = '$jenis',
                                            foto = '$fotoname'
                                        where nama = '$_GET[menu]'");
        }
        if($perintah){
            echo "<script>
                        alert('update data berhasil');
                        document.location = 'admin.php';
                </script>";
        }else{
            echo "<script>
                        alert('update data gagal');
                        document.location = 'admin.php';
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
    </head>
    <body>
    <div class="dashboard-main-wrapper">        
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">IDE</a>
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
                                <a class="nav-link active" href="admin.php"><i class="fa fa-fw fa-user-circle"></i>Home<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pesanan.php" ><i class="fa fa-fw fa-rocket"></i>Daftar Pesanan</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Akun <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="akun.php" aria-expanded="false">Daftar Akun</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="update.php" aria-expanded="false">Ubah Password</a>
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
            <div class="card">
                <div class="card-header bg-primary text-white">
                CRUD MENU
                </div>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input class="form-control" type="text" value ="<?=@$tmpid?>" name="id" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Menu</label>
                            <input class="form-control" type="text" value ="<?=@$tmpname?>" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input class="form-control" type="text" value ="<?=@$tmpharga?>" name="harga" require>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input class="form-control" type="text" value ="<?=@$tmpdeskripsi?>" name="deskripsi" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select class="custom-select" name="jenis" required>
                                <option value="<?=@$tmpjenis?>" selected><?=@$tmpjenis?></option>
                                <option value="food">food</option>
                                <option value="drink">drink</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <label class="custom-file-label" for="customFile">Foto Menu</label>
                                <input type="file" class="custom-file-input" name="foto" value ="./img/<?=@$tmpfoto?>">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                        <input type="submit" class="btn btn-warning" name="update" value="Update">
                    </form>
                </div>
            </div>

            <!-- daftar menu -->
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">
                Daftar Menu
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>id</th>
                                <th>Menu</th>
                                <th>Harga</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $daftar_menu = mysqli_query($link,"select*from menu");
                                $no=0;
                                while($hasil=mysqli_fetch_array($daftar_menu)){ $no++; ?>
                                    <tr>
                                        <td><?= $no?></td>
                                        <td><?= $hasil['id']?></td>
                                        <td><?= $hasil['nama']?></td>
                                        <td><?= $hasil['harga']?></td>
                                        <td>
                                        <a href="admin.php?page=update&menu=<?=$hasil['nama']?>" class="btn btn-warning">Update</a>
                                        <button class="btn btn-danger" onclick="
                                            var konfirmasi = confirm('Yakin ingin menghapus data?');
                                            if(konfirmasi)window.location.href = 'admin.php?page=delete&menu=<?=$hasil['nama']?>';">hapus </button> 

                                        </td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>