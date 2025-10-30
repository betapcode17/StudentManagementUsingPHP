<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tìm kiếm sinh viên</title>
</head>
<body>
  <h2>Tìm kiếm sinh viên</h2>
  <form method="GET" action="../controller/C_Student.php">
    <input type="hidden" name="mod4" value="1">
    <p>Từ khóa (tên): <input type="text" name="keyword" required></p>
    <p><button type="submit">Tìm kiếm</button> <a href="../controller/C_Student.php">Về danh sách</a></p>
  </form>

  <?php
  if (isset($_GET['keyword'])) {
      $keyword = $_GET['keyword'];
      $modelStudent = new Model_Student(); // Tạo instance tạm để search
      $searchResults = $modelStudent->searchStudent($keyword);
      if (!empty($searchResults)) {
          echo "<h3>Kết quả tìm kiếm cho '$keyword':</h3>";
          foreach($searchResults as $index => $student) {
              echo "<p>" . ($index + 1) . " <a href='../controller/C_Student.php?stid=" 
                   . urlencode($student->id) . "'>" 
                   . htmlspecialchars($student->name) . "</a> (Tuổi: " . $student->age . ", Trường: " . htmlspecialchars($student->university) . ")</p>";
          }
      } else {
          echo "<p>Không tìm thấy sinh viên nào với từ khóa '$keyword'.</p>";
      }
  }
  ?>
</body>
</html>