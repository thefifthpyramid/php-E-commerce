<?php
    ob_start();
    //Sessions
    if(!isset($_SESSION))
    {
        session_start();
    }
    $pageTitle = "New Product Page";

    //print_r($_SESSION);
    if(isset($_SESSION['userSession_username']) OR isset($_SESSION['userSession_id']) ){
        include_once "init.php";
        // the latest users
        if(isset($_SESSION['userSession_username']) ){
            $data = FetchOneColum('users','userName',$_SESSION['userSession_username']);
        }
        if(isset($_SESSION['userSession_id'])){
            $data = FetchOneColum('users','id',$_SESSION['userSession_id']);
            $_SESSION['userSession_username'] = $data['userName'];
        }

    }else{
        header('Location: login.php'); //redirect to dashboard page
        exit();
    }
?>
<!--Start Page-->
<section class="profile" style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item"><a href="profile.php"><?php echo $data['userName'] ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit My Profile</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4"><!-- Left side -->
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="uploads/avatars/<?php echo $data['avatar']; ?>" alt="<?php echo $data['userName']; ?>" class="rounded-circle img-fluid user-avatar">
                        <h5 class="my-3"><?php echo $data['userName']; ?></h5>
                        <p class="text-muted mb-1">Full Stack Developer</p>
                        <p class="text-muted mb-4"><?php echo $data['email']; ?></p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-main m-1">Follow</button>
                            <button type="button" class="btn btn-outline-main ms-1 m-1">Message</button>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fa fa-globe fa-lg text-warning"></i>
                                <p class="mb-0">https://mdbootstrap.com</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fa fa-github fa-lg" style="color: #333333;"></i>
                                <p class="mb-0">mdbootstrap</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fa fa-twitter fa-lg" style="color: #55acee;"></i>
                                <p class="mb-0">@mdbootstrap</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fa fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                <p class="mb-0">mdbootstrap</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fa fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                <p class="mb-0">mdbootstrap</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8"><!-- right side -->
                <div class="card mb-4 create-product-page">
                    <div class="card-body">
                        <div class="card-header">
                            <h4 class="">Store New Information</h4>
                            <a href="profile.php" class="btn waves-effect waves-light btn-main btn-square position-right"> Back <i class="fa fa-angle-double-left text-primary"></i> </a>
                        </div>
                        <form id="second" action="?do=Update" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">user name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $data['userName']; ?>" name="userName" placeholder="Enter Username" autocomplete="off" required="required">
                                    <span class="messages popover-valid"></span>
                                </div>
                            </div>
                            <!--  -->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="hidden"  value="<?php echo $data['password']; ?>" name="oldPassword">
                                    <input type="password" class="form-control" name="newPassword" placeholder="Leave This Input Blank If You Dont want to change">
                                    <span class="messages popover-valid"></span>
                                </div>
                            </div>
                            <!--  -->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" value="<?php echo $data['email']; ?>" name="email" placeholder="Enter email" autocomplete="off" required="required">
                                    <span class="messages popover-valid"></span>
                                </div>
                            </div>
                            <!--  -->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $data['fullName']; ?>" name="fullName" placeholder="Enter your full name" autocomplete="off" required="required">
                                    <span class="messages popover-valid"></span>
                                </div>
                            </div>
                            <!--  -->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Avatar</label>
                                <div class="col-sm-10">
                                    <label for="file-upload" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload"></i> Upload You File
                                    </label>
                                    <input id="file-upload" type="file" name="new_avatar">
                                    <input  value="<?php echo $data['avatar']; ?>" type="hidden" name="old_avatar">
                                </div>
                            </div>
                            <!--  -->
                            <div class="row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary m-b-0">Update</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        /**************************************/
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            //get vars
                            $id         = $data['id'];
                            $userName   = $_POST['userName'];
                            $email      = $_POST['email'];
                            $fullName   = $_POST['fullName'];

                            //password
                            $oldPassword   = $_POST['oldPassword'];
                            $newPassword   = $_POST['newPassword'];
                            $pass = '';

                            //check password value
                            $pass = empty($newPassword) ? $oldPassword : sha1($newPassword);

                            //validate the form
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
                            if(empty($fullName)){
                                $formErrors[] = 'full name can"t be empty';
                            }

                            
                            /* ********************************************************* */
                            //avatar
                            $avatar = '';
                            // echo $_POST['new_avatar'];
                            // echo $_FILES['new_avatar'];
                            $file_input = $_FILES['new_avatar'];
                            //print_r($file_input);
                            if($_FILES['new_avatar']['size'] == 0){
                                $avatar = $_POST['old_avatar'];
                                echo 'ni avatar';
                            }else{

                                $file_name      = $file_input['name'];
                                $file_full_path = $file_input['full_path'];
                                $file_type      = $file_input['type'];
                                $file_tmp_name  = $file_input['tmp_name'];
                                $file_size      = $file_input['size']; //input file size
                        
                                $AvatarAllowExtension = array('jpg','jpeg','png','gif');
                                $explodeName = explode('.', $file_name);
                                $avatarExtension = strtolower(end($explodeName));

                                if($file_size > 4194304){
                                    $formErrors[] = 'Sorry, You Can Not Upload File Bigger Than 4 M';
                                }
                                if(!empty($file_name) && !in_array($avatarExtension,$AvatarAllowExtension)){
                                    $formErrors[] = 'Sorry, You Have The Ability To Upload Image Only';
                                }

                                $avatar = rand(0,10000000) . '__' .rand(0,10000000) . '___' . $file_name;
                                move_uploaded_file($file_tmp_name,'uploads/avatars/' . $avatar);

                            }
                            /* ********************************************************* */

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
                                $stmt2 = $con->prepare("SELECT * FROM users WHERE userName = ? AND id != ?");
                                $stmt2->execute(array($userName,$id));
                                $count2 = $stmt2->rowCount();
                                if($count2 == 1){
                                    echo 'Sorry this username already exist';
                                }else{
                                    $stmt = $con->prepare("UPDATE users SET userName = ?, email = ?, password = ? ,fullName = ?,avatar = ? WHERE id = ?");
                                    $stmt->execute(array($userName,$email,$pass,$fullName,$avatar,$id));
                                    $_SESSION['userSession_id'] = $id;
                                    redirect_user('alert alert-success background-success','You will be redirected Back!','Updating Success!','profile.php');

                                    //redirectHome('alert alert-success background-success','Updating Success!');
                                }

                            }
                        }
                        /**************************************/

                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!--End Page-->
<?php
    include "includes/templates/footer.php";
    ob_end_flush();
?>
