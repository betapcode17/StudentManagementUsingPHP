<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm sinh viên</title>
</head>
<body>
  <h2>Thêm sinh viên mới</h2>
  <form method="POST" action="../controller/C_Student.php">
    <input type="hidden" name="action" value="add">
    <p>Tên: <input type="text" name="name" required></p>
    <p>Tuổi: <input type="number" name="age" required min="18" max="100"></p>
    <p>Trường: <input type="text" name="university" required></p>
    <p><button type="submit">Thêm</button> <a href="../controller/C_Student.php">Hủy</a></p>
  </form>
</body>
</html>