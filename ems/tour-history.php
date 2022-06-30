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
		$bid=intval($_GET['bkid']);
$email=$_SESSION['login'];
	$sql ="SELECT FromDate FROM tblbooking2 WHERE UserEmail=:email and BookingId=:bid";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':bid', $bid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{
	 $fdate=$result->FromDate;

	$a=explode("/",$fdate);
	$val=array_reverse($a);
	 $mydate =implode("/",$val);
	$cdate=date('Y/m/d');
	$date1=date_create("$cdate");
	$date2=date_create("$fdate");
 	$diff=date_diff($date1,$date2);
	$df=$diff->format("%a");
if($date1)
{
$status=2;
$cancelby='u';
$sql = "UPDATE tblbooking2 SET status=:status,CancelledBy=:cancelby WHERE UserEmail=:email and BookingId=:bid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> bindParam(':cancelby',$cancelby , PDO::PARAM_STR);
$query-> bindParam(':email',$email, PDO::PARAM_STR);
$query-> bindParam(':bid',$bid, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Cancelled successfully";
}
else
{
$error="You can't cancel booking before 24 hours";
}
}
}
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
                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">My Bookings</h1>
            <form name="chngpwd" method="post" onSubmit="return valid();">
                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <p>
                <table class="table table-dark">
                    <tr align="center" style="background-color:black;color:white;">
                        <th>Sl.No</th>
                        <th>Booking Id</th>
                        <th>Package Name</th>
                        <th>Event Date</th>
                        <th>View your selection</th>
                        <th>Status</th>
                        <th>Package Price</th>
                        <th>Booking Date</th>
                        <th>Action</th>
                    </tr>
                    <?php 

$uemail=$_SESSION['login'];;
$sql = "SELECT tblbooking2.BookingId as bookid,tblbooking2.PackageId as pkgid,tbltourpackages.PackageName as packagename,tbltourpackages.PackagePrice as price,tblbooking2.FromDate as fromdate,tblbooking2.ToDate as todate,tblbooking2.Comment as comment,tblbooking2.status as status,tblbooking2.RegDate as regdate,tblbooking2.CancelledBy as cancelby,tblbooking2.UpdationDate as upddate from tblbooking2 join tbltourpackages on tbltourpackages.PackageId=tblbooking2.PackageId where UserEmail=:uemail ORDER BY cartid DESC";
$query = $dbh->prepare($sql);
$query -> bindParam(':uemail', $uemail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
                    <tr>
                        <td><?php echo htmlentities($cnt);?></td>
                        <td>#BK<?php echo htmlentities($result->bookid);?></td>
                        <td><a
                                href="package-details.php?pkgid=<?php echo htmlentities($result->pkgid);?>"><?php echo htmlentities($result->packagename);?></a>
                        </td>
                        <td><?php echo htmlentities($result->fromdate);?></td>
                        <td align="center">
                            <!-- <?php echo htmlentities($result->comment);?> -->
                            <a href="display2.php?cid2=<?php echo htmlentities($result->bookid);?>&pkgname=<?php echo htmlentities($result->packagename);?>"
                                class="w3-button w3-brown w3-padding-large">view
                            </a>
                        </td>
                        <td><?php if($result->status==0)
{
echo "Pending";
}
if($result->status==1)
{
echo "booking available";
?>
                            <br>
                            <!-- <a href="payment.php?bkid=<?php echo htmlentities($result->bookid);?>" class="atg">Click
                                    to pay</a> -->
                            <a href="razorpay-php-testapp-master/pay.php?bkid=<?php echo htmlentities($result->bookid); ?>&em11=<?php echo htmlentities($uemail); ?>&price=<?php echo htmlentities($result->price); ?>"
                                class="w3-button w3-blue w3-padding-large" class="atg">pay for booking
                                confirmation</a>
                            <!-- <a href="payment.php" class="atg">Click to pay</a> -->
                            <?php
}
if($result->status==3)
{
echo "<b>paid</b>";
?>
                            <br>
                            <!-- <p>Paid</p> -->
                            <?php
}
if($result->status==2 and  $result->cancelby=='u')
{
echo "Canceled by you at " .$result->upddate;
?><?php
} 
if($result->status==2 and $result->cancelby=='a')
{
echo "Canceled by admin at " .$result->upddate;
?><?php
}
?>
                        </td>
                        <td><?php echo htmlentities($result->price);?></td>
                        <td><?php echo htmlentities($result->regdate);?></td>
                        <?php if($result->status==2)
{
	?><td>Cancelled</td>
                        <?php } elseif($result->status==3)
{
	?><td>Booking Confirmed</td>
                        <?php } else {?>
                        <td><a href="tour-history.php?bkid=<?php echo htmlentities($result->bookid);?>"
                                class="w3-button w3-orange w3-padding-large"
                                onclick="return confirm('Do you really want to cancel booking')">Cancel</a></td>
                        <?php }?>
                    </tr>
                    <?php $cnt=$cnt+1; }}else{
                            ?> <h3>No Bookings</h3> <?php
                        } ?>
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