<?php

require('config.php');

$host = "localhost";
$username = "root";
$password = "";
$dbname = "ems";
$conn = mysqli_connect($host, $username, $password, $dbname);
session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{

    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $email = $_SESSION['email'];
    $price = $_SESSION['price'];
    $contactno = $_SESSION['contactno'];
    $customername = $_SESSION['user'];
    // echo $contactno;


    $sql = "INSERT INTO orders (order_id, razorpay_payment_id, status, email, user, contactno, price) VALUES ('$razorpay_order_id','$razorpay_payment_id','success','$email', '$customername', '$contactno', '$price')";
if (mysqli_query($conn, $sql)) {
  echo "";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
<?php
//  echo "<script> location.href='../userfeedback.php'; </script>";
//  exit;
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
             ?>
             <a href="../userfeedback.php">Give Feedback</a>
             <?php
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";

             echo $html;
}

echo $html;