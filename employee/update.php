<?php
include "../includes/header.php";
include "../includes/nav.php";
include "../data/connection.php";
?>
<?php

if (isset($_GET['id'])) {
    $empID = $_GET['id'];
    $sql = "SELECT * FROM employee WHERE ID = $empID ";
    $result = $conn->query($sql);
    $employee = $result->fetch_assoc();
    
    $id = $employee["ID"];
    $name = $employee["name"];
    $email= $employee["email"];
    $salary=$employee["salary"];
    $gender = $employee["gender"]; 
}
?>
    <div class="ms-auto" style="width: 97%; ">
    <h1 class="my-4">Update Existing Emplyee</h1>

    <form action="../handeller/handelUpdate_employee.php?id= <?php echo htmlspecialchars($empID) ?>" method="POST">
    <div class="mb-3">
        <label for="id" class="form-label">Employee ID</label>
        <input type="number" class="form-control" id="ID" name="emp_id" 
               value="<?php echo htmlspecialchars($id)?>" readonly>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" 
               value="<?php echo htmlspecialchars($name); ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" 
               value="<?php echo htmlspecialchars($email); ?>" required>
    </div>
    <div class="mb-3">
        <label for="salary" class="form-label">Salary</label>
        <input type="number" class="form-control" id="salary" name="salary" 
               value="<?php echo htmlspecialchars($salary); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Gender</label>
        <div>
            <input type="radio" id="male" name="gender" value="Male" 
                   <?php echo (isset($gender) && $gender === 'Male') ? 'checked' : ''; ?>>
            <label for="male">Male</label>
        </div>
        <div>
            <input type="radio" id="female" name="gender" value="Female" 
                   <?php echo (isset($gender) && $gender === 'Female') ? 'checked' : ''; ?>>
            <label for="female">Female</label>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Update Employee</button>
</form>
    </div>
    <?php
    include "../includes/footer.php";
    ?>