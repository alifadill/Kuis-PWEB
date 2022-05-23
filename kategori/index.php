<?php
    include_once("../koneksi.php");
    $result = mysqli_query($koneksi, "SELECT * FROM kategori");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Penjualan | Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-3">
    <h1 class="my-3 ">
         Tabel Kategori
    </h1>
        <div class="row">
            <table class="table">
              <thead class="table-primary">
                <tr>
                  <th scope="col">Kode</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php  
                while($data_kategori = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$data_kategori['id_kategori']."</td>";
                    echo "<td>".$data_kategori['nama']."</td>";   
                    echo "<td><a href='view.php?id_kategori=$data_kategori[id_kategori]'>View</a> | <a href='form.php?id_kategori=$data_kategori[id_kategori]'>Edit</a> | <a href='delete.php?id_kategori=$data_kategori[id_kategori]'>Delete</a></td></tr>";        
                }
                ?>
              </tbody>
            </table>
            <center><a href="form.php" class="btn btn-success me-0">Tambah Data</a> <a href="../index.php" class="btn btn-warning">Kembali</a></center>
      
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

