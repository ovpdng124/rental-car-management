<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer List</title>
    <link rel="stylesheet" href="view/bootstrap4/css/bootstrap.min.css">
    <script src="view/bootstrap4/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container-fluid">
    <h1 class="text-center">CUSTOMER LIST</h1>
    <table class="table">
        <tr>
            <th>#</th>
            <th>CustomerID</th>
            <th>Customer Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Discount</th>
        </tr>

        <?php $count = 1;
        foreach ($customerList as $value):?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $value['customerID']; ?></td>
                <td><?php echo $value['customerName']; ?></td>
                <td><?php echo $value['address']; ?></td>
                <td><?php echo $value['phone']; ?></td>
                <td><?php echo $value['discount']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<button class="btn ml-3" onclick="window.location.href='index.php'">Back</button>
</body>
</html>