<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas PHP 2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Website CRUD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ms-auto">
        <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
        <a class="nav-link active text-white" aria-current="page" href="../produk/index.php">Product</a>
        <a class="nav-link active text-white" aria-current="page" href="index.php">Customer</a>
        <a class="nav-link active text-white" aria-current="page" href="../pesanan/index.php">Order</a>
    </div>
</div>

</div>
</nav>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12">
                <?php
                include "koneksi.php";
                $query = mysqli_query($conn, "SELECT * from customer ORDER BY id DESC");
                ?>
                <div class="card">
                    <div class="card-header">
                        <center>
                            <h1>DATA CUSTOMER </h1>
                        </center>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-info" style="margin-bottom:10px" href="tambah.php?tambah=Nama Customer"> + Tambah Customer </a>
                        <table class="table table-striped table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Created_at</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            if (mysqli_num_rows($query) > 0) {
                                $no = 1;
                                while ($data = mysqli_fetch_array($query)) {
                            ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $data["first_name"] ?></td>
                                        <td><?php echo $data["last_name"] ?></td>
                                        <td><?php echo $data["email"] ?></td>
                                        <td><?php echo $data["phone"] ?></td>
                                        <td><?php echo $data["created_at"] ?></td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $data["id"] ?>" class="btn btn-sm btn-warning" onclick="return confirm('Apakah anda yakin ingin mengedit data?');">Edit</a>
                                            <a href="proses_hapus.php?id=<?php echo $data["id"] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin hapus data?');">Delete</a>
                                        </td>
                                    </tr>
                            <?php
                                    $no++;
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
</body>
</html>