<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	$imgid=intval($_GET['imgid']);
if(isset($_POST['submit']))
{

$pimage=$_FILES["packageimage"]["name"];
$wimage=$_FILES["welcomesign"]["name"];
$bimage=$_FILES["backgroundstage"]["name"];
$eimage=$_FILES["entrancedesign"]["name"];
$cimage=$_FILES["chairimage"]["name"];
$bgchair=$_FILES["bgchair"]["name"];
$bgsofa=$_FILES["bgsofa"]["name"];
$tables=$_FILES["tables"]["name"];
$barcounter=$_FILES["barcounter"]["name"];
if(substr($wimage,0,3) != "wel" && substr($bimage,0,3) != "bac" && substr($eimage,0,3) != "ent" && substr($cimage,0,3) != "cha" && substr($bgchairs,0,3) != "bgc" && substr($bgsofa,0,3) != "bcs" && substr($tables,0,3) != "tab" && substr($barcounter,0,3) != "bar"){
    $error="please check selected file name are in correct format";
}else{
move_uploaded_file($_FILES["packageimage"]["tmp_name"],"pacakgeimages/".$_FILES["packageimage"]["name"]);
move_uploaded_file($_FILES["welcomesign"]["tmp_name"],"pacakgeimages/".$_FILES["welcomesign"]["name"]);
move_uploaded_file($_FILES["backgroundstage"]["tmp_name"],"pacakgeimages/".$_FILES["backgroundstage"]["name"]);
move_uploaded_file($_FILES["entrancedesign"]["tmp_name"],"pacakgeimages/".$_FILES["entrancedesign"]["name"]);
move_uploaded_file($_FILES["chairimage"]["tmp_name"],"pacakgeimages/".$_FILES["chairimage"]["name"]);
move_uploaded_file($_FILES["bgchair"]["tmp_name"],"pacakgeimages/".$_FILES["bgchair"]["name"]);
move_uploaded_file($_FILES["bgsofa"]["tmp_name"],"pacakgeimages/".$_FILES["bgsofa"]["name"]);
move_uploaded_file($_FILES["tables"]["tmp_name"],"pacakgeimages/".$_FILES["tables"]["name"]);
move_uploaded_file($_FILES["barcounter"]["tmp_name"],"pacakgeimages/".$_FILES["barcounter"]["name"]);


$sql="update TblTourPackages set PackageImage=:pimage, WelcomeImage=:wimage, BackgroundStageImage=:bimage, EntranceImage=:eimage, ChairImage=:cimage, bgchair=:bgchair, bgsofa=:bgsofa, tables=:tables, BarCounter=:barcounter where PackageId=:imgid";
$query = $dbh->prepare($sql);

$query->bindParam(':imgid',$imgid,PDO::PARAM_STR);
$query->bindParam(':pimage',$pimage,PDO::PARAM_STR);
$query->bindParam(':wimage',$wimage,PDO::PARAM_STR);
$query->bindParam(':bimage',$bimage,PDO::PARAM_STR);
$query->bindParam(':eimage',$eimage,PDO::PARAM_STR);
$query->bindParam(':cimage',$cimage,PDO::PARAM_STR);
$query->bindParam(':bgchair',$bgchair,PDO::PARAM_STR);
$query->bindParam(':bgsofa',$bgsofa,PDO::PARAM_STR);
$query->bindParam(':tables',$tables,PDO::PARAM_STR);
$query->bindParam(':barcounter',$barcounter,PDO::PARAM_STR);
$query->execute();
$msg="Package Created Successfully";
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
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Update
                    Package
                    Image </li>
            </ol>
            <!--grid-->
            <div class="grid-form">

                <!---->
                <div class="grid-form1">
                    <h3>Update Package Image </h3>
                    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                    </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                    <div class="tab-content">
                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
                                <?php 
$imgid=intval($_GET['imgid']);
$sql = "SELECT PackageImage, WelcomeImage, BackgroundStageImage,EntranceImage, ChairImage, bgchair, bgsofa, tables, BarCounter from TblTourPackages where PackageId=:imgid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':imgid', $imgid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label"> Package Image </label>
                                    <div class="col-sm-8">
                                        <img src="pacakgeimages/<?php echo htmlentities($result->PackageImage);?>"
                                            width="200">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">New Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" value="" name="packageimage" id="packageimage">
                                    </div>
                                </div>
                                <hr style="border: 1px solid black;">
                                <div class="form-group">
                                    <p style="margin-left:40px;">(first three words of this image must be '<b>wel</b>' )
                                    </p>
                                    <label for="focusedinput" class="col-sm-2 control-label"> Welcome Sign Image
                                    </label>
                                    <div class="col-sm-8">
                                        <img src="pacakgeimages/<?php echo htmlentities($result->WelcomeImage);?>"
                                            width="200">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">New Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="welcomesign" id="welcomesign">
                                    </div>
                                </div>
                                <hr style="border: 1px solid black;">
                                <div class="form-group">
                                    <p style="margin-left:40px;">(first three words of this image must be '<b>bac</b>' )
                                    </p>
                                    <label for="focusedinput" class="col-sm-2 control-label"> Background Stage Image
                                    </label>
                                    <div class="col-sm-8">
                                        <img src="pacakgeimages/<?php echo htmlentities($result->BackgroundStageImage);?>"
                                            width="200">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">New Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="backgroundstage" id="backgroundstage">
                                    </div>
                                </div>
                                <hr style="border: 1px solid black;">
                                <div class="form-group">
                                    <p style="margin-left:40px;">(first three words of this image must be '<b>ent</b>' )
                                    </p>
                                    <label for="focusedinput" class="col-sm-2 control-label"> Entrance Image </label>
                                    <div class="col-sm-8">
                                        <img src="pacakgeimages/<?php echo htmlentities($result->EntranceImage);?>"
                                            width="200">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">New Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="entrancedesign" id="entrancedesign">
                                    </div>
                                </div>
                                <hr style="border: 1px solid black;">
                                <div class="form-group">
                                    <p style="margin-left:40px;">(first three words of this image must be '<b>cha</b>' )
                                    </p>
                                    <label for="focusedinput" class="col-sm-2 control-label"> Chair Image </label>
                                    <div class="col-sm-8">
                                        <img src="pacakgeimages/<?php echo htmlentities($result->ChairImage);?>"
                                            width="200">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">New Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="chairimage" id="chairimage">
                                    </div>
                                </div>
                                <hr style="border: 1px solid black;">
                                <div class="form-group">
                                    <p style="margin-left:40px;">(first three words of this image must be '<b>bgc</b>' )
                                    </p>
                                    <label for="focusedinput" class="col-sm-2 control-label"> Bride-Groom Chair Image
                                    </label>
                                    <div class="col-sm-8">
                                        <img src="pacakgeimages/<?php echo htmlentities($result->bgchair);?>"
                                            width="200">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">New Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="bgchair" id="bgchair">
                                    </div>
                                </div>
                                <hr style="border: 1px solid black;">
                                <div class="form-group">
                                    <p style="margin-left:40px;">(first three words of this image must be '<b>bcs</b>' )
                                    </p>
                                    <label for="focusedinput" class="col-sm-2 control-label"> Bride-Groom Sofa Image
                                    </label>
                                    <div class="col-sm-8">
                                        <img src="pacakgeimages/<?php echo htmlentities($result->bgsofa);?>"
                                            width="200">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">New Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="bgsofa" id="bgsofa">
                                    </div>
                                </div>
                                <hr style="border: 1px solid black;">
                                <div class="form-group">
                                    <p style="margin-left:40px;">(first three words of this image must be '<b>tab</b>' )
                                    </p>
                                    <label for="focusedinput" class="col-sm-2 control-label"> Tables Image </label>
                                    <div class="col-sm-8">
                                        <img src="pacakgeimages/<?php echo htmlentities($result->tables);?>"
                                            width="200">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">New Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="tables" id="tables">
                                    </div>
                                </div>
                                <hr style="border: 1px solid black;">
                                <div class="form-group">
                                    <p style="margin-left:40px;">(first three words of this image must be '<b>bar</b>' )
                                    </p>
                                    <label for="focusedinput" class="col-sm-2 control-label"> BarCounter Image </label>
                                    <div class="col-sm-8">
                                        <img src="pacakgeimages/<?php echo htmlentities($result->BarCounter);?>"
                                            width="200">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">New Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="barcounter" id="barcounter">
                                    </div>
                                </div>
                                <hr style="border: 1px solid black;">
                                <?php }} ?>

                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <button type="submit" name="submit" class="btn-primary btn">Update</button>

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