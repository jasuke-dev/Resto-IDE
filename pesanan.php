<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf untuk mengakses halaman ini anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
}else if($_SESSION['level'] != "Admin"){
    echo "<script>alert('Maaf untuk mengakses halaman ini anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
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
                                <a class="nav-link" href="admin.php"><i class="fa fa-fw fa-user-circle"></i>Home<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="pesanan.php"><i class="fa fa-fw fa-rocket"></i>Daftar Pesanan</a>                            </li>
                                <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Akun <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="akun.php" aria-expanded="false">Daftar Akun</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" aria-expanded="false">Ubah Password</a>
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
                    Daftar Pesanan
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped display" id="pesanan">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>ID PEMESANAN</th>
                                    <th>USER</th>
                                    <th>MENU</th>
                                    <th>JUMLAH</th>
                                    <th>WAKTU</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "koneksi.php";
                                    $daftar_menu = mysqli_query($link,"SELECT pesanan.id_pemesanan,pesanan.username,pesanan.quantity,pesanan.waktu,menu.nama from pesanan 
                                                                        JOIN menu on pesanan.id_menu=menu.id order by id_pemesanan desc");
                                    $count = 0;
                                    $temp=0;
                                    while($hasil=mysqli_fetch_array($daftar_menu)): 
                                        $count++;
                                        if($temp == $hasil['id_pemesanan']):?>
                                            <tr>
                                                <td colspan="7"><?=$hasil['id_pemesanan']?></td>
                                            </tr>
                                        <?php endif ?>
                                        <tr>
                                            <td><?= $count?></td>
                                            <td><?= $hasil['id_pemesanan']?></td>
                                            <td><?= $hasil['username']?></td>
                                            <td><?= $hasil['nama']?></td>
                                            <td><?= $hasil['quantity']?></td>
                                            <td><?= $hasil['waktu']?></td>
                                        </tr>
                                        
                                <?php 
                                // $temp = $hasil['id_pemesanan'];
                                endwhile ?>
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div>
        </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#pesanan').DataTable({
                    responsive: true,
                    "language":{
                    "emptyTable":"Data tidak tersedia :(",
                    "info":"Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                    "infoEmpty":"Data tidak tersedia :(",
                    "infoFiltered": "",
                    "search":"Pencarian",
                    "lengthMenu":"Menampilkan _MENU_ data",
                    "zeroRecords":"Data tidak tersedia :(",
                    "paginate":{
                            "first":"Pertama",
                            "last":"Terakhir",
                            "next":"Berikutnya",
                            "previous":"Sebelumnya"
                        },
                    "searchPlaceholder" : "Masukan kata kunci"
                    }
        });
    })
    
    $(document).ready(function(){
            $(".bar-icon, .close-icon").click(function(){
                $(".sidebar").toggleClass("pull");
                $(".main").toggleClass("pull");
            });
            $("a").each(function(){
                if ((window.location.pathname.indexOf($(this).attr('href'))) > -1 ){
                    $(this).addClass('selected');
                }
            });
        });
          
    
</script>
</body>
</html>