<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Events</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
< <header class="navbar">
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

<main>
    <h1>Manage Events</h1>
    <section>
        <h2>Add New Event</h2>
        <form action="manage_event_actions.php" method="post">
            <input type="hidden" name="action" value="create">
            <label for="eventName">Event Name:</label>
            <input type="text" id="eventName" name="eventName" required>
            <label for="eventDate">Event Date:</label>
            <input type="date" id="eventDate" name="eventDate" required>
            <label for="venue">Venue:</label>
            <input type="text" id="venue" name="venue" required>
            <button type="submit">Add Event</button>
        </form>
    </section>
    
    <section>
        <h2>Existing Events</h2>
        <section>
    <h2>Existing Events</h2>
    <?php
    require_once '../setting/connection.php';

    $sql = "SELECT EventID, EventName, EventDate, Venue FROM Events ORDER BY EventDate DESC";
    $stmt = $pdo->query($sql);
    ?>
    <table>
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Date</th>
                <th>Venue</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['EventName']) ?></td>
                    <td><?= htmlspecialchars($row['EventDate']) ?></td>
                    <td><?= htmlspecialchars($row['Venue']) ?></td>
                    <td>
                        <a href="edit_event_view.php?EventID=<?= $row['EventID'] ?>">Edit</a>
                        | 
                        <a href="manage_event_actions.php?action=delete&EventID=<?= $row['EventID'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</section>
    </section>
</main>
<footer>
<p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
</footer>
</body>
</html>