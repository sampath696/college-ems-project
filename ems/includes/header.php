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

?>
<div class="top-header">
    <div class="container">
        <ul class="tp-hd-lft" data-wow-delay=".5s">
            <li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li class="prnt"><a href="profile.php">My Profile</a></li>
            <li class="prnt"><a href="change-password.php">Change Password</a></li>
            <li class="prnt"><a href="issuetickets.php">View F.A.Q</a></li>
        </ul>
        <ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
            <li class="tol">Welcome :</li>
            <li class="sig"><?php echo htmlentities($_SESSION['login']);?></li>
            <li class="sigi"><a href="logout.php">/ Logout</a></li>
            <li style="margin-left:30px;" class="prnt"><a href="cart.php">Cart - <strong><?php echo $rowcnt ?></strong>
                </a></li>
            <li class="sigi"><a href="tour-history.php"> MyBooking</a></li>
            <!-- <li  ><a href="cart.php">Cart</a></li> -->
        </ul>
        <div class="clearfix"></div>
    </div>
</div><?php } else {?>
<div class="top-header">
    <div class="container">
        <ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
            <li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
            <!-- <li class="hm"><a href="admin/index.php">Admin Login</a></li> -->
        </ul>
        <ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
            <li class="tol">Toll Number : 123-4568790</li>
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
    <div class="container">
        <div class="logo wow fadeInDown animated" data-wow-delay=".5s">
            <a href="index.php">Event <span>Management System</span></a>
        </div>

        <div class="lock fadeInDown animated" data-wow-delay=".5s">
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
    <div class="container">
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
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="page.php?type=aboutus">About</a></li>
                            <li><a href="package-list.php">Event Packages</a></li>
                            <li><a href="page.php?type=privacy">Privacy Policy</a></li>
                            <li><a href="page.php?type=terms">Terms of Use</a></li>
                            <li><a href="page.php?type=contact">Contact Us</a></li>
                            <?php if($_SESSION['login'])
{?>
                            <li>Need Help?<a href="#" data-toggle="modal" data-target="#myModal3"> / F.A.Q </a> </li>
                            <?php } else { ?>
                            <li><a href="enquiry.php"> Enquiry </a> </li>
                            <?php } ?>
                            <div class="clearfix"></div>

                        </ul>
                    </nav>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>

        <div class="clearfix"></div>
    </div>
</div>