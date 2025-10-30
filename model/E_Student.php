<!-- Lớp Entity_Student chính là 1 thực thế mô phỏng về 1 student trong thực tế  -->
<?php
class Entity_Student
{
    public $id;
    public $name;
    public $age;
    public $university;

    public function __construct($_id, $_name, $_age, $_university){
        $this->id = $_id;
        $this->name = $_name;
        $this->age = $_age;
        $this->university = $_university;
    }
}
?>