<?php
$servername = "sql1.njit.edu";
$username = "jb547";
$password = "fDJxjUmk";
$dbname = "jb547";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE RLManager (
email VARCHAR(32) NOT NULL unique,
password VARCHAR(64) NOT NULL,
discord VARCHAR(32),
GPA int(1),
system VARCHAR(16),
rank VARCHAR(16),
tracker VARCHAR(64),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
