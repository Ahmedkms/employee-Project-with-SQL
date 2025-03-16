<?php 
include "includes/header.php";
include "includes/nav.php";
?>
<div class="container">
    <h1 class="my-4">Login</h1>
   <?php if (isset($_SESSION["errors"])) :
   foreach($_SESSION["errors"] as $error):    
    ?> 
    <div class="alert alert-danger ">
        <?= $error ?>
    </div>
    <?php endforeach;
    endif; 
    unset($_SESSION["errors"]);
    ?>
    <form method="POST" action="handeller/handelLogin.php">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <p class="mt-3">Don't have an account? <a href="register.php">Register here</a></p>
</div>

<?php 
include "includes/footer.php";
?>
 <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            let isValid = true;

            // Clear previous error messages
            document.getElementById('emailError').textContent = '';
            document.getElementById('passwordError').textContent = '';

            // Validate email
            if (!email) {
                document.getElementById('emailError').textContent = 'البريد الإلكتروني مطلوب.';
                isValid = false;
            } else if (!/\S+@\S+\.\S+/.test(email)) {
                document.getElementById('emailError').textContent = 'البريد الإلكتروني غير صالح.';
                isValid = false;
            }

            // Validate password
            if (!password) {
                document.getElementById('passwordError').textContent = 'كلمة المرور مطلوبة.';
                isValid = false;
            }

            // Prevent form submission if validation fails
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
