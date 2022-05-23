<?php
    include_once("../koneksi.php");
    $result = mysqli_query($koneksi, "SELECT * FROM kategori where id_kategori = '".$_GET['id_kategori']."'");
    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tampilan Data Tabel Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-3 position-absolute top-50 start-50 translate-middle">
        <div class="row">
            <table class="table">
              <thead class="table-primary">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nama</th>
                </tr>
              </thead>
              <tbody>
                <?php  
                while($data_kategori = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$data_kategori['id_kategori']."</td>";
                    echo "<td>".$data_kategori['nama']."</td>";
                }
                ?>
              </tbody>
            </table>
            <center><h1><a href="form.php?id_kategori=<?=$_GET['id_kategori']?>" class="btn btn-success">Edit</a> <a href="../index.php" class="btn btn-warning">Kembali</a></h1></center>
      
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

