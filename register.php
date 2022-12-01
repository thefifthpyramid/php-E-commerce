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

        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $fullName = $_POST['fullName'];

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
        foreach ($formErrors as $error){
            echo '
                <div class="alert alert-danger background-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="icofont icofont-close-line-circled text-white"></i>
                </button>
                <strong>'. $error.'</strong> 
                </div>
            '; //end echo
        }//end foreach

        //check if there's no error
        if(empty($formErrors)){
            $check = CheckItems('userName','users',$userName);
            if($check == 1){
                redirectHome('alert alert-danger background-danger',"Sorry, this user exists!","members.php?do=add", 3);
            }else{
                //check if user already exist

                $stmt = $con->prepare("INSERT INTO users(userName, email, password,fullName,Reg_Status,Date) VALUES(:userName, :email, :password, :fullName,0,now()) ");
                $stmt->execute(array(
                    'userName'  =>$userName,
                    'email'     =>$email,
                    'password'  =>$hashedPass,
                    'fullName'  =>$fullName,
                ));
                $_SESSION['userSession_username'] = $userName; //register session
                header('Location: index.php'); //redirect to dashboard page
                exit();
                //redirect_user('alert alert-success background-success m-3 text-center',"creating Success!",'',"login.php", 4);
                //redirect_user($class,$massage,$notifyMsg = null,$url = null,$seconds = 3);
            }
        } //end check function
    }else{
        //redirectHome('danger','sorry you can"t open this page direct',4);
    }
?>
<!--Start Page-->
<div class="main-container">
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
</body>
</html>
<?php
    ob_end_flush();
?>
