<?php
session_start();
include '../setting/connection.php'; // Ensure this path is correct

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not
    header("Location: ../view/home_view.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user information
$userQuery = $conn->prepare("SELECT Name, Email, Phone FROM Users WHERE UserID = ?");
$userQuery->bind_param("i", $user_id);
$userQuery->execute();
$result = $userQuery->get_result();
$user = $result->fetch_assoc();


// Fetch bookings
$bookingQuery = $conn->prepare("SELECT b.BookingID, e.EventName, b.BookingDate FROM Bookings b INNER JOIN Events e ON b.EventID = e.EventID WHERE b.UserID = ?");
$bookingQuery->bind_param("i", $user_id);
$bookingQuery->execute();
$bookings = $bookingQuery->get_result();

// Fetch pins
$pinQuery = $conn->prepare("SELECT Pin FROM Pins WHERE UsedBy = ?");
$pinQuery->bind_param("i", $user_id);
$pinQuery->execute();
$pins = $pinQuery->get_result();

$userQuery->close();
$bookingQuery->close();
$pinQuery->close();
?>