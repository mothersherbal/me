<?php
include 'db.php';

// Fetch exactly 10 students from the database
$query = "SELECT * FROM students ORDER BY id ASC LIMIT 10"; 
$result = $conn->query($query);

// Handle form submission for a single student
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['student_id'])) {
    $id = intval($_POST['student_id']);
    $mark1 = intval($_POST['mark1']);
    $mark2 = intval($_POST['mark2']);
    $mark3 = intval($_POST['mark3']);
    $mark4 = intval($_POST['mark4']);
    $mark5 = intval($_POST['mark5']);
    $total = $mark1 + $mark2 + $mark3 + $mark4 + $mark5;

    $updateQuery = "UPDATE students SET 
        mark1 = $mark1, 
        mark2 = $mark2, 
        mark3 = $mark3, 
        mark4 = $mark4, 
        mark5 = $mark5,
        total = $total
    WHERE id = $id";
    
    if ($conn->query($updateQuery)) {
        echo "<script>alert('Marks updated successfully!'); window.location.href='student_marks.php';</script>";
    } else {
        echo "<script>alert('Error updating marks');</script>";
    }
}

// Check if the query returned results
if ($result->num_rows == 0) {
    die("No students found in the database.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mark Sheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            width: 90%;
            margin: auto;
            margin-top: 20px;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
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
        .submit-btn {
            background-color: green;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .submit-btn:hover {
            background-color: darkgreen;
        }
        input[type="number"] {
            width: 60px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Student Mark Sheet</h2>

        <table>
            <tr>
                <th>S.No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Branch</th>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Mark1</th>
                <th>Mark2</th>
                <th>Mark3</th>
                <th>Mark4</th>
                <th>Mark5</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            <?php 
            $sno = 1;
            while ($row = $result->fetch_assoc()) { 
                // Debugging: Check if data is fetched
                echo "<pre>"; print_r($row); echo "</pre>";
            ?>
            <tr>
                <form method="POST">
                    <td><?php echo $sno++; ?></td>
                    <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['branch']); ?></td>
                    <td><?php echo htmlspecialchars($row['subject_code']); ?></td>
                    <td><?php echo htmlspecialchars($row['subject_name']); ?></td>
                    <td><input type="number" name="mark1" value="<?php echo $row['mark1']; ?>" required></td>
                    <td><input type="number" name="mark2" value="<?php echo $row['mark2']; ?>" required></td>
                    <td><input type="number" name="mark3" value="<?php echo $row['mark3']; ?>" required></td>
                    <td><input type="number" name="mark4" value="<?php echo $row['mark4']; ?>" required></td>
                    <td><input type="number" name="mark5" value="<?php echo $row['mark5']; ?>" required></td>
                    <td><?php echo $row['total']; ?></td>
                    <td>
                        <input type="hidden" name="student_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="submit-btn">Submit</button>
                    </td>
                </form>
            </tr>
            <?php } ?>
        </table>
    </div>

</body>
</html>
