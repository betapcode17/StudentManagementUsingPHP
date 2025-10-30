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
        return null;
    }

    // Mới: Thêm sinh viên
    public function insertStudent($name, $age, $university) {
        $sql = "INSERT INTO sinhvien (name, age, university) VALUES ('$name', $age, '$university')";
        return mysqli_query($this->link, $sql);
    }

    // Mới: Cập nhật sinh viên
    public function updateStudent($id, $name, $age, $university) {
        $sql = "UPDATE sinhvien SET name='$name', age=$age, university='$university' WHERE id=" . intval($id);
        return mysqli_query($this->link, $sql);
    }

    // Mới: Xóa sinh viên
    public function deleteStudent($id) {
        $sql = "DELETE FROM sinhvien WHERE id=" . intval($id);
        return mysqli_query($this->link, $sql);
    }

    // Mới: Tìm kiếm sinh viên (by name LIKE %keyword%)
    public function searchStudent($keyword) {
        $students = [];
        $keyword = mysqli_real_escape_string($this->link, $keyword);
        $sql = "SELECT * FROM sinhvien WHERE name LIKE '%$keyword%'";
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
}
?>