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

    //errors
    $formErrors =  array();

    /*
        **********************  ************************
        *  Register Operation
        **********************  ************************
     */
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //Vars
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $hashedPass1 = sha1($_POST['password1']);
        $hashedPass2 = sha1($_POST['password2']);

        $file_input = $_FILES['avatar'];

        $file_name      = $file_input['name'];
        $file_full_path = $file_input['full_path'];
        $file_type      = $file_input['type'];
        $file_tmp_name  = $file_input['tmp_name'];
        $file_size      = $file_input['size']; //input file size

        $AvatarAllowExtension = array('jpg','jpeg','png','gif');
        $explodeName = explode('.', $file_name);
        $avatarExtension = strtolower(end($explodeName));


        if(isset($userName)){
            /* ?>&#x2770;script>alert(1);</script><?php */
            $userNameFilter = filter_var($userName,FILTER_SANITIZE_STRING);

        }if(strlen($userNameFilter) < 4){
            $formErrors[] = 'username can"t less than four characters';
        }
        if(empty($userNameFilter)){
            $formErrors[] = 'username can"t be empty';
        }
        if($file_size > 4194304){
            $formErrors[] = 'Sorry, You Can Not Upload File Bigger Than 4 M';
        }
        if(!empty($file_name) && !in_array($avatarExtension,$AvatarAllowExtension)){
            $formErrors[] = 'Sorry, You Have The Ability To Upload Image Only';
        }
        //pass
        if(isset($_POST['password1']) && isset($_POST['password2'])){
            if(empty($_POST['password1'])){
                $formErrors[] = "Sorry Password can't be empty";
            }
            if($hashedPass1 !== $hashedPass2){

                $formErrors[] = 'Passwords do not match ';

            }
        }
        // email errors
        if(isset($email)){
            $filterEmail = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
            if(filter_var($filterEmail,FILTER_VALIDATE_EMAIL) != true){
                $formErrors[] = 'email is not valid';
            }
        }

        //check if there's no error
        if(empty($formErrors)){
            $check = CheckItems('userName','users', $userName);
            if($check == 1){
                $formErrors[] = "This User Already Exist";
            }else{
                //Upload user Avatar
                $NewAvatar_name = rand(0,10000000) . '__' .rand(0,10000000) . '___' . $file_name;
                move_uploaded_file($file_tmp_name,'uploads/avatars/' . $NewAvatar_name);

                $stmt = $con->prepare("INSERT INTO users(userName, email, password,fullName,Reg_Status,Date,avatar) VALUES(:userName, :email, :password, :fullName,0,now(),:avatar) ");
                $stmt->execute(array(
                    'userName'  =>$userNameFilter,
                    'email'     =>$filterEmail,
                    'password'  =>$hashedPass1,
                    'fullName'  =>'unKnown',
                    'avatar'    =>$NewAvatar_name,
                ));
                $_SESSION['userSession_username'] = $userName; //register session
                header('Location: profile.php'); //redirect to dashboard page
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
<div class="main-container sign-page">
    <?php
    if(!empty($formErrors)){
        foreach ($formErrors as $error){
    ?>
        <div class="alert_msg">
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
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
            <!-- -->
            <div class="row">
                <div class="col-md-6">
                    <div class="user-box">
                        <input type="text" name="userName" pattern=".{4,}" title="UserName Must Be More Than 4 Characters" required>
                        <label>Username</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="file-upload" class="custom-file-upload">
                        <i class="fa fa-cloud-upload"></i> Custom Upload
                    </label>
                    <input id="file-upload" type="file" name="avatar">
                </div>
            </div>

            <!-- -->
            <div class="user-box">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <!-- -->
            <div class="user-box">
                <input type="password" name="password1" minlength="4" required>
                <label>Password</label>
            </div>
            <!-- -->
            <div class="user-box">
                <input type="password" name="password2" minlength="4" required>
                <label>Conferm Password</label>
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
