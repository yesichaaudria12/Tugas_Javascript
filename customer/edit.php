<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-top: 5px;
        }

        form {
            width: 50%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include 'koneksi.php';

    $customer = mysqli_query($conn, "SELECT * from customer where id='$_GET[id]'");

    while ($c = mysqli_fetch_array($customer)) {
        $id = $c["id"];
        $first_name = $c["first_name"];
        $last_name = $c["last_name"];
        $email = $c["email"];
        $phone = $c["phone"];
    }
    ?>
    <form action="proses_edit.php?id=<?php echo $id ?>" method="post" onsubmit="return validateForm()">
        <table class="table">
            <h1>EDIT CUSTOMER</h1>
            <tr>
                <td>Id</td>
                <td>:</td>
                <td><input type="text" name="id" disabled value="<?php echo $id ?>"></td>
            </tr>

            <tr>
                <td>First Name</td>
                <td>:</td>
                <td><input type="text" name="first_name" value="<?php echo $first_name ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><span id="firstNameError" class="error-message"></span></td>
            </tr>

            <tr>
                <td>Last Name</td>
                <td>:</td>
                <td><input type="text" name="last_name" value="<?php echo $last_name ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><span id="lastNameError" class="error-message"></span></td>
            </tr>

            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="email" name="email" value="<?php echo $email ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><span id="emailError" class="error-message"></span></td>
            </tr>

            <tr>
                <td>Phone</td>
                <td>:</td>
                <td><input type="number" name="phone" value="<?php echo $phone ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><span id="phoneError" class="error-message"></span></td>
            </tr>
        </table>
        <input type="submit" name="Submit" value="Simpan">
    </form>

    <script>
        function validateForm() {
            var firstName = document.forms[0]["first_name"].value;
            var lastName = document.forms[0]["last_name"].value;
            var email = document.forms[0]["email"].value;
            var phone = document.forms[0]["phone"].value;
            var valid = true;

            if (firstName === "") {
                document.getElementById("firstNameError").innerHTML = "First Name harus diisi.";
                valid = false;
            } else {
                document.getElementById("firstNameError").innerHTML = "";
            }

            if (lastName === "") {
                document.getElementById("lastNameError").innerHTML = "Last Name harus diisi.";
                valid = false;
            } else {
                document.getElementById("lastNameError").innerHTML = "";
            }

            if (email === "") {
                document.getElementById("emailError").innerHTML = "Email Wajib diisi";
                valid = false;
            } else {
                document.getElementById("emailError").innerHTML = "";
            }

            if (phone === "") {
                document.getElementById("phoneError").innerHTML = "Phone tidak boleh kosong";
                valid = false;
            } else {
                document.getElementById("phoneError").innerHTML = "";
            }

            return valid;
        }
        function isValidEmail(email) {
        // Validasi sederhana untuk alamat email
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return emailPattern.test(email);
    }
    </script>
</body>

</html>