<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật sinh viên</title>
</head>
<body>
  <h2>Cập nhật thông tin sinh viên</h2>
  <?php if(isset($student)): ?>
    <form method="POST" action="../controller/C_Student.php">
      <input type="hidden" name="action" value="update">
      <input type="hidden" name="id" value="<?php echo $student->id; ?>">
      <p>Tên: <input type="text" name="name" value="<?php echo htmlspecialchars($student->name); ?>" required></p>
      <p>Tuổi: <input type="number" name="age" value="<?php echo $student->age; ?>" required min="18" max="100"></p>
      <p>Trường: <input type="text" name="university" value="<?php echo htmlspecialchars($student->university); ?>" required></p>
      <p><button type="submit">Cập nhật</button> <a href="../controller/C_Student.php?stid=<?php echo $student->id; ?>">Hủy</a></p>
    </form>
  <?php else: ?>
    <p>Không có thông tin sinh viên để cập nhật.</p>
    <p><a href="../controller/C_Student.php">Về danh sách</a></p>
  <?php endif; ?>
</body>
</html>