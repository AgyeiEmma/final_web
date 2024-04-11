<?php
require_once '../setting/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'create') {
        $eventName = $_POST['eventName'];
        $eventDate = $_POST['eventDate'];
        $venue = $_POST['venue'];

        $sql = "INSERT INTO Events (EventName, EventDate, Venue) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$eventName, $eventDate, $venue]);

        header("Location: manage_events_view.php");
        exit();
    }
    // Include conditions and logic for 'update' and 'delete' actions


$action = $_POST['action'] ?? $_GET['action'] ?? '';

if ($action == 'create') {
    // Create event logic...
}
elseif ($action == 'delete') {
    $EventID = $_GET['EventID'];
    $sql = "DELETE FROM Events WHERE EventID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$EventID]);

    header("Location: manage_events_view.php");
    exit();
}
elseif ($action == 'update') {
    $EventID = $_POST['EventID'];
    $eventName = $_POST['eventName'];
    $eventDate = $_POST['eventDate'];
    $venue = $_POST['venue'];

    $sql = "UPDATE Events SET EventName = ?, EventDate = ?, Venue = ? WHERE EventID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$eventName, $eventDate, $venue, $EventID]);

    header("Location: manage_events_view.php");
    exit();
}
    
}
?>