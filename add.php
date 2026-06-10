<?php
require_once 'config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = trim($_POST['name']);
    $course = trim($_POST['course']);
    $year = trim($_POST['year']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    if (
        empty($name) ||
        empty($course) ||
        empty($year) ||
        empty($email) ||
        empty($phone) ||
        empty($address)
    ) {

        $message = '<p style="color:red;">All fields are required.</p>';

    } else {

        $name = mysqli_real_escape_string($conn, $name);
        $course = mysqli_real_escape_string($conn, $course);
        $year = mysqli_real_escape_string($conn, $year);
        $email = mysqli_real_escape_string($conn, $email);
        $phone = mysqli_real_escape_string($conn, $phone);
        $address = mysqli_real_escape_string($conn, $address);

        $sql = "INSERT INTO students
                (name, course, year, email, phone, address)
                VALUES
                ('$name', '$course', '$year', '$email', '$phone', '$address')";

        if (mysqli_query($conn, $sql)) {
           echo '<p style="color:green; font-size:1.2em;">Student added! Redirecting...</p>';
            header('Refresh: 2; URL=index.php');

            exit();
        } else {
            $message = '<p style="color:red;">Error: ' . mysqli_error($conn) . '</p>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            margin-top: 15px;
            padding: 12px 25px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #45a049;
        }

        .goback {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .goback:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Add New Student</h1>

    <?php echo $message; ?>

    <form method="POST">

        <label>Full Name</label>
        <input
            type="text"
            name="name"
            placeholder="Enter full name"
            required
        >

        <label>Course</label>
        <select name="course" required>
            <option value="">-- Select Course --</option>
            <option value="BSIT">BSIT</option>
            <option value="BSCS">BSCS</option>
            <option value="BSE">BSE</option>
            <option value="BSBA">BSBA</option>
        </select>

        <label>Year Level</label>
        <input
            type="number"
            name="year"
            min="1"
            max="5"
            placeholder="1-5"
            required
        >

        <label>Email</label>
        <input
            type="email"
            name="email"
            placeholder="example@email.com"
            required
        >

        <label>Phone</label>
        <input
            type="text"
            name="phone"
            placeholder="09XXXXXXXXX"
            required
        >

        <label>Address</label>
        <textarea
            name="address"
            rows="4"
            placeholder="Enter address"
            required
        ></textarea>

        <button type="submit">Add Student</button>

    </form>

    <a href="index.php" class="goback">← Go Back</a>

</div>

</body>
</html>
