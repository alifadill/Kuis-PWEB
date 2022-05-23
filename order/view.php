<?php
    include_once("../koneksi.php");
    $result = mysqli_query($koneksi, "SELECT * FROM orders where id_order = '".$_GET['id_order']."'");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tampilan Data Tabel Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-3 position-absolute top-50 start-50 translate-middle">
              <div class="row">
            <table class="table">
              <thead class="table-primary">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Status</th>
                  <th scope="col">Total Barang</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php  
                while($data_order = mysqli_fetch_array($result)) {         
                    $count_barang = 0;
                    echo "<tr>";
                    echo "<td>".$data_order['id_order']."</td>";
                    echo "<td>".$data_order['tanggal']."</td>";
                    echo "<td>".$data_order['status']."</td>";
                    $barang = mysqli_query($koneksi, "SELECT * FROM detail_order WHERE id_order = '".$data_order['id_order']."'");
                    while($data_barang = mysqli_fetch_array($barang))
                    {
                      $count_barang++;
                    }
                    echo "<td>".$count_barang."</td>";
                    echo "<td>".$data_order['total']."</td>";            
                }
                ?>
              </tbody>
            </table>
            <?php
              $barang = mysqli_query($koneksi, "SELECT detail_order.id_barang,detail_order.quantity,barang.kode_barang,barang.nama,barang.id_kategori,kategori.nama as kategori FROM detail_order join barang on detail_order.id_barang = barang.kode_barang join kategori on kategori.id_kategori = barang.id_kategori where id_order = '".$_GET['id_order']."'");
            ?>
            <table class="table">
              <thead class="table-primary">
                <tr>
                  <th scope="col">Kode</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Kuantitas</th>
                  <th scope="col">Kategori</th>
                </tr>
              </thead>
              <tbody>
                <?php  
                while($data_barang = mysqli_fetch_array($barang)) {         
                    echo "<tr>";
                    echo "<td>".$data_barang['id_barang']."</td>";
                    echo "<td>".$data_barang['nama']."</td>";
                    echo "<td>".$data_barang['quantity']."</td>";
                    echo "<td>".$data_barang['kategori']."</td>";    
                }
                ?>
              </tbody>
            </table>
            <center><h1><a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-warning">Kembali</a></h1></center>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

