<?php

$msg = '';
require("db_connection.php");
if (isset($_POST['change_password'])) {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confrim_password'];
    $token = $_POST['password_token'];

    if (!empty($token)) {
        if (!empty($email) && !empty($new_password) && !empty($confirm_password)) {
            // Check if token is valid
            $check_token = "SELECT * FROM candidates WHERE token='$token' LIMIT 1";
            $token_run = mysqli_query($conn, $check_token);

            if (mysqli_num_rows($token_run) > 0) {
                if ($new_password == $confirm_password) {
                  $hashed_password = password_hash($new_password, PASSWORD_BCRYPT); //hashing password
                    // Update password
                    $update_password = "UPDATE candidates SET password='$hashed_password' WHERE token='$token' LIMIT 1";
                    $update_query_run = mysqli_query($conn, $update_password);

                    if ($update_query_run) {
                    $new_token=md5(rand());
                    $update_token = "UPDATE candidates SET token='$new_token' WHERE token='$token' LIMIT 1";
                    $token_query_run = mysqli_query($conn, $update_token);

                        $msg = "<b>New Password Updated Successfully</b>";
                    } else {
                        $msg = "<b>New Password did not update, Something Went Wrong</b>";
                    }
                } else {
                    $msg = "<b>New Password and Confirm Password Do Not Match</b>";
                }
            } else {
                $msg = "<b>Invalid Token Or Link Expired</b>";
            }
        } else {
            $msg = "<b>All fields are mandatory</b>";
        }
    } else {
        $msg = "<b>No token Available</b>";
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
            <h3 class="text-center mb-3">Reset Your Password</h3>

            <input type="hidden" name='password_token' value="<?php if (isset($_GET['token'])) { echo $_GET['token']; } ?>">
            <!-- Email input -->
            <div class="form-outline mb-4" data-mdb-input-init>
              <input type="email" name='email' class="form-control" value="<?php if (isset($_GET['email'])) { echo $_GET['email']; } ?>" required />
              <label class="form-label" for="form1Example1">Email</label>
            </div>

            <!-- New Password input -->
            <div class="form-outline mb-4" data-mdb-input-init>
              <input type="password" name='new_password' class="form-control" required />
              <label class="form-label" for="form1Example1">New Password</label>
            </div>
            <!-- Confirm Password input -->
            <div class="form-outline mb-4" data-mdb-input-init>
              <input type="password" name='confrim_password' class="form-control" required />
              <label class="form-label" for="form1Example1">Confirm Password</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" name="change_password" data-mdb-ripple-init>Reset Password</button>
            <!-- 2 column grid layout for inline styling -->
            <div class="row ">
              <div class="col d-flex justify-content-center">
                Go to Login Page? <a href="user_login.php">Login Now</a>
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
