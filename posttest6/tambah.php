<?php 
    require 'koneksi.php';

    if (isset($_POST['book_campsite'])) {
        $nama = $_POST['nama'];
        $nama_campsite = $_POST['nama_campsite'];
        $number_of_night = $_POST['number_of_night'];
        $number_of_people = $_POST['number_of_people'];
        $payment = $_POST['payment'];
        $img = $_FILES['img']['name'];
        $img_temp = $_FILES['img']['tmp_name'];

        $fileExtension = explode('.', $img);
        $fileExtension = strtolower(end($fileExtension));
        $formatName = date('Y-m-d H.m.s').'.'.$fileExtension;
        $validExtensions = ['jpg', 'jpeg', 'png', 'svg'];
        $size = $_FILES['img']['size'];
        $max_size = 5 * 1024 * 1024;

        if(in_array($fileExtension, $validExtensions)){
            if($size <= $max_size){
                if(move_uploaded_file($img_temp, 'image/'.$formatName)){
                    $query = "INSERT INTO booking (nama, nama_campsite, number_of_night, number_of_people, payment, img)
                              VALUES ('$nama', '$nama_campsite', '$number_of_night', '$number_of_people', '$payment', '$formatName')";   
                    $result = mysqli_query($conn, $query);
    
                    if ($result ) {
                        unlink('image/'.$booking['img']); 
                        echo "
                            <script>
                                alert('Completed uploading Picture');
                                location.href = 'tambah.php';
                            </script>
                        ";
                    } else {
                        echo "
                            <script>
                                alert('Failed Uploading Picture');
                            </script>
                        ";
                    }
                }
            } else {
                echo "
                    <script>
                        alert('File Size Is Too Big. Maksimum 5MB.');
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('Unrecognized File Type. Please Send in this Following formats: JPG, JPEG, PNG, SVG.');
                </script>
                ";
            }
    }
?>