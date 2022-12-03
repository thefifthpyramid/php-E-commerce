<?php
//##### Check session
    ob_start();
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


    // Register Operation
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['userName'])){
            /* ?>&#x2770;script>alert(1);</script><?php */
            $userName = filter_var($_POST['userName'],FILTER_SANITIZE_STRING);

        }
        if(isset($_POST['fullName'])){
            $fullName = filter_var($_POST['fullName'],FILTER_SANITIZE_STRING);
        }
        $email = $_POST['email'];

        //pass
        $pass = $_POST['password'];
        $hashedPass = sha1($pass);

        //errors
        $formErrors =  array();
        if(strlen($userName) < 4){
            $formErrors[] = 'username can"t less than four characters';
        }
        if(empty($userName)){
            $formErrors[] = 'username can"t be empty';
        }
        if(empty($email)){
            $formErrors[] = 'email can"t be empty';
        }
        if(empty($pass)){
            $formErrors[] = 'password can"t be empty';
        }
        if(empty($fullName)){
            $formErrors[] = 'full name can"t be empty';
        }


        //check if there's no error
//        if(empty($formErrors)){
//            $check = CheckItems('userName','users',$userName);
//            if($check == 1){
//                redirectHome('alert alert-danger background-danger',"Sorry, this user exists!","members.php?do=add", 3);
//            }else{
//                //check if user already exist
//
//                $stmt = $con->prepare("INSERT INTO users(userName, email, password,fullName,Reg_Status,Date) VALUES(:userName, :email, :password, :fullName,0,now()) ");
//                $stmt->execute(array(
//                    'userName'  =>$userName,
//                    'email'     =>$email,
//                    'password'  =>$hashedPass,
//                    'fullName'  =>$fullName,
//                ));
//                $_SESSION['userSession_username'] = $userName; //register session
//                header('Location: index.php'); //redirect to dashboard page
//                exit();
//                //redirect_user('alert alert-success background-success m-3 text-center',"creating Success!",'',"login.php", 4);
//                //redirect_user($class,$massage,$notifyMsg = null,$url = null,$seconds = 3);
//            }
//        } //end check function
    }else{
        //redirectHome('danger','sorry you can"t open this page direct',4);
    }
?>
<!--Start Page-->
<div class="main-container sign-page">
    <?php
    if(!empty($formErrors)){
        foreach ($formErrors as $error){
    ?>
        <div class="msg">
            <div class="alert alert-danger background-danger m-4">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i>x</i>
                </button>
                <strong><?php echo $error; ?></strong>
            </div>
        </div>
    <?php } }?>
    <div class="login-box register-box">
        <h2>Register</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
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
            <div class="user-box">
                <input type="text" name="fullName" required>
                <label>full Name</label>
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
    <script src="layout/assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="layout/assets/js/vendor/bootstrap.min.js"></script>
    <script src="layout/assets/js/backend.js"></script>
</body>
</html>
<?php
    ob_end_flush();
?>
