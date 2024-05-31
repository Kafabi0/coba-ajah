<?php
session_start(); // Start the session

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // Redirect to login page if not logged in
    exit();
}

include 'koneksiweb.php';

// Fetch additional user data if needed
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM register WHERE id='$user_id'";
$result = mysqli_query($db_connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "User data not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>ID: <?php echo htmlspecialchars($user['id']); ?></p>
    <p>Username: <?php echo htmlspecialchars($user['username']); ?></p>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    <p>Nomor Telepon: <?php echo htmlspecialchars($user['nomor_telepon']); ?></p>

    <a href="logout.php">Logout</a>
</body>
</html>
