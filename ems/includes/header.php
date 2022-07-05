<?php 

session_start();
error_reporting(0);
include('includes/config.php');


if($_SESSION['login']){  
$uemail=$_SESSION['login'];
// echo $uemail ;
$sql = "SELECT UserEmail from tblbooking WHERE UserEmail= '$uemail' ";
$query = $dbh->prepare($sql);
$query->execute();
$rowcnt = $query->rowCount();

$sql = "SELECT UserEmail from tblbooking2 WHERE UserEmail= '$uemail' ";
$query = $dbh->prepare($sql);
$query->execute();
$rowcnt22 = $query->rowCount();


?>
<div class="top-header">
    <div class="" style="margin-left:60px;">
        <ul class="tp-hd-lft" data-wow-delay=".5s">
            <!-- <li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li> -->
            <li class="prnt"><a href="profile.php"><i class="fa fa-user"
            style="font-size:25px; color:white;"> </i> <?php echo htmlentities($_SESSION['login']);?></a></li>
        </ul>
        <ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s" style="margin-right:70px;">
            <!-- <li class="sigi" style="margin:0px 0px 0px 30px"><a href="change-password.php"><i class="fa fa-key"
                        style="font-size:25px; color:white;" aria-hidden="true"></i> Change Password</a></li> -->
            <li class="sigi" style="margin:0px 0px 0px 30px"><a href="issuetickets.php"><i class="fa fa-question-circle"
                        style="font-size:25px; color:white;"></i> F.A.Q</a></li>
            <li class="sigi" style="margin:0px 20px 0px 30px"><a href="cart.php"><i class="fa fa-shopping-cart"
                        style="font-size:25px; color:white;"></i> <strong>(<?php echo $rowcnt ?>)</strong></a></li>
            <li class="sigi"><a href="tour-history.php"><i class="fa fa-calendar"
                        style="font-size:25px; color:white;"></i> Bookings
                    <strong>(<?php echo $rowcnt22 ?>)</strong></a></li>
            <li class="sigi" style="margin:0px 20px 0px 25px"><a href="logout.php">
                    <i class="fa fa-sign-out" style="font-size:25px; color:white;"></i> Logout
                </a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<?php } else {?>
<div class="top-header">
    <div class="container">
        <ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
            <li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
            <!-- <li class="hm"><a href="admin/index.php">Admin Login</a></li> -->
        </ul>
        <ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
            <!-- <li class="tol">Toll Number : 123-4568790</li> -->
            <li class="sig"><a href="#" data-toggle="modal" data-target="#myModal">Sign Up</a></li>
            <li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4">/ Sign In</a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<?php }?>
<!--- /top-header ---->
<!--- header ---->
<div class="header">
    <div class="" style="margin-left:60px;">

        <div class="logo wow fadeInDown animated" data-wow-delay=".5s">
            <!-- <i class="fa fa-home" style="font-size:30px; display:flex;"> -->
            <!-- <img src="images/logo.jpeg" height="100" width="200" alt="logo"> -->
            <a href="index.php">Swagath <span>Events</span></a>

        </div>

        <div class="lock fadeInDown animated" style="margin-right:30px;" data-wow-delay=".5s">
            <li><i class="fa fa-lock"></i></li>
            <li>
                <div class="securetxt">SAFE &amp; SECURE </div>
            </li>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--- /header ---->
<!--- footer-btm ---->
<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
    <div class="" style="margin-left:40px;">
        <div class="navigation">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <nav class="cl-effect-1">
                        <ul class="nav navbar-nav" style="display:block;">
                            <!-- <li><a href="index.php">Home</a></li> -->
                            <li><a href="index.php"><i class="fa fa-home" style="font-size:18px; color:white;"></i>
                                    Home</a></li>
                            <li><a href="package-list.php"><i class="fa fa-th-list"
                                        style="font-size:18px; color:white;"></i> Event Packages</a></li>
                            <?php if($_SESSION['login'])
{?>
                            <li><a href="#" data-toggle="modal" data-target="#myModal3"><i class="fa fa-question-circle"
                                        style="font-size:18px; color:white;"></i> F.A.Q</a></li>
                            <?php } else { ?>
                            <!-- <li><a href="enquiry.php"> Enquiry </a> </li> -->
                            <?php } ?>
                            <li><a href="aboutus.php"><i class="fa fa-info-circle"
                                        style="font-size:18px; color:white;"></i> About Us</a></li>
                            <!-- <li><a href="page.php?type=aboutus"><i class="fa fa-info-circle"
                                        style="font-size:18px; color:white;"></i>About Us</a></li> -->
                            <!-- <li><a href="page.php?type=privacy">Privacy Policy</a></li> -->
                            <!-- <li><a href="page.php?type=terms">Terms of Use</a></li> -->
                            <li><a href="contactus.php"><i class="fa fa-phone" style="font-size:18px; color:white;"></i>
                                    Contact Us</a></li>
                            <li><a href="gallery.php"><i class="fa fa-picture-o" style="font-size:18px; color:white;"></i>
                                    Gallery</a></li>
                            <div class="clearfix"></div>

                        </ul>
                    </nav>
                </div>
                
                <!-- /.navbar-collapse -->
            </nav>
        </div>

        <div class="clearfix"></div>
    </div>
</div>