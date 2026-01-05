<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: index2.php");
    exit();
}

$messages_query = $conn->query("SELECT * FROM contact_messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Inter', sans-serif; }
        body {  margin:0; background-image: url("images/background.jpg"); color:rgba(255, 255, 255, 0.77); display:flex; min-height:100vh; }
        .sidebar { width:260px; background:#0000005a; padding:30px 20px; border-right:1px solid black; }
        .nav-link { display:flex; align-items:center; gap:15px; padding:12px 20px; color:rgba(255, 255, 255, 0.77); text-decoration:none; border-radius:10px; margin-bottom:10px; }
        .nav-link:hover, .nav-link.active { background:#a27d49ff; color:#080808ff; }
        .main-content { flex:1; padding:40px; }
        .message-card { background:#0000005a; padding:20px; border-radius:10px; border:1px solid black; margin-bottom:20px; }
        .message-header { display:flex; justify-content:space-between; margin-bottom:10px; border-bottom:1px solid black; padding-bottom:10px; }
        .sender-name { font-weight:bold; color:#fff; }
        .timestamp { font-size:12px; opacity:0.6; }
        h2{font-size: 30px;margin-bottom: 40px;color: #c79a5b;text-align: center;font-family: Bebas Neue;text-transform: uppercase;font-weight: 3;word-spacing:2;}
        h1{font-size: 45px;margin-bottom: 40px;color: #c79a5b;text-align: center;font-family: Bebas Neue;text-transform: uppercase;font-weight: 3;word-spacing:2;}
   
    </style>
</head>
<body>
    <aside class="sidebar">
        <h2>Admin Panel</h2>
        <a href="admin_dashboard.php" class="nav-link"><i class="fas fa-home"></i> Dashboard</a>
        <a href="admin_reservations.php" class="nav-link"><i class="fas fa-calendar-check"></i> Reservations</a>
        <a href="admin_content.php" class="nav-link"><i class="fas fa-edit"></i> Edit Content</a>
        <a href="admin_messages.php" class="nav-link active"><i class="fas fa-envelope"></i> Messages</a>
    </aside>

    <main class="main-content">
        <h1>Contact Inquiries</h1>
        <div style="margin-top:20px;">
            <?php if($messages_query->num_rows > 0): ?>
                <?php while($msg = $messages_query->fetch_assoc()): ?>
                    <div class="message-card">
                        <div class="message-header">
                            <div>
                                <span class="sender-name"><?php echo htmlspecialchars($msg['name']); ?></span>
                                <span style="opacity:0.6; margin-left:10px;">(<?php echo htmlspecialchars($msg['email']); ?>)</span>
                            </div>
                            <span class="timestamp"><?php echo $msg['created_at']; ?></span>
                        </div>
                        <div class="message-body">
                            <?php echo nl2br(htmlspecialchars($msg['message'])); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No messages received yet.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>