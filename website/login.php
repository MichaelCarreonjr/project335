<?php
session_start();
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, email, password, usertype FROM login WHERE email = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email); // Bind email directly
              
        if ($stmt->execute()) {
            $stmt->store_result();
            
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id, $email, $stored_password, $usertype);
                if ($stmt->fetch()) {
                    if ($password == $stored_password) {
                        $_SESSION["id"] = $id;
                        $_SESSION["email"] = $email;
                        $_SESSION["usertype"] = $usertype;
                        if ($usertype == 'admin') {
                            header("location: admin.php");
                            exit; // Add exit to prevent further execution
                        } elseif ($usertype == 'user') {
                            header("location: index.php");  
                            exit; // Add exit to prevent further execution
                        }
                    } else {
                        $login_err = "Invalid email or password.";
                    }
                }
            } else {
                $login_err = "Invalid email or password.";
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        $stmt->close();
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
    
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Database</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <center>
        <form class="form_container" method="POST" action="login.php">
            <div class="logo_container">
                <img src="image/logo.png" alt="image">
            </div>
            <div class="title_container">
                <p class="title">Login to your Account</p>
                <span class="subtitle">Get started with our app, just create an account and enjoy the experience.</span>
            </div>
            <br>
            <div class="input_container">
                <label class="input_label" for="email_field">Email</label>
                <input placeholder="name@mail.com" title="Input title" name="email" type="text" class="input_field" id="email_field">
            </div>
            <div class="input_container">
                <label class="input_label" for="password_field">Password</label>
                <input placeholder="Password" title="Input title" name="password" type="password" class="input_field" id="password_field"> 
            </div>

            <input type="submit" name="submit" value="Submit" class="sign-in_btn">
        </form>
    </center>
</body>
</html>
