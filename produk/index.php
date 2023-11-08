<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12">
                <?php
                include '../customer/koneksi.php';
                $query = mysqli_query($conn, "SELECT * from product ORDER BY id DESC");
                ?>
                <strong>Data Produk:</strong>
                <table class="table table-striped">
                    <tr>
                        <th>
                            no
                        </th>
                        <th>
                            name
                        </th>
                        <th>
                            price
                        </th>
                    </tr>
                    <?php
                    if (mysqli_num_rows($query) > 0) {
                        $no = 1;
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                            <tr>
                                <td> <?php echo $no ?></td>
                                <td> <?php echo $data["name"] ?> </td>
                                <td> <?php echo "Rp. " . number_format($data["price"], 0, ',', '.') ?> </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>