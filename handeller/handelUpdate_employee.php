<?php
include "../data/connection.php"; 

if(isset($_GET['id'])){
    $empID = $_GET['id'];
}
if ($_SERVER["REQUEST_METHOD"]=="POST"){
   
    $name = $_POST["name"];
    $email = $_POST["email"];
    $salary = $_POST["salary"];
    $gender = $_POST["gender"];
    $sql = "UPDATE employee SET name='$name', email='$email', salary='$salary', gender='$gender' 
    WHERE ID =$empID"; 
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }


}

