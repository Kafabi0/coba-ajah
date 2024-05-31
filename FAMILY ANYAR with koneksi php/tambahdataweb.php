<?php
include 'koneksiweb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['username'];
    $email = $_POST['email'];
    $nomor = $_POST['nomor_telepon'];
    $password = $_POST['password'];

    // Escape user inputs for security
    $nama = mysqli_real_escape_string($db_connect, $nama);
    $email = mysqli_real_escape_string($db_connect, $email);
    $nomor = mysqli_real_escape_string($db_connect, $nomor);
    $password = mysqli_real_escape_string($db_connect, $password);

    // Query untuk menambah data ke dalam tabel pembeli
    $query = "INSERT INTO register (username, email, nomor_telepon, password) VALUES ('$nama', '$email', '$nomor', '$password')";
    
    if (mysqli_query($db_connect, $query)) {
        // Data berhasil ditambahkan, arahkan ke halaman login
        header("Location: coollogin&register.html");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($db_connect);
    }
}
?>
