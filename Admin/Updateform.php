<?php
include("db_connection.php");

$id = $_GET['id'];
$view = "SELECT * from candidates where user_id='$id'";;
$query = mysqli_query($db, $view);
$row = mysqli_fetch_assoc($query);
?>


<!-- header -->
<?php include("header.php") ?>
<!-- /header -->

<!-- header -->
<?php include("sidebar.php") ?>
<!-- /header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Update Users Record</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="quickForm" method="POST" action="update_query.php?id=<?php echo $id; ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="Uname">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">
              </div>

              <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" name="gender" class="form-control" value="<?php echo $row['gender']; ?>">
              </div>

              <div class="form-group">
                <label for="mobno">Mobile No</label>
                <input type="text" name="mobno" class="form-control" value="<?php echo $row['mobile_no']; ?>">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" value="<?php echo $row['password']; ?>">
              </div>

              <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="role" class="form-control" value="<?php echo $row['role']; ?>">
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button class="btn btn-primary" type="submit" name='save'>Update Data</button>
              </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- header -->
<?php include("footer.php") ?>
<!-- /header -->