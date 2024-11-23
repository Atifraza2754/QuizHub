<!-- header -->
<?php include("header.php") ?>
<!-- /header -->

<!-- sidebar -->
<?php 
session_start();
include("sidebar.php") ?>
<!-- /sidebar -->

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12 ">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title ">View All Users </h3>
              </div>
              </div>  
              <table class='table table-bordered table-striped'>
                <thead>
                <tr class="text-white bg-warning">
            <td>S.No</td>
            <td>UserName</td>
            <td>Gender</td>
            <td>Mobile No</td>
            <td>Email</td>
            <td>Password</td>
            <td>Role</td>
            <td>Update</td>
            <td>Delete</td>
          </tr>
                </thead>
                <?php
          require("db_connection.php"); // Adjust path to your db_connection.php file

          $no = 1;
          $view = "SELECT * FROM candidates WHERE role='User'";
          $query = mysqli_query($db, $view);
          while ($row = mysqli_fetch_assoc($query)) {
            $row['user_id'];
          ?>
              <tbody>
              <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo  $row['username']; ?></td>
              <td><?php echo  $row['gender']; ?></td>
              <td><?php echo  $row['mobile_no']; ?></td>
              <td><?php echo  $row['email']; ?></td>
              <td><?php echo  $row['password']; ?></td>
              <td><?php echo  $row['role']; ?></td>
              <td><a href="Updateform.php?id=<?php echo $row['user_id']; ?>" class="btn btn-success">Update</a></td>
              <td><a href="Delete.php?id=<?php echo $row['user_id']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>

              </tbody>

              <?php  }?>

              </table>
              </div>
              </div>
              </div>
            </section>

<!-- footer -->
<?php include("footer.php") ?>
<!-- /footer -->
