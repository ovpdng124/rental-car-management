<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add rental</title>
    <link rel="stylesheet" href="view/bootstrap4/css/bootstrap.min.css">
    <script src="view/bootstrap4/js/bootstrap.min.js"></script>
</head>
<body class="container-fluid" style="width: 500px;">
<div>
    <form action="" method="post" accept-charset="utf-8" class="mt-2">
        <div class="row">
            <label for="" class="col-4 mt-2 "><b>Car brand:</b></label>
            <select name="carRegNo" class="mt-1 form-control col-6"  id="">
                <option value="">Select car</option>
                <?php foreach ($carList as $item) { ?>
                    <option value="<?php echo $item['carRegNo'] ;?>"><?php echo $item['brand']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="row">
            <label for="" class="col-4 mt-2"><b>Customer Name:</b></label>
            <select name="customerID" class="mt-1 form-control col-6"  id="">
                <option value="">Select customer</option>
                <?php foreach ($customerList as $item) { ?>
                    <option value="<?php echo $item['customerID']; ?>"><?php echo $item['customerName'];?></option>
                <?php } ?>
            </select>
        </div>

        <div class="row">
            <label for="" class="col-4 mt-2"><b>Start Date:</b></label>
            <input type="date" class="mt-1 form-control col-6" name="startDate" placeholder="" required>
        </div>
        <div class="row">
            <label for="" class="col-4 mt-2"><b>End Date:</b></label>
            <input type="date" class="mt-1 form-control col-6" name="endDate" placeholder="" required>
        </div>
        <div class="row">
            <label for="" class="col-4 mt-2"><b>Last Update:</b></label>
            <input type="date" class="mt-1 form-control col-6" name="lastUpdate" placeholder="">
        </div>
        <div class="row float-right mr-5">
            <button class="btn btn-success mt-1" type="submit" name="action" value="addRentalRecord">Add</button>
            <button class="btn mx-2 btn-secondary mr-4 mt-1" onclick="window.location.href='index.php'">Back</button>
        </div>
    </form>
</div>
</body>
</html>