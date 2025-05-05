<?php
$name = $phone = $email = $dob = $password = $confirm_password = $background = $main_course = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $errors['name'] = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z ]{3,}$/", trim($_POST["name"]))) {
        $errors['name'] = "Name must be at least 3 letters and contain only alphabets and spaces";
    } else {
        $name = htmlspecialchars(trim($_POST["name"]));
    }

    if (empty($_POST["phone"])) {
        $errors['phone'] = "Phone number is required";
    } elseif (!preg_match('/^[1-9][0-9]{9,14}$/', trim($_POST["phone"]))) {
        $errors['phone'] = "Enter a valid phone number (10-15 digits, no leading 0)";
    } else {
        $phone = htmlspecialchars(trim($_POST["phone"]));
    }

    if (empty($_POST["email"])) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
    }

    if (empty($_POST["dob"])) {
        $errors['dob'] = "Date of Birth is required";
    } else {
        $dob = $_POST["dob"];
        $dob_date = new DateTime($dob);
        $today = new DateTime();
        $age = $today->diff($dob_date)->y;

        if ($age < 18) {
            $errors['dob'] = "You must be at least 18 years old";
        }
    }

    if (empty($_POST["password"])) {
        $errors['password'] = "Password is required";
    } elseif (strlen($_POST["password"]) < 6 || !preg_match('/[A-Za-z]/', $_POST["password"]) || !preg_match('/[0-9]/', $_POST["password"])) {
        $errors['password'] = "Password must be at least 6 characters with at least one letter and one number";
    } else {
        $password = $_POST["password"];
    }

    if (empty($_POST["confirm_password"])) {
        $errors['confirm_password'] = "Confirm your password";
    } elseif ($_POST["password"] !== $_POST["confirm_password"]) {
        $errors['confirm_password'] = "Passwords do not match";
    } else {
        $confirm_password = $_POST["confirm_password"];
    }

    if (empty($_POST["background"])) {
        $errors['background'] = "Please select your background";
    } else {
        $background = $_POST["background"];
    }

    $main_course = $_POST["main_course"] ?? '';

    if (empty($errors)) {
        echo "<h3 style='color:green;'>Registration successful!</h3>";
        // Save to database here
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        form {
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .error {
            color: red;
            font-size: 13px;
            margin: -8px 0 10px 0;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background: #28a745;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Apply for Online Course</h2>
    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" value="<?= $name ?>">
        <span class="error"><?= $errors['name'] ?? '' ?></span>

        <label>Phone:</label>
        <input type="text" name="phone" value="<?= $phone ?>">
        <span class="error"><?= $errors['phone'] ?? '' ?></span>

        <label>Email:</label>
        <input type="text" name="email" value="<?= $email ?>">
        <span class="error"><?= $errors['email'] ?? '' ?></span>

        <label>Date of Birth:</label>
        <input type="date" name="dob" value="<?= $dob ?>">
        <span class="error"><?= $errors['dob'] ?? '' ?></span>

        <label>Password:</label>
        <input type="password" name="password">
        <span class="error"><?= $errors['password'] ?? '' ?></span>

        <label>Confirm Password:</label>
        <input type="password" name="confirm_password">
        <span class="error"><?= $errors['confirm_password'] ?? '' ?></span>

        <label>Background:</label>
        <select name="background">
            <option value="">Select</option>
            <option value="Student" <?= ($background == "Student") ? 'selected' : '' ?>>Student</option>
            <option value="Working Professional" <?= ($background == "Working Professional") ? 'selected' : '' ?>>Working Professional</option>
            <option value="Fresher" <?= ($background == "Fresher") ? 'selected' : '' ?>>Fresher</option>
        </select>
        <span class="error"><?= $errors['background'] ?? '' ?></span>

        <label>Main Course:</label>
        <select name="main_course">
            <option value="">Select</option>
            <option value="Development" <?= ($main_course == "Development") ? 'selected' : '' ?>>Development</option>
            <option value="Design" <?= ($main_course == "Design") ? 'selected' : '' ?>>Design</option>
            <option value="Marketing" <?= ($main_course == "Marketing") ? 'selected' : '' ?>>Marketing</option>
        </select>

        <input type="submit" value="Register">
    </form>
</div>

</body>
</html>
