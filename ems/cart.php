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
$status=0;
$sql="INSERT INTO tblbooking2(BookingId,PackageId,UserEmail,FromDate,ToDate,Comment,status) VALUES(:bookid,:pkgid,:email,:frd,:td,:cmt,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->bindParam(':pkgid',$pkgid,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':frd',$frd,PDO::PARAM_STR);
$query->bindParam(':td',$td,PDO::PARAM_STR);
$query->bindParam(':cmt',$cmt,PDO::PARAM_STR);
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
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Custom Theme files -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
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
                    style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Cart</h3>
                    
                <form name="chngpwd" method="post" onSubmit="return valid();">
                    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                    </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
                        <a href="tour-history.php" class="atg">go to see booking requests</a>
                    </div><?php }?>
                    <p>
                    <table border="1" width="100%">
                        <tr align="center">
                            <th>#</th>
                            <th>Booking Id</th>
                            <th>Package Name</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                        <?php 

$uemail=$_SESSION['login'];
$sql = "SELECT tblbooking.BookingId as bookid,tblbooking.PackageId as pkgid,tbltourpackages.PackageName as packagename,tblbooking.FromDate as fromdate,tblbooking.ToDate as todate,tblbooking.Comment as comment,tblbooking.status as status,tblbooking.RegDate as regdate,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from tblbooking join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId where UserEmail=:uemail";
$query = $dbh->prepare($sql);
$query -> bindParam(':uemail', $uemail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
                        <tr align="center">
                            <td><?php echo htmlentities($cnt);?></td>
                            <td>#BK<?php echo htmlentities($result->bookid);?></td>
                            <td><a
                                    href="package-details.php?pkgid=<?php echo htmlentities($result->pkgid);?>"><?php echo htmlentities($result->packagename);?></a>
                            </td>
                            <td><?php echo htmlentities($result->fromdate);?></td>
                            <td><?php echo htmlentities($result->todate);?></td>
                            <td><?php echo htmlentities($result->comment);?></td>
                            <td>
                                <!-- <input type="button" value="delete" name="delete" > -->
                                <a href="cart.php?bkid2=<?php echo htmlentities($result->bookid);?>"
                                    onclick="return confirm('Do you really want to remove from cart')">Remove</a>/
                                <a href="cart.php?bkid=<?php echo htmlentities($result->bookid);?>&pkgid=<?php echo htmlentities($result->pkgid) ?>&frd=<?php echo htmlentities($result->fromdate) ?>&td=<?php echo htmlentities($result->todate) ?>&cmt=<?php echo htmlentities($result->comment) ?>"
                                    onclick="return confirm('Do you really want to book')">request-booking</a>

                            </td>

                        </tr>
                        <?php $cnt=$cnt+1; }}
  else{
    echo "cart is empty";
  }                      
                        ?>
                    </table>

                    </p>
                </form>

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