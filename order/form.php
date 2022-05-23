<?php
    include_once("../koneksi.php");
    $barang = mysqli_query($koneksi, "SELECT * FROM barang");
    $jml_data = mysqli_query($koneksi, "SELECT COUNT(id_order) FROM orders");
    $jml_data = mysqli_fetch_array($jml_data);
    $total = 0;
    $id;
    if(isset($_POST['kode_barang'])){
        $tanggal = date("Y-m-d");
        $inputorder = mysqli_query($koneksi, "INSERT INTO orders VALUES('$jml_data[0]','$tanggal','Selesai','0')");

        $id = mysqli_query($koneksi, "SELECT id_order FROM orders ORDER BY id_order DESC");
        $id = mysqli_fetch_array($id);
        
        $kode_barang = $_POST['kode_barang'];
        $quantity = $_POST['quantity'];

        foreach( $kode_barang as $key => $n ) {

            $harga = mysqli_query($koneksi, "SELECT harga FROM barang WHERE kode_barang = '$n'");
            $harga = mysqli_fetch_array($harga);
            
            $total += $harga[0]*$quantity[$key];

            $inputdetail = mysqli_query($koneksi, "INSERT INTO detail_order(quantity,id_order,id_barang) VALUES('$quantity[$key]','$id[0]','$n')");
        }

        $updatetotal = mysqli_query($koneksi, "UPDATE orders SET total='$total' WHERE id_order='$id[0]'");
        header("Location:index.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form <?=  $status ?> Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-3">
        <h1>Tambah Data Order</h1><hr>
        <form method="post">
            <div class="mb-3">
                <label for="Barang" class="form-label">Pilih Barang</label>
                <select class="form-select" aria-label="Default select example" name="kode_barang[]" id="dropdown">
                    <option selected hidden>Pilih Barang</option>
                    <?php
                    while($data_barang = mysqli_fetch_array($barang)) {
                        echo "<option value='".$data_barang['kode_barang']."'>".$data_barang['nama']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Kuantitas Barang</label>
                <input type="text" class="form-control" id="harga" name="quantity[]">
            </div>
            <p id="GFG_DOWN"></p>
            <h2 class="btn btn-success" onClick="GFG_Fun()">Tambah Barang</h2><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
    var down = document.getElementById("GFG_DOWN");
    var first = document.getElementById('dropdown');
    var options = first.innerHTML;
           
    var br = document.createElement("br");
    var hr = document.createElement("hr");
    function GFG_Fun() {

        down.appendChild(hr.cloneNode());

        var SL = document.createElement("select");
        SL.setAttribute("class", "form-select");
        SL.setAttribute("name", "kode_barang[]");
        SL.innerHTML = options;
    
        var QTY = document.createElement("input");
        QTY.setAttribute("type", "text");
        QTY.setAttribute("name", "quantity[]");
        QTY.setAttribute("class", "form-control");
        QTY.setAttribute("placeholder", "Kuantitas")
                    
        down.appendChild(SL);
            
        down.appendChild(br.cloneNode());
            
        down.appendChild(QTY);
        down.appendChild(br.cloneNode());
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>