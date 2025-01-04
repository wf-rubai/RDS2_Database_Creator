<?php
$conn = new mysqli("127.0.0.1", "root", "", "NSU_Courses");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tableName = "RDS2_courses_251";

$createTableSQL = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course VARCHAR(100) NOT NULL,
    section VARCHAR(50) NOT NULL,
    faculty VARCHAR(100) NOT NULL,
    time VARCHAR(100) NOT NULL,
    room VARCHAR(100) NOT NULL,
    seats_available INT NOT NULL
)";
if (!$conn->query($createTableSQL)) {
    die("Error creating table: " . $conn->error);
}

$jsonFilePath = "json/course_list_251.json";
$jsonData = file_get_contents($jsonFilePath);
$data = json_decode($jsonData, true);

if ($data === null) {
    die("Error reading JSON file.");
}

foreach ($data as $row) {
    $course = $conn->real_escape_string($row['course']);
    $section = $conn->real_escape_string($row['section']);
    $faculty = $conn->real_escape_string($row['faculty']);
    $time = $conn->real_escape_string($row['time']);
    $room = $conn->real_escape_string($row['room']);
    $seats = $conn->real_escape_string($row['seats']);

    $sql = "INSERT INTO $tableName (course, section, faculty, time, room, seats_available)
            VALUES ('$course', '$section', '$faculty', '$time', '$room', '$seats')";

    if (!$conn->query($sql)) {
        echo "Error inserting data: " . $conn->error;
        break;
    }
}

$conn->close();
echo "Data imported successfully from JSON to database.";

?>
