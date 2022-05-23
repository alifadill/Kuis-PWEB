<?php
    include_once("koneksi.php");
    $barang = mysqli_query($koneksi, "SELECT barang.*,kategori.nama as kategori FROM barang join kategori on barang.id_kategori = kategori.id_kategori");
    $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
    $order = mysqli_query($koneksi, "SELECT * FROM orders");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-3">
        <h1 class="my-3 ">
          Tabel Data Penjualan
</h1>
        <hr>
        <div class="col">
            <div class="row">
                <h2>Kategori <a href="kategori/" class="btn btn-primary btn-sm">Lihat Tabel</a></h2>
                <table class="table">
                  <thead class="table-secondary">
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                    while($data_kategori = mysqli_fetch_array($kategori)) {         
                        echo "<tr>";
                        echo "<td>".$data_kategori['id_kategori']."</td>";
                        echo "<td>".$data_kategori['nama']."</td>";    
                        echo "<td><a href='kategori/view.php?id_kategori=$data_kategori[id_kategori]'>View</a> | <a href='kategori/form.php?id_kategori=$data_kategori[id_kategori]'>Edit</a> | <a href='kategori/delete.php?id_kategori=$data_kategori[id_kategori]'>Delete</a></td></tr>";        
                    }
                    ?>
                  </tbody>
                </table>
            </div><br>
            <div class="row">
                <h2>Barang <a href="barang/" class="btn btn-primary btn-sm ms-2">Lihat Tabel</a></h2>
                <table class="table">
                  <thead class="table-secondary">
                    <tr>
                      <th scope="col">Kode</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Stok</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                    while($data_barang = mysqli_fetch_array($barang)) {         
                        echo "<tr>";
                        echo "<td>".$data_barang['kode_barang']."</td>";
                        echo "<td>".$data_barang['nama']."</td>";
                        echo "<td>".$data_barang['stok']."</td>"; 
                        echo "<td>".$data_barang['harga']."</td>";    
                        echo "<td>".$data_barang['kategori']."</td>";    
                        echo "<td><a href='barang/view.php?kode_barang=$data_barang[kode_barang]'>View</a> | <a href='barang/form.php?kode_barang=$data_barang[kode_barang]'>Edit</a> | <a href='barang/delete.php?kode_barang=$data_barang[kode_barang]'>Delete</a></td></tr>";        
                    }
                    ?>
                  </tbody>
                </table>
            </div><br>
            <div class="row">
                <h2>Order <a href="order/"class="btn btn-primary btn-sm ms-2">Lihat Tabel</a></h2>
                <table class="table">
                  <thead class="table-secondary">
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Status</th>
                      <th scope="col">Total</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                    while($data_order = mysqli_fetch_array($order)) {         
                        echo "<tr>";
                        echo "<td>".$data_order['id_order']."</td>";
                        echo "<td>".$data_order['tanggal']."</td>";
                        echo "<td>".$data_order['status']."</td>"; 
                        echo "<td>".$data_order['total']."</td>";      
                        echo "<td><a href='order/view.php?id_order=$data_order[id_order]'>View</a></td></tr>";        
                    }
                    ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>