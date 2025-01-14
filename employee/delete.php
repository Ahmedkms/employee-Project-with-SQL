<?php
include "../data/connection.php";
include("../logicCode/functions.php");

if (isset($_GET["id"])) {
    $empID = $_GET["id"];
    $sql = "DELETE FROM employee WHERE ID =$empID";
    if ($conn->query($sql) === true) {
        redirect("../index.php");
        exit;
    } else {
        echo $conn->error;
    }
}


