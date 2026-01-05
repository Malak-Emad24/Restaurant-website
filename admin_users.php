<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: index2.php");
    exit();
}

$success = "";
// Handle password update
if (isset($_POST['update_profile'])) {
    $email = $_SESSION['email'];
    $newPassword = md5($_POST['password']);
    $firstName = mysqli_real_escape_string($conn, $_POST['fName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lName']);

    $updateQuery = "UPDATE user SET firstName='$firstName', lastName='$lastName', password='$newPassword' WHERE email='$email'";
    if ($conn->query($updateQuery)) {
        $success = "Profile updated successfully!";
    }
}

$email = $_SESSION['email'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admins</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Inter', sans-serif; }
        body { margin:0; background-image: url("images/background.jpg"); color:rgba(255, 255, 255, 0.77); display:flex; min-height:100vh; }
        .sidebar { width:260px; background:#0000005a; padding:30px 20px; border-right:1px solid black; }
        .nav-link { display:flex; align-items:center; gap:15px; padding:12px 20px; color:rgba(255, 255, 255, 0.77); text-decoration:none; border-radius:10px; margin-bottom:10px; }
        .nav-link:hover, .nav-link.active { background:#a27d49ff; color:#080808ff; }
        .main-content { flex:1; padding:40px; }
        .card { background:#0000005a; padding:30px; border-radius:10px; border:1px solid black; max-width: 500px; }
        .input-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; color: rgba(255, 255, 255, 0.77); }
        input { width: 100%; padding: 12px; background: #00000079; border: 1px solid black; color: white; border-radius: 8px; }
        .btn { background:#c79a5b; color:black; padding:12px 25px; border:none; border-radius:5px; cursor:pointer; font-weight:bold; width: 100%; margin-top: 10px; }
        .alert { background:rgba(76, 175, 80, 0.2); color:#4CAF50; padding:15px; border-radius:5px; margin-bottom:20px; }
        h2{font-size: 30px;margin-bottom: 40px;color: #c79a5b;text-align: center;font-family: Bebas Neue;text-transform: uppercase;font-weight: 3;word-spacing:2;}
        h1{font-size: 45px;margin-bottom: 40px;color: #c79a5b;font-family: Bebas Neue;text-transform: uppercase;font-weight: 3;word-spacing:2;}
   
    </style>
</head>
<body>
    <aside class="sidebar">
        <h2>Admin Panel</h2>
        <a href="admin_dashboard.php" class="nav-link"><i class="fas fa-home"></i> Dashboard</a>
        <a href="admin_reservations.php" class="nav-link"><i class="fas fa-calendar-check"></i> Reservations</a>
        <a href="admin_content.php" class="nav-link"><i class="fas fa-edit"></i> Edit Content</a>
        <a href="admin_messages.php" class="nav-link"><i class="fas fa-envelope"></i> Messages</a>
        <a href="admin_users.php" class="nav-link active"><i class="fas fa-user-cog"></i> My Profile</a>
    </aside>

    <main class="main-content">
        <h1 >My Admin Profile</h1>
        <?php if($success): ?>
            <div class="alert"><?php echo $success; ?></div>
        <?php endif; ?>

        <div class="card">
            <form method="POST">
                <div class="input-group">
                    <label>First Name</label>
                    <input type="text" name="fName" value="<?php echo $user['firstName']; ?>" required>
                </div>
                <div class="input-group">
                    <label>Last Name</label>
                    <input type="text" name="lName" value="<?php echo $user['lastName']; ?>" required>
                </div>
                <div class="input-group">
                    <label>Email (Read Only)</label>
                    <input type="email" value="<?php echo $user['email']; ?>" disabled>
                </div>
                <div class="input-group">
                    <label>New Password</label>
                    <input type="password" name="password" placeholder="Enter new password" required>
                </div>
                <button type="submit" name="update_profile" class="btn">Update Profile</button>
            </form>
        </div>
    </main>
</body>
</html>