<?php
// Include database connection
include("dbcon.php");
session_start();

// Check if the form is submitted
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']); // Hash the password for security
    
    // Check if username already exists
    $check_sql = "SELECT * FROM users WHERE user_name='$username'";
    $check_query = mysqli_query($con, $check_sql);
    
    if (mysqli_num_rows($check_query) > 0) {
        $error_msg = "<center><font color='red'>Username already exists</font></center>";
    } else {
        // Insert the new user into the database
        $insert_sql = "INSERT INTO users (user_name, password) VALUES ('$username', '$password')";
        if (mysqli_query($con, $insert_sql)) {
            $_SESSION['user_session'] = $username;
            header("Location: index.php");  // Redirect to login page after successful registration
            exit();
        } else {
            $error_msg = "<center><font color='red'>Registration failed</font></center>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellSide Pharmacy - Register</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #B2EBF2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            font-family: Arial, sans-serif;
        }

        .card-container {
            width: 400px;
            height: 500px;
            perspective: 1500px;
            margin-top: 100px;
            margin-left: auto;
            margin-right: auto;
        }

        .card {
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.8s;
            position: relative;
        }

        .card.flip {
            transform: rotateY(180deg);
        }

        .card .card-front,
        .card .card-back {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 10px;
        }

        .card .card-front {
            background-color: #f7f7f7;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        .card .card-back {
            background-color: #FAF3F0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            transform: rotateY(180deg);
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .error-message {
            color: red;
            text-align: center;
        }

        .flip-link {
            margin-top: 10px;
            display: block;
            text-align: center;
            color: #007bff;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="card-container">
        <div class="card" id="register-card">
            <div class="card-front">
                <h2>Register for WellSide Pharmacy</h2>
                <form method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <button type="submit" name="register">Register</button>
                    <?php echo isset($error_msg) ? $error_msg : ''; ?>
                </form>
                <a class="flip-link" onclick="flipCard()">Already have an account? Login here</a>
            </div>

            <div class="card-back">
                <h2>Login to WellSide Pharmacy</h2>
                <form method="POST" action="index.php">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <button type="submit" name="submit">Login</button>
                </form>
                <a class="flip-link" onclick="flipCard()">Don't have an account? Register here</a>
            </div>
        </div>
    </div>

    <script>
        function flipCard() {
            document.getElementById('register-card').classList.toggle('flip');
        }
    </script>
</body>

</html>
