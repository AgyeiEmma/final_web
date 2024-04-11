<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Bookings - EventSeatBooker</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
<header class="navbar">
<div class="navbar">
        <button onclick="window.location.href='./index_view.php';" class="back-button"><h1>EventSeatBooker</h1></button> 
        <nav>
            <ul class="nav-links">
                <li><a href="./index_view.php">Home</a></li>
                <li><a href="./event_view.php">Events</a></li>
                <li><a href="./about_view.php">About</a></li>
                <li><a href="./contact_view.php">Contact</a></li>
            </ul>
        </nav>   </div>
</header>

<main>
    <h1>Bookings Management</h1>
    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Event Name</th>
                <th>User</th>
                <th>Booking Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once '../setting/connection.php';
            $stmt = $pdo->query("SELECT Bookings.BookingID, Events.EventName, Users.Name AS UserName, Bookings.BookingDate FROM Bookings INNER JOIN Events ON Bookings.EventID = Events.EventID INNER JOIN Users ON Bookings.UserID = Users.UserID");
            while ($row = $stmt->fetch()) {
                echo "<tr>
                        <td>{$row['BookingID']}</td>
                        <td>{$row['EventName']}</td>
                        <td>{$row['UserName']}</td>
                        <td>{$row['BookingDate']}</td>
                        <td>
                            <a href='edit_booking_view.php?BookingID={$row['BookingID']}'>Edit</a> | 
                            <a href='booking_actions.php?action=cancel&BookingID={$row['BookingID']}' onclick='return confirm(\"Are you sure you want to cancel this booking?\")'>Cancel</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</main>

<footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>
</body>
</html>