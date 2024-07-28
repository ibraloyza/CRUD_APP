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
                </tr>
                <?php
                }
            }
            ?>
  </tbody>
</table>

<!-- Modal -->
<form >
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
                <input type="text" name="Age" class="form-control">
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Add</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php include('footer.php');?>
