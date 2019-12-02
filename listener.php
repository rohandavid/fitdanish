<?php
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require ('vendor/autoload.php');
$mail = new PHPMailer();

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
	header('Location: payment.php');
	exit();
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "cmd=_notify-validate&" . http_build_query($_POST));
$response = curl_exec($ch);
curl_close($ch);


if ($response == "VERIFIED" && $_POST['receiver_email'] == "danishfit07@gmail.com") {
	$name = $_POST['first_name'] . " " . $_POST['last_name'];
	$price = $_POST['mc_gross'];
	$currency = $_POST['mc_currency'];
	$item = $_POST['item_name'];
	$cmail = $_POST['payer_email'];
	$payment_status = $_POST['payment_status'];
	$payer_status = $_POST['payer_status'];

	if ($payment_status == "Completed" && $payer_status == "verified") {
//		file_put_contents("test.txt", 'All verified!');

			$mail->isSMTP();                                      // Set mailer to use SMTP
                  $mail->Host = 'cp-ht-8.webhostbox.net';  // Specify main and backup SMTP servers
                  $mail->SMTPAuth = true;                               // Enable SMTP authentication
                  $mail->Username = 'clientinfo@danishfit.com';                 // SMTP username
                  $mail->Password = 'Rohan@123';                           // SMTP password
                  $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                  $mail->Port = 465;                                    // TCP port to connect to

                  //Recipients
                  $mail->setFrom('clientinfo@danishfit.com', 'Payment Details');
                  $mail->addAddress('abhisheksagar2510@gmail.com', 'Abhishek');     // Add a recipient

                  //Content
                  $mail->isHTML(true);                                  // Set email format to HTML
                  $mail->Subject = 'Payment Details';
                  $mail->Body    = 'All donee!!';
                  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';  
                if($mail->send())
                {
                    // Confirm success with the user  
                   // header("Location: ./payment.php");  
            		file_put_contents("test.txt", 'All verified!');

                }
                else {
                	$mail->isSMTP();                                      // Set mailer to use SMTP
                  $mail->Host = 'cp-ht-8.webhostbox.net';  // Specify main and backup SMTP servers
                  $mail->SMTPAuth = true;                               // Enable SMTP authentication
                  $mail->Username = 'clientinfo@danishfit.com';                 // SMTP username
                  $mail->Password = 'Rohan@123';                           // SMTP password
                  $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                  $mail->Port = 465;                                    // TCP port to connect to

                  //Recipients
                  $mail->setFrom('clientinfo@danishfit.com', 'CLIENT INFO');
                  $mail->addAddress('abhisheksagar2510@gmail.com', 'Abhishek');     // Add a recipient

                  //Content
                  $mail->isHTML(true);                                  // Set email format to HTML
                  $mail->Subject = 'Payment Details';
                  $mail->Body    = 'Ho gaya kya?';
                  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';  
                if($mail->send())
                {
                    // Confirm success with the user  
                   // header("Location: ./payment.php");  
            		file_put_contents("test.txt", 'All verified!');

                }
                }
	}
}
?>