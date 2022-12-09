


<?php
    ob_start();
    //Sessions
    if(!isset($_SESSION))
    {
        session_start();
    }
    $pageTitle = "New Product Page";

    //print_r($_SESSION);
    if(isset($_SESSION['userSession_username'])){
        include_once "init.php";
        // the latest users
        $lastElement = $con->prepare("SELECT * FROM users WHERE userName = ?");
        $lastElement->execute(array($_SESSION['userSession_username']));
        $data = $lastElement->fetch();

        $userId = $data['id'];
        //Fetch all comments
        $comments = getIData('comments','user_id',$data['id']);
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
                        <li class="breadcrumb-item"><a href="profile.php"><?php echo $_SESSION['userSession_username']; ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Product</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4"><!-- Left side -->
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="Admin/layout/images/avatar-4.jpg" alt="avatar"
                             class="rounded-circle img-fluid user-avatar" style="width: 150px;">
                        <h5 class="my-3"><?php echo $_SESSION['userSession_username']; ?></h5>
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
                            <h4 class="">Create New Product</h4>
                            <a href="#" class="btn waves-effect waves-light btn-main btn-square position-right"> Edit <i class="fa fa-edit text-primary"></i> </a>
                        </div>
                        <form id="second" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                            <!-- Start Form Group -->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" placeholder="name of the product" required="off"  pattern=".{4,}" title="UserName Must Be More Than 4 Characters">
                                    <span class="messages popover-valid"></span>
                                </div>
                            </div><!-- End Form Group -->
                            <!-- Start Form Group -->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="password form-control" name="description" placeholder="product description" required="required" pattern=".{10,}" title="UserName Must Be More Than 10 Characters">
                                    <span class="messages popover-valid"></span>
                                </div>
                            </div><!-- End Form Group -->
                            <!-- Start Form Group -->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control price-field" name="price" placeholder="product price" required  pattern=".{1,}" title="UserName Must Be More Than 1 Characters">
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
                                    <label for="file-upload" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload"></i> Custom Upload
                                    </label>
                                    <input id="file-upload" type="file" name="product_image"/>
                                </div>
                            </div><!-- End Form Group -->
                            <!-- Start Form Group -->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control" >
                                        <option value="0">...</option>
                                        <option value="1">New</option>
                                        <option value="2">Like New</option>
                                        <option value="3">used</option>
                                        <option value="4">very old</option>
                                    </select>
                                </div>
                            </div><!-- End Form Group -->
                            <!-- Start Form Group -->
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

                            <div class="row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary m-b-0">Create New Product</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        /**************************************/
                        if($_SERVER['REQUEST_METHOD'] == "POST"){

                            $Name = $_POST['name'];
                            $description        = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
                            $price              = filter_var($_POST['price'],FILTER_SANITIZE_NUMBER_INT);
                            $country_made       = filter_var($_POST['country_made'],FILTER_SANITIZE_STRING);
                            $status             = filter_var($_POST['status'],FILTER_SANITIZE_NUMBER_INT);
                            $image              = 'imsge';
                            $cat_id             = filter_var($_POST['cat_id'],FILTER_SANITIZE_NUMBER_INT);

                            /* ******************************************************** */
                            $file_input = $_FILES['product_image'];
                            $file_name      = $file_input['name'];
                            $file_full_path = $file_input['full_path'];
                            $file_type      = $file_input['type'];
                            $file_tmp_name  = $file_input['tmp_name'];
                            $file_size      = $file_input['size']; //input file size
                    
                            $AvatarAllowExtension = array('jpg','jpeg','png','gif');
                            $explodeName = explode('.', $file_name);
                            $avatarExtension = strtolower(end($explodeName));

            

                            //errors
                            $formErrors =  array();
                            if(strlen($Name) < 4){
                                $formErrors[] = "Product name can Not Be Less than 4 characters!";
                            }
                            if(empty($Name)){
                                $formErrors[] = "Product name can't be empty!";
                            }
                            if(empty($description)){
                                $formErrors[] = "Description Field can't be empty!";
                            }
                            if(strlen($description) < 10){
                                $formErrors[] = "Description Field can Not Be Less than 10 characters!";
                            }
                            if(empty($price)){
                                $formErrors[] = "Price Field can't be empty!";
                            }
                            if(strlen($price) < 1){
                                $formErrors[] = "Price Field can Not Be Less than 1 characters!";
                            }
                            if(empty($country_made)){
                                $formErrors[] = "Country made can't be empty!";
                            }
                            if(strlen($country_made) < 2){
                                $formErrors[] = "Country name Field can Not Be Less than 2 characters!";
                            }
                            if($status == 0){
                                $formErrors[] = "Status Field can't be empty!";
                            }
                            if($cat_id == 0){
                                $formErrors[] = "Category Field can't be empty!";
                            }if($file_size > 4194304){
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
                                move_uploaded_file($file_tmp_name,'uploads/products/' . $image_name);

                                //id	name	description	price	add_date	country_made	status	image	rating	cat_id	member_id
                                $stmt = $con->prepare("INSERT INTO items(name, description, price,add_date,country_made,status,image,rating,cat_id,member_id) 
                                                                             VALUES(:name, :description, :price, now(),:country_made,:status,:image,:rating,:cat_id,:member_id) ");
                                $stmt->execute(array(
                                    'name'              =>$Name,
                                    'description'       =>$description,
                                    'price'             =>$price,
                                    'country_made'      =>$country_made,
                                    'status'            =>$status,
                                    'image'             =>$image_name,
                                    'rating'            =>'...',
                                    'cat_id'            =>$cat_id,
                                    'member_id'         =>$userId,
                                ));
                                if($stmt){
                                    //redirectHome('alert alert-success background-success m-3',"creating Success!","back", 3);
                                    //header('profile.php',4);
                                    header("Location:profile.php?created_msg");
                                }
                            } //end check function
                        }else{
                            //redirectHome('danger','sorry you can"t open this page direct',4);
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
