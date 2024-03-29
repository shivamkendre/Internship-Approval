<?php
include("../assets/php_modules/common_methods.php");
include("../assets/php_modules/form_details.php");

// internship_id and sdrn are through href you can see them in url 
$internship_id = $_GET['internship_id'];
$form = get_form_details($internship_id);
$sdrn = $form['Sdrn'];
$faculty = get_faculty_details($sdrn);

if (isset($_POST['submit'])) {
    $amount = $_POST['amount'];
    $taxes = $_POST['taxes'];
    $charges = $_POST['charges'];
    $time = $_POST['time'];
    $client_name = $_POST["client-name"];

    quotation_details($internship_id, $faculty['Sdrn'], $amount, $taxes, $charges, $time, $client_name);
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    <!-- external stylesheet link -->
    <link rel="stylesheet" href="../assets/css/style.css">



    <!-- google font cdn -->
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Roboto+Condensed&display=swap" rel="stylesheet">


    <title>Quotation Details</title>
</head>

<body>


    <header id="header">

        <!-- header we have already created we are calling header.php file -->
        <?php include('../assets/php_modules/header.php') ?>

    </header>
    <!-- this will show internship topic -->
    <h1 class="text-center mt-5 mb-3" class="add-font"><?php echo $form['Topic'] ?> Quotation Details</h1>


    <!-- form is disabled and values which we have fetched from database are shown in input field  -->
    <div class="container form-radius">

        <!-- external javascript link -->
        <script src="../assets/js/main.js"></script>

        <!-- validation message if all fileds are not filled -->
        <h3 class="text-center mb-3 add-font validation-msg alert alert-danger add-font" id="error-msg">Please fill all the required fields*</h3>


        <form onsubmit="return validate_me()" method="post">

            <div class="col-12 mb-3">
                <label for="inputCharges" class="form-label label-required">Client Name</label>
                <input type="text" class="form-control input-required" id="inputCharges" placeholder="Enter client Name" name="client-name" onchange="remove_error(this)">
            </div>

            <div class="col-12 mb-3">
                <label for="inputCharges" class="form-label label-required">Maintenance Charges</label>
                <input type="text" class="form-control input-required" id="inputCharges" placeholder="Enter Maintenance Charges" name="charges" onchange="remove_error(this)">
            </div>

            <div class="col-12 mb-3">
                <label for="inputTime" class="form-label label-required">Time of Delivery</label>
                <input type="text" class="form-control input-required" id="inputTime" placeholder="Enter the Time of Delivery" name="time" onchange="remove_error(this)">
            </div>

            <label for="amount" class="form-label label-required">Development Cost</label>
            <div class="row">
                <div class=" mb-3 col-6">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i> &nbsp; <b> Amount </b> </span>
                    <input type="number" class="form-control input-required" id="amount" name="amount" placeholder=<?php echo $form['Tentative_Amount'] ?> onchange="remove_error(this)">
                </div>
                <div class=" mb-3 col-6">
                    <span class="input-group-text"><i class="fa fa-percent"></i> &nbsp; <b> Taxes </b></span>
                    <input type="number" class="form-control input-required" id="amount" name="taxes" placeholder="Enter Taxes in %" onchange="remove_error(this)">
                </div>
            </div>


            <div class=" d-flex justify-content-center mt-4 btn-container">
                <button type="submit" name="submit" class="btn text-decoration-none">Submit</button>
            </div>

            <!-- <div class="mb-3  d-flex justify-content-start mt-4 btn-container">
                <button type="submit" name="quotation" class="btn text-decoration-none">Download Quotation Letter</button>
            </div> -->
        </form>

    </div>

    <!-- Go back to home page -->
    <div class=" d-flex justify-content-center mt-4 btn-container">
        <a class="btn text-decoration-none" href="./home.php">Go back to home page</a>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->



</body>

</html>