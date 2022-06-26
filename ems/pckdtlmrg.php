
  
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
    if($result->PackageName == "marriage Function" ){
        ?>


            <form name="book" method="post">
                <div class="selectroom_top" id="date">
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




                    <h2 id="decr">Event Decor Items and normal items</h2>


                    <table class="table table-dark">
                        <thead class="">
                            <tr>
                                <td colspan="2">Event Items:</td>
                            </tr>
                        </thead>
                        <tbody>
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
                                <td><input type="checkbox" checked name="techno[]" value="javascript">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br><br>




                    <!-- <button id="clck"> <img src="images/1.jpg" widht=200 height=100 alt="img"> </button> -->

                    <div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms"
                        data-wow-delay="500ms"
                        style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">



                        <!-- welcome sign -->
                        <div>

                            <h1 id="about">Selected Welcome Sign</h1>


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
{	?>

                            <img style="width: 300px; margin: 0px 20px 20px 20px; "
                                src="admin/pacakgeimages/<?php echo htmlentities($result1->WelcomeImage);?>"
                                class="img_item" alt="">
                            <input type="checkbox" id="checkbox" checked
                                style="position:absolute; width: 30px; height:30px; margin:0px 0px 0px -50px;"
                                name="techno[]" value="<?php echo htmlentities($result1->WelcomeImage);?>">


                            <?php
}}?>


                            <button id="hide2"
                                style="color: white;background-color:black; width:100%; height:50px;">change
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



                        <!-- background image -->
                        <div>

                            <h1 id="about">Selected Background Image</h1>


                            <?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT BackgroundStageImage from tbltourpackages where PackageId=$pid";
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

                            <img style="width: 300px; margin: 0px 20px 20px 20px; "
                                src="admin/pacakgeimages/<?php echo htmlentities($result1->BackgroundStageImage);?>"
                                class="img_item" alt="">
                            <input type="checkbox" id="checkbox" checked
                                style="position:absolute; width: 30px; height:30px; margin:0px 0px 0px -50px;"
                                name="techno[]" value="<?php echo htmlentities($result1->BackgroundStageImage);?>">


                            <?php
}}?>


                            <button id="hide3"
                                style="color: white;background-color:black; width:100%; height:50px;">change
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



                        <!-- background image -->
                        <div>

                            <h1 id="about">Selected Entrance Image</h1>


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
{	?>

                            <img style="width: 300px; margin: 0px 20px 20px 20px; "
                                src="admin/pacakgeimages/<?php echo htmlentities($result1->EntranceImage);?>"
                                class="img_item" alt="">
                            <input type="checkbox" id="checkbox" checked
                                style="position:absolute; width: 30px; height:30px; margin:0px 0px 0px -50px;"
                                name="techno[]" value="<?php echo htmlentities($result1->EntranceImage);?>">


                            <?php
}}?>


                            <button id="hide4"
                                style="color: white;background-color:black; width:100%; height:50px;">change
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



                        <!-- chair part -->



                        <div>

                            <h1 id="about">Selected Normal Chairs</h1>


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
{	?>

                            <img style="width: 300px; margin: 0px 20px 20px 20px; "
                                src="admin/pacakgeimages/<?php echo htmlentities($result1->ChairImage );?>"
                                class="img_item" alt="">
                            <input type="checkbox" id="checkbox" checked
                                style="position:absolute; width: 30px; height:30px; margin:0px 0px 0px -50px;"
                                name="techno[]" value="<?php echo htmlentities($result1->ChairImage);?>">


                            <?php
}}?>


                            <button id="hide"
                                style="color: white;background-color:black; width:100%; height:50px;">change
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
    } }} ?>



