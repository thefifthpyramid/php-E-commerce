<?php
//##### Check session
session_start();

//print_r($_SESSION);
if(isset($_SESSION['userSession_username'])){
    header('Location: index.php'); //redirect to dashboard page
    exit();
}
//##### Get variables
$pageTitle = "Register Page";
$noNavBar = '';

//##### Import files
include_once "init.php";
?>
<!--Start Page-->
<div class="main-container">
    <div class="login-box register-box">
        <h2>Register</h2>
        <form method="post" action="new">
            <!-- -->
            <div class="user-box">
                <input type="text" name="userName" required>
                <label>Username</label>
            </div>
            <!-- -->
            <div class="user-box">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <!-- -->
            <div class="user-box">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <!-- -->
            <button type="submit">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Sign Up
            </button>
        </form>
    </div>
</div>
<!--End Page-->
</body>
</html>
