<?php
    session_start();
    if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
        echo "<script>alert('Maaf untuk mengakses halaman ini anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
    }else if($_SESSION['level'] != "Kasir"){
        echo "<script>alert('Maaf untuk mengakses halaman ini anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
    }
    $tempUser = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <a class="navbar-brand" href="menu.php">
            <h3>DNA</h3>
        </a>
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
    <!-- card -->
    <div class="container mt-5">
        <div class="jenis">
            <h2>Makanan</h2>
        </div>
        <div class="row row row-cols-1 row-cols-md-4 menu">
            <br>
            <?php
            include "koneksi.php";
            $perintah = mysqli_query($link,"select*from menu where jenis='food'");
            while($hasil=mysqli_fetch_array($perintah)) { ?>
            <div class="col mb-4">
                <div class="card h-100">
                <img src="./img/<?= $hasil['foto']?>" class="card-img-top" alt="<?= $hasil['foto']?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $hasil['nama']?></h5>
                        <small class="text-muted deskripsi"><?= $hasil['deskripsi']?></small>
                        <p class="card-text"><?= $hasil['harga']?></p>
                        <button class="btn btn-primary mati" id="dcr<?=$hasil['id']?>">-</button>
                        <div class="btn mati" id="<?=$hasil['id']?>">0</div>
                        <button class="btn btn-primary plus" id="icr<?=$hasil['id']?>">+</button>   
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        <div class="jenis">
            <h2>Minuman</h2>
        </div>
        <div class="row row row-cols-1 row-cols-md-4 menu">
            <?php
                $perintah = mysqli_query($link,"select*from menu where jenis='drink'");
                while($hasil=mysqli_fetch_array($perintah)) { ?>
                <div class="col mb-4">
                    <div class="card h-100">
                    <img src="./img/<?= $hasil['foto']?>" class="card-img-top" alt="<?= $hasil['foto']?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $hasil['nama']?></h5>
                            <small class="text-muted deskripsi"><?= $hasil['deskripsi']?></small>
                            <p class="card-text"><?= $hasil['harga']?></p>
                            <button class="btn btn-primary mati" id="dcr<?=$hasil['id']?>">-</button>
                            <div class="btn mati" id="<?=$hasil['id']?>">0</div>
                            <button class="btn btn-primary plus " id="icr<?=$hasil['id']?>">+</button>
                        </div>
                    </div>
                </div>
                <?php }?>

        </div>
    </div>
    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pesanan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                                    <div class="row">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Menu</th>
                                                    <th>Harga</th>
                                                    <th>Banyak</th>
                                                    <th>Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody id="body-tabel">
                                            </tbody>
                                            </table>
                                </div>
                            </div>
            </div>
            <div class="modal-footer" id="button-mod">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="bayar">Pesan</button>
            </div>
          </div>
        </div>
    </div> 
                    
    <!-- footer -->
    <div class="bg-dark fixed-bottom" id="foot">
                <button class="btn btn-success" id="pesan" data-toggle="modal" data-target="#exampleModal">PESAN</button>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    window.onload=()=>{
    <?php
        $perintah = mysqli_query($link,"select*from menu");
        while($hasil=mysqli_fetch_array($perintah)) :
    ?>
            let int<?=$hasil['id']?> = document.getElementById("<?=$hasil['id']?>")
            let N<?=$hasil['id']?> = 0;
            $('.menu').on('click','#icr<?=$hasil['id']?>',()=>{
                N<?=$hasil['id']?>+=1;
                $('#dcr<?=$hasil['id']?>').removeClass('mati');
                $('#<?=$hasil['id']?>').removeClass('mati');
                $('#icr<?=$hasil['id']?>').removeClass('plus');
                int<?=$hasil['id']?>.innerHTML = N<?=$hasil['id']?>;                
            })
            $('.menu').on('click','#dcr<?=$hasil['id']?>',()=>{
                if(N<?=$hasil['id']?> > 0){
                    N<?=$hasil['id']?>-=1;
                    if(N<?=$hasil['id']?> == 0){                
                        $('#dcr<?=$hasil['id']?>').addClass('mati');
                        $('#<?=$hasil['id']?>').addClass('mati');
                        $('#icr<?=$hasil['id']?>').addClass('plus');
                    }
                    int<?=$hasil['id']?>.innerHTML = N<?=$hasil['id']?>;                    
                }
            })
    <?php endwhile ?>
    
            // modal
            $('#pesan').on('click',()=>{
                let hargaBayar=0;
                let pesanan = [];
                <?php
                    $perintah = mysqli_query($link,"select*from menu");
                    while($hasil=mysqli_fetch_array($perintah)):?>
                        if(N<?=$hasil['id']?> !== 0){
                            console.log(N<?= $hasil['id']?>);
                            let jumlah = N<?= $hasil['id']?>;
                            let harga = <?= $hasil['harga']?>;
                            let hargaTotal = jumlah*harga;
                            let data = {
                                "id" : "<?=$hasil['id']?>",
                                "jumlah" : N<?=$hasil['id']?>,
                                "menu" : "<?=$hasil['nama']?>",
                                "harga" : "<?=$hasil['harga']?>",
                                "hargaTotal" : hargaTotal
                            }
                            hargaBayar+=hargaTotal;
                            pesanan.push(data);
                        }
                    <?php endwhile?>
                    let count=1;
                $('#body-tabel').html('');
                pesanan.forEach(pesan=>{
                    $('#body-tabel').append(`
                        <tr>
                            <td>${count}</td>
                            <td>${pesan.menu}</td>
                            <td>${pesan.harga}</td>
                            <td>${pesan.jumlah}</td>
                            <td>${pesan.hargaTotal}</td>
                        </tr>
                        `)
                        count++;
                })
                $('#body-tabel').append(`
                        <tr>
                            <td colspan="4">Total</td>
                            <td>${hargaBayar}</td>
                        </tr>
                        `)

                    //pembayaran
                $('#bayar').on("click",()=>{
                    <?php
                        date_default_timezone_set("Asia/Jakarta");
                        ?>
                    let time = <?=date("ymdHis");?>;
                    let x=0;
                    pesanan.forEach(data=>{
                        var xhr = new XMLHttpRequest();
                        xhr.open("GET", `input.php?id=${data.id}&jumlah=${data.jumlah}&time=${time}&user=<?=$tempUser?>`);
                        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                        xhr.onload = function(evt){
                        if (this.status==200) {                            
                            console.log(this.response);
                            if(x==0){
                                 alert('berhasil memesan');
                                x++;
                            }
                        } else {
                            console.log("SERVER ERROR");
                            console.log(this.status);
                            console.log(this.response);
                        }

                        };

                       xhr.send(data); 
                    })
                    document.location = 'menu.php';
    })

        })
    }

</script>
</body>
</html>
