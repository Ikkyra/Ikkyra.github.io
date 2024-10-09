<?php 
    require 'koneksi.php';

    if (isset($_POST['book_campsite'])) {
        $nama = $_POST['nama'];
        $nama_campsite = $_POST['nama_campsite'];
        $number_of_night = $_POST['number_of_night'];
        $number_of_people = $_POST['number_of_people'];
        $payment = $_POST['payment'];

        $query = "INSERT INTO booking (nama, nama_campsite, number_of_night, number_of_people, payment)
                  VALUES ('$nama', '$nama_campsite', '$number_of_night', '$number_of_people', '$payment')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Successfully booked the campsite!";
        } else {
            echo "Failed to book the campsite. Please try again.";
        }
    }
?>