<?php
ob_start();
session_start();
/*
============================================================
==  Categories manage page
== you can create | delete | Categories from here
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
                            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;

                            $stmt = $con->prepare('SELECT * FROM categories WHERE id = ?');
                            $stmt->execute(array($id));
                            $row = $stmt->fetch();
                            $count = $stmt->rowCount();
                            if($stmt->rowCount() > 0){



                            ?><!--   Edit Page  -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Edit <strong><?php echo $row['name']; ?></strong> Category</h5>
                                    <a href="?do=Manage" class="btn waves-effect waves-light btn-primary btn-square position-right">Show all Categories <i class="fa fa-categories"></i> </a>
                                </div>
                                <div class="card-block">
                                    <form id="second" action="?do=Update" method="post">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">section name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" placeholder="Enter Category Name" autocomplete="off" required="required">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">description</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" class="form-control" name="description" placeholder=""><?php echo $row['description']; ?></textarea>
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Sort</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['sort']; ?>" name="sort" placeholder="Enter Category Sort" autocomplete="off">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div>
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">visible</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <div class="input-group-text">
                                                            <input id="visibility:No" type="radio" value="0" name="visibility" <?php if($row['visibility'] == 0){ echo 'checked'; } ?> />
                                                        </div>
                                                    </div>
                                                    <label for="visibility:No" class="form-control">No</label>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="visibility:Yes" type="radio" value="1" name="visibility"  <?php if($row['visibility'] == 1){ echo 'checked'; } ?> />
                                                        </div>
                                                    </div>
                                                    <label for="visibility:Yes" class="form-control">Yes</label>
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
                                                            <input id="allow_comment:No" type="radio" value="0" name="allow_comment"  <?php if($row['allow_comment'] == 0){ echo 'checked'; } ?>>
                                                        </div>
                                                    </div>
                                                    <label for="allow_comment:No" class="form-control">No</label>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="allow_comment:Yes" type="radio" value="1" name="allow_comment" <?php if($row['allow_comment'] == 1){ echo 'checked'; } ?>>
                                                        </div>
                                                    </div>
                                                    <label for="allow_comment:Yes" class="form-control">Yes</label>
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
                                                            <input id="allow_ads:No" type="radio" value="0" name="allow_ads"  <?php if($row['allow_ads'] == 0){ echo 'checked'; } ?> />
                                                        </div>
                                                    </div>
                                                    <label for="allow_ads:No" class="form-control">No</label>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="allow_ads:Yes" type="radio" value="1" name="allow_ads" <?php if($row['allow_ads'] == 1){ echo 'checked'; } ?> />
                                                        </div>
                                                    </div>
                                                    <label for="allow_ads:Yes" class="form-control">Yes</label>
                                                </div>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">parent</label>
                                            <div class="col-sm-10">
                                                <select name="parent" class="form-control">
                                                    <option value="0" <?php if($row['parent'] == 0){ echo 'selected';}?> >no parent</option>
                                                    <?php
                                                        $data = getIData('categories','parent',0);
                                                        foreach ($data as $category){
                                                            ?>
                                                            <option value="<?php echo $category['id'];?>" <?php if($row['parent'] == $category['id']){ echo 'selected';}?> ><?php echo $category['name'] ?></option>
                                                      <?php   }
                                                    ?>
                                                </select>
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
                                        $id             = $_POST['id'];
                                        $name           = $_POST['name'];
                                        $description    = $_POST['description'];
                                        $allow_ads      = $_POST['allow_ads'];
                                        $sort           = $_POST['sort'];
                                        $visibility     = $_POST['visibility'];
                                        $allow_comment  = $_POST['allow_comment'];
                                        $allow_ads      = $_POST['allow_ads'];
                                        $parent         = $_POST['parent'];

                                        //validate the form
                                        $formErrors =  array();
                                        if(strlen($name) < 4){
                                            $formErrors[] = 'category name can"t less than four characters';
                                        }

                                        foreach ($formErrors as $error){
                                            
                                            redirectHome('alert alert-danger background-danger','<strong>'.$error.'</strong>','categories.php');
                                        }//end foreach

                                        //check if there's no error
                                        if(empty($formErrors)){
                                            //id name description sort visibility allow_comment allow_ads
                                            $stmt = $con->prepare("UPDATE categories SET name = ?, description = ?,parent = ?, sort = ? ,visibility = ?,allow_comment = ?,allow_ads = ? WHERE id = ?");
                                            $stmt->execute(array($name,$description,$parent,$sort,$visibility,$allow_comment,$allow_ads,$id));
                                            redirectHome('alert alert-success background-success','Updating Success!','categories.php');
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
                                    <a href="?do=Manage" class="btn waves-effect waves-light btn-primary btn-square position-right"> Show all categories <i class="fa fa-categories"></i> </a>
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
                                                            <input id="visibility:No" type="radio" value="0" name="visibility" checked>
                                                        </div>
                                                    </div>
                                                    <label for="visibility:No" class="form-control">No</label>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="visibility:Yes" type="radio" value="1" name="visibility">
                                                        </div>
                                                    </div>
                                                    <label for="visibility:Yes" class="form-control">Yes</label>
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
                                                            <input id="allow_comment:No" type="radio" value="0" name="allow_comment" checked>
                                                        </div>
                                                    </div>
                                                    <label for="allow_comment:No" class="form-control">No</label>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="allow_comment:Yes" type="radio" value="1" name="allow_comment">
                                                        </div>
                                                    </div>
                                                    <label for="allow_comment:Yes" class="form-control">Yes</label>
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
                                                            <input id="allow_ads:No" type="radio" value="0" name="allow_ads" checked>
                                                        </div>
                                                    </div>
                                                    <label for="allow_ads:No" class="form-control">No</label>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="allow_ads:Yes" type="radio" value="1" name="allow_ads">
                                                        </div>
                                                    </div>
                                                    <label for="allow_ads:Yes" class="form-control">Yes</label>
                                                </div>
                                            </div>
                                        </div><!-- End Form Group -->

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Parent</label>
                                            <div class="col-sm-10">
                                                <select name="parent" class="form-control">
                                                    <option value="0">No Parent</option>
                                                    <?php
                                                    $data = getIData('categories','parent',0);
                                                    foreach ($data as $row){
                                                        echo "<option value=". $row['id'] .">" .$row['name']. "</option>";
                                                    }
                                                    ?>
                                                </select>
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
                                        $parent = $_POST['parent'];


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
                                                redirectHome('alert alert-danger background-danger',"Sorry, this user exists!","categories.php?do=add", 3);
                                            }else{
                                                //check if category already exist
                                                //id	name	description	sort	visibility	allow_comment	allow_ads
                                                $stmt = $con->prepare("INSERT INTO categories(name, description, sort,visibility,allow_comment,allow_ads,parent) VALUES(:name, :description, :sort, :visibility,:allow_comment,:allow_ads,:parent) ");
                                                $stmt->execute(array(
                                                    'name'          =>$Name,
                                                    'description'   =>$description,
                                                    'sort'          =>$sort,
                                                    'visibility'    =>$visibility,
                                                    'allow_comment' =>$allow_comment,
                                                    'allow_ads'     =>$allow_ads,
                                                    'parent'     =>$parent,

                                                ));
                                                redirectHome('alert alert-success background-success m-3',"creating Success!","categories.php?do=add", 3);
                                            }
                                        } //end check function
                                    }else{
                                        redirectHome('danger','sorry you can"t open this page direct',4);
                                    }

                                }elseif ($do == 'Manage'){
                                    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;
                                    $stmt = $con->prepare("SELECT * FROM categories ORDER BY sort DESC");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();

                                ?>
                                <!--#################### Manage page #####################-->
                                <div class="card">
                                    <div class="card-header">
                                        <h5>All Categories</h5>
                                        <a href="?do=add" class="btn waves-effect waves-light btn-primary btn-square position-right">craete new Category <i class="fa fa-plus"></i> </a>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap text-center">
                                                <thead>
                                                <tr>
                                                    <th>#ID</th>
                                                    <th>Name</th>
                                                    <th>description</th>
                                                    <th>Parent</th>
                                                    <th>visibility</th>
                                                    <th>allow comment</th>
                                                    <th>allow ads</th>
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
                                                        <td><?php echo $row['description']?></td>
                                                        <td><?php
                                                            if($row['parent'] == 0){
                                                                echo "Main ";
                                                            }else{
                                                                $subName = getIData('categories','id',$row['parent']);
                                                                foreach ($subName as $sub) {
                                                                    echo "Sub Of: <span class='text-c-red'>" . $sub['name'].'<span>';
                                                                }
                                                            }

                                                            ?></td>
                                                        <td>
                                                            <?php
                                                            if($row['visibility'] == 0){
                                                                echo "<span class='text-c-red'>Hidden</span>";
                                                            }else{
                                                                echo "<span class='text-c-green'>Visible</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if($row['allow_comment'] == 0){
                                                                echo "<span class='text-c-red'>No't Allowed</span>";
                                                            }else{
                                                                echo "<span class='text-c-green'>Allow</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if($row['allow_ads'] == 0){
                                                                echo "<span class='text-c-red'>No't Allowed</span>";
                                                            }else{
                                                                echo "<span class='text-c-green'>Allow</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="col-12">
                                                                <div class="input-group-dropdown">
                                                                    <div class="input-group-prepend text-center" >
                                                                        <button type="button" class="btn btn-primary dropdown-toggle col-12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                            <a href="categories.php?do=edit&id=<?php echo $row['id']?>" class="dropdown-item"><i class="fa fa-edit text-primary"></i> edit</a>
                                                                            <a href="categories.php?do=delete&id=<?php echo $row['id']?>" class="dropdown-item"><i class="fa fa-times text-c-red"></i> delete</a>
                                                                            <?php
                                                                            if($row['visibility'] == 0 Or $row['allow_comment'] == 0 Or $row['allow_ads'] == 0){ ?>
                                                                                <div role="separator" class="dropdown-divider"></div>
                                                                                <?php if($row['visibility'] == 0 ){ ?>
                                                                                <a href="categories.php?do=activate&id=<?php echo $row['id']?>&Action=visibility" class="dropdown-item"><i class="fa fa-eye text-c-green"></i> Activate</a>
                                                                                <?php } ?>
                                                                                <?php if($row['allow_comment'] == 0 ){ ?>
                                                                                <a href="categories.php?do=activate&id=<?php echo $row['id']?>&Action=allow_comment" class="dropdown-item"><i class="fa fa-comments text-c-green"></i> Allow Comment</a>
                                                                                <?php } ?>
                                                                                <?php if($row['allow_ads'] == 0 ){ ?>
                                                                                <a href="categories.php?do=activate&id=<?php echo $row['id']?>&Action=allow_ads" class="dropdown-item"><i class="fa fa-check text-c-green"></i> Allow Ads</a>
                                                                                <?php }} ?>

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
                                                    <th>name</th>
                                                    <th>description</th>
                                                    <th>sort</th>
                                                    <th>visibility</th>
                                                    <th>allow comment</th>
                                                    <th>allow ads</th>
                                                    <th>Control</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--#################### Manage page #####################-->
                                <?php } //end the condition of add and insert Categories
                                elseif($do == 'delete'){

                                    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;
                                    $stmt = $con->prepare('SELECT * FROM categories WHERE id = ? LIMIT 1');

                                    $stmt->execute(array($id));
                                    //fetch data from database
                                    $count = $stmt->rowCount();
                                    //fetch data from database
                                    if($stmt->rowCount() > 0) {
                                        $stmt = $con->prepare('DELETE FROM categories WHERE id = ?');
                                        $stmt->execute(array($id));
                                        redirectHome('alert alert-success background-success m-3','Deleted Success!','categories.php?do=Manage');
                                    }else{
                                        redirectHome('alert alert-danger background-success m-3','this row are not exist');
                                    }
                                }
                                // do = activate
                                elseif($do == 'activate'){

                                    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;
                                    $Action = isset($_GET['Action']) ? $_GET['Action'] : '' ;

                                    $stmt = $con->prepare('SELECT * FROM categories WHERE id = ? LIMIT 1');

                                    $stmt->execute(array($id));
                                    //fetch data from database
                                    $count = $stmt->rowCount();
                                    //fetch data from database
                                    if($stmt->rowCount() > 0) {
                                        $stmt = $con->prepare('UPDATE categories SET '.$Action.' = 1 WHERE id = ? ');
                                        $stmt->execute(array($id));

                                        redirectHome('alert alert-success background-success','Activate Success!','categories.php?do=Manage');
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
                <!--   ############# create Categories page ##############  -->
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
