<?php
include "../config/db.php";

if(isset($_POST['update']))
{

$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$age=$_POST['age'];
$course=$_POST['course'];
$marks=$_POST['marks'];

$sql="UPDATE students
      SET name='$name',
          email='$email',
          age='$age',
          course='$course',
          marks='$marks'
      WHERE id='$id'";

mysqli_query($conn,$sql);

}

if(isset($_POST['delete']))
{

$id=$_POST['id'];

$sql="DELETE FROM students WHERE id='$id'";

mysqli_query($conn,$sql);

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Students</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/update.css">

</head>

<body>

    <header>

    <h1>Students Academic Data Storage</h1>

    <nav>
        <ul>
            <li><a href="view.php">View Students</a></li>
            <li><a href="update.php">Edit / Remove Student</a></li>
            <li><a href="../index.html">Home</a></li>
        </ul>
    </nav>

</header>


<table border="1">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Course</th>
        <th>Marks</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>

<?php

$sql="SELECT * FROM students";

$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

    <form method="POST">

    <td>
        <?php echo $row['id']; ?>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    </td>

    <td>
        <input type="text" name="name" value="<?php echo $row['name']; ?>">
    </td>

    <td>
        <input type="email" name="email" value="<?php echo $row['email']; ?>">
    </td>

    <td>
        <input type="number" name="age" value="<?php echo $row['age']; ?>">
    </td>

    <td>

        <select name="course">

            <option <?php if($row['course']=="DBMS") echo "selected"; ?>>DBMS</option>
            <option <?php if($row['course']=="JS") echo "selected"; ?>>JS</option>
            <option <?php if($row['course']=="OS") echo "selected"; ?>>OS</option>
            <option <?php if($row['course']=="DAA") echo "selected"; ?>>DAA</option>
            <option <?php if($row['course']=="DSA") echo "selected"; ?>>DSA</option>
            <option <?php if($row['course']=="Python") echo "selected"; ?>>Python</option>

        </select>

    </td>

    <td>
        <input type="number" name="marks" value="<?php echo $row['marks']; ?>">
    </td>

    <td>
        <input type="submit" name="update" value="Update">
    </td>

    <td>
        <input type="submit" name="delete" value="Delete">
    </td>

    </form>

</tr>

<?php
}
?>

</table>

</body>
</html>