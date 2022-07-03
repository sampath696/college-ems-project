<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{
$pname=$_POST['packagename'];
$ptype=$_POST['packagetype'];	
$plocation=$_POST['packagelocation'];
$pprice=$_POST['packageprice'];	
$pfeatures=$_POST['packagefeatures'];
$pdetails=$_POST['packagedetails'];	
$pimage=$_FILES["packageimage"]["name"];
$wimage=$_FILES["welcomesign"]["name"];
$bimage=$_FILES["backgroundstage"]["name"];
$eimage=$_FILES["entrancedesign"]["name"];
$cimage=$_FILES["chairimage"]["name"];
$bgchairs=$_FILES["bgchairs"]["name"];
$bgsofa=$_FILES["bgsofa"]["name"];
$tables=$_FILES["tables"]["name"];
$barcounter=$_FILES["barcounter"]["name"];
move_uploaded_file($_FILES["packageimage"]["tmp_name"],"pacakgeimages/".$_FILES["packageimage"]["name"]);
move_uploaded_file($_FILES["welcomesign"]["tmp_name"],"pacakgeimages/".$_FILES["welcomesign"]["name"]);
move_uploaded_file($_FILES["backgroundstage"]["tmp_name"],"pacakgeimages/".$_FILES["backgroundstage"]["name"]);
move_uploaded_file($_FILES["entrancedesign"]["tmp_name"],"pacakgeimages/".$_FILES["entrancedesign"]["name"]);
move_uploaded_file($_FILES["chairimage"]["tmp_name"],"pacakgeimages/".$_FILES["chairimage"]["name"]);
move_uploaded_file($_FILES["bgchairs"]["tmp_name"],"pacakgeimages/".$_FILES["bgchairs"]["name"]);
move_uploaded_file($_FILES["bgsofa"]["tmp_name"],"pacakgeimages/".$_FILES["bgsofa"]["name"]);
move_uploaded_file($_FILES["tables"]["tmp_name"],"pacakgeimages/".$_FILES["tables"]["name"]);
move_uploaded_file($_FILES["barcounter"]["tmp_name"],"pacakgeimages/".$_FILES["barcounter"]["name"]);
$sql="INSERT INTO TblTourPackages(PackageName,PackageType,PackageLocation,PackagePrice,PackageFetures,PackageDetails,PackageImage,WelcomeImage,BackgroundStageImage,EntranceImage,ChairImage,bgchair,bgsofa,tables,BarCounter) VALUES(:pname,:ptype,:plocation,:pprice,:pfeatures,:pdetails,:pimage,:wimage,:bimage,:eimage,:cimage,:bgchairs,:bgsofa,:tables,:barcounter)";
$query = $dbh->prepare($sql);
$query->bindParam(':pname',$pname,PDO::PARAM_STR);
$query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
$query->bindParam(':plocation',$plocation,PDO::PARAM_STR);
$query->bindParam(':pprice',$pprice,PDO::PARAM_STR);
$query->bindParam(':pfeatures',$pfeatures,PDO::PARAM_STR);
$query->bindParam(':pdetails',$pdetails,PDO::PARAM_STR);
$query->bindParam(':pimage',$pimage,PDO::PARAM_STR);
$query->bindParam(':wimage',$wimage,PDO::PARAM_STR);
$query->bindParam(':bimage',$bimage,PDO::PARAM_STR);
$query->bindParam(':eimage',$eimage,PDO::PARAM_STR);
$query->bindParam(':cimage',$cimage,PDO::PARAM_STR);
$query->bindParam(':bgchairs',$bgchairs,PDO::PARAM_STR);
$query->bindParam(':bgsofa',$bgsofa,PDO::PARAM_STR);
$query->bindParam(':tables',$tables,PDO::PARAM_STR);
$query->bindParam(':barcounter',$barcounter,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Package Created Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}

	?>
<!DOCTYPE HTML>
<html>

<head>
    <title>TMS | Admin Package Creation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'
        type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
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
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Create Package
                </li>
            </ol>
            <!--grid-->
            <div class="grid-form">

                <!---->
                <div class="grid-form1">
                    <h3>Create Package</h3>
                    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                    </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                    <div class="tab-content">
                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="packagename" id="packagename"
                                            placeholder="Create Package" required>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Package Type</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="packagetype" id="packagetype"
                                            placeholder=" Package Type eg- Family Package / Couple Package" required>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Package Location</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="packagelocation"
                                            id="packagelocation" placeholder=" Package Location" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Package Price Range</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="packageprice" id="packageprice"
                                            placeholder=" Package Price Range" required>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Package Features</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="packagefeatures"
                                            id="packagefeatures"
                                            placeholder="Package Features Eg-free Pickup-drop facility" required>
                                    </div>
                                </div> -->


                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Package Details</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="5" cols="50" name="packagedetails"
                                            id="packagedetails" placeholder="Package Details" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Package Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="packageimage" id="packageimage">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">welcome sign</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="welcomesign" id="welcomesign">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Background Stage
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="file" name="backgroundstage" id="backgroundstage">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Welcome gate
                                        </label>
                                    <div class="col-sm-8">
                                        <input type="file" name="entrancedesign" id="entrancedesign">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Normal Chair   </label>
                                    <div class="col-sm-8">
                                        <input type="file" name="chairimage" id="chairimage">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Bride-Groom Chair</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="bgchairs" id="bgchairs">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Wedding Sofa</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="bgsofa" id="bgsofa">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Tables</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="tables" id="tables">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Bar Counter</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="barcounter" id="barcounter">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <button type="submit" name="submit" class="btn-primary btn">Create</button>

                                        <button type="reset" class="btn-inverse btn">Reset</button>
                                    </div>
                                </div>





                        </div>

                        </form>





                        <div class="panel-footer">

                        </div>
                        </form>
                    </div>
                </div>
                <!--//grid-->

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