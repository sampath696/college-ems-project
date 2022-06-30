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
$comment2=$_POST['techno2'];
$chk="";
$chk22="";
foreach($comment as $chk1)  
   {  
      $chk .= $chk1.",";  
   } 
foreach($comment2 as $chk2)  
   {  
      $chk22 .= $chk2.",";  
   } 
$status=0;
$sql="INSERT INTO tblbooking(PackageId,UserEmail,FromDate,ToDate,Comment,Comment2,status) VALUES(:pid,:useremail,:fromdate,:todate,:chk,:chk22,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':chk',$chk,PDO::PARAM_STR);
$query->bindParam(':chk22',$chk22,PDO::PARAM_STR);
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

    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
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
    <!-- <link href="css/animate.css" rel="stylesheet" type="text/css" media="all"> -->
    <script src="js/wow.min.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <script>
    new WOW().init();
    </script>
    <script src="js/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $(function() {
        $("#datepicker").datepicker();
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

    #checkbox {
        opacity: 80%;
    }



    .sidenav {
        width: 130px;
        position: fixed;
        z-index: 1;
        top: 150px;
        left: 10px;
        background: #eee;
        padding: 8px 0;
    }

    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 15px;
        color: #2196F3;
        display: block;
    }

    .sidenav a:hover {
        color: #064579;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
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
        $("#hide2").click(function(e) {
            e.preventDefault();
            console.log("welcome")
            $(".welcome").toggle();
        });
        $("#hide3").click(function(e) {
            e.preventDefault();
            console.log("bckstg")
            $(".bckstg").toggle();
        });
        $("#hide4").click(function(e) {
            e.preventDefault();
            console.log("bckstg")
            $(".entrance").toggle();
        });
        $("#hide5").click(function(e) {
            e.preventDefault();
            console.log("barcounter")
            $(".barcounter").toggle();
        });
    });
    </script>


</head>

<body>
    <!-- top-header -->
    <?php include('includes/header.php');?>



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
{	
        ?>
        <h1>
            <center>EMS-Package Details</center>
        </h1>

            <div class="sidenav">
                <a href="#date">select date</a><br>
                <a href="#decr">decor items</a><br>
                <a href="#welcome">select welcome sign</a><br>
                <a href="#bck">select background stage</a><br>
                <a href="#entrance">select entrance image</a><br>
                <a href="#chair">select chairs</a><br>
            </div>
            <form name="book" method="post">
                <div class="selectroom_top" id="date">
                    <div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
                        <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>"
                            class="img-responsive" alt="">
                    </div>
                    <div class="col-md-8 selectroom_right" data-wow-delay=".5s">
                        <h2><?php echo htmlentities($result->PackageName);?></h2><br>
                        <!-- <p class="dow">#PKG-<?php echo htmlentities($result->PackageId);?></p> -->
                        <p><b>Package Type :</b> <?php echo htmlentities($result->PackageType);?></p><br>
                        <p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation);?></p><br>
                        <p><b>Features</b> <?php echo htmlentities($result->PackageFetures);?></p>
                        <div class="ban-bottom">
                            <div class="bnr-right">
                                Select Your Event Date: <input type="date" id="date-picker" name="fromdate" required>
                                <script language="javascript">
                                var today = new Date();
                                var dd = String(today.getDate()).padStart(2, '0');
                                var mm = String(today.getMonth() + 1).padStart(2, '0');
                                var yyyy = today.getFullYear();

                                today = yyyy + '-' + mm + '-' + dd;
                                $('#date-picker').attr('min', today);
                                </script>
                                <!-- <input class="date" id="datepicker" type="text" placeholder="dd-mm-yyyy" name="fromdate"
                                    required=""> -->
                            </div>
                        </div>
                    </div>
                    <h3>Package Details</h3>
                    <p style="padding-top: 1%"><?php echo htmlentities($result->PackageDetails);?> </p>
                    <div class="clearfix"></div>
                </div>


                <div class="selectroom_top">




                    <h2 id="decr">Event Decor Common Items</h2>

                    <br><br><br>
                    <table class="table table-dark">
                        <thead class="">
                            <tr>
                                <td colspan="2">Event Items:</td>
                            </tr>
                        </thead>
                        <tbody>
                            <input type="hidden" checked name="techno2[]" value="No of chairs:">
                            <tr>
                                <td>No Of Chairs</td>
                                <td><input type="number" checked name="techno2[]" value="0">
                                </td>
                            </tr>
                            <input type="hidden" checked name="techno2[]" value="No of tables:">
                            <tr>
                                <td>No Of Table</td>
                                <td><input type="number" checked name="techno2[]" value="0">
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <div class="row">
                        <div class="column">
                            <h3>Sounds-Dj</h3>
                            <img src="admin/pacakgeimages/dj.jpg" alt="Snow" style="width:100%">
                            <input type="checkbox" id="checkbox"
                                style="position:absolute; width: 30px; height:30px; margin:0px 0px 0px -30px;"
                                name="techno2[]" value="Sounds-DJ required">
                        </div>
                        <div class="column">
                            <h3>Lightings</h3>
                            <img src="admin/pacakgeimages/lightings.jpg" alt="Forest" style="width:100%">
                            <input type="checkbox" id="checkbox"
                                style="position:absolute; width: 30px; height:30px; margin:0px 0px 0px -30px;"
                                name="techno2[]" value="Lightings required">
                        </div>
                        <div class="column">
                            <h3>Generators</h3>
                            <img src="admin/pacakgeimages/ups.jpg" alt="Mountains" style="width:100%">
                            <input type="checkbox" id="checkbox"
                                style="position:absolute; width: 30px; height:30px; margin:0px 0px 0px -30px;"
                                name="techno2[]" value="Generators required">
                        </div>
                        <div class="column">
                            <h3>PhotoGrapher</h3>
                            <img src="admin/pacakgeimages/photography.jpeg" alt="Forest" style="width:100%">
                            <input type="checkbox" id="checkbox"
                                style="position:absolute; width: 30px; height:30px; margin:0px 0px 0px -30px;"
                                name="techno2[]" value="Photographer required">
                        </div>
                        <div class="column">
                            <h3>Catering</h3>
                            <img src="admin/pacakgeimages/cater.jpg" alt="Mountains" style="width:100%">
                            <input type="checkbox" id="checkbox"
                                style="position:absolute; width: 30px; height:30px; margin:0px 0px 0px -30px;"
                                name="techno2[]" value="catering selected">
                        </div>
                    </div>


                    <br><br><br><br><br><br>
                    <!-- <button id="clck"> <img src="images/1.jpg" widht=200 height=100 alt="img"> </button> -->

                    <div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms"
                        data-wow-delay="500ms"
                        style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">







                        <hr style="border: 1px solid black;">

                        <!-- welcome sign -->



                        <?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT WelcomeImage from tbltourpackages where PackageId=$pid";
