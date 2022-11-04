<?php
    /*
    ============================================================
    ==  manage members page
    == you can create | delete | members from here
    ==
    ============================================================
    */
    $pageTitle = "Members";
    include "init.php";
    /*
    ============================================================
    ==  Maltue pages
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
                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
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
                        <div class="col-md-12">
                            <!--   #############Edit Page##############  -->
                            <?php
                                if($do == 'edit'){
                                    $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;

                                    $stmt = $con->prepare('SELECT * FROM users WHERE id = ?');
                                    $stmt->execute(array($userid));
                                    $row = $stmt->fetch();
                                    $count = $stmt->rowCount();
                                    if($stmt->rowCount() > 0){



                            ?><!--   Edit Page  -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Tooltip Validation</h5>
                                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form id="second" action="?do=Update" method="post">
                                        <input type="hidden" name="id" value="<?php echo $userid; ?>">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">user name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['userName']; ?>" name="userName" placeholder="Enter Username">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="hidden"  value="<?php echo $row['password']; ?>" name="oldPassword">
                                                <input type="password" class="form-control" name="newPassword" placeholder="Password">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="email" placeholder="Enter email">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Full Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['fullName']; ?>" name="fullName" placeholder="Enter email id">
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
                                elseif($do == 'Update'){
                                    echo "hello from update form";
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
                                        if(empty($newPassword)){
                                            $pass = $oldPassword;
                                        }else{
                                            $pass = sha1($newPassword);
                                        }

                                        $stmt = $con->prepare("UPDATE users SET userName = ?, email = ?, password = ? ,fullName = ? WHERE id = ?");
                                        $stmt->execute(array($userName,$email,$pass,$fullName,$id));
                                    }else{
                                        echo "sorry you can't";
                                    }
                                }

                                ?><!--   Edit Page  -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  page content  -->

</div><!-- end last div-->
<!-- ############### End Body Page ##################### -->
<?php include $tpl . "footer.php"; ?>
