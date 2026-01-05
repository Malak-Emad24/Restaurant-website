<?php
session_start();
include 'db.php';

// Protect admin routes
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: index2.php");
    exit();
}

// Handle status updates
if(isset($_POST['updateStatus'])){
    $id = (int)$_POST['reservation_id'];
    $status = $conn->real_escape_string($_POST['status']);
    $updateQuery = "UPDATE reservation SET status='$status' WHERE id=$id";
    $conn->query($updateQuery);
}

// Handle delete
if(isset($_POST['deleteReservation'])){
    $id = (int)$_POST['reservation_id'];
    $deleteQuery = "DELETE FROM reservation WHERE id=$id";
    $conn->query($deleteQuery);
}

// all reservations
$query = "SELECT * FROM reservation ORDER BY reservation_date DESC, reservation_time DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reservations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', 'Segoe UI', sans-serif;
        }

        body {
            min-height: 100vh;
            padding: 20px;
            color: rgba(255, 255, 255, 0.77);
            margin:0; 
            background-image: url("images/background.jpg");
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        h1 {
            background: #c79a5b;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 32px;
            margin-bottom: 30px;
            text-align: center;
            font-family:Bebas Neue; 
            letter-spacing:1px;
            word-spacing:2px; 
            font-weight:3; 
    
        }


        .back-btn:hover {
            color: #ffed4e;
            transform: translateX(-5px);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: rgba(17, 17, 17, 0.46);
            padding: 20px;
            border-radius: 10px;
            border: 3px solid rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .stat-card h3 {
            color: #c79a5b;
            font-size:28px;
            margin-bottom: 5px;
        }

        .stat-card p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }

        .table-container {
            background: rgba(17, 17, 17, 0.66);
            border-radius: 10px;
            padding: 20px;
            overflow-x: auto;
            border: 3px solid rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            color: #c79a5b;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid #a27d49ff; 
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #a27d49ff};

        tr:hover {
            background: rgba(0, 0, 0, 0.05);
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .status-pending {
            background: rgba(0, 0, 0, 0.2);
            color: #c79a5b;
            border: 1px solid #020202ff;
        }

        .status-confirmed {
            background: #c79a5b;
            color: black;
            border: 1px solid #8d6e43ff;
        }

        .status-cancelled {
            background: #c79a5b;
            color: black;
            border: 1px solid #8d6e43ff;

        }

        .action-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            margin: 2px;
            transition: all 0.3s ease;
        }

        .btn-confirm {
            background: #c79a5b;
            color: black;
            border: 1px solid #8d6e43ff;
        }

        .btn-cancel {
            background: #c79a5b;
            color: black;
            border: 1px solid #8d6e43ff;
        }

        .btn-delete {
            background: #c79a5b;
            color: black;
            border: 1px solid #8d6e43ff;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: rgba(255, 255, 255, 0.5);
        }

        @media (max-width: 768px) {
            .table-container {
                overflow-x: scroll;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="javascript:history.back()" class=" back-btn back-btn-fixed">
    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#c79a5b"><path d="M400-80 0-480l400-400 71 71-329 329 329 329-71 71Z"/></svg>
    </a>

        <h1><i class="fas fa-calendar-check"></i> Manage Reservations</h1>

        <?php
        $totalQuery = "SELECT COUNT(*) as total FROM reservation";
        $pendingQuery = "SELECT COUNT(*) as total FROM reservation WHERE status='pending'";
        $confirmedQuery = "SELECT COUNT(*) as total FROM reservation WHERE status='confirmed'";
        
        $totalCount = $conn->query($totalQuery)->fetch_assoc()['total'];
        $pendingCount = $conn->query($pendingQuery)->fetch_assoc()['total'];
        $confirmedCount = $conn->query($confirmedQuery)->fetch_assoc()['total'];
        ?>

        <div class="stats">
            <div class="stat-card">
                <h3><?php echo $totalCount; ?></h3>
                <p>Total Reservations</p>
            </div>
            <div class="stat-card">
                <h3><?php echo $pendingCount; ?></h3>
                <p>Pending</p>
            </div>
            <div class="stat-card">
                <h3><?php echo $confirmedCount; ?></h3>
                <p>Confirmed</p>
            </div>
        </div>

        <div class="table-container">
            <?php if($result && $result->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Guests</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                <td><?php echo date('M d, Y', strtotime($row['reservation_date'])); ?></td>
                                <td><?php echo date('h:i A', strtotime($row['reservation_time'])); ?></td>
                                <td><?php echo $row['guests']; ?></td>
                                <td>
                                    <span class="status-badge status-<?php echo $row['status']; ?>">
                                        <?php echo ucfirst($row['status']); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if($row['status'] != 'confirmed'): ?>
                                        <form method="POST" style="display: inline;">
                                            <input type="hidden" name="reservation_id" value="<?php echo $row['id']; ?>">
                                            <input type="hidden" name="status" value="confirmed">
                                            <button type="submit" name="updateStatus" class="action-btn btn-confirm">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                    
                                    <?php if($row['status'] != 'cancelled'): ?>
                                        <form method="POST" style="display: inline;">
                                            <input type="hidden" name="reservation_id" value="<?php echo $row['id']; ?>">
                                            <input type="hidden" name="status" value="cancelled">
                                            <button type="submit" name="updateStatus" class="action-btn btn-cancel">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                    
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="reservation_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="deleteReservation" class="action-btn btn-delete" 
                                                onclick="return confirm('Are you sure you want to delete this reservation?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="no-data">
                    <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 10px; opacity: 0.3;"></i>
                    <p>No reservations yet</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>