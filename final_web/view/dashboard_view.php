<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - EventSeatBooker</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <header class="navbar">
        <button onclick="window.location.href='./index_view.php';" class="back-button"><h1>EventSeatBooker</h1></button>

        <nav>
            <ul class="nav-links">
                <li><a href="./index_view.php">Home</a></li>
                <li><a href="./events_view.php">Events</a></li>
                <li><a href="./about_view.php">About</a></li>
                <li><a href="./contact_view.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="dashboard-section">
            <h1>Admin Dashboard</h1>
            <div class="dashboard-container">
                <div class="dashboard-card">
                    <h2>Event Management</h2>
                    <p>Create, update, or remove events, manage venues, and view bookings.</p>
                    <a href="./manage_events_view.php" class="btn">Manage Events</a>
                </div>
                <div class="dashboard-card">
                    <h2>User Management</h2>
                    <p>Manage user accounts, including roles and access levels.</p>
                    <a href="manage_users_view.php" class="btn">Manage Users</a>
                </div>
                <div class="dashboard-card">
                    <h2>Bookings Management</h2>
                    <p>View, modify, or cancel bookings.</p>
                    <a href="manage_bookings_view.php" class="btn">Manage Bookings</a>
                </div>
                <div class="dashboard-card">
                    <h2>Venues and Seating</h2>
                    <p>Define venues, seating arrangements, and categories.</p>
                    <a href="manage_venues_view.php" class="btn">Manage Venues</a>
                </div>
                <div class="dashboard-card">
                    <h2>Access Codes</h2>
                    <p>Generate, distribute, and manage access pins or codes for events.</p>
                    <a href="generate_codes_view.php" class="btn">Generate Codes</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>
</body>
</html>