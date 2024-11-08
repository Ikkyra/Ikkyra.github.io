<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true || $_SESSION['role'] !== 'admin') {
    header('location:index.php');
    exit;
}

require 'koneksi.php';

// Cek apakah ada ID di URL
if (isset($_GET['id'])) {
    $recipe_id = $_GET['id'];

    // Hapus gambar terkait dari folder jika ada
    $query = "SELECT image FROM recipes WHERE id = $recipe_id";
    $result = mysqli_query($conn, $query);
    $recipe = mysqli_fetch_assoc($result);

    if ($recipe) {
        $image_path = 'Assets/images/' . $recipe['image'];
        if (file_exists($image_path)) {
            unlink($image_path); // Hapus file gambar
        }

        // Hapus data resep dari database
        $delete_query = "DELETE FROM recipes WHERE id = $recipe_id";
        if (mysqli_query($conn, $delete_query)) {
            echo "<script>
                    alert('Resep berhasil dihapus!');
                    document.location.href = 'admin.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menghapus resep!');
                    document.location.href = 'admin.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Resep tidak ditemukan!');
                document.location.href = 'admin.php';
              </script>";
    }
} else {
    header('location:admin.php');
    exit;
}
?>
