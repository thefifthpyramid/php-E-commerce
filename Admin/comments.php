<?php
    ob_start();
    session_start();
    /*
    ============================================================
    ==  Comments manage page
    == you can  delete | Edit Comments from here
    ==
    ============================================================
    */
    $pageTitle = "Comments page";
    if(isset($_SESSION['username'])){
        include "init.php";
    }else{
        header('Location: auth/login.php'); //redirect to dashboard page
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

                                    $stmt = $con->prepare('SELECT * FROM comments WHERE id = ?');
                                    $stmt->execute(array($userid));
                                    $row = $stmt->fetch();
                                    $count = $stmt->rowCount();
                                    if($stmt->rowCount() > 0){
                                        ?><!--   Edit Page  -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Edit Comment</h5>
                                                <a href="?do=Manage" class="btn waves-effect waves-light btn-primary btn-square position-right">Show all Comments <i class="fa fa-comments"></i> </a>
                                            </div>
                                            <div class="card-block">
                                                <form id="second" action="?do=Update" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $userid; ?>">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Comment</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" name="comment" placeholder="Comment" autocomplete="off" required="required"><?php echo $row['comment']; ?></textarea>
                                                            <span class="messages popover-valid"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Activation Status</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <input id="Status:No" type="radio" value="0" name="status" <?php if($row['status'] == 0){ echo 'checked'; } ?> >
                                                                    </div>
                                                                </div>
                                                                <label for="Status:No" class="form-control">UnActivate</label>
                                                            </div>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <input id="Status:Yes" type="radio" value="1" name="status" <?php if($row['status'] == 1){ echo 'checked'; } ?> >
                                                                    </div>
                                                                </div>
                                                                <label for="Status:Yes" class="form-control">Activate</label>
                                                            </div>
                                                        </div>
                                                    </div><!-- End Form Group -->

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

                                            $Comment_id = isset($_GET['comment_id']) && is_numeric($_GET['comment_id']) ? intval($_GET['comment_id']) : 0 ;
                                            $stmt = $con->prepare('SELECT * FROM comments WHERE id = ? LIMIT 1');

                                            $stmt->execute(array($Comment_id));
                                            //fetch data from database
                                            $count = $stmt->rowCount();
                                            //fetch data from database
                                            if($stmt->rowCount() > 0) {
                                                $stmt = $con->prepare('UPDATE comments SET status = 1 WHERE id = ? ');
                                                $stmt->execute(array($Comment_id));

                                                redirectHome('alert alert-success background-success','Activate Success!','back');
                                            }else{
                                                echo "this row are not exist";
                                            }
                                        }
                                elseif($do == 'Update'){ ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h5>update page</h5>
                                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                    </div>
                                    <div class="card-block">
                                        <?php
                                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                            //get vars
                                            $id         = $_POST['id'];
                                            $comment   = $_POST['comment'];
                                            $status      = $_POST['status'];

                                            //validate the form
                                            $formErrors =  array();
                                            if(empty($comment)){
                                                $formErrors[] = 'comment can"t less than four characters';
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
                                                $stmt = $con->prepare("UPDATE comments SET comment = ?,status = ? WHERE id = ?");
                                                $stmt->execute(array($comment,$status,$id));

                                                redirectHome('alert alert-success background-success','Updating Success!','comments.php?do=Mange');
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
                                <?php if ($do == 'Manage'){
                                    $stmt = $con->prepare("SELECT 
                                                                        comments.* ,items.name,users.userName
                                                                    FROM 
                                                                        comments
                                                                    INNER JOIN 
                                                                        items
                                                                    on 
                                                                        items.id = comments.item_id
                                                                    inner join 
                                                                        users
                                                                    on users.id = comments.user_id");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();

                                ?>
                                <!--#################### Manage page #####################-->
                                <div class="card">
                                    <div class="card-header">
                                        <h5>All Comments</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap text-center">
                                                <thead>
                                                <tr>
                                                    <th>#ID</th>
                                                    <th>Comment</th>
                                                    <th>Product Name</th>
                                                    <th>Username</th>
                                                    <th>Date</th>
                                                    <th>Control</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    foreach ($rows as $row){
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['id']?></td>
                                                    <td><?php echo $row['comment']?></td>
                                                    <td><?php echo $row['name']?></td>
                                                    <td><?php echo $row['userName']?></td>
                                                    <td><?php echo $row['comment_date']?></td>
                                                    <td class="text-center">
                                                        <div class="col-12">
                                                            <div class="input-group-dropdown">
                                                                <div class="input-group-prepend text-center" >
                                                                    <button type="button" class="btn btn-primary dropdown-toggle col-12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                        <a href="comments.php?do=edit&userid=<?php echo $row['id']?>" class="dropdown-item"><i class="fa fa-edit text-primary"></i> edit</a>
                                                                        <a href="comments.php?do=delete&userid=<?php echo $row['id']?>" class="dropdown-item"><i class="fa fa-close text-c-red"></i> delete</a>
                                                                        <?php
                                                                        if($row['status'] == 0){ ?>
                                                                            <div role="separator" class="dropdown-divider"></div>
                                                                            <a href="comments.php?do=activate&comment_id=<?php echo $row['id']?>" class="dropdown-item"><i class="fa fa-check text-c-green"></i> Activate</a>
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
                                                    <th>Comment</th>
                                                    <th>Product Name</th>
                                                    <th>Username</th>
                                                    <th>Date</th>
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
                                    $stmt = $con->prepare('SELECT * FROM comments WHERE id = ? LIMIT 1');

                                    $stmt->execute(array($userid));
                                    //fetch data from database
                                    $count = $stmt->rowCount();
                                    //fetch data from database
                                    if($stmt->rowCount() > 0) {
                                        $stmt = $con->prepare('DELETE FROM comments WHERE id = ?');
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
