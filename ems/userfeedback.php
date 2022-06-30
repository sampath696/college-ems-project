<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit1']))
{
$fname=$_POST['fname'];
$feedback=$_POST['feedback'];	
$suggestion=$_POST['suggestion'];
$sql="INSERT INTO feedback(username,feedback,suggestion) VALUES(:fname,:feedback,:suggestion)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':feedback',$feedback,PDO::PARAM_STR);
$query->bindParam(':suggestion',$suggestion,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Thank you for Feedback";
// confirm('Do you really want to remove from cart');
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
        <?php include('includes/header.php');?><br>
        <img style="display:inline;" src="images/feedback.svg" alt="" align="right">
        <div class="privacy" style="margin-top:-60px;" align="left">
            <div class="container">
                <h3 class="wow fadeInDown animated animated" data-wow-delay=".5s"
                    style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Feedback</h3>
                <form name="enquiry" method="post">
                    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                    </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                    <p style="width: 350px;">

                        <b>Full name</b> <input type="text" name="fname" class="form-control" id="fname"
                            placeholder="Full Name" required="">
                    </p>

                    <p style="width: 350px;">
                        <b>rate our service</b>
                    </p>
                    <p>
                        <i onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='black'" class="fa fa-smile-o "
                            style="font-size:100px; color:black;" aria-hidden="true"></i>
                        <i onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='black'" class="fa fa-meh-o "
                            style="font-size:100px; color:black;" aria-hidden="true"></i>
                        <i onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='black'" class="fa fa-frown-o "
                            style="font-size:100px; color:black;" aria-hidden="true"></i>

                    </p>
                    <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="feedback" value="happy" style="width: 30px; height:30px; margin:0px 50px 0px 0px;" name="" id="">
                        <input type="radio" name="feedback" value="avarage" style="width: 30px; height:30px; margin:0px 60px 0px 0px;" name="" id="">
                        <input type="radio" name="feedback" value="sad" style="width: 30px; height:30px; margin:0px 0px 0px 0px;" name="" id="">
                    </p>
                    <p style="width: 350px;">
                        <b>Suggestion</b> <textarea name="suggestion" class="form-control" rows="6" cols="50"
                            id="description" placeholder="Suggestion" required=""></textarea>
                    </p>

                    <p style="width: 350px;">
                        <button type="submit" name="submit1" class="btn-primary btn">Submit</button>
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