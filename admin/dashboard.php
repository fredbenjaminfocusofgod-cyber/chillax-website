<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}
include '../includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Chillax Hotel</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php" class="active">Dashboard</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="bookings.php">Bookings</a></li>
                    <li><a href="testimonials.php">Testimonials</a></li>
                    <li><a href="pricing.php">Pricing</a></li>
                    <li><a href="messages.php">Messages</a></li>
                    <li><a href="settings.php">Settings</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>
        <main class="admin-content">
            <div class="header">
                <h1>Welcome, <?php echo $_SESSION['admin_username']; ?></h1>
            </div>
            <div class="dashboard-stats">
                <div class="stat-card">
                    <h3>Total Bookings</h3>
                    <p class="stat-number">0</p>
                </div>
                <div class="stat-card">
                    <h3>Pending Bookings</h3>
                    <p class="stat-number">0</p>
                </div>
                <div class="stat-card">
                    <h3>Total Messages</h3>
                    <p class="stat-number">0</p>
                </div>
                <div class="stat-card">
                    <h3>Gallery Images</h3>
                    <p class="stat-number">0</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
