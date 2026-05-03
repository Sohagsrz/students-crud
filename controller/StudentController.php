<?php
include 'models/Student.php';

$student = new Student($conn);

// Display all students
function listStudents() {
    global $student;
    $students = $student->getAllStudents();
    require 'views/list.php';
}

// Show add student form
function showAddForm() {
    require 'views/add.php';
}

// Handle add student form submission
function addStudent() {
    global $student;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $registration_no = $_POST['registration_no'];
        $department = $_POST['department'];
        
        if ($student->addStudent($name, $email, $registration_no, $department)) {
            $message = "Student added successfully!";
            $message_type = "success";
        } else {
            $message = "Error adding student!";
            $message_type = "error";
        }
    }
    require 'views/add.php';
}

// Show edit form
function showEditForm() {
    global $student;
    $id = $_GET['id'];
    $student_data = $student->getStudentById($id);
    require 'views/edit.php';
}

// Handle update student
function updateStudent() {
    global $student;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        
        if ($student->updateStudent($id, $name, $email, $department)) {
            header("Location: index.php?action=list");
            exit;
        } else {
            $message = "Error updating student!";
            $message_type = "error";
        }
    } else {
        $id = $_GET['id'];
        $student_data = $student->getStudentById($id);
    }
    require 'views/edit.php';
}

// Delete student
function deleteStudent() {
    global $student;
    $id = $_GET['id'];
    if ($student->deleteStudent($id)) {
        header("Location: index.php?action=list");
        exit;
    } else {
        $message = "Error deleting student!";
        $message_type = "error";
    }
}
?>
