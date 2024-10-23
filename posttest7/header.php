<?php
    if (session_status() == PHP_SESSION_NONE) {    
        session_start();   
    }
?>
<header>
        <div class="container">
            <h1>BOOKCAMP</h1>
            <nav>
                <ul id="navbar">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a id="book-now-nav">Book Now</a></li> 
                    <li><div class="navbar-auth">
                    <?php if (isset($_SESSION['valid'])): ?>
                        <a href="logout.php" class="button">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="button">Login</a>
                    <?php endif; ?>
                    </div></li>
                    <li><a href="lihat_data.php">See Database</a></li>
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