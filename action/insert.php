<?php

include "../config/db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$course = $_POST['course'];
$marks = $_POST['marks'];

$sql = "INSERT INTO students(name,email,age,course,marks)
        VALUES('$name','$email','$age','$course','$marks')";

if(mysqli_query($conn,$sql))
{
    header("Location: ../pages/view.php");
}
else
{
    echo "Error: ".mysqli_error($conn);
}

mysqli_close($conn);

?>