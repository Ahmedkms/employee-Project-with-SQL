<?php 
include "../data/connection.php";

// Connect to the database

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['arrange'])&& $_GET['arrange']==='true' ) {
    // Fetch all employees ordered by Emp_ID
    $result = $conn->query("SELECT * FROM employee ORDER BY ID ASC");

    $newId = 1;

    // Update each employee's Emp_ID
    while ($row = $result->fetch_assoc()) {
        $currentId = $row['ID'];
        $conn->query("UPDATE employee SET ID = $newId WHERE ID = $currentId");
        $newId++;
    }

    header("Location:../index.php");
    exit();
}
