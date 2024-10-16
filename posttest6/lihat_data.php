  <?php 
    require 'koneksi.php';

    $query = "SELECT * FROM booking";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $booking = [];
    while($row = mysqli_fetch_assoc($result)) {
      $booking[] = $row;
    }
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Campsite Bookings</title>
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

      <!-- Display Bookings in a Table -->
      <table class="table-campsite">
        <thead>
          <tr class="table-campsite-row">
            <th class="table-campsite-header">No</th>
            <th class="table-campsite-header">Name</th>
            <th class="table-campsite-header">Campsite</th>
            <th class="table-campsite-header">Nights</th>
            <th class="table-campsite-header">People</th> 
            <th class="table-campsite-header">Payment</th>
            <th class="table-campsite-header">Picture</th>
            <th class="table-campsite-header">Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 1; foreach($booking as $book) : ?>
            <?php $folder ="image/".$book["img"]?>
            <tr class="table-campsite-row">
              <td class="table-campsite-data"><?php echo $i; ?></td>
              <td class="table-campsite-data"><?php echo htmlspecialchars($book['nama']); ?></td>
              <td class="table-campsite-data"><?php echo htmlspecialchars($book['nama_campsite']); ?></td>
              <td class="table-campsite-data"><?php echo htmlspecialchars($book['number_of_night']); ?></td>
              <td class="table-campsite-data"><?php echo htmlspecialchars($book['number_of_people']); ?></td>
              <td class="table-campsite-data"><?php echo htmlspecialchars($book['payment']); ?></td>
              <td><?php echo "<img src='$folder' width='100px' height='100px'>"; ?>   </td>
              <td class="table-campsite-data">
                <div class="button-UD">
                  <a href="edit.php?id=<?php echo $book['no_id'] ?>">
                    <button class="edit-data">
                      <p>Edit</p>
                      <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                    </button>
                  </a>
                  <a href="delete.php?id=<?php echo $book['no_id'] ?>" onclick="return confirm('Are you sure you want to delete this booking?')">
                    <button name="no_id" class="hapus-data">
                      <p>Delete</p>
                      <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                    </button>
                  </a>
                </div>
              </td>
            </tr>
          <?php $i++; endforeach ?>
        </tbody>
      </table>
    </main>

    <!-- Include Footer -->
    <footer>
        <div class="container">
            <p>&copy; Rifki Abiyan | 2309106030 | A2'23</p>
        </div>
    </footer>

    <script src="assets/javascript/script.js"></script>
  </body>

  </html>
