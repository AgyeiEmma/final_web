-- Check your privileges


-- Drop the database if it exists
DROP DATABASE IF EXISTS booking_system_new;

-- Create the database
CREATE DATABASE booking_system_new;

-- Use the database
USE booking_system_new;


-- Create the Users table
CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE, -- Ensure email uniqueness
    Phone VARCHAR(20),
    Role VARCHAR(50) NOT NULL DEFAULT 'user' -- User role (user or admin)
);
ALTER TABLE Users ADD COLUMN Password VARCHAR(255) NOT NULL;

-- Create the Events table
CREATE TABLE Events (
    EventID INT AUTO_INCREMENT PRIMARY KEY,
    EventName VARCHAR(200) NOT NULL,
    EventDate DATE NOT NULL, -- Ensure event dates are in the future
    Venue VARCHAR(200) NOT NULL
);

DELIMITER //
CREATE TRIGGER check_event_date
BEFORE INSERT ON Events
FOR EACH ROW
BEGIN
    IF NEW.EventDate < CURDATE() THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Event date must be in the future';
    END IF;
END //
DELIMITER ;

-- Create the Pins table
CREATE TABLE Pins (
    PinID INT AUTO_INCREMENT PRIMARY KEY,
    Pin VARCHAR(10) UNIQUE NOT NULL,
    EventID INT NOT NULL,
    IsUsed BOOLEAN NOT NULL DEFAULT 0, -- Flag to indicate if the pin has been used
    UsedBy INT, -- UserID of the person who used the pin
    IssuedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp when the pin was issued
    FOREIGN KEY (EventID) REFERENCES Events(EventID),
    FOREIGN KEY (UsedBy) REFERENCES Users(UserID)
);

-- Create the Venues table
CREATE TABLE Venues (
    VenueID INT AUTO_INCREMENT PRIMARY KEY,
    VenueName VARCHAR(200) NOT NULL,
    Layout TEXT NOT NULL -- Adjusted for potential JSON data
);

-- Create the SeatCategories table
CREATE TABLE SeatCategories (
    CategoryID INT AUTO_INCREMENT PRIMARY KEY,
    CategoryName VARCHAR(100) NOT NULL,
    Price DECIMAL(10, 2) NOT NULL CHECK (Price > 0) -- Ensure price is positive
);

-- Create the Seats table
CREATE TABLE Seats (
    SeatID INT AUTO_INCREMENT PRIMARY KEY,
    VenueID INT NOT NULL,
    CategoryID INT NOT NULL,
    SeatNumber VARCHAR(10) NOT NULL,
    FOREIGN KEY (VenueID) REFERENCES Venues(VenueID),
    FOREIGN KEY (CategoryID) REFERENCES SeatCategories(CategoryID)
);

-- Create the Bookings table
CREATE TABLE Bookings (
    BookingID INT AUTO_INCREMENT PRIMARY KEY,
    EventID INT NOT NULL,
    SeatID INT NOT NULL,
    UserID INT NOT NULL,
    FOREIGN KEY (EventID) REFERENCES Events(EventID) ON DELETE CASCADE,
    FOREIGN KEY (SeatID) REFERENCES Seats(SeatID) ON DELETE CASCADE,
    FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE CASCADE
);

-- Create the GuestBookings table
CREATE TABLE GuestBookings (
    GuestBookingID INT AUTO_INCREMENT PRIMARY KEY,
    EventID INT NOT NULL,
    GuestName VARCHAR(100) NOT NULL,
    GuestEmail VARCHAR(100) NOT NULL,
    GuestPhone VARCHAR(20),
    PaymentMethod VARCHAR(50) NOT NULL,
    PaymentDetails BLOB, -- Considered more secure for sensitive data, think about encryption
    TotalAmount DECIMAL(10, 2) NOT NULL CHECK (TotalAmount >= 0), -- Ensure TotalAmount is non-negative
    BookingDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (EventID) REFERENCES Events(EventID) ON DELETE CASCADE
);

-- Create the GuestBookingSeats table
CREATE TABLE GuestBookingSeats (
    GuestBookingID INT NOT NULL,
    SeatID INT NOT NULL,
    PRIMARY KEY (GuestBookingID, SeatID),
    FOREIGN KEY (GuestBookingID) REFERENCES GuestBookings(GuestBookingID) ON DELETE CASCADE,
    FOREIGN KEY (SeatID) REFERENCES Seats(SeatID) ON DELETE CASCADE
);

-- Create the UserRoles table
CREATE TABLE UserRoles (
    RoleID INT AUTO_INCREMENT PRIMARY KEY,
    RoleName VARCHAR(50) NOT NULL UNIQUE,
    Permissions TEXT NOT NULL -- Adjusted to TEXT to accommodate potentially large JSON data
);
CREATE TABLE AuditLogs (
    LogID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT, -- Assuming you're tracking which admin user made the change
    ActionType VARCHAR(50),
    Description TEXT,
    LogDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert user roles and permissions
INSERT INTO UserRoles (RoleName, Permissions) VALUES
    ('user', '["book_seats"]'),
    ('admin', '["manage_events", "manage_venues", "manage_seat_categories", "manage_bookings", "generate_pins", "view_reports"]');
