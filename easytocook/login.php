<?php
session_start();
require "koneksi.php";

if (isset($_POST["regis"])) {
    $username = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = "user";

    // Validasi password minimal 5 karakter dan mengandung huruf serta angka
    if (strlen($password) < 5 || !preg_match("/[A-Za-z]/", $password) || !preg_match("/[0-9]/", $password)) {
        echo "
        <script>
        alert('Password must be 5 letters and contains number and letters.');
        document.location.href = 'login.php';
        </script>
        ";
        exit;
    }

    // Hash password setelah validasi
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah email atau username sudah digunakan
    $checkQuery = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "
        <script>
        alert('Email or Username already exist!');
        document.location.href = 'login.php';
        </script>
        ";
    } else {
        $query = "INSERT INTO users (username, email, password, role) VALUES ('$username','$email','$passwordHash', '$role')";
        if (mysqli_query($conn, $query)) {
            echo "
            <script>
            alert('Registration Successful!');
            document.location.href = 'login.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Registration Failed!');
            document.location.href = 'index.php';
            </script>
            ";
        }
    }
}


if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // Cek apakah email ditemukan
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Set session login dan user_id
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $user['id']; // Menyimpan ID pengguna yang sebenarnya
            $_SESSION['role'] = $user['role'];  // Menyimpan role pengguna (admin/user)

            if ($user['role'] === 'admin') {
                echo "
                <script>
                alert('Login Successful! Welcome Admin.');
                document.location.href = 'admin.php';
                </script>
                ";
            } else {
                echo "
                <script>
                alert('Login Successful!');
                document.location.href = 'index.php';
                </script>
                ";
            }
        } else {
            echo "
            <script>
            alert('Wrong Password!');
            </script>
            ";
        }
    } else {
        echo "
        <script>
        alert('Email not found!');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="Assets/css/login.css?v=<?php echo time(); ?>">
    <title>Login Page</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="" method="post">
                <h1>Create Account</h1>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" name="nama" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <button name="regis" >Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="" method="post">
                <h1>Sign In</h1>
                <span>or use your email password</span>
                <input type="email" placeholder="Email" name="email" >
                <input type="password" placeholder="Password" name="password" >
                <button name="login" >Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Sobat Informatika!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="Assets/javascript/login.js"></script>
</body>

</html>