<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}
include '../includes/db.php';

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $filename = basename($file['name']);
    $alt_text = $_POST['alt_text'] ?? 'Gallery Image';
    
    if ($file['size'] > 5000000) {
        $error = 'File size too large (max 5MB)';
    } else {
        $upload_dir = '../uploads/gallery/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        
        $target_file = $upload_dir . uniqid() . '_' . $filename;
        
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            $filename_only = basename($target_file);
            $alt_text = $conn->real_escape_string($alt_text);
            $sql = "INSERT INTO gallery (filename, alt_text, created_at) VALUES ('$filename_only', '$alt_text', NOW())";
            if ($conn->query($sql)) {
                $message = 'Image uploaded successfully!';
            } else {
                $error = 'Database error: ' . $conn->error;
            }
        } else {
            $error = 'Failed to upload image';
        }
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "SELECT filename FROM gallery WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        unlink('../uploads/gallery/' . $row['filename']);
        $sql = "DELETE FROM gallery WHERE id = $id";
        $conn->query($sql);
        $message = 'Image deleted successfully!';
    }
}

$result = $conn->query("SELECT * FROM gallery ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Management - Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="gallery.php" class="active">Gallery</a></li>
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
                <h1>Gallery Management</h1>
            </div>
            
            <?php if ($message): ?>
                <div class="success-message"><?php echo $message; ?></div>
            <?php endif; ?>
            <?php if ($error): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <div class="upload-section">
                <h2>Upload New Image</h2>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="image">Select Image:</label>
                        <input type="file" id="image" name="image" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="alt_text">Alt Text:</label>
                        <input type="text" id="alt_text" name="alt_text" placeholder="Image description">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload Image</button>
                </form>
            </div>
            
            <div class="gallery-management">
                <h2>Uploaded Images</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Filename</th>
                            <th>Alt Text</th>
                            <th>Uploaded</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['filename']; ?></td>
                            <td><?php echo $row['alt_text']; ?></td>
                            <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                            <td>
                                <a href="gallery.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this image?')" class="btn btn-secondary">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
