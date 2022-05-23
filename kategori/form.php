<?php
    $status;
    include_once("../koneksi.php");

    if(isset($_GET['id_kategori'])){
        $status = "Edit Data";

        $result = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori = '".$_GET['id_kategori']."'");
 
        while($data_kategori = mysqli_fetch_array($result))
        {
            $id_kategori = $data_kategori['id_kategori'];
            $nama = $data_kategori['nama'];
        }
        if(isset($_POST['id_kategori']))
        {
            $id_kategori = $_POST['id_kategori'];
            $nama = $_POST['nama'];
            
            $result = mysqli_query($koneksi, "UPDATE kategori SET nama='$nama'WHERE id_kategori='$id_kategori'");
            
            header("Location: index.php");
        }
    }
    else{
        $status = "Tambah Data";
        if(isset($_POST['id_kategori'])) {
            $id_kategori = $_POST['id_kategori'];
            $nama = $_POST['nama'];

            $result = mysqli_query($koneksi, "INSERT INTO kategori VALUES('$id_kategori','$nama')");
            echo "<div class='alert alert-success' role='alert'>Data Kategori Berhasil Ditambahkan <a href='index.php' class='btn btn-primary ms-3' >Lihat View</a></div>";
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form <?=  $status ?> Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-3">
        <h1><?=  $status ?></h1><hr>
        <form method="post">
            <div class="mb-3">
                <label for="id_kategori" class="form-label">Id Kategori</label>
                <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="<?= isset($id_kategori) ? $id_kategori : ""?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($nama) ? $nama : ""?>">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>