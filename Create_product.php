
<link rel="stylesheet" type="text/css" href="Admin/layout/bower_components/bootstrap/css/bootstrap.min.css">

<?php
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

        // fetch the products of the user
        $stmt = $con->prepare("
        SELECT items.*, categories.name AS cat_name FROM items
        INNER JOIN categories ON categories.id = items.cat_id
        WHERE member_id = ? ORDER BY id DESC LIMIT 5
        ");
        $stmt->execute(array($data['id']));
        $products_data = $stmt->fetchAll();

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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $data['id']; ?></li>
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
                                <label class="col-sm-2 col-form-label">image</label>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
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
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!--End Page-->
<?php include "includes/templates/footer.php"; ?>
