<?php
    session_start();
    // Koneksi ke Database
    $koneksi = new mysqli("localhost", "root", "", "trainittoko");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Trainit</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
 <!-- Navbar -->
 <nav class="navbar navbar-default">
    <div class="container">
    <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="keranjang.php">Keranjang</a></li>
        <!--jika sudah login(ada session pelanggan)-->
        <?php if(isset($_SESSION['pelanggan'])): ?> 
            <li><a href="logout.php">Logout</a></li>
        <!--selain itu belum login|belum ada session pelanggan-->
        <?php else: ?>
            <li><a href="login.php">Login</a></li>    
        <?php endif ?>
        <li><a href="checkout.php" >Checkout</a></li>
    </ul>
    </div>
    </nav>
<!-- Konten -->
<section class="konten">
    <div class="container">
        <h1>Produk Terbaru</h1>
        <div class="row">
            <?php $ambil = $koneksi->query("SELECT * FROM produk")?>
            <?php while ($perproduk = $ambil->fetch_assoc()) {?>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="" width="200">
                    <div class="caption">
                        <h3><?php echo $perproduk['nama_produk']; ?></h3>
                        <h5>Rp. <?php echo $perproduk['harga_produk']; ?></h5>
                        <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
                    </div>
                </div>
            </div>
            <?php }?>


        </div>
    </div>
</section>

</body>
</html>