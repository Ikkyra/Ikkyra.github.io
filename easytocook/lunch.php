<?php
require 'koneksi.php';

$query = "
    SELECT 
    r.id, 
    r.title, 
    r.image, 
    r.category, 
    r.time, 
    IFNULL(AVG(rt.rating), 0) AS avg_rating
    FROM recipes r
    LEFT JOIN ratings rt ON r.id = rt.recipe_id
    GROUP BY r.id
    HAVING r.category = 'Lunch'
";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Categories</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Assets/css/style.css?v=<?php echo time(); ?>">
</head>
<body class="darkmode">
    <!-- Header -->
    <?php include 'header.php' ?>
    
    <main>
        <section class="categories">
            <div class="category">
                <span><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-120q-33 0-56.5-23.5T160-200v-342q-37-22-58.5-58.5T80-680q0-66 47-113t113-47h480q66 0 113 47t47 113q0 43-21.5 79.5T800-542v342q0 33-23.5 56.5T720-120H240Zm212-172q12 11 28.5 11t27.5-11l120-120q12-12 12-28.5T628-468L508-588q-11-12-27.5-12T452-588L332-468q-11 11-11 27.5t11 28.5l120 120Zm28-84-64-64 64-64 64 64-64 64Z"/></svg></span>
                <a href="breakfast.php">
                    <p>Breakfast</p>
                </a>
            </div>
            <div class="category">
                <span><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M160-120q-33 0-56.5-23.5T80-200v-120h800v120q0 33-23.5 56.5T800-120H160Zm320-300q-36 0-57 20t-77 20q-56 0-76-20t-56-20q-36 0-57 20t-77 20v-80q36 0 57-20t77-20q56 0 76 20t56 20q36 0 57-20t77-20q56 0 77 20t57 20q36 0 56-20t76-20q56 0 79 20t55 20v80q-56 0-75-20t-55-20q-36 0-58 20t-78 20q-56 0-77-20t-57-20ZM80-560v-40q0-115 108.5-177.5T480-840q183 0 291.5 62.5T880-600v40H80Z"/></svg></span>
                <a href="lunch.php">
                    <p>Lunch</p>
                </a>
            </div>
            <div class="category">
                <span><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m160-120-80-80h800l-80 80H160Zm-40-120q6-18 16-34t24-30v-296h-40v-60h40v-30h-40v-60h40v-30h-40v-60h280q33 0 56.5 23.5T480-760v10h360v60H480v10q0 33-23.5 56.5T400-600h-80v244q14 2 28 6t26 12q26-65 83-103.5T583-480q90 0 153.5 61.5T800-268v28H120Zm200-510h80v-30h-80v30Zm0 90h80v-30h-80v30Zm-100-90h40v-30h-40v30Zm0 90h40v-30h-40v30Zm0 314q10-5 19.5-7.5T260-358v-242h-40v254Z"/></svg></span>
                <a href="dinner.php">
                    <p>Dinner</p>
                </a>
            </div>
        </section>
        
        <section class="recipe-cards">
            <?php while ($recipe = mysqli_fetch_assoc($result)): ?>
                <div class="card">
                    <img src="Assets/images/<?php echo ($recipe['image']); ?>" alt="<?php echo ($recipe['title']); ?>">
                    <p><?php echo ($recipe['category']); ?></p>
                    <h3><a href="description.php?id=<?php echo $recipe['id']; ?>"><?php echo ($recipe['title']); ?></a></h3>
                    <div class="card-footer">
                        <span>⏰ <?php echo ($recipe['time']); ?> Mins</span>
                        <div>
                            <?php 
                            $avg_rating = $recipe['avg_rating'];
                            for ($i = 1; $i <= 5; $i++): ?>
                                <span class="fa fa-star <?php echo ($i <= $avg_rating) ? 'checked' : ''; ?>"></span>
                            <?php endfor; ?>
                        </div>
                        <span><?php echo number_format($recipe['avg_rating'], 1); ?> / 5</span>
                    </div>
                </div>
            <?php endwhile; ?>
        </section>
    </main>
    <section>
        <!-- Footer -->
        <footer>
            <p>© 2024 Easy to Cook. All rights reserved.</p>
        </footer>
    </section>

    <script type="text/javascript" src="Assets/javascript/script.js" defer></script>
    <script type="text/javascript" src="Assets/javascript/hamburger.js" defer></script>
</body>
</html>
