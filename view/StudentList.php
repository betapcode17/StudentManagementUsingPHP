<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh sách sinh viên</title>
</head>
<body>
  <h2>Danh sách sinh viên</h2>
  <?php
    if (!empty($studentList)) {
        foreach($studentList as $index => $student) {
            echo "<p>" . ($index + 1) . " <a href='../controller/C_Student.php?stid=" 
                 . urlencode($student->id) . "'>" 
                 . htmlspecialchars($student->name) . "</a></p>";
        }
    } else {
        echo "<p>Không có sinh viên nào.</p>";
    }
  ?>
</body>
</html>