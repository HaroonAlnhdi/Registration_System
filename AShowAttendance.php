<?php
// Establish database connection
$host = 'localhost';
$user = 'root';
$password = ' ';
$database = 'itcs489';

$connection = new mysqli($host, $user, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Function to display attendance records for a student
function showAttendance($connection, $studentID)
{
    // Retrieve attendance records for the student from the database
    $query = "SELECT * FROM attendance WHERE StudentID = '$studentID'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        // Display attendance records
        echo "<h2>Attendance Records</h2>";
        echo "<table class='attendance-table'>";
        echo "<tr><th>Date</th><th>Status</th></tr>";

        while ($row = mysqli_fetch_assoc($result)){
            $date = $row['Date'];
            $status = $row['Status'];

            echo "<tr><td>$date</td><td>$status</td></tr>";
        }

        echo "</table>";
    } else {
        echo "No attendance records found.";
    }
}

// Retrieve the list of students for the teacher
$query = "SELECT * FROM Student_course"; 
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    // Display the dropdown list
    echo "<form method='POST' action='' class='attendance-form'>";
    echo "<label for='studentID'>Select a student:</label>";
    echo "<select name='studentID' id='studentID'>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        $studentID = $row['Student_ID'];
        $firstName = $row['FName'];
        $lastName = $row['LName'];
        $studentName = $firstName . ' ' . $lastName;
        echo "<option value='$studentID'>" . $row['Student_ID'] . " - " . $studentName . "</option>";
    }
    
    echo "</select>";
    echo "<input type='submit' value='Show Attendance'>";
    echo "</form>";

    // Display attendance records if a student is selected
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedStudentID = $_POST['studentID'];
        showAttendance($connection, $selectedStudentID);
    }
} else {
    echo "No students found.";
}


mysqli_close($connection);
?>

<!-- Add CSS styles -->
<style>
    .attendance-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px;
    }
    
    label {
        font-weight: bold;
        margin-bottom: 10px;
    }
    
    select {
        padding: 10px;
        font-size: 16px;
        border: 2px solid #ccc;
        border-radius: 5px;
        margin-right: 10px;
    }
    
    input[type="submit"] {
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    
    input[type="submit"]:hover {
        background-color: #3e8e41;
    }
    
    .attendance-table {
        border-collapse: collapse;
        margin-top: 20px;
    }
    
    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    th {
        background-color: #4CAF50;
        color: white;
    }
    
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>