<?php
include "includes/header.php";
include "includes/nav.php";
include "data/connection.php";
?>

<div class="container my-5">
    <!-- <div class="text-center">
        <h2 class="mb-4">Employee Registration System</h2>
        <p class="lead">

        </p>
    </div> -->
    <div class="mt-5">
        <!-- <h3 class="mb-3">All Employees</h3> -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>كود الموظف</th>
                    <th>الاسم </th>
                    <th>الايميل</th>
                    <th>المرتب</th>
                    <th>الجنس</th>
                    <th>الحدث</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sqlSElectEmployees = "SELECT * FROM employee";
                $result = $conn->query($sqlSElectEmployees);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $empID = htmlspecialchars($row['ID']);
                        $name = htmlspecialchars($row['name']);
                        $email = htmlspecialchars($row['email']);
                        $salary = htmlspecialchars($row['salary']);
                        $gender = htmlspecialchars($row['gender']);
                        echo "
                            <tr>
                                <td>$empID</td>
                                <td>$name</td>
                                <td>$email</td>
                                <td>$salary</td>
                                <td>$gender</td>
                                <td>
                                    <a href='employee/update.php?id=$empID' class='btn btn-warning'>تعديل</a>
                                    <a href='employee/delete.php?id=$empID' class='btn btn-danger'>حذف</a>
                                   
                                </td>
                            </tr>

                        ";
                    }
                    echo "
                    <tr>
                    <td colspan=6 class allign center>
                    <a href='employee/arrange.php?arrange=true' class='btn btn-warning'>rearrange</a>
                    </td>
                    </tr>
                    
                    ";
                } else {
                    echo "<tr><td colspan='6'>No employees found in the file.</td></tr>";
                }

                ?>


            </tbody>

        </table>

    </div>
</div>

<?php
include "includes/footer.php";
?>