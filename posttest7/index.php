<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSTTEST7</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Header.php -->
    <?php include 'header.php' ?>

    <section id="home" class="home-section">
        <div class="home-content">
            <h2>BOOK YOUR PERFECT CAMPOUT</h2>
            <p>Create unforgettable memories</p>
            <button id="book-now">Book a campsite</button> 
        </div>
        <div class="home-img">
            <img src="assets/images/lake-motosu-1.jpg" alt="" class="slideshow-img active">
            <img src="assets/images/lake-motosu-2.jpg" alt="" class="slideshow-img">
            <img src="assets/images/fumoto-1.jpg" alt="" class="slideshow-img">
            <img src="assets/images/fumoto-2.jpg" alt="" class="slideshow-img">
            <img src="assets/images/suimeiso-1.jpg" alt="" class="slideshow-img">
            <img src="assets/images/suimeiso-2.jpg" alt="" class="slideshow-img">
        </div>
    </section>

    <section id="campsite-info" class="info-section">
        <div class="info-heading">
            <h2>Explore Our Campsites</h2>
        </div>
        <div class="card-container">
            <div class="card" data-camp="lake-motosu">
                <h3>Lake Motosu Campsite</h3>
                <p>Beautiful campsite near Lake Motosu with stunning lake views and forest surroundings.</p>
                <button class="info-btn" data-camp="lake-motosu">More Info</button>
                <img src="assets/images/lake-motosu-1.jpg" alt="">
            </div>
            <div class="card" data-camp="fumoto">
                <h3>Fumoto Campsite</h3>
                <p>Located near the foot of Mount Fuji, perfect for enjoying mountain views and hiking trails.</p>
                <button class="info-btn" data-camp="fumoto">More Info</button>
                <img src="assets/images/fumoto-1.jpg" alt="">
            </div>
            <div class="card" data-camp="suimeiso">
                <h3>Suimeiso Campsite</h3>
                <p>Relax by the riverside and enjoy the peaceful surroundings at this cozy campsite.</p>
                <button class="info-btn" data-camp="suimeiso">More Info</button>
                <img src="assets/images/suimeiso-1.jpg" alt="">
            </div>
        </div>
    </section>

    <div id="lake-motosu-popup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h3>Lake Motosu Campsite</h3>
            <p>Motosuko was formed when an eruption by Mount Fuji separated a larger prehistoric lake into three smaller lakes in the 9th century. The resulting three lakes, Motosuko, Saiko and Shojiko, remain connected by underground waterways, as they continue to constantly maintain the same water level of 900 meters above sea level.</p>
        </div>
    </div>

    <div id="fumoto-popup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h3>Fumoto Campsite</h3>
            <p>Located in Fujinomiya City, Shizuoka Prefecture, “Fumotoppara Campground” is a popular campground spread out at the foot of majestic Mount Fuji. Its vast grounds of about 700,000 square meters offer numerous open free sites with a full view of Mount Fuji, allowing visitors to fully enjoy camping in the great outdoors.</p>
        </div>
    </div>

    <div id="suimeiso-popup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h3>Suimeiso Campsite</h3>
            <p>Lake Shibireko or Suimeiso is located in Ichikawa Misato town in the middle west of Yamanashi prefecture. It takes thirty minutes to go from the nearest train station, Ichikawa Daimon (市川大門) to the lake by car. The origin of the name of the lake is a dragon as the names of many lakes and mountains in Japan are also from the worship of the god dragons. The origin of the name of Shibireko is the god dragon with four tales called Bisaki Ryuoh (尾崎竜王). In the Edo period (From 1603 to 1868), the eight lakes located on the bottom of Fuji Mountain were called Fuji Hakko (富士八湖), and Lake Shibireko was one of them.</p>
        </div>
    </div>

<!-- Booking Form -->
<div id="booking-popup" class="popup">
    <div class="popup-content">
        <span id="close-popup" class="close">&times;</span>
        <h3>Book Your Campsite</h3>
        <form id="booking-form" action="tambah.php" method="post" enctype="multipart/form-data" target="form-iframe">
            <label for="nama">Your Name:</label>
            <input type="text" id="nama" name="nama" placeholder="Enter Your Name" required>

            <label for="nama-campsite">Campsite Name:</label>
            <input type="text" id="nama-campsite" name="nama_campsite" placeholder="Enter Campsite" required>

            <label for="num-nights">Number of Nights:</label>
            <input type="number" id="num-nights" name="number_of_night" placeholder="Number of Nights" required>

            <label for="num-people">Number of People:</label>
            <input type="number" id="num-people" name="number_of_people" placeholder="Number of People" required>

            <label for="payment">Payment Details:</label>
            <input type="text" id="payment" name="payment" placeholder="Enter Payment Details" required>

            <label for="img">Please Upload Your Picture To Help With Validation.</label>
            <input type="file" name="img" id="img" required>

            <button type="submit" name="book_campsite">Submit Booking</button>
        </form>
    </div>
</div>

    <footer>
        <div class="container">
            <p>&copy; Rifki Abiyan | 2309106030 | A2'23</p>
        </div>
    </footer>

    <!-- Include JavaScript -->
    
    <script src="assets/javascript/script.js"></script>
</body>
</html>
