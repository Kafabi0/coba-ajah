<?php
session_start(); // Start the session
include 'koneksiweb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_or_email_or_phone = $_POST['username_atau_email_atau_phone'];
    $password = $_POST['password'];

    // Escape untuk mencegah SQL Injection
    $username_or_email_or_phone = mysqli_real_escape_string($db_connect, $username_or_email_or_phone);
    $password = mysqli_real_escape_string($db_connect, $password);

    // Query untuk memeriksa keberadaan pengguna
    $query = "SELECT * FROM register WHERE (username='$username_or_email_or_phone' OR email='$username_or_email_or_phone' OR nomor_telepon='$username_or_email_or_phone') AND password='$password'";

    $result = mysqli_query($db_connect, $query);

    if (mysqli_num_rows($result) > 0) {
        // Fetch user data
        $user = mysqli_fetch_assoc($result);

        // Store user data in session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        echo "Login berhasil!";
        // Redirect ke halaman web yang diinginkan
        header("Location: setelahlogin.html"); // Redirect ke halaman PHP
        exit();
    } else {
        echo "Login gagal. Username atau password salah.";
    }
}
?>
