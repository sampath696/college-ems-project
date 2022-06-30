<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{
    if(isset($_REQUEST['bkid']))
	{
$bookid=intval($_GET['bkid']);
$pkgid=intval($_GET['pkgid']);
// $pkgid=88;
$email=$_SESSION['login'];
$frd=$_GET['frd'];
$td=$_GET['td'];
$cmt=$_GET['cmt'];
$cmt2=$_GET['cmt2'];
$status=0;
$sql="INSERT INTO tblbooking2(BookingId,PackageId,UserEmail,FromDate,ToDate,Comment,Comment2,status) VALUES(:bookid,:pkgid,:email,:frd,:td,:cmt,:cmt2,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->bindParam(':pkgid',$pkgid,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':frd',$frd,PDO::PARAM_STR);
$query->bindParam(':td',$td,PDO::PARAM_STR);
$query->bindParam(':cmt',$cmt,PDO::PARAM_STR);
$query->bindParam(':cmt2',$cmt2,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="booked Successfully";
?>
<?php
$sql = "DELETE FROM tblbooking where BookingId = $bookid";
$query = $dbh->prepare($sql);
$query->execute();

echo "<script> location.href='tour-history.php'; </script>";
exit;

}
else 
{
$error="Something went wrong. Please try again";
}



}

if(isset($_REQUEST['bkid2'])){
$bookid1=intval($_GET['bkid2']);

$sql = "DELETE FROM tblbooking where BookingId = $bookid1";
$query = $dbh->prepare($sql);
$query->execute();

}



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
        <!-- <div class="banner-1 ">
            <div class="container">
                <h1 class="wow zoomIn animated animated" data-wow-delay=".5s"
                    style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">ems-Tourism Management
                    System</h1>
            </div> -->
    </div><br><br>
    <!--- /banner-1 ---->
    <!--- privacy ---->
    <div class="privacy">
        <div class="container">
            <h1 class="wow fadeInDown animated animated" data-wow-delay=".5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Cart</h1>

            <form name="chngpwd" method="post" onSubmit="return valid();">
                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
                    <a href="tour-history.php" class="w3-button w3-black w3-padding-large" class="atg">go to see booking
                        requests</a>
                </div><?php }?>
                <p>
                <table class="table table-dark">
                    <thead style="background-color:black;color:white;">
                        <tr>
                            <th>Sl.No</th>
                            <th>Booking Id</th>
                            <th>Package Name</th>
                            <th>Event Date</th>
                            <th>View your selection</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php 

$uemail=$_SESSION['login'];
$sql = "SELECT tblbooking.BookingId as bookid,tblbooking.PackageId as pkgid,tbltourpackages.PackageName as packagename,tblbooking.FromDate as fromdate,tblbooking.ToDate as todate,tblbooking.Comment as comment,tblbooking.Comment2 as comment2,tblbooking.status as status,tblbooking.RegDate as regdate,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from tblbooking join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId where UserEmail=:uemail ORDER BY BookingId DESC";
$query = $dbh->prepare($sql);
$query -> bindParam(':uemail', $uemail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
                    <tbody style="background-color:white;color:black;">
                        <tr>
                            <td><?php echo htmlentities($cnt);?></td>
                            <td>#BK<?php echo htmlentities($result->bookid);?></td>
                            <td><a
                                    href="package-details.php?pkgid=<?php echo htmlentities($result->pkgid);?>"><?php echo htmlentities($result->packagename);?></a>
                            </td>
                            <td><?php echo htmlentities($result->fromdate);?></td>
                            <!-- <td><?php echo htmlentities($result->todate);?></td> -->
                            <td align="center">
                                <!-- <?php echo htmlentities($result->comment);?> -->
                                <a href="display.php?cid=<?php echo htmlentities($result->bookid);?>&pkgname=<?php echo htmlentities($result->packagename);?>"
                                    class="w3-button w3-brown w3-padding-large">view
                                </a>
                            </td>
                            <td>
                                <!-- <input type="button" value="delete" name="delete" > -->
                                <a href="cart.php?bkid2=<?php echo htmlentities($result->bookid);?>"
                                    class="w3-button w3-red w3-padding-large"
                                    onclick="return confirm('Do you really want to remove from cart')">Remove</a>
                                <a href="cart.php?bkid=<?php echo htmlentities($result->bookid);?>&pkgid=<?php echo htmlentities($result->pkgid) ?>&frd=<?php echo htmlentities($result->fromdate) ?>&td=<?php echo htmlentities($result->todate) ?>&cmt=<?php echo htmlentities($result->comment)?>&cmt2=<?php echo htmlentities($result->comment2) ?>"
                                    class="w3-button w3-light-green w3-padding-large"
                                    onclick="return confirm('Do you really want to book')">request-booking</a>

                            </td>

                        </tr>
                    </tbody>
                    <?php $cnt=$cnt+1; }}
  else{
    ?><h3>Cart is Empty</h3><?php
    // echo "cart is empty";
  }                      
                        ?>
                </table>

                </p>
            </form>

        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br>
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