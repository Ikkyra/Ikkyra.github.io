  <?php 
    require 'koneksi.php';
    
    $id = $_GET['id'];


    $query = "SELECT img FROM booking WHERE no_id = $id";
    $result = mysqli_query($conn, $query);
    $booking = mysqli_fetch_assoc($result);

    if ($booking && !empty($booking['img'])) {
        $imagePath = 'image/' . $booking['img'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $query = "DELETE FROM booking WHERE no_id =$id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "
            <script>
                alert('Successfully delete the booking!');
                document.location.href = 'lihat_data.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed to delete the booking. Please try again');
                document.location.href = 'lihat_data.php';
            </script>
        ";
    }
?>