<?php include('header.php');?>
<?php include('dbcon.php');?>
<div class="box1">
    <h2>All students</h2>
    <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">ADD STUDENTS</button>
</div>

<table class="table table-hover table-bordered table-striped">
  <thead>
    <tr>
      <th>id</th>
      <th>first_name</th>
      <th>last_name</th>
      <th>age</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
            $query = "SELECT * FROM `students`";

            $result = mysqli_query($connection, $query);
            if(!$result){
                die('query failed'.mysqli_error());
            }else{
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['first_name'];?></td>
                    <td><?php echo $row['last_name'];?></td>
                    <td><?php echo $row['age'];?></td>
                    <td><a href="update_page1.php?id=<?php echo $row['id'];?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_page.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
                }
            }
            ?>
  </tbody>
</table>
<?php
    if(isset($_GET['message'])){
        echo "<h5>".$_GET['message']."</h5>";
    }
?>
<?php
    if(isset($_GET['insert_data_msg'])){
        echo "<h6>".$_GET['insert_data_msg']."</h6>";
    }
?>

<?php
    if(isset($_GET['update_msg'])){
        echo "<h6>".$_GET['update_msg']."</h6>";
    }
?>
<?php
    if(isset($_GET['delete_msg'])){
        echo "<h6>".$_GET['delete_msg']."</h6>";
    }
?>
<!-- Modal -->
<form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <div class="form-group">
                <label for="f_name">first name</label>
                <input type="text" name="f_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="l_name">last name</label>
                <input type="text" name="l_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" name="age" class="form-control">
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="Add_students" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>
<?php include('footer.php');?>
