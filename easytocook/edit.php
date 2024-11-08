<?php 
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true || $_SESSION['role'] !== 'admin') {
    header('location:index.php');
    exit;
}
require 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM recipes WHERE id = $id";
$result = mysqli_query($conn, $query);

$recipes = [];
while($row = mysqli_fetch_assoc($result)){
    $recipes[] = $row;
}

$recipes = $recipes[0];

if (isset($_POST['edit'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $time = $_POST['time'];
    $ingredient = $_POST['ingredients'];
    $preparation = $_POST['preparation'];
    $oldimg = $_POST['oldimg'];

    if($_FILES['image']['error'] === 4) {
        $new_file_name = $oldimg;
    } else {
        $tmp_name = $_FILES['image']['tmp_name'];
        $file_name = $_FILES['image']['name'];

        $validExtension = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
        $fileExtension = explode('.', $file_name);
        $fileExtension = strtolower(end($fileExtension));

        if (!in_array($fileExtension, $validExtension)){
            echo "<script>
                alert('Invalid File Format/Extention');
                document.location.href = 'edit.php?id=$id';
            </script>";
            exit;
        } else {
            $new_file_name = date('Y-m-d H.i.s') . '.' . pathinfo($file_name, PATHINFO_EXTENSION);
            move_uploaded_file($tmp_name, 'Assets/images/' . $new_file_name);
            unlink('Assets/images/' . $oldimg); 
        }
    }

    $query = "UPDATE recipes SET title='$title', category='$category', time='$time', ingredients='$ingredient', preparation='$preparation', image='$new_file_name' WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if ($result){
        echo "<script>
            alert('Data Successfully Updated');
            document.location.href = 'admin.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Failed to Update');
            document.location.href = 'admin.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Assets/css/style.css?v=<?php echo time(); ?>">
</head>
<body class="darkmode">
    <!-- Header -->
    <?php include 'header.php' ?>   

    <!-- Edit Recipe Form -->
    <div class="edit-recipe-form">
        <h2>Edit Recipe</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="recipe_id" value="<?php echo $id; ?>">
            <input type="hidden" name="oldimg" value="<?php echo $recipes['image']; ?>">

            <!-- Recipe Name -->
            <label for="name">Recipe Name</label>
            <input type="text" id="name" name="title" value="<?php echo $recipes['title']; ?>" readonly>

            <!-- Category -->
            <label for="category">Category</label>
            <select id="category" name="category" required>
                <option value="Breakfast" <?php echo ($recipes['category'] == 'Breakfast') ? 'selected' : ''; ?>>Breakfast</option>
                <option value="Lunch" <?php echo ($recipes['category'] == 'Lunch') ? 'selected' : ''; ?>>Lunch</option>
                <option value="Dinner" <?php echo ($recipes['category'] == 'Dinner') ? 'selected' : ''; ?>>Dinner</option>
            </select>

            <!-- Total Time -->
            <label for="time">Total Time</label>
            <input type="text" id="time" name="time" value="<?php echo $recipes['time']; ?>">

            <!-- Ingredients -->
            <label for="ingredients">Ingredients</label>
            <textarea id="ingredients" name="ingredients"><?php echo $recipes['ingredients']; ?></textarea>

            <!-- Preparation -->
            <label for="preparation">preparation</label>
            <textarea id="preparation" name="preparation"><?php echo $recipes['preparation']; ?></textarea>

            <!-- Image Upload -->
            <label for="image">Change Image</label>
            <input type="file" id="image" name="image" class="upload-btn">

            <!-- Submit Button -->
            <button type="submit" name="edit">Save Changes</button>
        </form>
    </div>

    <section>
        <!-- Footer -->
        <footer>
            <p>© 2024 Easy to Cook. All rights reserved.</p>
        </footer>
    </section>
    <script src="Assets/javascript/script.js"></script>
    <script src="Assets/javascript/hamburger.js"></script>
</body>
</html>
