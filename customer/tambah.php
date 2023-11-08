<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Tambahkan Data Customer</h3>
                <form action="proses_customer.php" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menambahkan data customer ini?');">
                    <table class="table">
                        <tr>
                            <td>
                                First Name
                            </td>
                            <td>
                                <input type="text" name="first_name" class="form-control"required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Last Name
                            </td>
                            <td>
                                <input type="text" name="last_name" class="form-control"required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Email
                            </td>
                            <td>
                                <input type="text" name="email" class="form-control"required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Phone
                            </td>
                            <td>
                                <input type="number" name="phone" class="form-control"required>
                            </td>
                        </tr>
                        <td>

                        </td>
                        <td>
                            <input type="submit" name="submit" value="Tambah" class="btn btn-primary">
                        </td>
                        </tr>
                        </tr>
                    </table>
                </form>
</body>

</html>