<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }
$currentHour = date('H');
$startIndex = ($currentHour % 10) * 10;
$query = "SELECT * FROM students LIMIT $startIndex, 10";
$result = $conn->query($query);
?>
<table>
    <tr>
        <th>ID</th><th>Full Name</th><th>Branch</th><th>Subject Code</th><th>Subject Name</th><th>Mark1</th><th>Mark2</th><th>Mark3</th><th>Mark4</th><th>Mark5</th><th>Total</th><th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['full_name']; ?></td>
        <td><?php echo $row['branch']; ?></td>
        <td><?php echo $row['subject_code']; ?></td>
        <td><?php echo $row['subject_name']; ?></td>
        <td><?php echo $row['mark1']; ?></td>
        <td><?php echo $row['mark2']; ?></td>
        <td><?php echo $row['mark3']; ?></td>
        <td><?php echo $row['mark4']; ?></td>
        <td><?php echo $row['mark5']; ?></td>
        <td><?php echo $row['total']; ?></td>
        <td><button type="submit">Submit</button></td>
    </tr>
    <?php } ?>
</table>

<script>
setTimeout(function() { location.reload(); }, 3600000);
</script>

