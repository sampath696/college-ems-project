<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
{
$pid=intval($_GET['pkgid']);
$useremail=$_SESSION['login'];
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$comment=$_POST['techno'];
$chk="";
foreach($comment as $chk1)  
   {  
      $chk .= $chk1.",";  
   } 
$status=0;
$sql="INSERT INTO tblbooking(PackageId,UserEmail,FromDate,ToDate,Comment,status) VALUES(:pid,:useremail,:fromdate,:todate,:chk,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':chk',$chk,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Added to cart Successfully";
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
    <title>ems | Package Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="applijewelleryion/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>


    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <script>
    new WOW().init();
    </script>
    <script src="js/jquery-ui.js"></script>
    <script>
    $(function() {
        $("#datepicker,#datepicker1").datepicker();
    });
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


    * {
        box-sizing: border-box;
    }

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
    </style>


    </script>
    <script>
    $(document).ready(function() {
        $("#hide").click(function(e) {
            e.preventDefault();
            console.log("hello")
            $(".chrimg").toggle();
        });
    });
    </script>


</head>

<body>
    <!-- top-header -->
    <?php include('includes/header.php');?>
    <div class="banner-3">
        <div class="container">
            <h1 class="wow zoomIn animated animated" data-wow-delay=".5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> ems -Package Details</h1>
        </div>
    </div>
    <!--- /banner ---->
    <!--- selectroom ---->
    <div class="selectroom">
        <div class="container">
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> <a
                    href="cart.php">go to cart</a> </div><?php }?>
            <?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT * from tbltourpackages where PackageId=:pid";
$query = $dbh->prepare($sql);
$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

            <form name="book" method="post">
                <div class="selectroom_top">
                    <div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
                        <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>"
                            class="img-responsive" alt="">
                    </div>
                    <div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
                        <h2><?php echo htmlentities($result->PackageName);?></h2>
                        <p class="dow">#PKG-<?php echo htmlentities($result->PackageId);?></p>
                        <p><b>Package Type :</b> <?php echo htmlentities($result->PackageType);?></p>
                        <p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
                        <p><b>Features</b> <?php echo htmlentities($result->PackageFetures);?></p>
                        <div class="ban-bottom">
                            <div class="bnr-right">
                                <label class="inputLabel">From</label>
                                <input class="date" id="datepicker" type="text" placeholder="dd-mm-yyyy" name="fromdate"
                                    required="">
                            </div>
                            <div class="bnr-right">
                                <label class="inputLabel">To</label>
                                <input class="date" id="datepicker1" type="text" placeholder="dd-mm-yyyy" name="todate"
                                    required="">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="grand">
                            <p>Grand Total</p>
                            <h3>USD.800</h3>
                        </div>
                    </div>
                    <h3>Package Details</h3>
                    <p style="padding-top: 1%"><?php echo htmlentities($result->PackageDetails);?> </p>
                    <div class="clearfix"></div>
                </div>

            


            <div class="selectroom_top">




                <h2>Event Decor Items and normal items</h2>
                <div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms"
                    data-wow-delay="500ms"
                    style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">


                    <br><br><br><br><br>


                    <button id="hide" class="chrimg2" style="color: white;background-color:black;" > Chair images </button>
                    <div  style="display: none;" class="chrimg" >

                        <?php 
$sql = "SELECT * from chairimgs";
$query = $dbh->prepare($sql);
$query->execute();
$results1=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results1 as $result1)
{	?>


                        <!-- <select name="techno[]" id="">

        <option value="<?php echo htmlentities($result1->images);?>">
            <?php echo htmlentities($result1->images);?>
        </option>
        </select> -->

                        <img style="width: 300px; "
                            src="admin/pacakgeimages/<?php echo htmlentities($result1->images);?>" class="img_item"
                            alt="">
                        <input type="checkbox" name="techno[]" value="<?php echo htmlentities($result1->images);?>">

                        <?php
}}?>
                    </div>

<br>

                    <select name="techno[]" id="">

                        <?php 
$sql = "SELECT * from chairimgs";
$query = $dbh->prepare($sql);
$query->execute();
$results1=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results1 as $result1)
{	?>



                        <option value="<?php echo htmlentities($result1->images);?>">
                            <?php echo htmlentities($result1->images);?>
                        </option>

                        <!-- <img style="width: 300px; "
            src="admin/pacakgeimages/<?php echo htmlentities($result1->images);?>" class="img_item"
            alt=""> -->
                        <!-- <a name="techno[]" value="<?php echo htmlentities($result1->images);?>"> -->
                        <!-- package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>,img=<?php echo htmlentities($result1->images);?> -->
                        <!-- <img style="width: 300px; "
            src="admin/pacakgeimages/<?php echo htmlentities($result1->images);?>" class="img_item"
            alt="">
    </a> -->

                        <?php
}}?>
                    </select>


                    <ul>

                        <li class="spe">
                            <label class="inputLabel">Comment</label>
                            <!-- <input class="special" type="text" name="comment" required=""> -->
                            <table border="1">
                                <tr>
                                    <td colspan="2">Event Items:</td>
                                </tr>
                                <tr>
                                    <td>PHP</td>
                                    <td><input type="checkbox" checked name="techno[]" value="PHP"></td>
                                </tr>
                                <tr>
                                    <td>.Net</td>
                                    <td><input type="checkbox" checked name="techno[]" value=".Net"></td>
                                </tr>
                                <tr>
                                    <td>Java</td>
                                    <td><input type="checkbox" checked name="techno[]" value="Java"></td>
                                </tr>
                                <tr>
                                    <td>Javascript</td>
                                    <td><input type="checkbox" checked name="techno[]" value="javascript"></td>
                                </tr>
                            </table>
                        </li>


                        <?php if($_SESSION['login'])
{?>
                        <li class="spe" align="center">
                            <button type="submit" name="submit2" class="btn-primary btn">Add to Cart</button>
                        </li>
                        <?php } else {?>
                        <li class="sigi" align="center" style="margin-top: 1%">
                            <a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn">
                                Book</a>
                        </li>
                        <?php } ?>






                        <?php if($result->PackageId == 1)
{?>
                        <!-- <li class="spe" align="center">
            <button type="submit" name="submit2" class="btn-primary btn">Manali trip</button>
        </li> -->
                        <?php } else if($result->PackageId == 4) {?>
                        <!-- <li class="sigi" align="center" style="margin-top: 1%">
            <a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn">
                kerla trip</a>
        </li> -->
                        <?php } else{?>
                        <!-- <li class="sigi" align="center" style="margin-top: 1%">
            <a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn">
                Coorg trip</a>
        </li> -->
                        <?php }  ?>






                        <div class="clearfix"></div>
                    </ul>

                </div>

            </div>


            <?php }} ?>

            </form>


        </div>
    </div>







    <!--- /selectroom ---->
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