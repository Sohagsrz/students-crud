<?php
include 'config.php';

class Student {
    public $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    // Add new student
    public function addStudent($name, $email, $registration_no, $department) {
        $name = mysqli_real_escape_string($this->conn, $name);
        $email = mysqli_real_escape_string($this->conn, $email);
        $registration_no = mysqli_real_escape_string($this->conn, $registration_no);
        $department = mysqli_real_escape_string($this->conn, $department);
        
        $sql = "INSERT INTO students (name, email, registration_no, department) 
                VALUES ('$name', '$email', '$registration_no', '$department')";
        
        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    
    // Get all students
    public function getAllStudents() {
        $sql = "SELECT * FROM students";
        $result = mysqli_query($this->conn, $sql);
        
        $students = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $students[] = $row;
            }
        }
        return $students;
    }
    
    // Get single student
    public function getStudentById($id) {
        $id = mysqli_real_escape_string($this->conn, $id);
        $sql = "SELECT * FROM students WHERE id = '$id'";
        $result = mysqli_query($this->conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }
    
    // Update student
    public function updateStudent($id, $name, $email, $department) {
        $id = mysqli_real_escape_string($this->conn, $id);
        $name = mysqli_real_escape_string($this->conn, $name);
        $email = mysqli_real_escape_string($this->conn, $email);
        $department = mysqli_real_escape_string($this->conn, $department);
        
        $sql = "UPDATE students SET name='$name', email='$email', department='$department' WHERE id='$id'";
        
        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    
    // Delete student
    public function deleteStudent($id) {
        $id = mysqli_real_escape_string($this->conn, $id);
        $sql = "DELETE FROM students WHERE id = '$id'";
        
        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }
}
?>