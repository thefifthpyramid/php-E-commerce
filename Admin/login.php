<?php
    session_start();
    print_r($_SESSION);
    if(isset($_SESSION['name'])){
        header('Location: dashboard.php'); //redirect to dashboard page
    }
    $noNavBar = '';
    include "init.php";
?>
<?php
// ########### Start php login code ############
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['Username'];
        $pass = $_POST['pass'];
        $hashedPass = sha1($pass);

        //Check if the user exist in Database
        $stmt = $con->prepare('SELECT name,password FROM users WHERE userName = ? AND password = ? ');
        $stmt->execute(array($username,$hashedPass));
        $count = $stmt->rowCount();

        header('Location: dashboard.php'); //redirect to dashboard page
        //check if the user is admin
        if($count > 0){
            $_SESSION['name'] = $username; //register session
            header('Location: dashboard.php'); //redirect to dashboard page
            //exit();
        }else{
            $_SESSION['un'] = $pass; //register session
            header('Location: dashboard.php'); //redirect to dashboard page
        }
    }
// ########### End php login code ##############
?>
<!-- ############### Body Page ##################### -->
<div class="login-page">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Login Page</h5>
                </div>
                <div class="card-block">
                    <form id="second" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="username" name="Username" placeholder="Enter Username">
                                <span class="messages popover-valid"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="password" name="pass" placeholder="Enter password">
                                <span class="messages popover-valid"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary m-b-0">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- ############### End Body Page ##################### -->
<?php include $tpl . "footer.php"; ?>
