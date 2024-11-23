<?php

require("db_connection.php");
$msg='';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


function send_password_reset($name,$email,$token)
{

$mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth   = true;

    $mail->Host       = 'smtp.gmail.com'; // SMTP server
    $mail->Username   = 'atifrazait@gmail.com'; // SMTP username
    $mail->Password   = 'xwbyhoyjmbkcyyry'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587; // SMTP port

    $mail->setFrom('atifrazait@gmail.com',"Admin");
    $mail->addAddress($email,$name);

    $mail->isHTML(true);
    $mail->Subject = 'Reset Password Notification';

    $email_template    = "
    <h2>Hello </h2>
    <h3>You are recieving this email beacause we received a password reset request for your account. </h3>
    <br>
    <a href='http://localhost/All_Projects/QuizHub/password_change.php?token=$token&email=$email'> Click Here To Change Password </a>";

    $mail->Body = $email_template; 
    $mail->send();

}

if(isset($_POST['reset_password']))
{
     $email=$_POST['email'];
     $token=md5(rand());

     $query="SELECT * from candidates WHERE email='$email' LIMIT 1";
     $sql_query=mysqli_query($conn,$query);

    
    if(mysqli_num_rows($sql_query) > 0) // //check if any record more than 0 fetch below
    {
        $row=mysqli_fetch_array($sql_query);
        $name=$row['username'];
        $email=$row['email'];

        $_SESSION['email']=$email;

        $update_token= "UPDATE candidates SET token='$token' WHERE email='$email' LIMIT 1";
        $update_token_run=mysqli_query($conn,$update_token);
        
        if($update_token_run)
        {
            send_password_reset($name,$email,$token);
            $msg="<b>We e-mailed you a Password reset link </b>";

        }
        else
        {
            $msg="<b>something Went Wrong</b>";
            exit();
        }

    }
    else
    {
        $msg='<b>No email found</b>'; 
        exit();
    }
}



?>


<?php require('login_header.php'); ?>
<div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
                <?php if ($msg): ?>
                    <div class="text text-white bg-success p-2 mb-2">
                        <?php echo $msg; ?>
                    </div>
                <?php endif; ?>
              <form class="bg-white rounded shadow-5-strong p-5" method="POST">
                <h3 class="text-center mb-3">Recover Account</h3>
                <!-- Email input -->
                <div class="form-outline mb-4" data-mdb-input-init>
                  <input type="email" name='email'  class="form-control" required />
                  <label class="form-label" for="form1Example1">Email</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4" name="reset_password" data-mdb-ripple-init>Reset Password </button>
                <!-- 2 column grid layout for inline styling -->
                <div class="row ">
                  <div class="col d-flex justify-content-center">
                    Go to Login Page ? <a href="user_login.php">Login Now</a>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>
  <!--Main Navigation-->


<!--Footer-->
<footer class="bg-light text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2024 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">QuizHub.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!--Footer-->
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.umd.min.js"></script>
</body>
</html>
