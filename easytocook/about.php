<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - EasyToCook</title>
    <link rel="stylesheet" href="Assets/css/style.css?v=<?php echo time(); ?>">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php' ?>   
    <main>
        <section class="about">
            <h2>Our Mission</h2>
            <p>At EasyToCook, our mission is to make cooking simple and enjoyable for everyone. <br> provide easy-to-follow recipes, cooking tips, and meal planning ideas to help you create delicious meals at home.</p>
        </section>
        <section class="about">
            <h2>Our Story</h2>
            <p>Founded in 2024, EasyToCook started as a small blog sharing recipes. <br> Over the years, we have grown into a comprehensive cooking resource, helping thousands of home cooks improve their culinary skills.</p>
        </section>
        <section class="about">
            <h2>Meet the Team</h2>        
            <!-- Team Memebers-->
            <div class="team-container">
                <div class="team-member">
                    <div class="avatar">
                        <img src="Assets/images/rava.jpg" alt="Rava Mahdi Mahdaveka">
                    </div>
                    <p>Rava Mahdi Mahdaveka</p>
                    <p>2309106036</p>
                    <p class="role">Frontend Developer</p>
                </div>
                <div class="team-member">
                    <div class="avatar">
                       <img src="Assets/images/kiki.jpg" alt="Rifki Abiyan">
                    </div>
                    <p>Rifki Abiyan</p>
                    <p>2309106030</p>
                    <p class="role">Frontend Developer</p>
                </div>
                <div class="team-member">
                    <div class="avatar">
                        <img src="Assets/images/dika.png" alt="Andhika Gagahsani Etya Antara">
                    </div>
                    <p>Andhika Gagahrani Etya Antara</p>
                    <p>2309106034</p>
                    <p class="role">Backend Developer</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 EasyToCook. All rights reserved.</p>
    </footer>
    
    <script type="text/javascript" src="Assets/javascript/script.js" defer></script>
</body>
</html>