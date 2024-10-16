<?php 
require 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM booking WHERE no_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$booking = mysqli_fetch_assoc($result);

if (isset($_POST['ubah'])) {
    $nama = $_POST['nama'];
    $nama_campsite = $_POST['nama_campsite'];
    $number_of_night = $_POST['number_of_night'];
    $number_of_people = $_POST['number_of_people'];
    $payment = $_POST['payment'];

    if ($_FILES['img']['name']) {
        $img = $_FILES['img']['name'];
        $img_temp = $_FILES['img']['tmp_name'];
        $fileExtension = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        $formatName = date('Y-m-d_H.i.s') . '.' . $fileExtension;
        $validExtensions = ['jpg', 'jpeg', 'png', 'svg'];
        $size = $_FILES['img']['size'];
        $max_size = 5 * 1024 * 1024;

        if (in_array($fileExtension, $validExtensions) && $size <= $max_size) {
            if (move_uploaded_file($img_temp, 'image/' . $formatName)) {
                unlink('image/' . $booking['img']);
                $imgQuery = ", img='$formatName'";
            } else {
                echo "<script>alert('Failed to upload the picture.');</script>";
            }
        } else {
            echo "<script>alert('Invalid file type or size exceeds 5MB.');</script>";
        }
    } else {
        $imgQuery = "";
    }

    $query = "UPDATE booking SET nama=?, nama_campsite=?, number_of_night=?, number_of_people=?, payment=? $imgQuery WHERE no_id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sssssi', $nama, $nama_campsite, $number_of_night, $number_of_people, $payment, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Successfully updated booking.'); location.href='lihat_data.php';</script>";
    } else {
        echo "<script>alert('Failed to update booking.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <!-- Navbar -->
    <header>
    <div class="container">
            <h1>BOOKCAMP</h1>
            <nav>
                <ul id="navbar">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="lihat_data.php">Back</a></li>
                    <li><button id="mode-toggle" onclick="dark()">Dark Mode</button></li>
                </ul>
                <div class="hamburger" id="hamburger-menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </nav>
        </div>
    </header> 

    <main class="update-section">
        <h1 class="update-title">
            Edit Booking
        </h1>

        <div class="form-campsite">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-field">
                    <label for="nama" class="label-field">Your Name</label>
                    <input type="text" name="nama" id="nama" value="<?php echo $booking['nama'] ?>" required>
                </div>
                <div class="input-field">
                    <label for="nama_campsite" class="label-field">Campsite Name</label>
                    <input type="text" name="nama_campsite" id="nama_campsite" value="<?php echo $booking['nama_campsite'] ?>" required>
                </div>
                <div class="input-field">
                    <label for="number_of_night" class="label-field">Number of Nights</label>
                    <input type="number" name="number_of_night" id="number_of_night" value="<?php echo $booking['number_of_night'] ?>" required>
                </div>
                <div class="input-field">
                    <label for="number_of_people" class="label-field">Number of People</label>
                    <input type="number" name="number_of_people" id="number_of_people" value="<?php echo $booking['number_of_people'] ?>" required>
                </div>
                <div class="input-field">
                    <label for="payment" class="label-field">Payment Details</label>
                    <input type="text" name="payment" id="payment" value="<?php echo $booking['payment'] ?>" required>
                </div>
                <div class="input-field">
                    <label for="img">Please Upload Your Picture To Help With Validation.</label>
                    <input type="file" name="img">
                </div>
                <input type="submit" value="Update" name="ubah" class="button">
            </form>
        </div>
    </main>

    <!-- Include JavaScript -->
    <script src="assets/javascript/script.js"></script>
</body>
</html>