$query = $dbh->prepare($sql);
$query->execute();
$results1=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
?>


                        <?php
foreach($results1 as $result1)
{
    
    if($result1->WelcomeImage == "" ){
        echo "";
    }else{	?>
                        <div>

                            <h1 id="welcome">Selected Welcome Sign</h1>
                            <img style="width: 300px; height:300px; margin: 0px 20px 20px 20px; "
                                src="admin/pacakgeimages/<?php echo htmlentities($result1->WelcomeImage);?>"
                                class="img_item" alt="">
                            <input type="checkbox" id="checkbox" checked
                                style="position:absolute; width: 30px; height:30px; margin:0px 0px 0px -50px;"
                                name="techno[]" value="<?php echo htmlentities($result1->WelcomeImage);?>">


                            <?php
}}}

if($result1->WelcomeImage == "" ){
    echo "";
}else{
?>


                            <button id="hide2"
                                style="color: white;background-color:black; width:50%; height:50px;">change
                                Welcome Sign
                                images </button>


                            <div style="display: none;" class="welcome">
                                <?php 
$sql = "SELECT images from welcomeimage ";
$query = $dbh->prepare($sql);
$query->execute();
$results1=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
?>

                                <?php
foreach($results1 as $result1)
{	?>

                                <img style="width: 300px; height:160px; margin: 20px 20px 20px 20px; "
                                    src="admin/pacakgeimages/<?php echo htmlentities($result1->images);?>"
                                    class="img_item" alt="">
                                <input type="checkbox" id="checkbox"
                                    style="position:absolute; width: 30px; height: 30px; margin:20px 0px 0px -52px;"
                                    name="techno[]" value="<?php echo htmlentities($result1->images);?>">


                                <?php
}}?>





                            </div>
                        </div>

                        <br>

                        <hr style="border: 1px solid black;">
                        <?php } ?>
                        <!-- background image -->


                        <?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT BackgroundStageImage from tbltourpackages where PackageId=$pid";
