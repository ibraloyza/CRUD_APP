<?php
include 'dbcon.php';

if (isset($_POST["Add_students"])) {
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $email = $_POST["Email"];
    $age = $_POST["age"];

    if (empty($f_name) || empty($l_name) || empty($email) || empty($age)) {
        header('location:index.php?message=you need to fill all the blank space');
    } else {
        $query = "INSERT INTO `students` (`first_name`, `last_name`, `email`, `age`) VALUES ('$f_name', '$l_name', '$email', '$age')";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('Query failed: ' . mysqli_error($connection));
        } else {
            header('location:index.php?insert_data_msg=your data has been added successfully');
        }
    }
}
?>
