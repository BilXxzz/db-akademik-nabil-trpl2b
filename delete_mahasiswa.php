<<<<<<< HEAD
<?php
include "koneksi_akademik.php";

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];


    $sql = "DELETE FROM mahasiswa WHERE nim = ?";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $nim);
        
        if ($stmt->execute()) {
            header("Location: index.php?pesan=sukses_hapus");
        } else {
            header("Location: index.php?pesan=gagal");
        }
        $stmt->close();
    } else {
        echo "Error: " . $db->error;
    }
}
$db->close();
=======
<?php
include "koneksi_akademik.php";

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    // Query Delete
    $sql = "DELETE FROM mahasiswa WHERE nim = ?";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $nim);
        
        if ($stmt->execute()) {
            header("Location: index.php?pesan=sukses_hapus");
        } else {
            header("Location: index.php?pesan=gagal");
        }
        $stmt->close();
    } else {
        echo "Error: " . $db->error;
    }
}
$db->close();
>>>>>>> 3af36b07f7847a3d840d6240c5d59b049706880c
?>