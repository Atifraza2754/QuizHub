
<!-- header -->
<?php include("header.php") ?>
<!-- /header -->

<!-- sidebar -->
<?php 
 session_start();
include("sidebar.php") 
?>
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
                <h3 class="card-title ">All Test Result </h3>
              </div>
              </div>  
              <table class='table table-bordered table-striped'>
                <thead>
                    <tr>
                        <th>User_id</th>
                        <th>Total Question</th>
                        <th>Correct Question</th>
                        <th>Wrong Question</th>
                        <th>Total Marks</th>
                        <th>Obtain Marks</th>
                        <th>Test Date</th>
                        <th>Status</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                include("db_connection.php");
        
                $view="SELECT * from  result";
                $query=mysqli_query($db,$view);
                while($row=mysqli_fetch_assoc($query)){
                  $row['result_id'];
          
              ?>
              <tbody>
              <tr>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['total_question']; ?></td>
                <td><?php echo $row['correct_question']; ?></td>
                <td><?php echo $row['wrong_question']; ?></td>
                <td><?php echo $row['total_marks']; ?></td>
                <td><?php echo $row['obtain_marks']; ?></td>
                <td><?php echo $row['test_date']; ?></td>
                <td><?php echo $row['result_status']; ?></td>

                <td><a href="UpdateResultForm.php?id=<?php echo $row['result_id'];?>" class="btn btn-success text-white">Update</a></td>
                <td><a href="DeleteResult.php?id=<?php echo $row['result_id'];?>" class="btn btn-danger text-white">Delete</a></td>
    
                
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
