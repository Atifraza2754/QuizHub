<?php

$errormsg="";

if(isset($_POST['st_register'])){

    $user_name = $_POST['username'];
    $gender = $_POST['gender'];
    $mobno = $_POST['mobno'];
    $email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $hash_pass=password_hash($user_pass,PASSWORD_BCRYPT);
    $token=md5(rand());

    include("db_connection.php");


    $Insert = "INSERT INTO candidates (username, gender, mobile_no,email, password,token)
               VALUES ('$user_name', '$gender', '$mobno', '$email', '$hash_pass','$token')";

    $query = mysqli_query($conn, $Insert);


    if($query){
          $errormsg="Registeration Successful";
        // header("location: user_login.php");
    }
    else{

        $errormsg="Error! Registeration Failed: " ;
    }
}
?>


<?php require("login_header.php") ?>
    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
              <form class="bg-white rounded shadow-5-strong p-3" method="POST">
              <h3 class="text-center mb-3 mt-4">Sign Up</h3>
                <!-- Email input -->
                <div class="form-outline mb-4" data-mdb-input-init>
                  <input type="text" name='username' class="form-control" required />
                  <label class="form-label" >User Name</label>
                </div>

                <!-- Gender input -->
                <div class="form-outline mb-4" data-mdb-input-init>
                  <input type="text"  name='gender' class="form-control" required />
                  <label class="form-label" >Gender</label>
                </div>       
                
                
                <!-- Contact  input -->
                <div class="form-outline mb-4" data-mdb-input-init>
                  <input type="text"  name='mobno' class="form-control" required />
                  <label class="form-label" >Mobile No</label>
                </div>       

                              
                <!-- email input -->
                <div class="form-outline mb-4" data-mdb-input-init>
                  <input type="text"  name='user_email' class="form-control" required />
                  <label class="form-label" >Email</label>
                </div>       

                    <!-- Password input -->
                 <div class="form-outline mb-4" data-mdb-input-init>
                  <input type="password"  name='user_pass' class="form-control" required />
                  <label class="form-label" >Password</label>
                </div>       

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4" name="st_register" data-mdb-ripple-init>Sign Up</button>
                <!-- 2 column grid layout for inline styling -->
                <div class="row">
                  <div class="col d-flex justify-content-center">
                 Already Have an Account -  <a href="user_login.php"> Log in</a>
                  </div>
                </div>
              </form>
              <?php if ($errormsg):?>
              <div class="alert alert-danger">
                <?php echo $errormsg ;?>
              </div>
              <?php endif ; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>
  <!--Main Navigation-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.umd.min.js"></script>
</body>
</html>


