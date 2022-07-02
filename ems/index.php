<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>EMS | Event Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="applijewelleryion/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    <!--//end-animate-->
</head>

<body class="banner">
    <div class="page-container">

        <?php include('includes/header.php');?>
        <div class="">
            <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
                <img class="w3-image" src="images/events3.jpg" alt="Architecture" width="1500" height="800">
                <div class="w3-display-middle w3-margin-top w3-center">
                    <h1 class="w3-xxlarge w3-text-white" style="margin-top:-250px;">
                        <span class="w3-padding w3-black w3-opacity-min"><b>SWAGATH</b></span>
                        <!-- <span class="w3-hide-small w3-text-light-grey"><b>SWAGATH</b></span>
                    <span class="w3-padding w3-black w3-opacity-min"><b>Events</b></span> -->
                        <span class="w3-hide-small w3-text-light-grey"><b>Events</b></span>
                    </h1>
                </div>
            </header>
        </div>

        <hr style="border: 1px solid black;">

        <h1 style="color:black; margin-top:-120px;">
            <center>Packages</center>
        </h1>
        <div class="container">

            <?php $sql = "SELECT * from tbltourpackages order by rand() limit 2";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
            <div class="" id="plans">
                <div class="w3-third w3-margin-bottom" style="margin-left:130px;">
                    <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                        <li class="w3-black w3-xlarge w3-padding-32" style="text-transform:capitalize;">
                            <?php echo htmlentities($result->PackageName);?>
                        </li>
                        <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" height="200"
                            width="350" alt="img">

                        <li class="w3-padding-16"><?php echo htmlentities($result->PackageType);?></li>
                        <li class="w3-padding-16"><?php echo htmlentities($result->PackageFetures);?></li>
                        <h2 class="w3-wide">₹ <?php echo htmlentities($result->PackagePrice);?></h2>
                        <span class="w3-opacity">Booking Amount</span>
                        </li>
                        <li class="w3-light-grey w3-padding-24">
                            <a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>"
                                class="w3-button w3-black w3-padding-large">View</a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php }} ?>
        </div><br>
        <center>
            <a href="package-list.php" class="w3-button w3-black w3-padding-large">View All Packages
            </a>
        </center>
        <br>
        <hr style="border: 1px solid black;">
        <!-- <img style="display:inline;" src="images/about.svg" alt="" align="left"> -->
        <div class="w3 w3-container w3-padding-64" id="about">
            <h3 class="w3-center">ABOUT US</h3>
            <p class="w3-center"><em><b>Event Management</b></em></p><br>
            <p style="font-size:17px;">Established in the year 2010, Swagath Decorators in Madikeri, Coorg is a top
                player
                in the category Stage
                Decorators in the Coorg. This well-known establishment acts as a one-stop destination servicing
                customers both local and from other parts of Coorg. Over the course of its journey, this business has
                established a firm foothold in it’s industry. The belief that customer satisfaction is as important as
                their products and services, have helped this establishment garner a vast base of customers, which
                continues to grow by the day. This business employs individuals that are dedicated towards their
                respective roles and put in a lot of effort to achieve the common vision and larger goals of the
                company. In the near future, this business aims to expand its line of products and services and cater to
                a larger client base. In Coorg, this establishment occupies a prominent location in Madikeri. It is an
                effortless task in commuting to this establishment as there are various modes of transport readily
                available. It is at Omkareshwar Temple Road,Chickpet, Near Omkareshwara Temple, which makes it easy for
                first-time visitors in locating this establishment. It is known to provide top service in the following
                categories: Wedding Decorators, Decorators, Mandap Decorators, Birthday Party Decorators, Flower
                Decorators, Interior Decorators, Balloon Decorators, Wedding Planners.</p>
        </div><br>
        <hr style="border: 1px solid black;">
        <br><br><br><br>

        <div class="w3-row-padding w3-grayscale">
            <h3 class="w3-center"><b><i>TESTIMONIALS</i></b></h3><br>
            <h4 class="w3-center">FROM OUR CLIENTS</h4>
            <div class="w3-col m4 w3-margin-bottom">
                <div class="w3-light-grey">
                    <div class="w3-container">
                        <h3>Prerith D'Souza</h3>
                        <p class="w3-opacity"></p>
                        <p>We recieved a lot of compliments from our guests about the decor. Extremely attentive, We
                            needed few last minute changes and it always seemed that lokesh was one step ahead of us,
                            solving to advicing on what would look best.
                        </p>
                    </div>
                </div>
            </div>
            <div class="w3-col m4 w3-margin-bottom">
                <div class="w3-light-grey">
                    <div class="w3-container">
                        <h3>Sunny Joel Paulose</h3>
                        <p class="w3-opacity"></p>
                        <p>One of the best service we received from Swagath events, the event was so beautifully
                            arranged, well equipped and very professional, Thanks to lokesh for well
                            organising the event,
                        </p>
                    </div>
                </div>
            </div>
            <div class="w3-col m4 w3-margin-bottom">
                <div class="w3-light-grey">
                    <div class="w3-container">
                        <h3>Sampath</h3>
                        <p class="w3-opacity"></p>
                        <p>A huge Thanks to lokesh and his Team for doing an amazing setup for my events. The decor was
                            beautiful and received a lot of compliments from all the guests. The team was responsible
                            for getting the setup the way we had planned. Highly recommended. Thanks
                            again.
                        </p>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>
        <hr style="border: 1px solid black;">

        <div class="w3-content w3-container w3-padding-64" id="contact">
            <h3 class="w3-center">CONTACT US</h3>
            <!-- <p class="w3-center"><em>I'd love your feedback!</em></p> -->

            <div class="w3-row w3-padding-32 w3-section">
                <div class="w3-col m4 w3-container">
                    <img src="images/logo.jpeg" class="w3-image w3-round" style="width:100%">
                </div>
                <div class="w3-col m8 w3-panel">
                    <div class="w3-large w3-margin-bottom">
                        <i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Location:
                        Sri Lakshmi complex,<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Omkareshwar Temple
                        Road, Chickpet, Madikeri,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kodagu - 571201<br>
                        <i class="fa fa-whatsapp fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Phone: +91
                        9448066599<br>
                        <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Email:
                        sunnyjoelpaulose@mail.com<br>
                    </div>
                    <!-- <p>Swing by for a cup of <i class="fa fa-coffee"></i>, or leave me a note:</p> -->
                </div>
            </div>
        </div>


        <br><br><br>
        <?php include('includes/footer.php');?>

        <div class="clearfix"></div>
    </div>

    <!-- signup -->
    <?php include('includes/signup.php');?>
    <!-- //signu -->
    <!-- signin -->
    <?php include('includes/signin.php');?>
    <!-- //signin -->
    <!-- write us -->
    <?php include('includes/write-us.php');?>
    <!-- //write us -->
</body>

</html>