$query = $dbh->prepare($sql);
$query->execute();
$results1=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{

foreach($results1 as $result1)
{	
    if($result1->BackgroundStageImage == "" ){
        echo "";
    }else{
    
    ?>
                        <div>

                            <h1 id="bck">Selected Background Image</h1>

                            <img style="width: 300px; margin: 0px 20px 20px 20px; "
                                src="admin/pacakgeimages/<?php echo htmlentities($result1->BackgroundStageImage);?>"
                                class="img_item" alt="">
                            <input type="checkbox" id="checkbox" checked
                                style="position:absolute; width: 30px; height:30px; margin:0px 0px 0px -50px;"
                                name="techno[]" value="<?php echo htmlentities($result1->BackgroundStageImage);?>">


                            <?php
}}}

if($result1->BackgroundStageImage == "" ){
        echo "";
    }else{
    ?>
                            <button id="hide3"
                                style="color: white;background-color:black; width:50%; height:50px;">change
                                Background Stage
                                images </button>


                            <div style="display: none;" class="bckstg">
                                <?php 
$sql = "SELECT images from bckstageimage ";
$query = $dbh->prepare($sql);
$query->execute();
$results1=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
?>

                                <?php
foreach($results1 as $result1)
{	?>

                                <img style="width: 300px; height:160px; margin: 20px 20px 20px 20px; "
                                    src="admin/pacakgeimages/<?php echo htmlentities($result1->images);?>"
                                    class="img_item" alt="">
                                <input type="checkbox" id="checkbox"
                                    style="position:absolute; width: 30px; height: 30px; margin:20px 0px 0px -52px;"
                                    name="techno[]" value="<?php echo htmlentities($result1->images);?>">


                                <?php
}}?>





                            </div>
                        </div>

                        <br>

                        <hr style="border: 1px solid black;">
                        <?php }?>

                        <!-- entrance image -->


                        <?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT EntranceImage from tbltourpackages where PackageId=$pid";
$query = $dbh->prepare($sql);
$query->execute();
$results1=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
?>


                        <?php
foreach($results1 as $result1)
{
    if($result1->EntranceImage == "" ){
        echo "";
    }else{
    
    ?>
                        <div>

                            <h1 id="entrance">Selected Entrance Image</h1>

                            <img style="width: 300px; margin: 0px 20px 20px 20px; "
                                src="admin/pacakgeimages/<?php echo htmlentities($result1->EntranceImage);?>"
                                class="img_item" alt="">
                            <input type="checkbox" id="checkbox" checked
                                style="position:absolute; width: 30px; height:30px; margin:0px 0px 0px -50px;"
                                name="techno[]" value="<?php echo htmlentities($result1->EntranceImage);?>">


                            <?php
}}}
if($result1->EntranceImage == "" ){
    echo "";
}else{
?>


                            <button id="hide4"
                                style="color: white;background-color:black; width:50%; height:50px;">change
                                Entrance
                                images </button>


                            <div style="display: none;" class="entrance">
                                <?php 
$sql = "SELECT images from entranceimage ";
$query = $dbh->prepare($sql);
$query->execute();
$results1=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
?>

                                <?php
foreach($results1 as $result1)
{	?>

                                <img style="width: 300px; height:160px; margin: 20px 20px 20px 20px; "
                                    src="admin/pacakgeimages/<?php echo htmlentities($result1->images);?>"
                                    class="img_item" alt="">
                                <input type="checkbox" id="checkbox"
                                    style="position:absolute; width: 30px; height: 30px; margin:20px 0px 0px -52px;"
                                    name="techno[]" value="<?php echo htmlentities($result1->images);?>">


                                <?php
}}?>





                            </div>
                        </div>

                        <br>
                        <hr style="border: 1px solid black;">
                        <?php } ?>

                        <!-- chair part -->





                        <?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT ChairImage from tbltourpackages where PackageId=$pid";
$query = $dbh->prepare($sql);
$query->execute();
$results1=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
?>


                        <?php
foreach($results1 as $result1)
{
    if($result1->ChairImage == "" ){
        echo "";
    }else{
    	?>
                        <div>

                            <h1 id="chair">Selected Normal Chairs</h1>

                            <img style="width: 300px; margin: 0px 20px 20px 20px; "
                                src="admin/pacakgeimages/<?php echo htmlentities($result1->ChairImage );?>"
                                class="img_item" alt="">
                            <input type="checkbox" id="checkbox" checked
                                style="position:absolute; width: 30px; height:30px; margin:0px 0px 0px -50px;"
                                name="techno[]" value="<?php echo htmlentities($result1->ChairImage);?>">


                            <?php
}}}


