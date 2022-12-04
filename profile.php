<?php
    //Sessions
    if(!isset($_SESSION))
    {
        session_start();
    }
    $pageTitle = $_SESSION['userSession_username'] . ": Profile Page";

//print_r($_SESSION);
    if(isset($_SESSION['userSession_username'])){
        include_once "init.php";
        // the latest users
        $data = FetchOneColum('users','userName',$_SESSION['userSession_username']);

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
<?php if(isset($_GET['created_msg'])){?>
<div class="alert_msg">
    <div class="alert alert-success background-danger m-4">
        <button type="button" class="close text-blue" data-dismiss="alert" aria-label="Close">
            <i>x</i>
        </button>
        <strong><?php echo $created_msg; ?></strong>
    </div>
</div>
<?php } ?>
<!--Start Page-->

<section class="profile" style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $_SESSION['userSession_username']; ?></li>
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
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-header">
                            <h4 class="">My Details</h4>
                            <a href="#" class="btn waves-effect waves-light btn-main btn-square position-right"> Edit <i class="fa fa-edit text-primary"></i> </a>
                        </div>
                        <table class="table border ">
                            <tr>
                                <td><i class="fa fa-lock fa-fw"></i> Login Name</td>
                                <td><?php echo $data['userName']; ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-envelope-o fa-fw"></i> Email</td>
                                <td><?php echo $data['email']; ?></td>
                            </tr>
                            <tr>
                                <td class="text-left"><i class="fa fa-calendar fa-fw"></i> Register Date</td>
                                <td><?php echo $data['Date']; ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-user fa-fw"></i> Full Name</td>
                                <td><?php echo $data['fullName']; ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-tags fa-fw"></i> Fav Category</td>
                                <td><?php echo $data['fullName']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                                </p>
                                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                <div class="progress rounded mb-2" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                                </p>
                                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                <div class="progress rounded mb-2" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 mt-4">
                    <div class="card-body text-center">
                        <div class="card-header">
                            <h4 class="">My Products</h4>
                            <a href="Create_product.php" class="btn waves-effect waves-light btn-main btn-square position-right"> Create New <i class="fa fa-plus text-primary"></i> </a>
                        </div>
                        <?php if(!empty($products_data)){?>
                        <table class="table border">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>price</th>
                                <th>created in</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Rating</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($products_data as $product){
                                ?>
                                <tr>
                                    <td><?php echo $product['name'];?></td>
                                    <td><?php echo $product['price'];?></td>
                                    <td><?php echo $product['add_date'];?></td>
                                    <td><?php echo $product['cat_name'];?></td>
                                    <td>
                                        <label class="label label-danger">Out Stock</label>
                                        <!-- <label class="label label-success">In Stock</label>-->
                                    </td>
                                    <td>
                                        <?php
                                        $counter = $product['rating'];
                                        $unCounter = 5 - $product['rating'];
                                        for ($i = 1; $i <= $counter; $i++){
                                            echo '<i class="fa fa-star f-12 text-c-yellow"></i>';
                                        }
                                        for ($x = 1; $x <= $unCounter; $x++){
                                            echo '<i class="fa fa-star f-12 text-default"></i>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                            <?php
                        }else{
                            echo "the's no Products";
                        }
                        ?>
                    </div>
                </div>


                <div class="card mb-4 mt-4">
                    <div class="card-body text-center">
                        <div class="card-header">
                            <h4 class="">My Comments</h4>
                        </div>
                        <?php
                        if(!empty($comments)){?>
                        <table class="table border">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Comment</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($comments as $comment){
                            ?>
                                <tr>
                                    <td><?php echo $comment['comment'];?></td>
                                    <td><?php echo $comment['status'];?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <?php
                            }else{
                                echo "the's no Comments";
                            }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!--End Page-->
<?php include "includes/templates/footer.php"; ?>
