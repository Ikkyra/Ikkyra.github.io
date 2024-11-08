<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true || $_SESSION['role'] !== 'admin') {
    header('location:index.php');
    exit;
}

require 'koneksi.php';

// Proses tambah resep              
if (isset($_POST['tambah'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
    $preparation = mysqli_real_escape_string($conn, $_POST['preparation']);

    // Proses upload gambar
    $tmp_name = $_FILES['image']['tmp_name'];
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $validExtension = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
    $fileExtension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $checkQuery = "SELECT * FROM recipes WHERE title = '$title'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (!in_array($fileExtension, $validExtension)) {
        echo "<script>alert('Please upload the image with these following format(jpg, jpeg, png, webp, svg).');</script>";
    } else {
        $max_size = 10 * 1024 * 1024;
        if ($file_size > $max_size) {
            echo "<script>alert('The maximum file size is 10 MB');</script>";
            exit;
        } else {
            if (mysqli_num_rows($checkResult) > 0 ){
                echo "
                <script>
                alert('Recipe already exist!');
                document.location.href = 'admin.php';
                </script>
                ";
            } else {
                $new_file_name = date('Y-m-d H.i.s') . '.' . pathinfo($file_name, PATHINFO_EXTENSION);
                if (move_uploaded_file($tmp_name, 'Assets/images/' . $new_file_name)) {
                    $query = "INSERT INTO recipes (title, category, time, ingredients, preparation, image) 
                            VALUES ('$title', '$category', '$time', '$ingredients', '$preparation', '$new_file_name')";
                    $result = mysqli_query($conn, $query);
        
                    if ($result) {
                        echo "<script>alert('Successfully added recipe!'); document.location.href = 'admin.php';</script>";
                    } else {
                        echo "<script>alert('Failed to add recipe!'); document.location.href = 'admin.php';</script>";
                    }
                }
            }
        }
    }
}

$recipe_query = "
    SELECT r.*, COALESCE(AVG(rt.rating), 0) AS average_rating
    FROM recipes AS r
    LEFT JOIN ratings AS rt ON r.id = rt.recipe_id
    GROUP BY r.id
";
$recipe_result = mysqli_query($conn, $recipe_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Assets/css/style.css?v=<?php echo time(); ?>"> 
</head>

<body class="darkmode">
    <!-- Header -->
    <?php include 'header.php' ?>

    <!-- Recipe List -->
    <main>
        <div class="recipe-list">
            <table>
                <thead>
                    <tr>
                        <th>IMG</th>
                        <th>Recipe</th>
                        <th>Category</th>
                        <th>Rating</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($recipe = mysqli_fetch_assoc($recipe_result)) {
                        $average_rating = round($recipe['average_rating']); 
                        echo "<tr>
                                <td><div><img src='Assets/images/{$recipe['image']}' alt='{$recipe['title']}' class='recipe-admin'></div></td>
                                <td>{$recipe['title']}</td>
                                <td>{$recipe['category']}</td>
                                <td>";
                                for ($i = 1; $i <= 5; $i++) {
                                    echo "<span class='fa fa-star " . ($i <= $average_rating ? 'checked' : '') . "'></span>";
                                }
                        echo "</td>
                                <td>
                                    <div class='action-buttons'>
                                        <a href='edit.php?id={$recipe['id']}' class='edit'>✏️</a>
                                        <a href='delete.php?id={$recipe['id']}' class='delete' onclick=\"return confirm('Are you sure you want to delete this recipe?');\">🗑️</a>
                                    </div>
                                </td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Add Recipe Form -->
        <div class="add-recipe-form">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Recipe Title" required>
                <select name="category" required>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                </select>
                <input type="text" name="time" placeholder="Total Time">
                <textarea name="ingredients" placeholder="Ingredients"></textarea>
                <textarea name="preparation" placeholder="Preparation Steps"></textarea>
                <input type="file" name="image" class="upload-btn" required>
                <button type="submit" name="tambah">Add Recipe</button>
            </form>
        </div>
    </main>
    
    <footer>
        <p>© 2024 Easy to Cook. All rights reserved.</p>
    </footer>
    
    <script src="Assets/javascript/script.js"></script>
    <script src="Assets/javascript/hamburger.js"></script>
</body>
</html>