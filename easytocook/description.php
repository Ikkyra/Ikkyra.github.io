<?php
session_start();
require 'koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    if ( $_SESSION['role'] == "admin") {
        header('Location: admin.php'); 
        exit;
    } else {
        header('Location: index.php'); 
        exit;
    }
}

$recipe_id = $_GET['id'];



// Pastikan user sudah login
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $query = "
        SELECT r.*, AVG(rt.rating) AS avg_rating, 
        (SELECT rating FROM ratings WHERE recipe_id = r.id AND user_id = $user_id) AS user_rating
        FROM recipes r
        LEFT JOIN ratings rt ON r.id = rt.recipe_id
        WHERE r.id = $recipe_id
        GROUP BY r.id
    ";
    
} else{
    $query = "
        SELECT r.*, AVG(rt.rating) AS avg_rating
        FROM recipes r
        LEFT JOIN ratings rt ON r.id = rt.recipe_id
        WHERE r.id = $recipe_id
        GROUP BY r.id
    ";
}

// Ambil detail resep dan rata-rata rating
$result = mysqli_query($conn, $query);
$recipe = mysqli_fetch_assoc($result);

$avg_rating = $recipe['avg_rating'] ? number_format($recipe['avg_rating'], 1) : 'Not Rated Yet';
if (isset($_SESSION['user_id'])){
    $user_rating = $recipe['user_rating'] ? $recipe['user_rating'] : null;
}

// Proses menyimpan rating jika ada form submit untuk rating
if (isset($_SESSION['user_id'])){
    if (isset($_POST['submit_rating']) && isset($_POST['rating'])) {
        $new_rating = $_POST['rating'];
    
        // Cek apakah user sudah memberikan rating sebelumnya
        $query_check = "SELECT * FROM ratings WHERE recipe_id = $recipe_id AND user_id = $user_id";
        $result_check = mysqli_query($conn, $query_check);
    
        if (mysqli_num_rows($result_check) > 0) {
            // Update rating jika sudah ada
            $query_update = "UPDATE ratings SET rating = $new_rating WHERE recipe_id = $recipe_id AND user_id = $user_id";
            mysqli_query($conn, $query_update);
        } else {
            // Insert rating baru jika belum ada
            $query_insert = "INSERT INTO ratings (recipe_id, user_id, rating) VALUES ($recipe_id, $user_id, $new_rating)";
            mysqli_query($conn, $query_insert);
        }
    
        // Ambil ulang rating terbaru untuk user setelah submit
        $user_rating = $new_rating;
        
        // Ambil rata-rata rating terbaru
        $query_avg = "SELECT AVG(rating) AS avg_rating FROM ratings WHERE recipe_id = $recipe_id";
        $result_avg = mysqli_query($conn, $query_avg);
        $avg_rating = mysqli_fetch_assoc($result_avg)['avg_rating'];
        $avg_rating = $avg_rating ? number_format($avg_rating, 1) : 'Belum ada rating';
    
        // Redirect to the same page to prevent form resubmission
        header("Location: ".$_SERVER['PHP_SELF']."?id=".$recipe_id);
        exit();
    }
    // Proses menambah komentar
    if (isset($_POST['tamabh'])) {
        $comme = $_POST['comment'];
        $query_comment = "INSERT INTO comments (recipe_id, user_id, comment) VALUES ($recipe_id, $user_id, '$comme')";
        $result = mysqli_query($conn, $query_comment);
    
        if ($result) {
            echo "<script>
                    document.location.href = 'description.php?id=$recipe_id';
                  </script>";
        } else {
            echo "<script>alert('Gagal menambah comment!');</script>";
        }
    }
}



// Ambil komentar untuk resep
$query_comments = "SELECT 
c.comment, 
u.username 
FROM comments c 
JOIN users u ON c.user_id = u.id 
WHERE c.recipe_id = $recipe_id 
ORDER BY c.created_at DESC";
$result_comments = mysqli_query($conn, $query_comments);
$comments = mysqli_fetch_all($result_comments, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($recipe['title']); ?> - Easy To Cook</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Assets/css/style.css?v=<?php echo time(); ?>">
</head>
<body class="darkmode">
    <!-- Header -->
    <?php include 'header.php'; ?>

    <main>
        <div class="recipe-container">
            <!-- Recipe Header -->
            <div class="recipe-header">
                <h1><?php echo ($recipe['title']); ?></h1>
                <div class="recipe-image">
                    <img src="Assets/images/<?php echo ($recipe['image']); ?>" alt="<?php echo ($recipe['title']); ?>">
                </div>
            </div>

            <!-- Star Rating Section -->
        <?php if (isset($_SESSION['user_id'])):?>
            <div class="rating-container">
                <div class="average-rating">
                    Average Rating: <?php echo $avg_rating; ?> stars
                </div>
                <form method="POST" class="star-rating-form">
                    <!-- Hidden field to identify rating submission -->
                    <input type="hidden" name="submit_rating" value="1">
                    <div class="star-rating" data-recipe-id="<?php echo $recipe_id; ?>" data-user-id="<?php echo $user_id; ?>" data-user-rating="<?php echo $avg_rating; ?>">
                        <?php
                            $rounded_avg_rating = round($recipe['avg_rating']); 
                            for ($i = 1; $i <= 5; $i++): ?>
                            <span class="fa fa-star <?php ($i <= 5) ? 'checked' : ''; ?>" data-star="<?php echo $i; ?>"></span>
                        <?php endfor; ?>
                    </div>
                    <div class="user-rating-text">
                        Your Rating: <?php echo $user_rating ? $user_rating . ' stars' : 'Not rated yet'; ?>
                    </div>
                    <input type="hidden" name="rating" id="userRating" value="<?php echo $user_rating ? $user_rating : ''; ?>">
                    <button type="submit" style="display: none;"></button> 
                </form>
            </div>
        <?php else: ?>
            <div>
                <?php 
                for ($i = 1; $i <= 5; $i++): ?>
                    <span class="fa fa-star <?php echo ($i <= $avg_rating) ? 'checked' : ''; ?>"></span>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

            <!-- Recipe Information -->
            <div class="recipe-info">
                <h2>Recipe Information</h2>
                <div class="info-item">
                    <strong>Total Time:</strong> <?php echo htmlspecialchars($recipe['time']); ?> Minutes
                </div>
                                    
                <h2>Ingredients</h2>
                <div class="info-item">
                    <?php echo nl2br(htmlspecialchars($recipe['ingredients'])); ?>
                </div>
                                    
                <h2>Preparation</h2>
                <div class="info-item">
                    <?php echo nl2br(htmlspecialchars($recipe['preparation'])); ?>
                </div>
            </div>

            <!-- Comment Section -->
            <div class="comment-section">
                <h2>Comments</h2>
                <?php if (isset($_SESSION['user_id'])):?>
                <form method="POST" class="comment-form">
                    <input type="text" name="comment" placeholder="Add Comment" required>
                    <button type="submit" name="tamabh">Submit</button>
                </form>
                <?php endif; ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="comment">
                        <strong><?php echo ($comment['username']); ?>:</strong>
                        <p><?php echo ($comment['comment']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <footer>
        <p>© 2024 Easy to Cook. All rights reserved.</p>
    </footer>

    <script src="Assets/javascript/script.js" defer></script>
    <script src="Assets/javascript/hamburger.js" defer></script>
</body>
</html>
