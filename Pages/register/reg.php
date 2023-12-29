<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="reg.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../../public/filspot.ico" type="image/x-icon">
    <style>
        .message {

            color: white;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
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
        }
    </style>
</head>

<body>
    <img src="../../public/filspot_logo.png" alt="logo" class="logo-img">
    <div class="signup">
        <?php
        include("../../php/config.php");

        if (isset($_POST['signup'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // verifying the unique email
            $verify_query = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");

            if (mysqli_num_rows($verify_query) != 0) {
                echo "<div class='message'>
                          <p>This email is used, Try another one, please!</p>
                      </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='jsbutton'>Go Back</button></a>";
            } else {
                mysqli_query($con, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')") or die("Error Occurred");

                echo "<div class='message'>
                          <p>Registration successful!</p>
                      </div> <br>";
                echo "<a href='../login/login.php'><button class='jsbutton'>Login Now</button></a>";
            }
        } else {
            ?>
            <form class="signform" method="post" action="">
                <br>
                <input type="text" name="username" class="inpusr" placeholder="Username">
                <br><br>
                <input class="inpem" type="email" name="email" placeholder="Your Email" required>
                <br><br>
                <input class="inppass" type="password" name="password" placeholder="Enter Password" required>
                <br><br>
                <label for="terms-and-conditions">
                    <p class="text">
                        <input class="inline" id="terms-and-conditions" type="checkbox" required
                            name="terms-and-conditions" />I accept the <a href="#"
                            onclick="window.alert('والله هديكم اكتر من 10 درجات (انت حلفت ههه)')">terms and conditions</a>
                    </p>
                </label>
                <br><br>
                <input class="inpbutton" type="submit" name="signup" value="Sign Up">
            </form>
        <?php } ?>
    </div>
</body>

</html>