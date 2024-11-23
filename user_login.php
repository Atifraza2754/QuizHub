<?php
session_start();
include("db_connection.php");

$errormsg = ""; // Initialize the error message variable

if (isset($_POST['st_login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $select = "SELECT * FROM candidates WHERE email='$email'";
    $query = mysqli_query($conn, $select);
    $rows = mysqli_fetch_assoc($query);

    if ($rows && password_verify($pass,$rows['password'])) {
        if ($rows['role'] == "User") {
            $user_id = $rows['user_id'];
            $user_name = $rows['username'];
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $user_name;
            header("location:index.php");
            exit();
        } elseif ($rows['role'] == "Admin") {
            $user_id = $rows['user_id'];
            $user_name = $rows['username'];
            $email = $rows['email'];

            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $user_name;
            $_SESSION['email']=$email;
            header("location:Admin/index.php");
            exit();
        } else {
            $errormsg = "Invalid Email/Password";
        }
    } else {
        $errormsg = "Invalid Email/Password";
    }
}
?>
<?php require("login_header.php");  ?>
    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
         
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
            <?php if ($errormsg): ?>
            <div class="alert alert-danger">
              <?php echo $errormsg; ?>
            </div>
          <?php endif; ?>
              <form class="bg-white rounded shadow-5-strong p-5" method="POST">
                <h3 class="text-center mb-3">Login</h3>
                <!-- Email input -->
                <div class="form-outline mb-4" data-mdb-input-init>
                  <input type="email" name='email' id="form1Example1" class="form-control" required />
                  <label class="form-label" for="form1Example1">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4" data-mdb-input-init>
                  <input type="password" name='pass' id="form1Example2" class="form-control" required />
                  <label class="form-label" for="form1Example2">Password</label>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4" name="st_login" data-mdb-ripple-init>Sign in</button>
                <!-- 2 column grid layout for inline styling -->
                <div class="row ">
                  <div class="col d-flex justify-content-center">
                  <a href="reset_password.php" class="text text-danger">Forgot Your Password ?</a>
                  </div>
                </div>
                <div class="row ">
                  <div class="col d-flex justify-content-center">
                    Do not Have Account? <a href="user_register.php"> Create Account</a>
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
      <a class="text-dark" href="">QuizHub.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!--Footer-->
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.umd.min.js"></script>
</body>
</html>
