<?php
require_once '../setting/connection.php';

$action = $_GET['action'] ?? '';
$BookingID = $_GET['BookingID'] ?? '';

if ($action == 'cancel' && !empty($BookingID)) {
    // Example cancellation logic
    $stmt = $pdo->prepare("DELETE FROM Bookings WHERE BookingID = ?");
    $stmt->execute([$BookingID]);

    header("Location: ../view/manage_bookings_view.php");
    exit();
}
elseif ($action == 'update') {
    // Validate and sanitize inputs
    $BookingID = $_POST['BookingID'];
    $EventID = $_POST['eventID'];
    $UserID = $_POST['userID'];

    // Update the booking
    $stmt = $pdo->prepare("UPDATE Bookings SET EventID = ?, UserID = ? WHERE BookingID = ?");
    $stmt->execute([$EventID, $UserID, $BookingID]);

    header("Location: ../view/manage_bookings_view.php");
    exit();
}
function writeAuditLog($pdo, $userID, $actionType, $description) {
    $stmt = $pdo->prepare("INSERT INTO AuditLogs (UserID, ActionType, Description) VALUES (?, ?, ?)");
    $stmt->execute([$userID, $actionType, $description]);
}

// Example usage after a booking action
if ($action == 'update' && $stmt->execute()) {
    writeAuditLog($pdo, $userID, 'Update Booking', 'Booking ' . $BookingID . ' was updated.');
}
?>