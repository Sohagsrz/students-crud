<?php
// edit.php - Edit Student Form
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            box-sizing: border-box;
            font-size: 14px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .back-link {
            display: inline-block;
            margin-top: 15px;
            color: #666;
            text-decoration: none;
        }
        .back-link:hover {
            color: #333;
        }
        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 3px;
            text-align: center;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .readonly-field {
            background-color: #f9f9f9;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Student</h1>
        
        <?php if (isset($message)): ?>
            <div class="message <?php echo $message_type; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($student_data) && $student_data): ?>
            <form method="POST" action="index.php?action=update">
                <input type="hidden" name="id" value="<?php echo $student_data['id']; ?>">
                
                <div class="form-group">
                    <label for="registration_no">Registration Number:</label>
                    <input type="text" id="registration_no" name="registration_no" value="<?php echo $student_data['registration_no']; ?>" class="readonly-field" readonly>
                </div>
                
                <div class="form-group">
                    <label for="name">Student Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $student_data['name']; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $student_data['email']; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" id="department" name="department" value="<?php echo $student_data['department']; ?>" required>
                </div>
                
                <button type="submit">Update Student</button>
                <a href="index.php?action=list" class="back-link">← Back to List</a>
            </form>
        <?php else: ?>
            <p>Student not found.</p>
            <a href="index.php?action=list" class="back-link">← Back to List</a>
        <?php endif; ?>
    </div>
</body>
</html>
