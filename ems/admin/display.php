<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	// code for cancel
	?>
<!DOCTYPE HTML>
<html>

<head>
    <title>TMS | Admin manage Bookings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/morris.css" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/table-style.css" />
    <link rel="stylesheet" type="text/css" href="css/basictable.css" />
    <script type="text/javascript" src="js/jquery.basictable.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#table').basictable();

        $('#table-breakpoint').basictable({
            breakpoint: 768
        });

        $('#table-swap-axis').basictable({
            swapAxis: true
        });

        $('#table-force-off').basictable({
            forceResponsive: false
        });

        $('#table-no-resize').basictable({
            noResize: true
        });

        $('#table-two-axis').basictable();

        $('#table-max-height').basictable({
            tableWrapper: true
        });
    });
    </script>
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'
        type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
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

    <div class="page-container">
        <!--/content-inner-->
        <div class="left-content">
            <div class="mother-grid-inner">
                <!--header start here-->
                <?php include('includes/header.php');?>
                <div class="clearfix"> </div>
            </div>
            <!--heder end here-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>View Selected
                    Item of customer
                </li>
            </ol>

            <div class="container" align="center">


                <?php
                    $conn=mysqli_connect("localhost", "root", "", "ems");
                    $bookid=$_GET['bookid'];
                    //$sql = "SELECT tblbooking2.BookingId as bookid,tblusers.FullName as fname,tblusers.MobileNumber as mnumber,tblusers.EmailId as email,tbltourpackages.PackageName as pckname,tblbooking2.PackageId as pid,tblbooking2.FromDate as fdate,tblbooking2.ToDate as tdate,tblbooking2.Comment as comment,tblbooking2.status as status,tblbooking2.CancelledBy as cancelby,tblbooking2.UpdationDate as upddate from tblusers join  tblbooking2 on  tblbooking2.UserEmail=tblusers.EmailId join tbltourpackages on tbltourpackages.PackageId=tblbooking2.PackageId";
                    $query2 = "SELECT * from tblbooking2 where BookingId = $bookid";
                    if($result2 = mysqli_query($conn,$query2)){

                        while($row = mysqli_fetch_assoc($result2)){
                            $samplee = chop($row['Comment'],",");
                            $mark = explode(",", $samplee);
                            foreach($mark as $mk){
                                ?>
                <div class="" id="plans">
                    <div class="w3-third w3-margin-bottom" style="margin-left:130px;">
                        <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                            <li class="w3-black w3-xlarge w3-padding-32" style="text-transform:capitalize;">
                                <?php
if(substr($mk,0,3) == "cha"){
    $rs = "Chair";
}else if(substr($mk,0,3) == "wel"){
    $rs = "Welcome Sign";
}else if(substr($mk,0,3) == "bac"){
    $rs = "Background Stage";
}else if(substr($mk,0,3) == "ent"){
    $rs = "Welcome Gate image";
}else if(substr($mk,0,3) == "bgc"){
    $rs = "Bride-Groom Chair";
}else if(substr($mk,0,3) == "bcs"){
    $rs = "VIP Sofa";
}else if(substr($mk,0,3) == "tab"){
    $rs = "Table";
}else if(substr($mk,0,3) == "bar"){
    $rs = "BarCounter";
}else if(substr($mk,0,3) == "dec"){
    $rs = "Decorative Items";
}else{
    $rs = "$mk";
}
?>
                                <?php echo $rs; ?>
                            </li>
                            <img src="pacakgeimages/<?php echo $mk;?>" height="200" width="350" alt="img">
                        </ul>
                    </div>
                </div>
                <?php
                            }
                        }
                    }
                    ?>


                <br><br><br>
                <table border="1" class="table">
                    <tr style="color:white;">
                        <th>Items</th>
                    </tr>
                    <?php
                    $query22 = "SELECT * from tblbooking2 where BookingId = $bookid";
                    if($result22 = mysqli_query($conn,$query22)){
                     
                        while($row = mysqli_fetch_assoc($result22)){
                            $samplee = chop($row['Comment2'],",");
                            $string = explode(",", $samplee);
                            foreach($string as $mk){
                                ?>
                    <tr>
                        <td>
                            <?php echo $mk;?><br>
                        </td>
                    </tr>
                    <?php
                            }
                            ?>
                    <?php
                        }
                    }                    

                    ?>
                </table>




            </div>
            <!-- script-for sticky-nav -->
            <script>
            $(document).ready(function() {
                var navoffeset = $(".header-main").offset().top;
                $(window).scroll(function() {
                    var scrollpos = $(window).scrollTop();
                    if (scrollpos >= navoffeset) {
                        $(".header-main").addClass("fixed");
                    } else {
                        $(".header-main").removeClass("fixed");
                    }
                });

            });
            </script>
            <!-- /script-for sticky-nav -->
            <!--inner block start here-->
            <div class="inner-block">

            </div>
            <!--inner block end here-->
            <!--copy rights start here-->
            <?php include('includes/footer.php');?>
            <!--COPY rights end here-->
        </div>
    </div>
    <!--//content-inner-->
    <!--/sidebar-menu-->
    <?php include('includes/sidebarmenu.php');?>
    <div class="clearfix"></div>
    </div>
    <script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle) {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({
                "position": "absolute"
            });
        } else {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({
                    "position": "relative"
                });
            }, 400);
        }

        toggle = !toggle;
    });
    </script>
    <!--js -->
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- /Bootstrap Core JavaScript -->

</body>

</html>
<?php } ?>