<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "root"; // Replace with your MySQL password
$dbname = "myportfolio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$message = "";

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Handle Registration
        if ($action === 'register') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            // Check if email already exists
            $checkEmail = $conn->prepare("SELECT email FROM users WHERE email = ?");
            $checkEmail->bind_param("s", $email);
            $checkEmail->execute();
            $checkEmail->store_result();

            if ($checkEmail->num_rows > 0) {
                $message = "Email is already registered.";
            } else {
                // Insert user into the database
                $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $email, $password);

                if ($stmt->execute()) {
                    $message = "Registration successful! You can now log in.";
                } else {
                    $message = "Error: " . $stmt->error;
                }
                $stmt->close();
            }
            $checkEmail->close();
        }

        // Handle Login
        if ($action === 'login') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Fetch user from the database
            $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($hashedPassword);
            $stmt->fetch();

            if ($hashedPassword && password_verify($password, $hashedPassword)) {
                $message = "Login successful!";
                
                // Redirect to website.php after successful login
                header("Location: website.php");
                exit(); // Ensure no further code is executed after the redirect
            } else {
                $message = "Invalid email or password.";
            }
            $stmt->close();
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Login and Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        /* Your CSS styling remains the same */
        body {
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            width: 350px;
        }
        .logo {
            text-align: center;
            padding: 20px;
        }
        .logo img {
            margin-bottom: -42px;
            height: 150px;
            width: 300px;
        }
        .form-container {
            display: flex;
            position: relative;
            width: 200%;
            transition: transform 0.6s ease;
        }
        .form {
            background-color: white;
            padding: 20px;
            width: 50%;
            box-sizing: border-box;
        }
        .form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form .form-group {
            margin-bottom: 15px;
        }
        .form button {
            width: 100%;
            background: #2575fc;
            color: white;
            border: none;
        }
        .form p {
            text-align: center;
            margin-top: 10px;
        }
        .form p a {
            color: #2575fc;
            text-decoration: none;
        }
        .slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            transition: transform 0.6s ease, background 0.6s ease;
            z-index: -1;
        }
        .form-container.active .slider {
            transform: translateX(100%);
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="6.png" alt="Logo">
    </div>
    <div class="form-container">
        <div class="slider"></div>

        <!-- Login Form -->
        <div class="form" id="loginForm">
            <h2>Login</h2>
            <form method="POST" action="website.php">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <input type="hidden" name="action" value="login">
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <p>Don't have an account? <a href="#" id="showRegister">Register</a></p>
        </div>

        <!-- Register Form -->
        <div class="form" id="registerForm">
            <h2>Register</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <input type="hidden" name="action" value="register">
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <p>Already have an account? <a href="#" id="showLogin">Login</a></p>
        </div>
    </div>
</div>

<script>
    const formContainer = document.querySelector('.form-container');
    const showRegister = document.getElementById('showRegister');
    const showLogin = document.getElementById('showLogin');

    // When "Register" link is clicked
    showRegister.addEventListener('click', function (e) {
        e.preventDefault();
        formContainer.style.transform = 'translateX(-50%)'; // Slide the container to show the register form
        formContainer.classList.add('active'); // Change the background color of the slider
    });

    // When "Login" link is clicked
    showLogin.addEventListener('click', function (e) {
        e.preventDefault();
        formContainer.style.transform = 'translateX(0)'; // Slide back to show the login form
        formContainer.classList.remove('active'); // Reset the background color of the slider
    });
</script>
</body>
</html>
