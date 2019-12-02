<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require ('vendor/autoload.php');
$mail = new PHPMailer();

//connecting to db
    $dbc =  mysqli_connect("localhost","danistcm_abhi264","Rohan@123") or die("No connection");
      mysqli_select_db($dbc, "danistcm_danish-fit") or die("No DB");


     
      if (isset($_POST['submit'])) {
        // Grab the profile data from the POST
        $fname = mysqli_real_escape_string($dbc, trim($_POST['fname']));
        $age = mysqli_real_escape_string($dbc, trim($_POST['age']));
        $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
        $gender = mysqli_real_escape_string($dbc, trim($_POST['gender']));
        $country = mysqli_real_escape_string($dbc, trim($_POST['country']));
        $height = mysqli_real_escape_string($dbc, trim($_POST['height']));
        $weight = mysqli_real_escape_string($dbc, trim($_POST['weight']));
        $desired_goal = mysqli_real_escape_string($dbc, trim($_POST['dgoal']));
        $body_type = mysqli_real_escape_string($dbc, trim($_POST['btype']));
        $Any_Injury = mysqli_real_escape_string($dbc, trim($_POST['ainj']));
        $Alergies = mysqli_real_escape_string($dbc, trim($_POST['alergies']));
        $train_capacity = mysqli_real_escape_string($dbc, trim($_POST['hlong']));
        $time_to_train = mysqli_real_escape_string($dbc, trim($_POST['ttrain']));
        $usupls = mysqli_real_escape_string($dbc, trim($_POST['usupls']));
        $plan_type = 'combo';

        if (!empty($fname) && !empty($email) && !empty($Any_Injury)) {

          // Retrieve the user data from MySQL
            $query = mysqli_query($dbc, "SELECT `E-mail` FROM `personal information` WHERE `E-mail`='$email'") or die("chod mach gyi");
            if(mysqli_num_rows($query)==0) {

              //data is validated ready to enter
                $query = mysqli_query($dbc, "INSERT INTO `personal information`(`Full_Name`, `age`, `E-mail`, `gender`, `country`, `Height`, `Weight`, `Desired_Goal`, `Body_Type`, `Any_Injury`, `Alergies`, `Training_Capacity`, `Time_To_Train`, `Can_Use_Supplements`, `Plan_Type`) VALUES ('$fname',$age,'$email','$gender','$country','$height','$weight','$desired_goal','$body_type','$Any_Injury','$Alergies','$train_capacity','$time_to_train','$usupls','$plan_type');")or die("chud gya tu");

              //preparing message body
              $body = 'USER NAME: ' .$fname . '<br> AGE: ' .$age . '<br> E-MAIL: ' .$email. '<br> GENDER: ' .$gender .'<br> COUNRTY: ' .$country. '<br> HEIGHT: ' .$height. '<br> 
               WEIGHT: ' .$weight. '<br> DESIRED_GOAL: ' .$desired_goal. '<br> BODY TYPE: ' .$body_type. 
               '<br> DO YOU HAVE ANY INJURY OR ILLNESS: ' .$Any_Injury. '<br> ARE YOU ALLERGIC TO ANY FOOD: ' .$Alergies.
               '<br> HOW LONG CAN YOU TRAIN IN A DAY: ' .$train_capacity. '<br> MENTION BEST TIME FOR YOU TO TRAIN: ' .$time_to_train. '<br> DO YOU WISH TO USE SUPPLEMENTS: ' .$usupls. '<br> PLAN TYPE: ' .$plan_type;


                  $mail->isSMTP();                                      // Set mailer to use SMTP
                  $mail->Host = 'cp-ht-8.webhostbox.net';  // Specify main and backup SMTP servers
                  $mail->SMTPAuth = true;                               // Enable SMTP authentication
                  $mail->Username = 'clientinfo@danishfit.com';                 // SMTP username
                  $mail->Password = 'Rohan@123';                           // SMTP password
                  $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                  $mail->Port = 465;                                    // TCP port to connect to

                  //Recipients
                  $mail->setFrom('clientinfo@danishfit.com', 'CLIENT INFO');
                  $mail->addAddress('rohan.davidrocks@gmail.com', 'Rohan');     // Add a recipient

                  //Content
                  $mail->isHTML(true);                                  // Set email format to HTML
                  $mail->Subject = 'New Client';
                  $mail->Body    = $body;
                  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';  
                if($mail->send())
                {
                    // Confirm success with the user  
                    header("Location: ./payment.php");  
                }
        mysqli_close($dbc);
        exit();
            }
          }     
        }
      ?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/combo.css">
        <link rel="stylesheet" href="CSS/ionicons.min.css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300,400,800" rel="stylesheet">
                <title>Train with Danish |Customized meal plans and work-out plans</title>
    </head>

    <body class="body" >

            <div class="row">

    
                    <nav>
                            
                            <ul class="main-nav">
                             <li> <a href="index.php">home</a></li> 
                        <li> <a href="training.php">Training</a></li>
                        <li> <a href="about.php">about</a></li>   
                    
                        <li> <a href="gallery.php">Gallery</a></li>
                        <li> <a href="slide-show2.php">Gym-partners</a></li>   
                        <li> <a href="slide-show1.php">Happy-clients</a></li>    
                            </ul>                       
                            </nav>
            
            </div>

        <div class="form-heading">
            <h1>Please fill the form below</h1>
        </div>
   

        <div class="row row-main">
           <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

          
                <div class="row row1">
                        <div class="col-1-of-2 test1">
                           
                                <div class="box1">
                                        <div class="row-sub">
                                                <label class="text" > NAME</label>
                                        </div>
                                        <div class="row-sub">
                                                <INPUT type="text" name="fname" required id="name"></INPUT>
                                        </div>
    
                                </div>                       
                         
                        </div>
                
                        <div class="col-1-of-2 test2">
                
                                <div class="box1">
                                        <div class="row-sub">
                                                <label class="text" > AGE</label>
                                        </div>
                                        <div class="row-sub">
                                                <INPUT type="number" name="age" required id="AGE"></INPUT>
                                        </div>
    
                                </div>
                          
                            
                        </div>
                
                </div>
                
                       <div class="row row2">
                        
                        <div class="col-2-of-3">
                        
                                <div class="box1">
                                        <div class="row-sub">
                                                <label class="text" >EMAIL</label>
                                        </div>
                                        <div class="row-sub">
                                                <INPUT type="email" name="email" required id="name"></INPUT>
                                        </div>
    
                                </div>                       
                         

                        </div>
                        
                        <div class="col-1-of-3">
                              
                                <div class="box1">
                                        <div class="row-sub">
                                                <label class="text" > GENDER</label>
                                        </div>
                                        <div class="row-sub">
                                              <i class="ion-man icon"></i>
                                              <INPUT type="radio" name="gender" id="gender" value="male" required ></INPUT>
                                              <i class="ion-woman icon"></i>
                                              <INPUT type="radio" name="gender" id="gender" value="female" required ></INPUT>
                                        </div>
    
                                </div>                       
                         
              
                         </div>
                
                  </div>

                  <div class="row row3">
                        <div class="row-sub">
                                <label class="text" >COUNTRY</label>
                        </div>
                        <div class="row-sub">
                                <INPUT type="text" name="country" required id="country"></INPUT>
                        </div>
                  </div>
                     
                   <div class="row row4">
                               
                        <div class="col-1-of-2 ">
                           
                                <div class="box1">
                                        <div class="row-sub">
                                                <label class="text" > HEIGHT</label>
                                        </div>
                                        <div class="row-sub">
                                                <INPUT type="text" name="height" required id="name"></INPUT>
                                        </div>
    
                                </div>                       
                         
                        </div>
                
                        <div class="col-1-of-2 ">
                
                                <div class="box1">
                                        <div class="row-sub">
                                                <label class="text" > WEIGHT</label>
                                        </div>
                                        <div class="row-sub">
                                                <INPUT type="text" name="weight" required id="name"></INPUT>
                                        </div>
    
                                </div>
                          
                            
                        </div>

                   </div>
                       
                   <div class="row row5">
                        <div class="row-sub">
                                <label class="text" >YOUR GOAL</label>
                        </div>
                        <div class="row-sub">
                               <SELect name="dgoal" required id="GOAL" >
                                       <OPtion value="FAT LOSS">FAT LOSS</OPtion>
                                       <OPtion value="MUSCLE MAINTAINANCE">MUSCLE MAINTAINANCE</OPtion>
                                       <OPtion value="MUSCLE GAIN">MUSCLE GAIN</OPtion>
                               </SELect>
                        </div>
                  </div>

                  <div class="row row6">
                                <div class="row-sub">
                                        <label class="text" >CHOOSE YOUR BODY TYPE</label>
                                </div>
                                <div class="row-sub ">
                                       <SELect name="btype" required id="GOAL" >
                                               <OPtion value="ECTOMORPH">ECTOMORPH</OPtion>
                                               <OPtion value="ENDOMORPH">ENDOMORPH</OPtion>
                                               <OPtion value="MESOMORPH">MESOMORPH</OPtion>
                                       </SELect>

                                       <div class="test">
                                        <img src="danish/test2.jpg" alt="body-type pic">

                                       </div>
                                </div>
                          </div>

                          <div class="row row7">
                                        <div class="row-sub">
                                                <label class="text" >DO YOU HAVE ANY INJURY OR ILLNESS</label>
                                        </div>
                                        <div class="row-sub">
                                         
                                        <textarea name="ainj" id="message-box"></textarea>

                                        </div>
                                        
                          </div>          

                          <div class="row row8">
                                        <div class="row-sub">
                                                <label class="text" >ARE YOU ALLERGIC TO ANY FOOD</label>
                                        </div>
                                        <div class="row-sub">
                                        <textarea name="alergies" id="message-box"></textarea>

                                        </div>
                                        
                          </div>          
                                     
                          <div class="row row9">
                               
                                        <div class="col-1-of-2 test1">
                           
                                                        <div class="box1">
                                                                <div class="row-sub">
                                                                        <label class="text" >HOW LONG CAN YOU TRAIN IN A DAY</label>
                                                                </div>
                                                                <div class="row-sub">
                                                                        <INPUT type="text" name="hlong" required id="name"></INPUT>
                                                                </div>
                            
                                                        </div>                       
                                                 
                                                </div>
                                        
                                                <div class="col-1-of-2 test2">
                                        
                                                        <div class="box1">
                                                                <div class="row-sub">
                                                                        <label class="text" > MENTION BEST TIME FOR YOU TO TRAIN</label>
                                                                </div>
                                                                <div class="row-sub">
                                                                        <INPUT type="text" name="ttrain" required id="name"></INPUT>
                                                                </div>
                            
                                                        </div>
                                                  
                                                    
                                                </div>

                        
                                </div>

                                <div class="row 10">

                                                <div class="row-sub">
                                                                <label class="text" >DO YOU WISH TO USE SUPPLEMENTS</label>
                                                        </div>
                                                        <div class="row-sub">
                                                               <SELect name="usupls" required id="GOAL" >
                                                                       <OPtion value="YES">YES</OPtion>
                                                                       <OPtion value="NO">NO</OPtion>
                                                                      
                                                               </SELect>
                                                        </div>


                                </div>

                                <div class="row">

                                                            <div>
                                                                <input class="button" type="submit"  name="submit" value="SUBMIT AND PAY" />
                                                           </div>
                                             
                                </div>

           </form> 
       
 
      </div>

               
      

    </body>
</html> 