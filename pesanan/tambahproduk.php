<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Website CRUD Maieka </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container col-md-6 mt-4">
		<h1></h1>
		<div class="card">
			<div class="card-header bg-success text-white">
				Tambah Product
			</div>
			<div class="card-body">
				<form action="" method="post" role="form">
					<div class="form-group">
						<label>Id</label>
						<input type="text" name="id" required="" class="form-control">
					</div>
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" required="" class="form-control">
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="text" name="price" class="form-control">
					</div>
					<br>

					<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
				</form>

				<?php
				include('koneksi.php');
				
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan
					$id = $_POST['id'];
					$name = $_POST['name'];
					$price = $_POST['price'];

					//query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
					$data = mysqli_query($conn, "insert into product (id,name,price)values('$id', '$name', '$price')") or die(mysqli_error($conn));
					//id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

					header("Location:index.php");
				}
				?>
			</div>
		</div>
	</div>

</body>

</html>