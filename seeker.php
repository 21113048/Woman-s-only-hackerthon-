<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rojgar"; // Replace 'rojgar' with your actual database name

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "Connected successfully";
// }

// Create the 'job_seeker2' table if it does not exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS job_seeker2 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    job_role VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    education VARCHAR(255) NOT NULL
)";

// if ($conn->query($sql_create_table) === FALSE) {
//     die("Error creating table: " . $conn->error);
// } else {
//     echo "Table 'job_seeker2' created successfully!";
// }

// Form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process the form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $job_role = $_POST["job_role"];
    $location = $_POST["location"];
    $education = $_POST["education"];

    // Insert data into the 'job_seeker2' table
    $sql_insert_data = "INSERT INTO job_seeker2 (username, password, job_role, location, education)
                        VALUES ('$username', '$password', '$job_role', '$location', '$education')";

    if ($conn->query($sql_insert_data) === TRUE) {
        echo "Data added successfully!";
    } else {
        echo "Error adding data: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>