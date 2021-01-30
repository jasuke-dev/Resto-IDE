<?php
if(isset($_GET['jumlah'])){
        $id_menu = $_GET['id'];
        $quantity = $_GET['jumlah'];
        $username = $_GET['user'];
        $time = $_GET['time'];
        $tgl = date('Y-m-d');
        $id_pemesanan = $time.$username;
        function save ($id_menu,$quantity,$username,$id_pemesanan,$time) {
            include "koneksi.php";
            $perintah = mysqli_query($link,"INSERT into pesanan(id_pemesanan,id_menu,username,quantity,waktu)
                                        VALUES ('$id_pemesanan','$id_menu','$username',$quantity,'$time')");
            if($perintah)return true;
          }
        $pass = save($id_menu,$quantity,$username,$id_pemesanan,$tgl);
        
        // RESULT
        echo $pass ? "Data berhasil dimasukan" : "An error has occurred";
}
?>