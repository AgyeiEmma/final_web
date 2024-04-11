<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Overview</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    
<header class="navbar">
        <button onclick="window.location.href='../view/index_view.php';" class="back-button"><h1>EventSeatBooker</h1></button>
        <nav>
            <ul class="nav-links">
                <li><a href="./index_view.php">Home</a></li>
                <li><a href="./event_view.php">Events</a></li>
                <li><a href="./about_view.php">About</a></li>
                <li><a href="./contact_view.php">Contact</a></li>
            </ul>
        </nav>
    </header>


    <section class="hero">
        <h1>Available Events</h1>
        <p>Discover and book tickets for the best events around you.</p>
        <p id="eventCount"><h1>Number of Events: 3</h1></p> <!-- Placeholder for dynamic content -->
        <div class="events-grid">
            <div class="event">
                <a href="../view/price_view.php"> <!-- Update this href with the correct link -->
                    <img src='../images/event 3.jpeg' alt="Event 1">
                    <h2 style="color: white;">Champion league <br>final 2024</h2>
                </a>
            </div>
            <div class="event">
                <a href="../view/price_view.php"> <!-- Update this href with the correct link -->
                    <img src="../images/event1.jpeg" alt="Event 2">
                    <h2 style="color: white;" >FOCAC 2024 <br>South Africa</h2>
                </a>
            </div>
            <div class="event">
                <a href="../view/price_view.php"> <!-- Update this href with the correct link -->
                    <img src="../images/event2.jpeg" alt="Event 3">
                    <h2 style="color: white;">Medical Ethihad <br>Conference 2024</h2>
                </a>
            </div> <!-- Add more events as needed -->
        </div>
    
    </section>

    <footer>
        <p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
    </footer>
</body>
</html>
