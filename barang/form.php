<?php
    $status;
    $kategori = '';
    include_once("../koneksi.php");
    if(isset($_GET['kode_barang'])){
        $kode_barang = $_GET['kode_barang'];
        $barang = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
 
        while($data_barang = mysqli_fetch_array($barang))
        {
            $kode_barang = $data_barang['kode_barang'];
            $nama_barang = $data_barang['nama'];
            $stok = $data_barang['stok'];
            $harga = $data_barang['harga'];
            $kategori = $data_barang['id_kategori'];
        }

        $status = "Edit Data";
        if(isset($_POST['kode_barang']))
        {
            $kode_barang = $_POST['kode_barang'];
            $nama_barang = $_POST['nama_barang'];
            $stok = $_POST['stok'];
            $harga = $_POST['harga'];
            $kategori = $_POST['id_kategori'];
            
            $result = mysqli_query($koneksi, "UPDATE barang SET nama='$nama_barang',stok='$stok',harga='$harga',id_kategori='$kategori' WHERE kode_barang='$kode_barang'");
            
            header("Location: index.php");
        }
    }
    else{
        $status = "Tambah Data";
        if(isset($_POST['kode_barang'])) {
            $kode_barang = $_POST['kode_barang'];
            $nama_barang = $_POST['nama_barang'];
            $stok = $_POST['stok'];
            $harga = $_POST['harga'];
            $kategori = $_POST['id_kategori'];

            $result = mysqli_query($koneksi, "INSERT INTO barang VALUES('$kode_barang','$nama_barang','$stok','$harga','$kategori')");
            echo "<div class='alert alert-success' role='alert'>Data Barang Berhasil Ditambahkan <a href='index.php' class='btn btn-primary ms-3'>Lihat View</a></div>";
        }
    }
    $kategorii = mysqli_query($koneksi, "SELECT * FROM kategori");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form <?=  $status ?> Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-3">
        <h1><?=  $status ?></h1><hr>
        <form method="post">
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?= isset($kode_barang) ? $kode_barang : ""?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= isset($nama_barang) ? $nama_barang : ""?>">
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok Barang</label>
                <input type="text" class="form-control" id="stok" name="stok" value="<?= isset($stok) ? $stok : ""?>">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Barang</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?= isset($harga) ? $harga : ""?>">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Kategori Barang</label>
                <select class="form-select" aria-label="Default select example" name="id_kategori">
                    
                    <option selected hidden>Pilih Kategori</option>
                    <?php  
                    while($list_kategori = mysqli_fetch_array($kategorii)) {
                        echo "<option value='".$list_kategori['id_kategori']."' ",$list_kategori['id_kategori'] == $kategori ? 'selected' : '',">".$list_kategori['nama']."</option>";
                    }
                    ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>