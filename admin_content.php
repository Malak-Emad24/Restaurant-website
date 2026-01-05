<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: index2.php");
    exit();
}

// Handle Update
if(isset($_POST['update_about'])){
    $new_content = mysqli_real_escape_string($conn, $_POST['about_text']);
    $conn->query("UPDATE site_content SET content_text='$new_content' WHERE section_name='about'");
    $success = "About Us content updated successfully!";
}

// Handle Service Update
if(isset($_POST['update_service'])){
    $id = (int)$_POST['service_id'];
    $name = mysqli_real_escape_string($conn, $_POST['service_name']);
    $icon = mysqli_real_escape_string($conn, $_POST['service_icon']);
    $conn->query("UPDATE services SET name='$name', icon='$icon' WHERE id=$id");
    $success = "Service updated successfully!";
}

$about_query = $conn->query("SELECT content_text FROM site_content WHERE section_name='about'");
$about_text = $about_query->fetch_assoc()['content_text'];

$services_query = $conn->query("SELECT * FROM services");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Content</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Inter', sans-serif; }
        body { margin:0; background-image: url("images/background.jpg");; color:rgba(255, 255, 255, 0.77);; display:flex; min-height:100vh; }
        .sidebar { width:260px; background:#0000005a; padding:30px 20px; border-right:1px solid #050505ff; }
        .nav-link { display:flex; align-items:center; gap:15px; padding:12px 20px; color:rgba(255, 255, 255, 0.77);; text-decoration:none; border-radius:10px; margin-bottom:10px; }
        .nav-link:hover, .nav-link.active { background:#a27d49ff; color:#130f08; }
        .main-content { flex:1; padding:40px; }
        .card { background:#0000005a; padding:30px; border-radius:15px; border:1px solid #050505ff; margin-bottom: 30px; }
        textarea { width:100%; height:150px; background:#0000005a; border:1px solid #050505ff; color:white; padding:15px; border-radius:10px; margin-top:20px; resize:none; }
        input { width:100%; background:#0000005a; border:1px solid #050505ff; color:white; padding:10px; border-radius:5px; margin-bottom:10px; }
        .btn { background:#a27d49ff; color:#130f08; padding:10px 25px; border:none; border-radius:5px; cursor:pointer; font-weight:bold; margin-top:10px; }
        .alert { background:rgba(76, 175, 80, 0.2); color:#4CAF50; padding:15px; border-radius:5px; margin-bottom:20px; }
        .service-item { border-bottom: 1px solid #050505ff; padding: 20px 0; }
        .service-item:last-child { border-bottom: none; }
        h2{font-size: 30px;margin-bottom: 40px;color: #c79a5b;text-align: center;font-family: Bebas Neue;text-transform: uppercase;font-weight: 3;word-spacing:2;}
        h3 {font-size: 25px;margin-bottom: 40px;color: #caa777ff;text-align: center;font-family: Bebas Neue;font-weight: 3;word-spacing:2;}
        h1{ font-size:45;color:#c79a5b;font-family: Bebas Neue;text-transform: uppercase;font-weight: 3;word-spacing:2; }
        
    </style>
</head>
<body>
    <aside class="sidebar">
        <h2>Admin Panel</h2>
        <a href="admin_dashboard.php" class="nav-link"><i class="fas fa-home"></i> Dashboard</a>
        <a href="admin_reservations.php" class="nav-link"><i class="fas fa-calendar-check"></i> Reservations</a>
        <a href="admin_content.php" class="nav-link active"><i class="fas fa-edit"></i> Edit Content</a>
        <a href="admin_messages.php" class="nav-link"><i class="fas fa-envelope"></i> Messages</a>
        <a href="admin_users.php" class="nav-link"><i class="fas fa-user-cog"></i> My Profile</a>
        <a href="homepage.php" class="nav-link" style="margin-top: 50px;"><i class="fas fa-external-link-alt"></i> View Site</a>
    </aside>

    <main class="main-content">
        <h1 >Edit Landing Page Content</h1>
        <?php if(isset($success)): ?>
            <div class="alert"><?php echo $success; ?></div>
        <?php endif; ?>

        <div class="card">
            <h3>"About Us" Section</h3>
            <form method="POST">
                <textarea name="about_text"><?php echo $about_text; ?></textarea>
                <button type="submit" name="update_about" class="btn">Save About Us</button>
            </form>
        </div>

        <div class="card">
            <h3>"Our Services" Section</h3>
            <?php while($service = $services_query->fetch_assoc()): ?>
                <div class="service-item">
                    <form method="POST">
                        <input type="hidden" name="service_id" value="<?php echo $service['id']; ?>">
                        <label>Service Name</label>
                        <input type="text" name="service_name" value="<?php echo $service['name']; ?>">
                        <label>Icon (Emoji)</label>
                        <input type="text" name="service_icon" value="<?php echo $service['icon']; ?>">
                        <button type="submit" name="update_service" class="btn">Update <?php echo $service['name']; ?></button>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
</body>
</html>