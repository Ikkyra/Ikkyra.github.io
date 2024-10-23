<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">
        <?php

            include("koneksi.php");
            if(isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Verify 
                $verify_query = mysqli_query($conn, "SELECT Email FROM users WHERE Email = '$email'");

                if(mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                            <p>This Email Is Already Registered</p>
                        </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                } else {

                    mysqli_query($conn, "INSERT INTO users (Username, Email, Password) VALUES ('$username', '$email', '$password')") or die("Error Occured");


                    echo "<div class='message'>
                            <p>Registration Successful</p>
                        </div> <br>";
                    echo "<a href='login.php'><button class='btn'>Login Now</button></a>";
                }
            } else {

            ?>
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>

                <div class="link">
                    Already have an account? <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>

    <script src="assets/javascript/script.js"></script>
</body>

</html>