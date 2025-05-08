<?php
include 'db.php';

// Redirect after successful form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $contact = trim($_POST['contact']);
    $designation = trim($_POST['designation']);
    $college = trim($_POST['college']);
    $course = trim($_POST['course']);

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO exam_details (name, contact, designation, college, course) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $contact, $designation, $college, $course);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        // Redirect to student_marks.php after successful submission
        header("Location: student_marks.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examiner Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .navbar {
            width: 100%;
            background-color: #001f3f;
            color: white;
            padding: 15px 20px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: auto;
            margin-top: 20px;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #001f3f;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input, button {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
        }
        button {
            background-color: #001f3f;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #003366;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #001f3f;
            color: white;
        }
    </style>
</head>
<body>

    <div class="navbar">Exam System</div>

    <div class="container">
        <h2>Examiner Details</h2>

        <form method="POST">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="contact" placeholder="Contact No" required>
            <input type="text" name="designation" placeholder="Designation" required>
            <input type="text" name="college" placeholder="College Name" required>
            <input type="text" name="course" placeholder="Course Details" required>
            <button type="submit">Submit</button>
        </form>

        <h2>Examiner Records</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Designation</th>
                <th>College</th>
                <th>Course</th>
            </tr>
            <?php 
            $query = "SELECT * FROM exam_details";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td><?php echo $row['designation']; ?></td>
                <td><?php echo $row['college']; ?></td>
                <td><?php echo $row['course']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

</body>
</html>
