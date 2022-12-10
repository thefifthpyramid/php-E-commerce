<?php
    ob_start();
    session_start();
    /*
    ============================================================
    ==  members manage page
    == you can create | delete | members from here
    ==
    ============================================================
    */
    $pageTitle = "Members";
    if(isset($_SESSION['username'])){
        include "init.php";
    }else{
        header('Location: login.php'); //redirect to dashboard page
        exit();
    }
    /*
    ============================================================
    ==  multiple pages
    ============================================================
    */
    $do = isset($_GET['do']) ? $_GET['do'] : 'blank page';


?>
<!-- ############### Body Page ##################### -->
<div class="pcoded-content">

    <!--  page header  -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Dashboard</h5>
                        <span>Created By Ahmed Ali Klay</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--  page header  -->

    <!--  page content  -->
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <!--   #############Edit Page##############  -->
                        <div class="col-md-12">
                            <?php
                                    if($do == 'edit'){
                                    if(isset($_GET['userid']) && is_numeric($_GET['userid'])){
                                        $userid = intval($_GET['userid']);
                                    }else{
                                        $userid = 0;
                                    }
                                    //$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;

                                    $stmt = $con->prepare('SELECT * FROM users WHERE id = ?');
                                    $stmt->execute(array($userid));
                                    $row = $stmt->fetch();
                                    $count = $stmt->rowCount();
                                    if($stmt->rowCount() > 0){
                                        ?><!--   Edit Page  -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Edit My Prodile</h5>
                                                <a href="?do=Manage" class="btn waves-effect waves-light btn-primary btn-square position-right">Show all members <i class="fa fa-users"></i> </a>
                                            </div>
                                            <div class="card-block">
                                                <form id="second" action="?do=Update" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $userid; ?>">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">user name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" value="<?php echo $row['userName']; ?>" name="userName" placeholder="Enter Username" autocomplete="off" required="required">
                                                            <span class="messages popover-valid"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="hidden"  value="<?php echo $row['password']; ?>" name="oldPassword">
                                                            <input type="password" class="form-control" name="newPassword" placeholder="Leave This Input Blank If You Dont want to change">
                                                            <span class="messages popover-valid"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control" value="<?php echo $row['email']; ?>" name="email" placeholder="Enter email" autocomplete="off" required="required">
                                                            <span class="messages popover-valid"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Full Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" value="<?php echo $row['fullName']; ?>" name="fullName" placeholder="Enter your full name" autocomplete="off" required="required">
                                                            <span class="messages popover-valid"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-2"></label>
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary m-b-0">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <?php
                                    }else{
                                        echo "there is no data";
                                    }//end condition if id is existing
                                } //end edit page tag
                                        elseif($do == 'activate'){

                                            $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;
                                            $stmt = $con->prepare('SELECT * FROM users WHERE id = ? LIMIT 1');

                                            $stmt->execute(array($userid));
                                            //fetch data from database
                                            $count = $stmt->rowCount();
                                            //fetch data from database
                                            if($stmt->rowCount() > 0) {
                                                $stmt = $con->prepare('UPDATE users SET Reg_Status = 1 WHERE id = ? ');
                                                $stmt->execute(array($userid));

                                                redirectHome('alert alert-success background-success','Activate Success!');
                                            }else{
                                                echo "this row are not exist";
                                            }
                                        }
                                elseif($do == 'Update'){ ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h5>hello from update form</h5>
                                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                    </div>
                                    <div class="card-block">
                                        <?php
                                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                            //get vars
                                            $id         = $_POST['id'];
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
                                                    $stmt = $con->prepare("UPDATE users SET userName = ?, email = ?, password = ? ,fullName = ? WHERE id = ?");
                                                    $stmt->execute(array($userName,$email,$pass,$fullName,$id));

                                                    redirectHome('alert alert-success background-success','Updating Success!');
                                                }

                                            }
                                        }else{
                                            echo "sorry you can't open this page direct";
                                        }
                                    }
                                        ?><!--   Edit Page  -->
                                </div>
                            </div>
                        </div>
                        <!--   #############Edit Page##############  -->

                        <!--   ############# create members page ##############  -->
                        <div class="col-md-12">
                            <div class="card">
                                <?php if($do == 'add'){ ?><!--   create members page  -->
                                    <div class="card-header">
                                        <h5>create members page</h5>
                                        <a href="?do=Manage" class="btn waves-effect waves-light btn-primary btn-square position-right">Show all members <i class="fa fa-users"></i> </a>
                                    </div>
                                    <div class="card-block">
                                        <form id="second" action="?do=Insert" method="post" enctype="multipart/form-data">
                                            <!-- Start Form Group -->
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">user name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="userName" placeholder="username to login into shop" autocomplete="off" required="required">
                                                    <span class="messages popover-valid"></span>
                                                </div>
                                            </div>
                                            <!-- Start Form Group -->
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="password form-control" name="password" placeholder="input you password" required="required">
                                                    <i class="icofont icofont-eye-alt"></i>
                                                    <span class="messages popover-valid"></span>
                                                </div>
                                            </div>
                                            <!-- Start Form Group -->
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" name="email" placeholder="Enter email" autocomplete="off" required="required">
                                                    <span class="messages popover-valid"></span>
                                                </div>
                                            </div>
                                            <!-- Start Form Group -->
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Full Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="fullName" placeholder="full name appear in your profile page" autocomplete="off" required="required">
                                                    <span class="messages popover-valid"></span>
                                                </div>
                                            </div>
                                            <!-- Start Form Group -->
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">User Avatar</label>
                                                <div class="col-sm-10">
                                                    <div class="custom-file">
                                                        <input type="file" name="avatar" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                    </div>
                                                </div>
                                            </div><!-- End Form Group -->
                                            <div class="row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary m-b-0">Create New member</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php

                                    }elseif($do == 'Insert'){
                                    if($_SERVER['REQUEST_METHOD'] == "POST"){

                                        //Upload File
                                        //print_r($_FILES['avatar']);
                                        $Material = $_FILES['avatar'];

                                        $avatarName = $Material['name'];
                                        $avatarSize = $Material['size'];
                                        $avatarTmp = $Material['tmp_name'];
                                        $avatarType = $Material['type'];
                                        $AvatarAllowExtension = array("jpg","jpeg","png","gif");
                                        $explodeName = explode('.', $avatarName);
                                        $avatarExtension = strtolower(end($explodeName));

                                        //Vars
                                        $userName   = $_POST['userName'];
                                        $email      = $_POST['email'];
                                        $fullName   = $_POST['fullName'];
                                        //pass
                                        $pass       = $_POST['password'];
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
                                        if(!empty($avatarName) && !in_array($avatarExtension,$AvatarAllowExtension)){
                                            $formErrors[] = 'Sorry, You Have The Ability To Upload Image Only';
                                        }
                                        if($avatarSize > 4194304){
                                            $formErrors[] = 'Sorry, You Can Not Upload File Bigger Than 4 M';
                                        }
//                                        if(in_array($TypeOfFiles,) > 20){
//                                            $formErrors[] = 'Sorry, You Can Not Upload File Bigger Than 4 M';
//                                        }
                                        foreach ($formErrors as $error){
                                            echo '
                                                <div class="alert alert-danger background-danger m-3">
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
                                                //upload Avatar
                                            $avatar = rand(0,1000000) . '__' . $avatarName;
                                            move_uploaded_file($avatarTmp,'../uploads/avatars/'.$avatar);

                                            $stmt = $con->prepare("INSERT INTO users(userName, email, password,fullName,Reg_Status,Date,avatar) VALUES(:userName, :email, :password, :fullName,0,now(),:avatar) ");
                                            $stmt->execute(array(
                                                'userName'  =>$userName,
                                                'email'     =>$email,
                                                'password'  =>$hashedPass,
                                                'fullName'  =>$fullName,
                                                'avatar'    =>$avatar,
                                            ));
                                                redirectHome('alert alert-success background-success m-3',"creating Success!","members.php?do=add", 3);
                                            }
                                        } //end check function
                                        }else{
                                            redirectHome('danger','sorry you can"t open this page direct',4);
                                        }

                                }elseif ($do == 'Manage'){
                                    $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;



                                    $query = '';
                                    if (isset($_GET['page']) && $_GET['page'] == 'Pending'){
                                        $query = 'AND Reg_Status = 0';
                                    }

                                    $stmt = $con->prepare("SELECT * FROM users WHERE groupID != 1 $query");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();

                                ?>
                                <!--#################### Manage page #####################-->
                                <div class="card">
                                    <div class="card-header">
                                        <h5>All Users</h5>
                                        <a href="?do=add" class="btn waves-effect waves-light btn-primary btn-square position-right">craete new member <i class="fa fa-plus"></i> </a>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap text-center">
                                                <thead>
                                                <tr>
                                                    <th>#ID</th>
                                                    <th>User Name</th>
                                                    <th>avatar</th>
                                                    <th>Email</th>
                                                    <th>full Name</th>
                                                    <th>Control</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    foreach ($rows as $row){
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['id']?></td>
                                                    <td><?php echo $row['userName']?></td>
                                                    <td><img class="avatar" src="../uploads/avatars/<?php echo $row['avatar']?>"></td>
                                                    <td><?php echo $row['email']?></td>
                                                    <td><?php echo $row['fullName']?></td>
                                                    <td class="text-center">
                                                        <div class="col-12">
                                                            <div class="input-group-dropdown">
                                                                <div class="input-group-prepend text-center" >
                                                                    <button type="button" class="btn btn-primary dropdown-toggle col-12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                        <a href="members.php?do=edit&userid=<?php echo $row['id']?>" class="dropdown-item"><i class="fa fa-edit text-primary"></i> edit</a>
                                                                        <a href="members.php?do=delete&userid=<?php echo $row['id']?>" class="dropdown-item"><i class="fa fa-times text-c-red"></i> delete</a>
                                                                        <?php
                                                                        if($row['Reg_Status'] == 0){ ?>
                                                                            <div role="separator" class="dropdown-divider"></div>
                                                                            <a href="members.php?do=activate&userid=<?php echo $row['id']?>" class="dropdown-item"><i class="fa fa-check text-c-green"></i> Activate</a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col class -->
                                                    </td>
                                                </tr>
                                                <?php   } // end foreach?>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>#ID</th>
                                                    <th>User Name</th>
                                                    <th>Email</th>
                                                    <th>full Name</th>
                                                    <th>Registerd date</th>
                                                    <th>Control</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--#################### Manage page #####################-->
                                <?php } //end the condition of add and insert members
                                elseif($do == 'delete'){

                                    $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;
                                    $stmt = $con->prepare('SELECT * FROM users WHERE id = ? LIMIT 1');

                                    $stmt->execute(array($userid));
                                    //fetch data from database
                                    $count = $stmt->rowCount();
                                    //fetch data from database
                                    if($stmt->rowCount() > 0) {
                                        $stmt = $con->prepare('DELETE FROM users WHERE id = ?');
                                        $stmt->execute(array($userid));
                                        redirectHome('alert alert-success background-success m-3','Deleted Success!','members.php?do=Manage');
                                    }else{
                                        redirectHome('alert alert-danger background-success m-3','this row are not exist');
                                    }
                                }//end conditions
                                ?><!--   manage Page  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--   ############# create members page ##############  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  page content  -->

</div><!-- end last div-->
<!-- ############### End Body Page ##################### -->
<?php
    include $tpl . "footer.php";
    ob_end_flush();
?>
