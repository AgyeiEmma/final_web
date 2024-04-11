<?php
require_once '../action/user_dashboard_action.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Event Booking System</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
<header class="navbar">
        <button onclick="window.location.href='./index_view.php';" class="back-button"><h1>EventSeatBooker</h1></button>
        <nav>
            <ul class="nav-links">
                <li><a href="./index_view.php">Home</a></li>
                <li><a href="./event_view.php">Events</a></li>
                <li><a href="./about_view.php">About</a></li>
                <li><a href="./contact_view.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    
    <section class="user-profile">
        <h2>My Profile</h2>
        <form id="profileForm">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $user['Name'];?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['Email']; ?>" required>
            
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" value="<?php echo $user['Phone']; ?>">
            
            <button type="submit" class="btn">Update Profile</button>
        </form>
    </section>
    
    <section class="booking-history">
        <h2>My Bookings</h2>
        <!-- Dynamic content for bookings will be here. For demonstration, it's static. -->
        <p>No bookings found.</p>
    </section>
    
    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>

    <script src="../index.js"></script>
</body>
</html>