<?php
ob_start();
session_start();
/*
============================================================
==  manage items page
== you can create | delete | items from here
==
============================================================
*/
$pageTitle = "items";
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
                        <li class="breadcrumb-item"><a href="items.php">items</a> </li>
                        <li class="breadcrumb-item readonly">create product </li>
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

                            $stmt = $con->prepare('SELECT * FROM items WHERE id = ?');
                            $stmt->execute(array($id));
                            $row = $stmt->fetch();
                            $count = $stmt->rowCount();
                            if($stmt->rowCount() > 0){



                            ?><!--   Edit Page  -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Tooltip Validation</h5>
                                    <a href="?do=Manage" class="btn waves-effect waves-light btn-primary btn-square position-right">Show all items <i class="fa fa-items"></i> </a>
                                </div>
                                <div class="card-block">
                                    <form id="second" action="?do=Update" method="post">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">section name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" placeholder="Enter Product Name" autocomplete="off" required="required">
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
                                                <input type="text" class="form-control" value="<?php echo $row['sort']; ?>" name="sort" placeholder="Enter Product Sort" autocomplete="off">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div>
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">visible</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="visibility:Yes" type="radio" value="0" name="visibility" <?php if($row['visibility'] == 0){ echo 'checked'; } ?> />
                                                        </div>
                                                    </div>
                                                    <label for="visibility:Yes" class="form-control">Yes</label>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="visibility:No" type="radio" value="1" name="visibility"  <?php if($row['visibility'] == 1){ echo 'checked'; } ?> />
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
                                                            <input id="allow_comment:Yes" type="radio" value="0" name="allow_comment"  <?php if($row['allow_comment'] == 0){ echo 'checked'; } ?>>
                                                        </div>
                                                    </div>
                                                    <label for="allow_comment:Yes" class="form-control">Yes</label>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="allow_comment:No" type="radio" value="1" name="allow_comment" <?php if($row['allow_comment'] == 1){ echo 'checked'; } ?>>
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
                                                            <input id="allow_ads:Yes" type="radio" value="0" name="allow_ads"  <?php if($row['allow_ads'] == 0){ echo 'checked'; } ?> />
                                                        </div>
                                                    </div>
                                                    <label for="allow_ads:Yes" class="form-control">Yes</label>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input id="allow_ads:No" type="radio" value="1" name="allow_ads" <?php if($row['allow_ads'] == 1){ echo 'checked'; } ?> />
                                                        </div>
                                                    </div>
                                                    <label for="allow_ads:No" class="form-control">No</label>
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

                                        //validate the form
                                        $formErrors =  array();
                                        if(strlen($name) < 4){
                                            $formErrors[] = 'product name can"t less than four characters';
                                        }

                                        foreach ($formErrors as $error){
                                            
                                            redirectHome('alert alert-danger background-danger','<strong>'.$error.'</strong>','items.php');
                                        }//end foreach

                                        //check if there's no error
                                        if(empty($formErrors)){
                                            //id name description sort visibility allow_comment allow_ads
                                            $stmt = $con->prepare("UPDATE items SET name = ?, description = ?, sort = ? ,visibility = ?,allow_comment = ?,allow_ads = ? WHERE id = ?");
                                            $stmt->execute(array($name,$description,$sort,$visibility,$allow_comment,$allow_ads,$id));
                                            redirectHome('alert alert-success background-success','Updating Success!','items.php');
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

                        <!--   ############# create product page ##############  -->
                        <div class="col-md-12">
                            <div class="card">
                                <?php if($do == 'add'){ ?><!--   create product page  -->
                                <div class="card-header">
                                    <h5>create product page</h5>
                                    <a href="?do=Manage" class="btn waves-effect waves-light btn-primary btn-square position-right"> Show all items <i class="fa fa-items"></i> </a>
                                </div>
                                <div class="card-block">
                                    <form id="second" action="?do=Insert" method="post">
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" placeholder="name of the product" required="required">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="password form-control" name="description" placeholder="product description" required="required">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Price</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="price" placeholder="Right addon">
                                                    <span class="input-group-append" id="basic-addon3">
                                                        <label class="input-group-text">$</label>
                                                     </span>
                                                </div>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">country of product</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="country_made" placeholder="product country" required="required">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">image</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="image" placeholder="product price" required="required">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <select name="status" class="form-control">
                                                    <option value="0">...</option>
                                                    <option value="1">New</option>
                                                    <option value="2">Like New</option>
                                                    <option value="3">used</option>
                                                    <option value="4">very old</option>
                                                </select>
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


                                        <div class="row">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary m-b-0">Create New Product</button>
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
                                            $check = CheckItems('name','items',$Name);
                                            if($check == 1){
                                                redirectHome('alert alert-danger background-danger',"Sorry, this user exists!","items.php?do=add", 3);
                                            }else{
                                                //check if product already exist
                                                //id	name	description	sort	visibility	allow_comment	allow_ads
                                                $stmt = $con->prepare("INSERT INTO items(name, description, sort,visibility,allow_comment,allow_ads) VALUES(:name, :description, :sort, :visibility,:allow_comment,:allow_ads) ");
                                                $stmt->execute(array(
                                                    'name'          =>$Name,
                                                    'description'   =>$description,
                                                    'sort'          =>$sort,
                                                    'visibility'    =>$visibility,
                                                    'allow_comment' =>$allow_comment,
                                                    'allow_ads'     =>$allow_ads,

                                                ));
                                                redirectHome('alert alert-success background-success m-3',"creating Success!","items.php?do=add", 3);
                                            }
                                        } //end check function
                                    }else{
                                        redirectHome('danger','sorry you can"t open this page direct',4);
                                    }

                                }elseif ($do == 'Manage'){
                                    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;
                                    $stmt = $con->prepare("SELECT * FROM items ORDER BY sort DESC");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();

                                ?>
                                <!--#################### Manage page #####################-->
                                <div class="card">
                                    <div class="card-header">
                                        <h5>All items</h5>
                                        <a href="?do=add" class="btn waves-effect waves-light btn-primary btn-square position-right">craete new Product <i class="fa fa-plus"></i> </a>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap text-center">
                                                <thead>
                                                <tr>
                                                    <th>#ID</th>
                                                    <th>Name</th>
                                                    <th>description</th>
                                                    <th>sort</th>
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
                                                        <td><?php echo $row['sort']?></td>
                                                        <td>
                                                            <?php
                                                            if($row['visibility'] == 0){ ?>
                                                                <a href="items.php?do=activate&id=<?php echo $row['id']?>" class="btn btn-info waves-effect waves-light"><i class="fa fa-close"></i> Activate</a>
                                                            <?php }else{
                                                                echo "Activate";
                                                            }?>
                                                        </td>
                                                        <td><?php echo $row['allow_comment']?></td>
                                                        <td><?php echo $row['allow_ads']?></td>
                                                        <td class="text-center">
                                                            <a href="items.php?do=edit&id=<?php echo $row['id']?>" class="btn waves-effect waves-light btn-success btn-square"><i class="fa fa-edit"></i> edit</a>
                                                            <a href="items.php?do=delete&id=<?php echo $row['id']?>" class="btn btn-danger waves-effect waves-light"><i class="fa fa-close"></i> delete</a>
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
                                <?php } //end the condition of add and insert items
                                elseif($do == 'delete'){

                                    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;
                                    $stmt = $con->prepare('SELECT * FROM items WHERE id = ? LIMIT 1');

                                    $stmt->execute(array($id));
                                    //fetch data from database
                                    $count = $stmt->rowCount();
                                    //fetch data from database
                                    if($stmt->rowCount() > 0) {
                                        $stmt = $con->prepare('DELETE FROM items WHERE id = ?');
                                        $stmt->execute(array($id));
                                        redirectHome('alert alert-success background-success m-3','Deleted Success!','items.php?do=Manage');
                                    }else{
                                        redirectHome('alert alert-danger background-success m-3','this row are not exist');
                                    }
                                }
                                // do = activate
                                elseif($do == 'activate'){

                                    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;
                                    $stmt = $con->prepare('SELECT * FROM items WHERE id = ? LIMIT 1');

                                    $stmt->execute(array($id));
                                    //fetch data from database
                                    $count = $stmt->rowCount();
                                    //fetch data from database
                                    if($stmt->rowCount() > 0) {
                                        $stmt = $con->prepare('UPDATE items SET Reg_Status = 1 WHERE id = ? ');
                                        $stmt->execute(array($id));

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
                <!--   ############# create items page ##############  -->
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