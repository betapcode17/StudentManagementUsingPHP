<!-- Lớp Model_Student sẽ sử dụng lớp thực thể này để cấu trúc dữ liệu sẽ lấy từ Database đóng vai trò giao tiếp với CSDL -->
<?php
include_once("E_Student.php");

class Model_Student {
    private $link;

    public function __construct() {
        $this->link = mysqli_connect("localhost", "root", "", "dulieu1", 3307)
            or die("Không thể kết nối đến CSDL MySQL");
        mysqli_set_charset($this->link, "utf8");
    }

    public function getAllStudent() {
        $students = [];
        $sql = "SELECT * FROM sinhvien";
        $rs = mysqli_query($this->link, $sql);

        while ($row = mysqli_fetch_assoc($rs)) {
            $students[] = new Entity_Student(
                $row['id'], 
                $row['name'], 
                $row['age'], 
                $row['university']
            );
        }

        return $students;
    }

    public function getStudentDetail($id) {
        $sql = "SELECT * FROM sinhvien WHERE id = " . intval($id);
        $rs = mysqli_query($this->link, $sql);

        if ($row = mysqli_fetch_assoc($rs)) {
            return new Entity_Student(
                $row['id'],
                $row['name'],
                $row['age'],
                $row['university']
            );
        }
        return null; // nếu không tìm thấy
    }
}
?>
