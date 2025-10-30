<?php
include_once("../Model/M_Student.php");

class Ctrl_Student {
    public function invoke() {
        $modelStudent = new Model_Student();
       //Xử lý Post cho add/Update/Delete
       if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // isset() là một hàm trong PHP dùng để kiểm tra xem một biến có được khai báo và khác NULL hay không.
         if(isset($_POST['action'])){
            switch($_POST['action']){
                case 'add' :
                    //Hàm này dùng trong PHP với MySQLi để bảo vệ dữ liệu nhập vào trước khi dùng trong câu lệnh SQL, tránh lỗi hoặc tấn công SQL Injection.
                    $name = mysqli_real_escape_string($modelStudent->link, $_POST['name']);
                    //Hàm intval() trong PHP dùng để chuyển một giá trị sang kiểu số nguyên (integer).
                    $age = intval($_POST['age']);
                    $university = mysqli_real_escape_string($modelStudent,$_POST['university']);
                    if($modelStudent->insertStudent($name, $age, $university)){
                        header("Location : C_Student.php"); // Redirect về list
                        exit;
                    }else{
                        echo "<p> Lỗi thêm sinh viên! </p>";
                    }
                    break;
                case 'update':
                        $id = intval($_POST['id']);
                        $name = mysqli_real_escape_string($modelStudent->link, $_POST['name']);
                        $age = intval($_POST['age']);
                        $university = mysqli_real_escape_string($modelStudent->link, $_POST['university']);
                        if ($modelStudent->updateStudent($id, $name, $age, $university)) {
                            header("Location: C_Student.php?stid=$id"); // Redirect về detail
                            exit;
                        } else {
                            echo "<p>Lỗi cập nhật!</p>";
                        }
                        break;
                case 'delete':
                        $id = intval($_POST['id']);
                        if ($modelStudent->deleteStudent($id)) {
                            header("Location: C_Student.php"); // Redirect về list
                            exit;
                        } else {
                            echo "<p>Lỗi xóa!</p>";
                        }
                        break;
            }
         }
         
       }
        //xử lý GET cho các mode
        if(isset($_GET('mod1'))){
            include_once("../View/AddStudent.php");
        }else if(isset($_GET['mod2'])){ //cập nhật
            if(isset($_GET['stid'])){
                $id = intval($_GET['stid']);
                $student = $modelStudent->getStudentDetail($id);
                if($student){
                    include_once("../View/UpdateStudent.php");
                }else{
                    echo "<p>Không tìm thấy sinh viên!</p><a href='C_Student.php'>Về danh sách</a>";
                }else{
                    echo "<p>Thiếu ID để cập nhật!</p><a href='C_Student.php'>Về danh sách</a>";
                }
            }
        }elseif (isset($_GET['mode3'])){ //xóa
            if(isset($_GET['stid'])){
                $id = intval($_GET['stid']);
                $student = $modelStudent->getStudentDetail($id);
               if ($student) {
                    include_once("../View/DeleteStudent.php");
                } else {
                    echo "<p>Không tìm thấy sinh viên!</p><a href='C_Student.php'>Về danh sách</a>";
                }
            }
            else {
                echo "<p>Thiếu ID để xóa!</p><a href='C_Student.php'>Về danh sách</a>";
            }
        }
        else if(isset($_GET['mod4'])){ //Tìm kiếm
            include_once("../View/SearchStudent.php");
        }
        elseif (isset($_GET['stid'])) { // Chi tiết
            $stid = intval($_GET['stid']);
            $student = $modelStudent->getStudentDetail($stid);
            if ($student) {
                include_once("../View/StudentDetail.php");
            } else {
                echo "<p>Không tìm thấy sinh viên với ID: $stid</p>";
                echo '<p><a href="C_Student.php">Về danh sách</a></p>';
            }
        } else { // Mặc định: Danh sách
            $studentList = $modelStudent->getAllStudent();
            include_once("../View/StudentList.php");
        }
    }
}

$C_Student = new Ctrl_Student();
$C_Student->invoke();
?>
