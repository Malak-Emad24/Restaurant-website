<?php
session_start();
include 'db.php';

// Protect admin routes
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: index2.php");
    exit();
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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #130f08;
            color: rgba(255, 255, 255, 0.77);
            min-height: 100vh;
            margin: 0;
            background-image: url("images/background.jpg");
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: #00000043;
            padding: 30px 20px;
            border-right: 1px solid #050505ff;
        }

        .sidebar h2 {
            font-size: 30px;
            margin-bottom: 40px;
            color: #c79a5b;
            text-align: center;
            font-family: Bebas Neue;
            text-transform: uppercase;
            font-weight: 3;
            word-spacing:2;

        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.77);
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 10px;
            transition: 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            background: #a27d49ff;
            color: #000000ff;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 40px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;

        }

        .stat-card {
            background: #0000005a;
            padding: 30px;
            border-radius: 15px;
            border: 1px solid #050505ff;
            text-align: center;
            transition: 0.3s;
        }

        .stat-card:hover {
            border-color: #a27d49ff;
            transform: translateY(-5px);
        }

        .stat-card i {
            font-size: 40px;
            color: #a27d49ff;
            margin-bottom: 15px;
        }

        .stat-card h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .stat-card .count {
            font-size: 32px;
            font-weight: bold;
            color: #fff;
        }

        .logout-btn {
            background: #a27d49ff;
            color: black;
            padding: 8px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #86673dff;
            color: #130f08;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <a href="admin_dashboard.php" class="nav-link active"><i class="fas fa-home"></i> Dashboard</a>
            <a href="admin_reservations.php" class="nav-link"><i class="fas fa-calendar-check"></i> Reservations</a>
            <a href="admin_content.php" class="nav-link"><i class="fas fa-edit"></i> Edit Content</a>
            <a href="admin_messages.php" class="nav-link"><i class="fas fa-envelope"></i> Messages</a>
            <a href="homepage.php" class="nav-link" style="margin-top: 50px;"><i class="fas fa-external-link-alt"></i> View Site</a>
        </aside>

        <main class="main-content">
            <header>
                <h1 style=font-family:Montserrat; >Welcome, <?php echo $user['firstName']; ?>!</h1>
                <div class="admin-profile">
                    <span><?php echo $email; ?></span>
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            </header>

            <div class="stats-grid" >
                <?php
                $resQuery = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation");
                $resCount = mysqli_fetch_assoc($resQuery)['count'];

                $msgQuery = mysqli_query($conn, "SELECT COUNT(*) as count FROM contact_messages");
                $msgCount = mysqli_fetch_assoc($msgQuery)['count'];

                $dishQuery = mysqli_query($conn, "SELECT COUNT(*) as count FROM dishes");
                $dishCount = mysqli_fetch_assoc($dishQuery)['count'];
                ?>

                <div class="stat-card">
                    <i class="fas fa-utensils"></i>
                    <h3>Reservations</h3>
                    <div class="count"><?php echo $resCount; ?></div>
                </div>

                <div class="stat-card">
                    <i class="fas fa-comment-alt"></i>
                    <h3>New Messages</h3>
                    <div class="count"><?php echo $msgCount; ?></div>
                </div>

                <div class="stat-card">
                    <i class="fas fa-pizza-slice"></i>
                    <h3>Menu Items</h3>
                    <div class="count"><?php echo $dishCount; ?></div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>