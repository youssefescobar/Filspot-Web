<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login_page</title>
    <link rel="stylesheet" href="login.css" />
    <link rel="shortcut icon" href="../../public/filspot.ico" type="image/x-icon">
    <style>
        .message {
            color: white;
            padding: 0px;
            margin-bottom: 15px;
            font size: 35px;
            border-radius: 6px;
            text-align: center;
        }

        .jsbutton {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            width: 300px;
            border-radius: 6px;
            background-image: linear-gradient(90deg, #291748 0%, #9a26ad 100%);
            box-shadow: 0 0 20px 0 #5c2ea0;
            opacity: 0.85;
            font-size: 13px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            margin-bottom: 30px;
            margin-top: 15px;
        }

        .output {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 150px;
            padding-left: 720px;
            font-size: 25px;
            font-weight: 600;
        }
    </style>

</head>

<body>
    <div class="login_background"></div>
    <div class="login">
        <?php
        include("../../php/config.php");
        if (isset($_POST['login_button'])) {
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['pass']);

            $result = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password' ") or die("Select Error");
            $row = mysqli_fetch_assoc($result);

            if (is_array($row) && !empty($row)) {
                header("Location: ../../index.html");
                exit();
            } else {
                echo "<div class='output'><div class='message'>
                     <p>Wrong Username or Password</p>
                      </div> <br>
                      </div>    ";
                echo "<div class='output'><a href='login.php'><button class='jsbutton'>Go Back</button></a></div>";
            }
        } else {
            ?>
            <img src="../../public/filspot_logo.png" alt="Filspot_logo" class="logo">
            <form class="login_form" method="post" action="">
                <input class="inp_email" type="email" name="email" placeholder="Email" required>
                <i class='bx bxs-user'></i>
                <br />
                <br />
                <input class="inp_pass" type="password" name="pass" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
                <br />
                <br />
                <input class="inp_login" type="submit" name="login_button" value="Login">
                <p class="para1">Don't have an account? <a class="sign_up" href="../register/reg.php" alt="error">Sign
                        up!</a></p>

            </form>
        <?php } ?>
    </div>
</body>

</html>