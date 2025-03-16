<?php
include ("../data/connection.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../logicCode/functions.php";
include "../logicCode/validation.php";

$error =  [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }

    $name = sanitizeInput($name);
    $email = sanitizeInput($email);
    $salary = sanitizeInput($salary);

    if (required($name)) {
        $error[] = "Full name is required input";
    } elseif (minimumchars($name, 3)) {
        $error[] = "Full name must be more than 3 chars";
    } elseif (maximumchars($name, 20)) {
        $error[] = "Full name can not be more than 20 character";
    }

    //validate email 
    if (required($email)) {
        $error[] = " email is required";
    } elseif (emailvalidate($email)) {
        $error[] = "invalid email format";
    }

    //validate salary

    if (required($salary)) {
        $error[] = " Salary is required input";
    } elseif (minimumslary($salary, 4000)) {
        $error[] = "salary must be greater than 4000";
    } elseif (maxSalary($salary, 50000)) {
        $error[] = "salary must be less than 50000";
    }
    // validate Gender
    if (required($gender) || !in_array($gender, ["Male", "Female"])) {
        $error[] = "gender must be required from the lis";
    }
    if (!empty($error)) {
        $_SESSION["errors"] = $error;
        redirect("../employee/create.php");
    } else {
        if($conn->connect_error){
            die("connection error". $conn->connect_error);
        }
        $sql = "INSERT INTO employee (name, email, salary, gender) 
        VALUES ('$name', '$email', '$salary', '$gender')";
        if($conn->query($sql)===true){
            echo "the first row added sucsssfuly";
        } 

        header("Location: ../index.php");
        exit;
    }
}
