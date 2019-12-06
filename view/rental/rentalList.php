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
    <h1 class="text-center">LIST RENTAL</h1>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Rental ID</th>
            <th>Car No.</th>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Last Update</th>
        </tr>

        <?php $count = 1;
        foreach ($rentalList as $value):?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $value['rentalID']; ?></td>
                <td><?php echo $value['carRegNo']; ?></td>
                <td><?php echo $value['customerID']; ?></td>
                <td><?php echo $value['customerName']; ?></td>
                <td><?php echo $value['startDate']; ?></td>
                <td><?php echo $value['endDate']; ?></td>
                <td><?php echo $value['lastUpdate']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<button class="btn ml-3" onclick="window.location.href='index.php'">Back</button>

</body>
</html>