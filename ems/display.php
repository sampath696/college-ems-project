<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{
    


?>

<!DOCTYPE HTML>
<html>

<head>
    <title>ems | Tourism Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Tourism Management System In PHP" />
    <script type="applijewelleryion/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
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

    <style>
    .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }

    .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }
    </style>
</head>

<body>
    <!-- top-header -->
    <div class="top-header">
        <?php include('includes/header.php');?>
        <div class="banner-1 ">
            <div class="container">
                <h1 class="wow zoomIn animated animated" data-wow-delay=".5s"
                    style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">ems-Tourism Management
                    System</h1>
            </div>
        </div>
        <!--- /banner-1 ---->
        <!--- privacy ---->
        <div class="privacy">
            <div class="container">
                <h3 class="wow fadeInDown animated animated" data-wow-delay=".5s"
                    style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Items you selected
                </h3>
                <a href="cart.php" style="">Back</a>


                <?php
                    $conn=mysqli_connect("localhost", "root", "", "ems");
                    $cartid=$_GET['cid'];
                    //$sql = "SELECT tblbooking2.BookingId as bookid,tblusers.FullName as fname,tblusers.MobileNumber as mnumber,tblusers.EmailId as email,tbltourpackages.PackageName as pckname,tblbooking2.PackageId as pid,tblbooking2.FromDate as fdate,tblbooking2.ToDate as tdate,tblbooking2.Comment as comment,tblbooking2.status as status,tblbooking2.CancelledBy as cancelby,tblbooking2.UpdationDate as upddate from tblusers join  tblbooking2 on  tblbooking2.UserEmail=tblusers.EmailId join tbltourpackages on tbltourpackages.PackageId=tblbooking2.PackageId";
                    $query2 = "SELECT * from tblbooking where BookingId = $cartid";
                    if($result2 = mysqli_query($conn,$query2)){

                        while($row = mysqli_fetch_assoc($result2)){
                            $samplee = chop($row['Comment'],",");
                            $mark = explode(",", $samplee);
                            foreach($mark as $mk){
                                ?> <br> <span> <img src="admin/pacakgeimages/<?php echo $mk;?>" width="400"
                        height="300" alt=""></span> <br> <?php
                            }
                            ?>
                <?php
                        }
                    }


                    $query22 = "SELECT * from tblbooking where BookingId = $cartid";
                    if($result22 = mysqli_query($conn,$query22)){
                     
                        while($row = mysqli_fetch_assoc($result22)){
                            $samplee = chop($row['Comment2'],",");
                            $string = explode(",", $samplee);
                            foreach($string as $mk){
                                ?> <br>
                <li><?php echo $mk;?></li><?php
                            }
                            ?>
                <?php
                        }
                    }                    

                    ?>





            </div>
        </div>
        <!--- /privacy ---->
        <!--- footer-top ---->
        <!--- /footer-top ---->
        <?php include('includes/footer.php');?>
        <!-- signup -->
        <?php include('includes/signup.php');?>
        <!-- //signu -->
        <!-- signin -->
        <?php include('includes/signin.php');?>
        <!-- //signin -->
        <!-- write us -->
        <?php include('includes/write-us.php');?>






</body>

</html>
<?php } ?>