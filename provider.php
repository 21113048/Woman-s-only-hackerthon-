<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rojgar"; // Replace 'rojgar' with your actual database name

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}

// Create the 'job_provider2' table if it does not exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS job_provider2 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    jobrole VARCHAR(255) NOT NULL,
    salary FLOAT NOT NULL,
    Number_of_vacancies INT NOT NULL
)";

if ($conn->query($sql_create_table) === FALSE) {
    die("Error creating table: " . $conn->error);
} else {
    echo "Table 'job_provider2' created successfully!";
}

// Form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process the form data
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $location = $_POST["location"];
    $jobrole = $_POST["job_role"];
    $salary = $_POST["salary"];
    $Number_of_vacancies = $_POST["vacancy"];

    // Insert data into the 'job_provider2' table
    $sql_insert_data = "INSERT INTO job_provider2 (username, password, location, jobrole, salary, Number_of_vacancies)
                        VALUES ('$username', '$password', '$location', '$jobrole', '$salary', '$Number_of_vacancies')";

    if ($conn->query($sql_insert_data) === TRUE) {
        echo "Data added successfully!";
    } else {
        echo "Error adding data: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>