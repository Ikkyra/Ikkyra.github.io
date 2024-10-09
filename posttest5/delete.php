<?php 
    require 'koneksi.php';
    
    $id = $_GET['id'];

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