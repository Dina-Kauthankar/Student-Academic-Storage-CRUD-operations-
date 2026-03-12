<?php
include "../config/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/view.css">
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

    <form action="" method="get" class="search-form">
        <input type="text" placeholder="Search" name="search" class="search-bar" >
        <button type="submit" class="srch-btn">Submit</button>
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Course</th>
            <th>Marks</th>
        </tr>

            <?php 
                include "../config/db.php";
                
                $search = $_GET['search'] ?? "";

                if (isset($_GET['search'])){
                    $sql = "select * from students
                            where name LIKE '%$search%' 
                            or email LIKE '%$search%' or
                            age LIKE '$search' or course LIKE '%$search%' or marks LIKE '$search'";
                }else{
                    $sql = "Select * from students";
                }

                $result = mysqli_query($conn, $sql );

                while($row = mysqli_fetch_assoc($result)){
            ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['age'];?></td>
            <td><?php echo $row['course'];?></td>
            <td><?php echo $row['marks'];?></td>

        </tr>
            <?php 
                }

                mysqli_close($conn);
            ?>
    </table>
</body>
</html>