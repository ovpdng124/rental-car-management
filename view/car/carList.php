<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car List</title>
    <link rel="stylesheet" href="view/bootstrap4/css/bootstrap.min.css">
    <script src="view/bootstrap4/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container-fluid">
    <h1 class="text-center">LIST ALL CAR</h1>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Car Reg No.</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Daily Rate</th>
            <th>Details</th>
        </tr>

        <?php $count = 1;
        foreach ($carList as $value):?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $value['carRegNo']; ?></td>
                <td><?php echo $value['category']; ?></td>
                <td><?php echo $value['brand']; ?></td>
                <td><?php echo $value['dailyRate']; ?></td>
                <td><a href="index.php?action=rentalCarList&carNo=<?php echo $value['carRegNo']; ?>">View Detail</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<button class="btn ml-3" onclick="window.location.href='index.php?action=customerList'">Customer List</button>
<button class="btn ml-3" onclick="window.location.href='index.php?action=rentalList'">Rental List</button>
<button class="btn ml-3" onclick="window.location.href='index.php?action=addRentalForm'">Add Rental</button>
</body>
</html>