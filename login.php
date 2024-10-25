<?php
session_start();
require('./database.php'); // Include database connection

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement to check for user credentials
    $sql = "SELECT * FROM registration WHERE username = ?";
    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        
        // Get the result
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            // Verify password
            if (password_verify($password, $row['password'])) {
                echo '<script>alert("Login successful!")</script>';

                // Set session variables
                $_SESSION['username'] = $row['username'];
                $_SESSION['userid'] = $row['id']; 

                // Redirect to index.php
                echo '<script>window.location.href = "/GOMEZ/index.php"</script>';
            } else {
                // Invalid password
                echo '<script>alert("Invalid username or password.")</script>';
            }
        } else {
            // Invalid username
            echo '<script>alert("Invalid username or password.")</script>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo '<script>alert("Error preparing statement: ' . mysqli_error($connection) . '")</script>';
    }

    mysqli_close($connection); // Close the database connection
}
?>


<!DOCTYPE html>
<html lang="tl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            transition: all 0.3s ease;
        }
        .container:hover {
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.15);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-size: 14px;
            color: #666;
            margin-bottom: 6px;
        }
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: border-color 0.3s;
        }
        input:focus {
            border-color: #74ebd5;
            outline: none;
        }
        input[type="text"]::placeholder {
            content: "👤 Username";
        }
        input[type="password"]::placeholder {
            content: "🔒 Password";
        }
        button {
            width: 100%;
            padding: 12px;
            background: #74ebd5;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background: #ACB6E5;
        }
        p {
            text-align: center;
            color: #666;
        }
        a {
            color: #74ebd5;
            text-decoration: none;
            transition: color 0.3s;
        }
        a:hover {
            color: #ACB6E5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔑 Login</h2>
        <form action="" method="post"> <!-- Submit to the same page -->
            <label for="username">👤 Username</label>
            <input type="text" id="username" name="username" placeholder="👤 Username" required>

            <label for="password">🔒 Password</label>
            <input type="password" id="password" name="password" placeholder="🔒 Password" required>

            <button type="submit" name="login">🚀 Login</button>
        </form>
        <p> Don't have an account? <a href="registration.php"> Register here </a></p>
    </div>
</body>
</html>