if($result1->ChairImage == "" ){
    echo "";
}else{
    ?>


                            <button id="hide"
                                style="color: white;background-color:black; width:50%; height:50px;">change
                                Chair
                                images </button>


                            <div style="display: none;" class="chrimg">
                                <?php 
$sql = "SELECT images from chairimgs ";
$query = $dbh->prepare($sql);
$query->execute();
$results1=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
?>

                                <?php
foreach($results1 as $result1)
{	?>

                                <img style="width: 300px; height:160px; margin: 20px 20px 20px 20px; "
                                    src="admin/pacakgeimages/<?php echo htmlentities($result1->images );?>"
                                    class="img_item" alt="">
                                <input type="checkbox" id="checkbox"
                                    style="position:absolute; width: 30px; height: 30px; margin:20px 0px 0px -52px;"
                                    name="techno[]" value="<?php echo htmlentities($result1->images);?>">


                                <?php
}}?>





                            </div>
                        </div>




                        <hr style="border: 1px solid black;">

                        <?php } ?>



                        <?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT BarCounter from tbltourpackages where PackageId=$pid";
$query = $dbh->prepare($sql);
$query->execute();
$results1=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
?>


                        <?php
foreach($results1 as $result1)
{
    if($result1->BarCounter == "" ){
        echo "";
    }else{
    	?>
                        <div>

                            <h1 id="chair">Selected Normal Chairs</h1>

                            <img style="width: 300px; margin: 0px 20px 20px 20px; "
                                src="admin/pacakgeimages/<?php echo htmlentities($result1->BarCounter );?>"
                                class="img_item" alt="">
                            <input type="checkbox" id="checkbox" checked
                                style="position:absolute; width: 30px; height:30px; margin:0px 0px 0px -50px;"
                                name="techno[]" value="<?php echo htmlentities($result1->BarCounter);?>">


                            <?php
}}}


if($result1->BarCounter == "" ){
    echo "";
}else{
    ?>


                            <button id="hide5"
                                style="color: white;background-color:black; width:50%; height:50px;">change
                                Bar Counter
                                images </button>


                            <div style="display: none;" class="barcounter">
                                <?php 
$sql = "SELECT images from barcounter ";
$query = $dbh->prepare($sql);
$query->execute();
$results1=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
?>

                                <?php
foreach($results1 as $result1)
{	?>

                                <img style="width: 300px; height:160px; margin: 20px 20px 20px 20px; "
                                    src="admin/pacakgeimages/<?php echo htmlentities($result1->images );?>"
                                    class="img_item" alt="">
                                <input type="checkbox" id="checkbox"
                                    style="position:absolute; width: 30px; height: 30px; margin:20px 0px 0px -52px;"
                                    name="techno[]" value="<?php echo htmlentities($result1->images);?>">


                                <?php
}}?>





                            </div>
                        </div>




                        <hr style="border: 1px solid black;">

                        <?php } ?>







                        <ul>


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


                            <div class="clearfix"></div>
                        </ul>

                    </div>
                </div>

            </form>

            <?php
     }} ?>




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
    <!-- morris JavaScript -->
    <script src="js/raphael-min.js"></script>
    <script src="js/morris.js"></script>
    <script>
    $(document).ready(function() {
        //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function() {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function() {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function() {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }

        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth: true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity: 0.85,
            data: [{
                    period: '2014 Q1',
                    iphone: 2668,
                    ipad: null,
                    itouch: 2649
                },
                {
                    period: '2014 Q2',
                    iphone: 15780,
                    ipad: 13799,
                    itouch: 12051
                },
                {
                    period: '2014 Q3',
                    iphone: 12920,
                    ipad: 10975,
                    itouch: 9910
                },
                {
                    period: '2014 Q4',
                    iphone: 8770,
                    ipad: 6600,
                    itouch: 6695
                },
                {
                    period: '2015 Q1',
                    iphone: 10820,
                    ipad: 10924,
                    itouch: 12300
                },
                {
                    period: '2015 Q2',
                    iphone: 9680,
                    ipad: 9010,
                    itouch: 7891
                },
                {
                    period: '2015 Q3',
                    iphone: 4830,
                    ipad: 3805,
                    itouch: 1598
                },
                {
                    period: '2015 Q4',
                    iphone: 15083,
                    ipad: 8977,
                    itouch: 5185
                },
                {
                    period: '2016 Q1',
                    iphone: 10697,
                    ipad: 4470,
                    itouch: 2038
                },
                {
                    period: '2016 Q2',
                    iphone: 8442,
                    ipad: 5723,
                    itouch: 1801
                }
            ],
            lineColors: ['#ff4a43', '#a2d200', '#22beef'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });


    });
    </script>



</body>

</html>