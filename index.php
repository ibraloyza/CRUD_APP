<?php include('header.php');?>
<?php include('dbcon.php');?>
        <h2 id="std_title">ALL STUDETNS</h2>
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

<?php include('footer.php');?>