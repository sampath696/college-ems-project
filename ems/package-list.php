<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>EMS | Package List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="applijewelleryion/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Custom Theme files -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--animate-->
    <!-- <link href="css/animate.css" rel="stylesheet" type="text/css" media="all"> -->
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <!--//end-animate-->
    <style>
    .column {
        float: left;
        width: 33.33%;
        padding: 5px;
    }

    /* Clearfix (clear floats) */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    .newspaper {
        column-gap: 50px;
    }
    </style>
</head>

<body>
    <?php include('includes/header.php');?>

    <br>
    <div class="container">
        <h1>
            <center>Packages</center>
        </h1><br>
        <?php $sql = "SELECT * from tbltourpackages ORDER BY PackageId DESC";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($results as $result)
    {	
        ?>
        <div class="" style="width:100%" id="plans">
            <div class="w3-third w3-margin-bottom" style="margin-left:130px;">

                <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                    <li class="w3-black w3-xlarge w3-padding-32" style="text-transform:capitalize;" >

                        <?php echo htmlentities($result->PackageName);?>
                    </li>
                    <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" height="200"
                        width="350" alt="img">

                    <!-- <li class="w3-padding-16"><?php echo htmlentities($result->PackageType);?></li> -->
                    <li class="w3-padding-16"><?php echo htmlentities($result->PackageDetails);?></li>
                    <h2 class="w3-wide">₹ <?php echo htmlentities($result->PackagePrice);?></h2>
                    <span class="w3-opacity">Booking Amount</span>
                    </li>
                    <li class="w3-light-grey w3-padding-24">
                        <a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>"
                            class="w3-button w3-black w3-padding-large">View</a>
                    </li>

                </ul>
            </div>
        </div>
        <?php }} ?>
    </div>



    <!--- /rooms ---->

    <!--- /footer-top ---->
    <!-- signup -->

    <?php include('includes/footer.php');?>
    <?php include('includes/signup.php');?>

    <!-- //signu -->
    <!-- signin -->
    <?php include('includes/signin.php');?>
    <!-- //signin -->
    <!-- write us -->
    <?php include('includes/write-us.php');?>
    <!-- //write us -->
</body>

</html>