<<<<<<< HEAD
<?php

$host = "localhost"; 
$user = "root";
$password = "";
$db_name = "db_akademik";


$db = new mysqli($host, $user, $password, $db_name);

if ($db->connect_error) {
    die("Koneksi gagal: " . $db->connect_error);
}
=======
<?php

$host = "localhost"; 
$user = "root";
$password = "";
$db_name = "db_akademik";


$db = new mysqli($host, $user, $password, $db_name);


if ($db->connect_error) {
    die("Koneksi gagal: " . $db->connect_error);
}
>>>>>>> 3af36b07f7847a3d840d6240c5d59b049706880c
?>