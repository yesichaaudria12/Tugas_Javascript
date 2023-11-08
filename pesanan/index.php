<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12">
                <?php
                include "../customer/koneksi.php";
                $query = mysqli_query($conn, "SELECT c.first_name, c.last_name, o.order_date, o.status, b.channel, b.service_fee, p.name, p.price, op.qty FROM `order` as o join customer as c on c.id = o.customer_id join billing as b on b.order_id=o.id join order_product as op on o.id=op.order_id join product as p on p.id = op.product_id;");
                ?>
                <strong>Data Pesanan:</strong>
                <table class="table table-striped">
                    <tr>
                        <th>
                            no
                        </th>
                        <th>
                            name
                        </th>
                        <th>
                            order date
                        </th>
                        <th>
                            order status
                        </th>
                        <th>
                            billing channel
                        </th>
                        <th>
                            service fee
                        </th>
                        <th>
                            product name
                        </th>
                        <th>
                            product price
                        </th>
                        <th>
                            product qty
                        </th>
                        <th>
                            Total Product Price
                        </th>
                    </tr>
                    <?php
                    if (mysqli_num_rows($query) > 0) {
                        $no = 1;
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                            <tr>
                                <td> <?php echo $no ?></td>
                                <td> <?php echo $data["first_name"] . " " . $data["last_name"] ?> </td>
                                <td> <?php echo generateDate($data["order_date"]) ?> </td>
                                <td> <span class="label label-<?php echo generateLabel($data["status"]) ?>"><?php echo $data["status"] ?></span></td>
                                <td> <?php echo $data["channel"] ?> </td>
                                <td> <?php echo "Rp. " . number_format($data["service_fee"], 0, ',', '.') ?> </td>
                                <td> <?php echo $data["name"] ?> </td>
                                <td> <?php echo "Rp. " . number_format($data["price"], 0, ',', '.') ?> </td>
                                <td> <?php echo $data["qty"] ?> </td>
                                <td> <?php echo generateTotalPrice($data["price"], $data["qty"]) ?> </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>

<?php
function generateDate($date)
{
    $newDate = strtotime($date);
    return date("d F Y H:i:s ", $newDate);
}

function generateLabel($status)
{
    switch ($status) {
        case "pending":
            $style = "danger";
            break;
        case "processing":
            $style = "info";
            break;
        case "shipped":
            $style = "warning";
            break;
        case "delivered":
            $style = "success";
            break;
        default:
            $style = "default";
            break;
    }

    return $style;
}

function generateTotalPrice($productPrice, $qty)
{
    return "Rp. " . number_format(($qty * $productPrice), 0, ',', '.');
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>