<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xóa sinh viên</title>
</head>
<body>
  <h2>Xác nhận xóa sinh viên</h2>
  <?php if(isset($student)): ?>
    <p>Bạn có chắc chắn muốn xóa <b><?php echo htmlspecialchars($student->name); ?></b> (ID: <?php echo $student->id; ?>)?</p>
    <form method="POST" action="../controller/C_Student.php" style="display:inline;">
      <input type="hidden" name="action" value="delete">
      <input type="hidden" name="id" value="<?php echo $student->id; ?>">
      <button type="submit" onclick="return confirm('Xác nhận xóa?');">Xóa</button>
    </form>
    <p><a href="../controller/C_Student.php">Hủy</a></p>
  <?php else: ?>
    <p>Không có sinh viên để xóa.</p>
    <p><a href="../controller/C_Student.php">Về danh sách</a></p>
  <?php endif; ?>
</body>
</html>