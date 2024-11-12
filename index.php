<?php
// Include database connection
include("dbcon.php");
session_start();

// Variables for error messages
$error_msg = '';

// Handle Login
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = sha1($password); // Hash the password for security

    // Check if user exists
    $select_sql = "SELECT * FROM users WHERE user_name='$username' AND password='$password'";
    $select_query = mysqli_query($con, $select_sql);

    if (mysqli_num_rows($select_query) > 0) {
        $_SESSION['user_session'] = $username;
        $invoice_number = "CA-" . invoice_number();
        header("Location: home.php?invoice_number=$invoice_number");  // Redirect to home page after successful login
        exit();
    } else {
        $error_msg = "<center><font color='red'>Login Failed. Invalid credentials.</font></center>";
    }
}

// Handle Registration
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']); // Hash the password for security
    
    // Check if username already exists
    $check_sql = "SELECT * FROM users WHERE user_name='$username'";
    $check_query = mysqli_query($con, $check_sql);
    
    if (mysqli_num_rows($check_query) > 0) {
        $error_msg = "<center><font color='red'>Username already exists</font></center>";
    } else {
        // Insert new user into the database
        $insert_sql = "INSERT INTO users (user_name, password) VALUES ('$username', '$password')";
        if (mysqli_query($con, $insert_sql)) {
            $_SESSION['user_session'] = $username;
            header("Location: index.php");  // Redirect to login page after successful registration
            exit();
        } else {
            $error_msg = "<center><font color='red'>Registration failed. Please try again.</font></center>";
        }
    }
}

function invoice_number() { // Outputting Random Number For Invoice Number
    $chars = "09302909209300923";
    srand((double)microtime() * 1000000);
    $i = 1;
    $pass = '';
    while ($i <= 7) {
        $num = rand() % 10;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellSide Pharmacy</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <style>
        body {
            /* Set background image */
            background-image: url('images/loginbg.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            overflow: hidden;
            background-attachment: fixed;
            height: 100vh; /* Full height */
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .card-container {
            width: 400px;
            height: 500px;
            margin-bottom: 100px;
            position: fixed;
            perspective: 1500px;
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
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        .card .card-back {
            background-color: rgba(255, 255, 255, 0.8);
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
            margin: 5px ;
            
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
        <div class="card" id="login-register-card">
            <!-- Login Form -->
            <div class="card-front" >
                <h2>WellSide Pharmacy</h2>
                <p>Login to your account</p>
                <form method="POST">
                    <div class="form-group" style="margin-right: 20px;">
                        <label for="username"></label>
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group" style="margin-right: 20px;">
                        <label for="password"></label>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="submit">Login</button>
                    <?php echo isset($error_msg) ? $error_msg : ''; ?>
                </form>
                <p>Don't have an account?</p><a class="flip-link" onclick="flipCard()">Register here</a>
            </div>

            <!-- Registration Form -->
            <div class="card-back">
                <h2>WellSide Pharmacy</h2>
                <p>Register a new account</p>
                <form method="POST">
                    <div class="form-group" style="margin-right: 20px;">
                        <label for="username"></label>
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group" style="margin-right: 20px;">
                        <label for="password"></label>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="register">Register</button>
                    <?php echo isset($error_msg) ? $error_msg : ''; ?>
                </form>
                <p>Already have an account?</p><span><a class="flip-link" onclick="flipCard()">Login here</a></span>
            </div>
        </div>
    </div>

    <script>
        function flipCard() {
            document.getElementById('login-register-card').classList.toggle('flip');
        }
    </script>
</body>

</html>
