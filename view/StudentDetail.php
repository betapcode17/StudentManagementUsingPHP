<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thông tin chi tiết sinh viên</title>
</head>
<body>
  <h2>Chi tiết sinh viên</h2>
  <?php if(isset($student)): ?>
    <p><b><?php echo htmlspecialchars($student->name); ?></b></p>
    <p>Age: <?php echo htmlspecialchars($student->age); ?></p>
    <p>University: <?php echo htmlspecialchars($student->university); ?></p>
    <br>
  <?php else: ?>
    <p>Không có thông tin sinh viên.</p>
  <?php endif; ?>

  <p><a href="../controller/C_Student.php">Back to list</a></p>
</body>
</html>