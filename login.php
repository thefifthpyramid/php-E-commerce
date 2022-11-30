<?php
    //##### Check session
    session_start();

    //print_r($_SESSION);
    if(isset($_SESSION['userSession_username'])){
        header('Location: index.php'); //redirect to dashboard page
        exit();
    }
    //##### Get variables
    $pageTitle = "Login Page";
    $noNavBar = '';

    //##### Import files
    include_once "init.php";
?>
<!--Start Page-->
<div class="main-container">
    <div class="login-box">
    <h2>Login</h2>
    <form method="post" action="#">
        <div class="user-box">
            <input type="text" name="Username" required="">
            <label>Username</label>
        </div>
        <div class="user-box">
            <input type="password" name="pass" required="">
            <label>Password</label>
        </div>
        <button type="submit">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Login
        </button>
    </form>
</div>
</div>

<?php
// ########### Start php login code ############
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['Username'];
    $pass = $_POST['pass'];
    $hashedPass = sha1($pass);
    //Check if the user exist in Database
    $stmt = $con->prepare('SELECT id,userName,password FROM users WHERE userName = ? AND password = ?');
    $stmt->execute(array($username,$hashedPass));
    $count = $stmt->rowCount();

    //check if the user is admin
    if($count > 0){
        $_SESSION['userSession_username'] = $username; //register session
        header('Location: index.php'); //redirect to dashboard page
        exit();
    }else{
        echo "there's no account";
        header('Location: login.php'); //redirect to dashboard page
    }
}
// ########### End php login code ##############
?>
<!--End Page-->
</body>
</html>
