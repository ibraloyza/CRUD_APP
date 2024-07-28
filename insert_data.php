<?php
include 'dbcon.php';
if(isset($_POST["Add_students"]));{
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $age= $_POST["age"];

    if($f_name == "" || empty($f_name)){
        header('location:index.php?message=you need to fill in the first name');
    }
    else{
        $query = "INSERT INTO `students` (`first_name`, `last_name`, `age`) 
        VALUES ('$f_name', '$l_name', $age)";

        $result = mysqli_query($connection,$query);

        if(!$result){
            die('query failed'.mysqli_error($connection));
        }else{
            header('location:index.php?insert_data_msg= your data has been added successfully');
        }

    }
}
?>