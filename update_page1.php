<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT * FROM `students` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);
    
    if (!$result) {
        die('Query failed: ' . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<?php
if (isset($_POST['Update_students'])) {
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    $query = "UPDATE `students` SET `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' WHERE `id` = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query failed: ' . mysqli_error($connection));
    } else {
        header('location:index.php?update_msg=you have successfully updated data');
    }
}
?>

<form action="update_page1.php?id=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo isset($row['first_name']) ? htmlspecialchars($row['first_name']) : ''; ?>">
    </div>
    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" class="form-control" value="<?php echo isset($row['last_name']) ? htmlspecialchars($row['last_name']) : ''; ?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value="<?php echo isset($row['age']) ? htmlspecialchars($row['age']) : ''; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="Update_students" value="Update">
</form>

<?php include('footer.php'); ?>
