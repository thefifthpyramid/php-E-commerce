<?php
ob_start();
session_start();
/*
============================================================
==  Products manage page
== you can create | delete | Edit | Products from here
==
============================================================
*/
$pageTitle = "Products page";
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
                        <li class="breadcrumb-item"><a href="products.php">products</a> </li>
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

                                $stmt = $con->prepare('SELECT * FROM products WHERE id = ?');
                                $stmt->execute(array($id));
                                $row = $stmt->fetch();
                                $count = $stmt->rowCount();
                                if($stmt->rowCount() > 0){
                            ?><!--   Edit Page  -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Edit Product</h5>
                                    <a href="?do=Manage" class="btn waves-effect waves-light btn-primary btn-square position-right">Show all Products <i class="fa fa-items"></i> </a>
                                </div>
                                <div class="card-block">
                                    <form id="second" action="?do=Update&id=<?php echo $id;?>" method="post">
                                        <!-- Start Form Group -->
                                        <input type="hidden" name="id" value="<?php echo $id;?>">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" placeholder="name of the product" required="required">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="password form-control" value="<?php echo $row['description']; ?>" name="description" placeholder="product description" required="required">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Price</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="price"  value="<?php echo $row['price']; ?>" placeholder="product price">
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
                                                <input type="text" class="form-control" name="country_made" value="<?php echo $row['country_made']; ?>" placeholder="product country" required="required">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">image</label>
                                            <div class="col-sm-10">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <select name="status" class="form-control">
                                                    <option value="0">...</option>
                                                    <option value="1"<?php if($row['status'] == 1){echo 'selected';} ?> >New</option>
                                                    <option value="2"<?php if($row['status'] == 2){echo 'selected';} ?> >Like New</option>
                                                    <option value="3"<?php if($row['status'] == 3){echo 'selected';} ?> >used</option>
                                                    <option value="4"<?php if($row['status'] == 4){echo 'selected';} ?> >very old</option>
                                                </select>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Created By</label>
                                            <div class="col-sm-10">
                                                <select name="member_id" class="form-control">
                                                    <option value="0">...</option>
                                                    <?php
                                                    $users = GetDataTable('*','users','id');
                                                    foreach ($users as $user){ ?>
                                                        <option value="<?php echo $user['id']?>" <?php if($row['member_id'] == $user['id']){echo 'selected';} ?> ><?php echo $user['userName']?></option>
                                                    <?php }
                                                    ?>
                                                </select>

                                            </div>
                                        </div><!-- End Form Group -->

                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Category</label>
                                            <div class="col-sm-10">
                                                <select name="cat_id" class="form-control">
                                                    <option value="0">...</option>
                                                    <?php
                                                    $categories = GetDataTable('*','categories','id');
                                                    foreach ($categories as $category){ ?>
                                                        <option value="<?php echo $category['id']; ?>"  <?php if($row['cat_id'] == $category['id']){echo 'selected';} ?> ><?php echo $category['name'];?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div><!-- End Form Group -->


                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tags</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="tags" value="<?php echo $row['tags']; ?>" placeholder="product country" required="required">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div><!-- End Form Group -->


                                        <div class="row">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary m-b-0">Update Product</button>
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
                                            $id             = $_POST['id'];
                                            $name           = $_POST['name'];
                                            $description    = $_POST['description'];
                                            $price = $_POST['price'];
                                            $country_made = $_POST['country_made'];
                                            $status = $_POST['status'];
                                            $image = 'imsge';
                                            $cat_id = $_POST['cat_id'];
                                            $member_id = $_POST['member_id'];

                                            //validate the form
                                            $formErrors =  array();
                                            if(empty($name)){
                                                $formErrors[] = "products name can't be empty!";
                                            }
                                            if(empty($description)){
                                                $formErrors[] = "description name can't be empty!";
                                            }
                                            if(empty($price)){
                                                $formErrors[] = "price name can't be empty!";
                                            }
                                            if(empty($country_made)){
                                                $formErrors[] = "country made name can't be empty!";
                                            }
                                            if($status === 0){
                                                $formErrors[] = "country made name can't be empty!";
                                            }
                                            if($cat_id == 0){
                                                $formErrors[] = "Category name can't be empty!";
                                            }
                                            if($member_id == 0){
                                                $formErrors[] = "created By can't be empty!";
                                            }

                                            foreach ($formErrors as $error){

                                                redirectHome('alert alert-danger background-danger','<strong>'.$error.'</strong>','products.php');
                                            }//end foreach

                                            //check if there's no error
                                            if(empty($formErrors)){
                                                $stmt = $con->prepare("UPDATE products SET name = ?, description = ?, price = ? ,country_made = ?,status = ?,product_cover = ?,cat_id = ?,member_id = ? WHERE id = ?");
                                                $stmt->execute(array($name,$description,$price,$country_made,$status,$product_cover,$cat_id,$member_id,$id));

                                                redirectHome('alert alert-success background-success','Updating Success!','products.php');
                                            }
                                        }else{
                                            echo "sorry you can't open this page direct";
                                      ?>
                                    </div>
                                </div>
                                        <?php  }
                            }   ?><!--   Edit Page  -->

                        </div>
                        <!--   #############Edit Page##############  -->

                        <!--   ############# create product page ##############  -->
                        <div class="col-md-12">
                            <div class="card">
                                <?php if($do == 'add'){ ?><!--   create product page  -->
                                <div class="card-header">
                                    <h5>create product page</h5>
                                    <a href="?do=Manage" class="btn waves-effect waves-light btn-primary btn-square position-right"> Show all products <i class="fa fa-items"></i> </a>
                                </div>
                                <div class="card-block">
                                    <form id="second" action="?do=Insert" method="post" enctype="multipart/form-data">
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
                                                    <input type="text" class="form-control" name="price" placeholder="product price">
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
                                            <label class="col-sm-2 col-form-label">Product Cover</label>
                                            <div class="col-sm-10">
                                                <div class="custom-file">
                                                    <input type="file" name="product_cover" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Sub Images</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="sub_images[]" multiple />
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
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
                                            <label class="col-sm-2 col-form-label">Created By</label>
                                            <div class="col-sm-10">
                                                <select name="member_id" class="form-control">
                                                    <option value="0">...</option>
                                                    <?php
                                                        $data = GetDataTable('*','users','id');
                                                        foreach ($data as $row){
                                                            echo "<option value=". $row['id'] .">" .$row['userName']. "</option>";
                                                        }
                                                    ?>
                                                </select>

                                            </div>
                                        </div><!-- End Form Group -->

                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Category</label>
                                            <div class="col-sm-10">
                                                <select name="cat_id" class="form-control">
                                                    <option value="0">...</option>
                                                    <?php
                                                        $data = GetDataTable('*','categories','id');
                                                        foreach ($data as $row){
                                                            echo "<option value=". $row['id'] .">" .$row['name']. "</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div><!-- End Form Group -->
                                        <!-- Start Form Group -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tags</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="tags" placeholder="Product Tags" required="required">
                                                <span class="messages popover-valid"></span>
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
                                        //errors
                                        $formErrors =  array();

                                        //vars
                                        $Name = $_POST['name'];
                                        $description = $_POST['description'];
                                        $price = $_POST['price'];
                                        $country_made = $_POST['country_made'];
                                        $status = $_POST['status'];
                                        $cat_id = $_POST['cat_id'];
                                        $member_id = $_POST['member_id'];
                                        $tags = $_POST['tags'];
                                        echo $tags;
                                        echo $member_id;
                                        /* *************************product_cover******************************* */
                                        $file_input = $_FILES['product_cover'];
                                        $file_name      = $file_input['name'];
                                        $file_full_path = $file_input['full_path'];
                                        $file_type      = $file_input['type'];
                                        $file_tmp_name  = $file_input['tmp_name'];
                                        $file_size      = $file_input['size']; //input file size
                                
                                        $AvatarAllowExtension = array('jpg','jpeg','png','gif');
                                        $explodeName = explode('.', $file_name);
                                        $avatarExtension = strtolower(end($explodeName));
                                        /*******************************Multiple Upload********************************/
                                            /*                      Multiple Upload                        */
                                            $sub_images_array = array();
                                            foreach($_FILES["sub_images"]["tmp_name"] as $key=>$tmp_name) {
                                                $file_name = $_FILES["sub_images"]["name"][$key];
                                                $file_tmp = $_FILES["sub_images"]["tmp_name"][$key];
                                                $ext = pathinfo($file_name,PATHINFO_EXTENSION);

                                                if(in_array($ext,$AvatarAllowExtension)) {
                                                    /// push sub_images in array
                                                    if(!file_exists('uploads/products/' . $file_name)) {
                                                        move_uploaded_file($file_tmp = $_FILES["sub_images"]["tmp_name"][$key],'../uploads/products/' . $file_name);
                                                    
                                                        $sub_images_array[] = $file_name;
                                                    }
                                                    else {
                                                        $filename = basename($file_name,$ext);
                                                        $newFileName = $filename.time().".".$ext;
                                                        move_uploaded_file($file_tmp = $_FILES["sub_images"]["tmp_name"][$key],'../uploads/products/' . $newFileName);
                                                    
                                                        $sub_images_array[] = $newFileName;
                                                    }
                                                }
                                                else {
                                                    $formErrors[] = $error . ":->" . "$file_name";
                                                }
                                            }//end foreach
                                            /************************************************************ */
                        
                                        //errors
                                        if(empty($Name)){
                                            $formErrors[] = "section name can't be empty!";
                                        }
                                        if(empty($description)){
                                            $formErrors[] = "description name can't be empty!";
                                        }
                                        if(empty($price)){
                                            $formErrors[] = "price name can't be empty!";
                                        }
                                        if(empty($country_made)){
                                            $formErrors[] = "country made name can't be empty!";
                                        }
                                        if($status === 0){
                                            $formErrors[] = "country made name can't be empty!";
                                        }
                                        if($cat_id == 0){
                                            $formErrors[] = "Category name can't be empty!";
                                        }
                                        if($member_id == 0){
                                            $formErrors[] = "created By can't be empty!";
                                        }
                                        if($file_size > 4194304){
                                            $formErrors[] = 'Sorry, You Can Not Upload File Bigger Than 4 M';
                                        }
                                        if(!empty($file_name) && !in_array($avatarExtension,$AvatarAllowExtension)){
                                            $formErrors[] = 'Sorry, You Have The Ability To Upload Image Only';
                                        }
                                        foreach ($formErrors as $errors){
                                            echo '
                                                <div class="alert alert-danger background-danger m-3">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                                </button>
                                                <strong>'. $errors.'</strong> 
                                                </div>
                                            '; //end echo
                                        }//end foreach
                                        //check if there's no errors
                                        if(empty($formErrors)){
                                            $image_name = rand(0,10000000) . '__' .rand(0,10000000) . '___' . $file_name;
                                            move_uploaded_file($file_tmp_name,'../uploads/products/' . $image_name);

                                            //id	name	description	price	add_date	country_made	status	image	rating	cat_id	member_id
                                                $stmt = $con->prepare("INSERT INTO products(name, description, price,add_date,country_made,status,product_cover,sub_images,rating,approve,cat_id,member_id,tags) 
                                                                             VALUES(:name, :description, :price, now(),:country_made,:status,:product_cover,:sub_images,:rating,1,:cat_id,:member_id,:tags) ");
                                                $stmt->execute(array(
                                                    'name'              =>$Name,
                                                    'description'       =>$description,
                                                    'price'             =>$price,
                                                    'country_made'      =>$country_made,
                                                    'status'            =>$status,
                                                    'product_cover'     =>$image_name,
                                                    'sub_images'        =>implode("|",$sub_images_array),
                                                    'rating'            =>'...',
                                                    'cat_id'            =>$cat_id,
                                                    'member_id'         =>$member_id,
                                                    'tags'              =>$tags,
                                                ));
                                            //     redirectHome('alert alert-success background-success m-3',"creating Success!","products.php?do=add", 3);
                                        } //end check function
                                    }else{
                                        redirectHome('danger','sorry you can"t open this page direct',4);
                                    }

                                }elseif ($do == 'Manage'){
                                    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;
                                    $stmt = $con->prepare("
                                                            SELECT products.*, categories.name AS cat_name,users.userName FROM products
                                                            INNER JOIN categories ON categories.id = products.cat_id
                                                            INNER JOIN users ON users.id = products.member_id
                                                            ");
                                    $stmt->execute();
                                    $rows = $stmt->fetchAll();

                                ?>
                                <!--#################### Manage page #####################-->
                                <div class="card">
                                    <div class="card-header">
                                        <h5>All products</h5>
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
                                                    <th>add_date</th>
                                                    <th>product Cover</th>
                                                    <th>Category Name</th>
                                                    <th>Ceated by</th>
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

                                                        <td><?php echo $row['add_date']?></td>
                                                        <td><img src="../uploads/products/<?php echo $row['product_cover']?>" style="width:40px"></td>
                                                        <td><?php echo $row['cat_name']?></td>
                                                        <td><?php echo $row['userName']?></td>
                                                        <td class="text-center">
                                                            <div class="col-12">
                                                                <div class="input-group-dropdown custom-menu">
                                                                    <div class="input-group-prepend text-center" >
                                                                        <button type="button" class="btn btn-primary dropdown-toggle col-12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                            <a href="products.php?do=edit&id=<?php echo $row['id']?>" class="dropdown-item"><i class="fa fa-edit text-primary"></i> edit</a>
                                                                            <a href="products.php?do=delete&id=<?php echo $row['id']?>" class="dropdown-item"><i class="fa fa-times text-c-red"></i> delete</a>
                                                                            <?php
                                                                            $chechCom = CheckItems('item_id','comments',$row['id']);
                                                                            if($chechCom > 0){ ?>
                                                                                <a href="products.php?do=CommentsPage&id=<?php echo $row['id']?>" class="dropdown-item"><i class="fa fa-comments text-c-red"></i> Comments</a>
                                                                            <?php }
                                                                            if($row['approve'] == 0){ ?>
                                                                                <div role="separator" class="dropdown-divider"></div>
                                                                                <a href="products.php?do=activate&item_id=<?php echo $row['id']?>" class="dropdown-item"><i class="fa fa-eye text-c-green"></i> Activate</a>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end col class -->
                                                        </td><!-- end td -->
                                                    </tr>
                                                <?php   } // end foreach?>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>#ID</th>
                                                    <th>Name</th>
                                                    <th>description</th>
                                                    <th>add_date</th>
                                                    <th>product Cover</th>
                                                    <th>cat_id</th>
                                                    <th>member_id</th>
                                                    <th>Control</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--#################### Manage page #####################-->
                                <?php } //end the condition of add and insert products
                                elseif($do == 'delete'){

                                    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;
                                    $stmt = $con->prepare('SELECT * FROM products WHERE id = ? LIMIT 1');

                                    $stmt->execute(array($id));
                                    //fetch data from database
                                    $count = $stmt->rowCount();
                                    //fetch data from database
                                    if($stmt->rowCount() > 0) {
                                        $stmt = $con->prepare('DELETE FROM products WHERE id = ?');
                                        $stmt->execute(array($id));
                                        redirectHome('alert alert-success background-success m-3','Deleted Success!','products.php?do=Manage');
                                    }else{
                                        redirectHome('alert alert-danger background-success m-3','this row are not exist');
                                    }
                                }
                                // do = activate
                                elseif($do == 'activate'){

                                    $item_id = isset($_GET['item_id']) && is_numeric($_GET['item_id']) ? intval($_GET['item_id']) : 0 ;
                                    $stmt = $con->prepare('SELECT * FROM products WHERE id = ? LIMIT 1');

                                    $stmt->execute(array($item_id));
                                    //fetch data from database
                                    $count = $stmt->rowCount();
                                    //fetch data from database
                                    if($stmt->rowCount() > 0) {
                                        $stmt = $con->prepare('UPDATE products SET approve = 1 WHERE id = ? ');
                                        $stmt->execute(array($item_id));
                                        header('Location:products.php?do=Manage');
                                        //redirectHome('alert alert-success background-success','Activate Success!');
                                    }else{
                                        echo "this row are not exist";
                                    }
                                }elseif($do == 'CommentsPage') {

                                $Item_Id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0 ;
                                $stmt = $con->prepare("SELECT 
                                                                comments.* ,products.name,users.userName
                                                            FROM 
                                                                comments
                                                            INNER JOIN 
                                                                products
                                                            on 
                                                                products.id = comments.item_id
                                                            inner join 
                                                                users
                                                            on users.id = comments.user_id
                                                            WHERE item_id = ".$Item_Id);
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
                                <?php
                                }else{
//                                    header('Location:dashboard.php');
//                                    exit();
                                    echo 'something Wrong';
                                }
                                ?><!--   manage Page  -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--   ############# create products page ##############  -->
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
