<?php
include 'config.php';

$result = mysqli_query($conn, "SELECT * FROM students ORDER BY id ASC");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1 {
            color: #333;
            margin-top: 0;
        }

        .add-btn {
            display: inline-block;
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .add-btn:hover {
            background: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #333;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .count {
            margin-top: 15px;
            color: #666;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Students List</h1>

    <a href="add.php" class="add-btn">+ Add Student</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>Year</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Date Added</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['course']; ?></td>
            <td><?php echo $row['year']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php } ?>

    </table>

    <p class="count">
        Total Students:
        <?php echo mysqli_num_rows($result); ?>
    </p>

</div>

</body>
</html>