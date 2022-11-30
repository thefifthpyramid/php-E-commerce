<?php
    ob_start();
    //Get Variables
    $pageTitle = "Dashboard";
    //Sessions
    session_start();
    //print_r($_SESSION);
    if(isset($_SESSION['username'])){
        include "init.php";
        // the latest users
        $usersCount = 6; //number of the latest user
        $LastItemData =  getLatest('*','users','id',$usersCount);

    }else{
        header('Location: login.php'); //redirect to dashboard page
        exit();
    }



?>
<!-- ############### Body Page ##################### -->
<div class="pcoded-content">
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
                            <i class="feather icon-home"></i>
                            Dashboard
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-red">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Product</h6>
                                            <h3 class="m-b-0 f-w-700 text-white"><?php echo countItem('id','items'); //item count function //?></h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas feather icon-package text-c-red f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white m-r-10">
                                        Last Element Added  in: <?php echo LastItem('add_date','items');//last Item function?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-blue">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Comments</h6>
                                            <h3 class="m-b-0 f-w-700 text-white"><?php echo countItem('id','comments'); //item count function //?></h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments text-c-blue f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white m-r-10">
                                        Last Element Added  in: <?php echo LastItem('comment_date','comments');//last Item function?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-green">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Average Price</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">$6,780</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign text-c-green f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white"><span class="label label-success m-r-10">+52%</span>From Previous Month</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-yellow">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Product Sold</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">6,784</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tags text-c-yellow f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white"><span class="label label-warning m-r-10">+52%</span>From Previous Month</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-xl-8">
                            <div class="card sale-card">
                                <div class="card-header">
                                    <h5>Deals Analytics</h5>
                                </div>
                                <div class="card-block">
                                    <div id="sales-analytics" class="chart-shadow"
                                         style="height:380px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xl-4">
                            <div class="card comp-card">
                                <div class="card-body">
                                    <a href="members.php?do=Manage">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-b-25">Total Members</h6>
                                            <h3 class="f-w-700 text-c-blue"><?php echo countItem('id','users'); //item count function //?></h3>
                                            <p class="m-b-0">Last Element Added  in: <?php echo LastItem('Date','users');//last Item function?></p>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users bg-c-blue"></i>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card comp-card">
                                <div class="card-body">
                                    <a href="items.php?do=Manage">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-b-25">Products</h6>
                                                <h3 class="f-w-700 text-c-green"><?php echo countItem('id','items'); //item count function //?></h3>
                                                <p class="m-b-0">Last Element Added  in: <?php echo LastItem('add_date','items');//last Item function?></p>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas feather icon-package bg-c-green"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card comp-card">
                                <div class="card-body">
                                    <a href="members.php?do=Manage&page=Pending">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-b-25">Pending Members</h6>
                                            <h3 class="f-w-700 text-c-yellow"><?php echo CheckItems('Reg_Status','users',0);//last Item function?></h3>
                                            <p class="m-b-0">Actvation Members: <?php echo CheckItems('Reg_Status','users',1);//last Item function?></p>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hand-paper bg-c-yellow"></i>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="card proj-progress-card">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-xl-3 col-md-6">
                                            <h6>Published Project</h6>
                                            <h5 class="m-b-30 f-w-700">532
                                                <span class="text-c-green m-l-10">+1.69%</span></h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-red" style="width:<?php echo $usersCount;?>%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <h6>Completed Task</h6>
                                            <h5 class="m-b-30 f-w-700">4,569<span
                                                        class="text-c-red m-l-10">-0.5%</span></h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-blue"
                                                     style="width:65%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <h6>Successfull Task</h6>
                                            <h5 class="m-b-30 f-w-700">89%<span
                                                        class="text-c-green m-l-10">+0.99%</span></h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-green"
                                                     style="width:85%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <h6>Ongoing Project</h6>
                                            <h5 class="m-b-30 f-w-700">365<span
                                                        class="text-c-green m-l-10">+0.35%</span></h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-yellow"
                                                     style="width:45%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-xl-4">
                            <div class="card card-blue text-white">
                                <div class="card-block p-b-0">
                                    <div class="row m-b-50">
                                        <div class="col">
                                            <h6 class="m-b-5">Sales In July</h6>
                                            <h5 class="m-b-0 f-w-700">$2665.00</h5>
                                        </div>
                                        <div class="col-auto text-center">
                                            <p class="m-b-5">Direct Sale</p>
                                            <h6 class="m-b-0">$1768</h6>
                                        </div>
                                        <div class="col-auto text-center">
                                            <p class="m-b-5">Referal</p>
                                            <h6 class="m-b-0">$897</h6>
                                        </div>
                                    </div>
                                    <div id="sec-ecommerce-chart-line" class="" style="height:60px">
                                    </div>
                                    <div id="sec-ecommerce-chart-bar" style="height:195px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12">
                            <div class="card latest-update-card">
                                <div class="card-header">
                                    <h5>The Latest <?php echo $usersCount; ?> Register Users</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                            <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                            <li><i class="feather icon-trash close-card"></i></li>
                                            <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="scroll-widget">
                                        <div class="latest-update-box">
                                            <?php foreach ($LastItemData as $row) { ?>
                                            <div class="row p-t-20 p-b-30">
                                                <div class="col-auto text-right update-meta p-r-0">
                                                    <img src="layout/images/avatar-4.jpg" alt="user image"  class="img-radius img-40 align-top m-r-15 update-icon">
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!">
                                                        <h6><?php echo $row['userName'];?></h6>
                                                    </a>
                                                        <p class="text-muted m-b-0"><?php echo $row['Date'];?> |
                                                            <a href="members.php?do=edit&userid=<?php echo $row['id'];?>" class="text-c-blue"> <i class="fa fa-edit"></i> edit</a>
                                                            <?php
                                                            if($row['Reg_Status'] == 0){ ?> |
                                                                <a href="members.php?do=activate&userid=<?php echo $row['id']?>" class="text-c-green"><i class="fa fa-close"></i> Activate</a>
                                                            <?php } ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card latest-update-card">
                                <div class="card-header">
                                    <h5>Latest Activity</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i
                                                        class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i>
                                            </li>
                                            <li><i class="feather icon-refresh-cw reload-card"></i>
                                            </li>
                                            <li><i class="feather icon-trash close-card"></i></li>
                                            <li><i
                                                        class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="scroll-widget">
                                        <div class="latest-update-box">
                                            <div class="row p-t-20 p-b-30">
                                                <div class="col-auto text-right update-meta p-r-0">
                                                    <i class="b-primary update-icon ring"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!">
                                                        <h6>Devlopment & Update</h6>
                                                    </a>
                                                    <p class="text-muted m-b-0">Lorem ipsum dolor
                                                        sit amet, <a href="#!" class="text-c-blue">
                                                            More</a></p>
                                                </div>
                                            </div>
                                            <div class="row p-b-30">
                                                <div class="col-auto text-right update-meta p-r-0">
                                                    <i class="b-primary update-icon ring"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!">
                                                        <h6>Showcases</h6>
                                                    </a>
                                                    <p class="text-muted m-b-0">Lorem dolor sit
                                                        amet, <a href="#!" class="text-c-blue">
                                                            More</a></p>
                                                </div>
                                            </div>
                                            <div class="row p-b-30">
                                                <div class="col-auto text-right update-meta p-r-0">
                                                    <i class="b-success update-icon ring"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!">
                                                        <h6>Miscellaneous</h6>
                                                    </a>
                                                    <p class="text-muted m-b-0">Lorem ipsum dolor
                                                        sit ipsum amet, <a href="#!"
                                                                           class="text-c-green"> More</a></p>
                                                </div>
                                            </div>
                                            <div class="row p-b-30">
                                                <div class="col-auto text-right update-meta p-r-0">
                                                    <i class="b-danger update-icon ring"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!">
                                                        <h6>Your Manager Posted.</h6>
                                                    </a>
                                                    <p class="text-muted m-b-0">Lorem ipsum dolor
                                                        sit amet, <a href="#!" class="text-c-red">
                                                            More</a></p>
                                                </div>
                                            </div>
                                            <div class="row p-b-30">
                                                <div class="col-auto text-right update-meta p-r-0">
                                                    <i class="b-primary update-icon ring"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!">
                                                        <h6>Showcases</h6>
                                                    </a>
                                                    <p class="text-muted m-b-0">Lorem dolor sit
                                                        amet, <a href="#!" class="text-c-blue">
                                                            More</a></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto text-right update-meta p-r-0">
                                                    <i class="b-success update-icon ring"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!">
                                                        <h6>Miscellaneous</h6>
                                                    </a>
                                                    <p class="text-muted m-b-0">Lorem ipsum dolor
                                                        sit ipsum amet, <a href="#!"
                                                                           class="text-c-green"> More</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>New Products</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i
                                                        class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i>
                                            </li>
                                            <li><i class="feather icon-refresh-cw reload-card"></i>
                                            </li>
                                            <li><i class="feather icon-trash close-card"></i></li>
                                            <li><i
                                                        class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block p-b-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover m-b-0">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>price</th>
                                                <th>created in</th>
                                                <th>Category</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Rating</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                    <?php
                                                        $stmt = $con->prepare("
                                                                SELECT items.*, categories.name AS cat_name,users.userName FROM items
                                                                INNER JOIN categories ON categories.id = items.cat_id
                                                                INNER JOIN users ON users.id = items.member_id ORDER BY id DESC LIMIT 5
                                                                ");
                                                        $stmt->execute();
                                                        $products_data = $stmt->fetchAll();
                                                        foreach ($products_data as $product){
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $product['name'];?></td>
                                                            <td><?php echo $product['price'];?></td>
                                                            <td><?php echo $product['add_date'];?></td>
                                                            <td><?php echo $product['cat_name'];?></td>
                                                            <td><?php echo $product['userName'];?></td>
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
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!--End row div-->

<!-- ############### End Body Page ##################### -->
<?php
    include $tpl . "footer.php";
    ob_end_flush();
?>
