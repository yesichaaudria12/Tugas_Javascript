<?php
//Get Data From URL
$data = $_GET['id'];

//Koneksi
$conn = mysqli_connect("localhost", "root", "", "php_kampus_merdeka");
$select = mysqli_query($conn, "SELECT * FROM product WHERE id='$data'");
$split = mysqli_fetch_array($select);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>Edit Product</title>
</head>

<body>

  <div class="container col-md-6 mt-4">
    <h1>Edit Product</h1>
    <div class="card">
      <div class="card-header bg-success text-white">
        Edit Product
      </div>
      <div class="card-body">
        <form action="update_produk.php" method="post">

          <div class="form-group">
            <label>ID</label>
            <input type="text" name="id" value="<?php echo $split['id']; ?>" placeholder="Masukkan ID Product" class="form-control" disabled>
          </div>

          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" value="<?php echo $split['name']; ?>" placeholder="Masukkan Nama Product" class="form-control">
          </div>

          <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" value="<?php echo $split['price']; ?>" placeholder="Masukkan Price Product" class="form-control">
          </div>
          <br>

          <button type="submit" class="btn btn-success">UPDATE</button>
          <button type="reset" class="btn btn-warning">RESET</button>

        </form>
      </div>
    </div>
  </div>
</body>

</html>