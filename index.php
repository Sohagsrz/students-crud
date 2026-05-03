<?php
// Start the session and include config
session_start();
include 'config.php';
include 'controller/StudentController.php';

// Get the action from URL
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

// Route to appropriate function
switch ($action) {
    case 'list':
        listStudents();
        break;
    case 'add':
        addStudent();
        break;
    case 'edit':
        showEditForm();
        break;
    case 'update':
        updateStudent();
        break;
    case 'delete':
        deleteStudent();
        break;
    default:
        listStudents();
        break;
}
?>