<?php
ob_start();
session_start();
/*
============================================================
==  manage members page
== you can create | delete | members from here
==
============================================================
*/
$pageTitle = "Categories";
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
                        <h5>E-commerce system</h5>
                        <span>Created By Ahmed Ali Klay</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="categories.php">Categories</a> </li>
                        <li class="breadcrumb-item readonly">create category </li>
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
                                    <a href="?do=Manage" class="btn waves-effect waves-light btn-primary btn-square position-right">Show all members <i class="fa fa-users"></i> </a>
                                </div>
                                <div class="card-block">
                                    <form id="second" action="?do=Update" method="post">
                                        <input type="hidden" name="id" value="<?php echo $userid; ?>">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">user name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" placeholder="Enter Username" autocomplete="off" required="required">
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
                            elseif($do == 'Update'){
                            ?>
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
                                        $name   = $_POST['name'];
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
                                        if(strlen($name) < 4){
                                            $formErrors[] = 'username can"t less than four characters';
                                        }
                                        if(empty($name)){
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
                                            $stmt = $con->prepare("UPDATE users SET name = ?, email = ?, password = ? ,fullName = ? WHERE id = ?");
                                            $stmt->execute(array($name,$email,$pass,$fullName,$id));
                                            echo '
                                                <div class="alert alert-success background-success">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                                    </button>
                                                    <strong>Updating Success!</strong>
                                                </div>
                                            ';
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

                        <!--   ############# create category page ##############  -->
                        <div class="col-md-12">
                            <div class="card">
                                <?php if($do == 'add'){ ?><!--   create category page  -->
                                <div class="card-header">
                                    <h5>create category page</h5>
                                    <a href="?do=Manage" class="btn waves-effect waves-light btn-primary btn-square position-right"> Show all categories <i class="fa fa-users"></i> </a>
                                </div>
                                <div class="card-block">
                                    <form id="second" action="?do=Insert" method="post">
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" placeholder="name of the category" autocomplete="off" required="required">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="password form-control" name="description" placeholder="category description" required="required">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Sort / ordring</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="password form-control" name="sort" placeholder="category sort" required="required">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">visible</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="visibility:Yes" type="radio" value="0" name="visibility" checked>
                                                        </div>
                                                    </div>
                                                    <label for="visibility:Yes" class="form-control">Yes</label>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="visibility:No" type="radio" value="1" name="visibility">
                                                        </div>
                                                    </div>
                                                    <label for="visibility:No" class="form-control">No</label>
                                                </div>
                                            </div>
                                        </div><!-- End Form Group -->


                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Allow Comments</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="allow_comment:Yes" type="radio" value="0" name="allow_comment" checked>
                                                        </div>
                                                    </div>
                                                    <label for="allow_comment:Yes" class="form-control">Yes</label>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="allow_comment:No" type="radio" value="1" name="allow_comment">
                                                        </div>
                                                    </div>
                                                    <label for="allow_comment:No" class="form-control">No</label>
                                                </div>
                                            </div>
                                        </div><!-- End Form Group -->

                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Allow Ads</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="allow_ads:Yes" type="radio" value="0" name="allow_ads" checked>
                                                        </div>
                                                    </div>
                                                    <label for="allow_ads:Yes" class="form-control">Yes</label>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="allow_ads:No" type="radio" value="1" name="allow_ads">
                                                        </div>
                                                    </div>
                                                    <label for="allow_ads:No" class="form-control">No</label>
                                                </div>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <div class="row">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary m-b-0">Create New Category</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php

                                }elseif($do == 'Insert'){
                                    if($_SERVER['REQUEST_METHOD'] == "POST"){

                                        $Name = $_POST['name'];
                                        $description = $_POST['description'];
                                        $sort = $_POST['sort'];
                                        $visibility = $_POST['visibility'];
                                        $allow_comment = $_POST['allow_comment'];
                                        $allow_ads = $_POST['allow_ads'];


                                        //errors
                                        $formErrors =  array();
                                        if(strlen($Name) < 4){
                                            $formErrors[] = 'section name can"t less than four characters';
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
                                            $check = CheckItems('name','categories',$Name);
                                            if($check == 1){
                                                redirectHome('alert alert-danger background-danger',"Sorry, this user exists!","members.php?do=add", 3);
                                            }else{
                                                //check if category already exist
                                                //id	name	description	sort	visibility	allow_comment	allow_ads
                                                $stmt = $con->prepare("INSERT INTO categories(name, description, sort,visibility,allow_comment,allow_ads) VALUES(:name, :description, :sort, :visibility,:allow_comment,:allow_ads) ");
                                                $stmt->execute(array(
                                                    'name'          =>$Name,
                                                    'description'   =>$description,
                                                    'sort'          =>$sort,
                                                    'visibility'    =>$visibility,
                                                    'allow_comment' =>$allow_comment,
                                                    'allow_ads'     =>$allow_ads,

                                                ));
                                                redirectHome('alert alert-success background-success m-3',"creating Success!","categories.php?do=add", 3);
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
                                        <a href="?do=add" class="btn waves-effect waves-light btn-primary btn-square position-right">craete new Category <i class="fa fa-plus"></i> </a>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap text-center">
                                                <thead>
                                                <tr>
                                                    <th>#ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>full Name</th>
                                                    <th>Registerd date</th>
                                                    <th>Control</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                foreach ($rows as $row){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['id']?></td>
                                                        <td><?php echo $row['name']?></td>
                                                        <td><?php echo $row['email']?></td>
                                                        <td><?php echo $row['fullName']?></td>
                                                        <td><?php echo $row['Date']?></td>
                                                        <td class="text-center">
                                                            <a href="members.php?do=edit&userid=<?php echo $row['id']?>" class="btn waves-effect waves-light btn-success btn-square"><i class="fa fa-edit"></i> edit</a>
                                                            <a href="members.php?do=delete&userid=<?php echo $row['id']?>" class="btn btn-danger waves-effect waves-light"><i class="fa fa-close"></i> delete</a>
                                                            <?php
                                                            if($row['Reg_Status'] == 0){ ?>
                                                                <a href="members.php?do=activate&userid=<?php echo $row['id']?>" class="btn btn-info waves-effect waves-light"><i class="fa fa-close"></i> Activate</a>
                                                            <?php } ?>
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
                                }
                                // do = activate
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
                                }else{
//                                    header('Location:dashboard.php');
//                                    exit();
                                }
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
