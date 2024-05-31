<?php
include 'config.php';

// Ambil user ID dari URL atau sesi
$user_id = 1; // Misalnya kita mengambil ID pengguna dari sesi atau URL

// Ambil data pengguna
$daftar_sql = "SELECT username, email, nomor_telepon FROM register WHERE id = ?";
$stmt = $conn->prepare($daftar_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_result = $stmt->get_result();
$daftar = $user_result->fetch_assoc();

// Ambil data pesanan pengguna
$order_sql = "SELECT order_date, total FROM orders WHERE user_id = ?";
$stmt = $conn->prepare($order_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$order_result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Family Aquarium - Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h1 class="mb-4">Profile</h1>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">User Information</h5>
                <p class="card-text"><strong>Username:</strong> <?php echo htmlspecialchars($daftar['username']); ?></p>
                <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($daftar['email']); ?></p>
                <p class="card-text"><strong>Phone:</strong> <?php echo htmlspecialchars($daftar['phone']); ?></p>
            </div>
        </div>

        <h2 class="mb-4">Orders</h2>
        <?php if ($order_result->num_rows > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($order = $order_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                            <td><?php echo htmlspecialchars($order['total']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
    </div>
</body>

</html>
