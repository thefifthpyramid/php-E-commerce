<?php
    ob_start();
    if(!isset($_SESSION)){
        session_start();
    }

    $pageTitle = "Details";
    include_once "init.php";
    //$category_name = isset($_GET['category_name']) ? intval($_GET['category_name']) : 'none' ;
    //$category_name = FetchOneColum('categories','id',$product_data['cat_id']);
    $product_id = isset($_GET['product_id']) && is_numeric($_GET['product_id']) ? intval($_GET['product_id']) : 0 ;
    if($product_id == 0){
        header("Location:shop.php?category_id=000&cat_name=All-Products");
    }
    $lastElement = $con->prepare("SELECT * FROM products WHERE id = ? And approve = 1");
    $lastElement->execute(array($product_id));
    $product_data = $lastElement->fetch();
    //$product_data = FetchOneColum('products','id',$product_id);
    if(isset($_SESSION['userSession_username'])) {
        $user_id = FetchOneColum('users', 'userName', $_SESSION['userSession_username']);
    }

    if($product_data != NULL){
    $category_name = FetchOneColum('categories','id',$product_data['cat_id']);
?>
<!--Start Page-->

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Product Details - Variable</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                <li class="active" aria-current="page"><?php echo $product_data['name'];?></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- Start Product Details Section -->
<div class="product-details-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                    <!-- Start Large Image -->
                    <div class="product-large-image product-large-image-horaizontal swiper-container">
                        <div class="swiper-wrapper">
                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                <img src="uploads/products/<?php echo $product_data['product_cover']; ?>" alt="<?php echo $product_data['name']; ?>">
                            </div>
                            <?php
                                /********************************************************/
                                $sub_images_Array = explode("|",$product_data['sub_images']);
                                foreach($sub_images_Array as $sub_img){ 
                            ?>
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                    <img src="uploads/products/<?php echo $sub_img; ?>" alt="">
                                </div>
                            <?php }
                                /********************************************************/ 
                            ?>
                        </div>
                    </div>
                    <!-- End Large Image -->
                    <!-- Start Thumbnail Image -->
                    <div
                        class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5">
                        <div class="swiper-wrapper">
                            <div class="product-image-thumb-single swiper-slide">
                                <img class="img-fluid" src="uploads/products/<?php echo $product_data['product_cover']; ?>" alt="">
                            </div>
                            <?php
                                /********************************************************/ 
                                $sub_images_Array = explode("|",$product_data['sub_images']);
                                foreach($sub_images_Array as $sub_img){
                            ?>
                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="uploads/products/<?php echo $sub_img; ?>" alt="">
                                </div>
                            <?php
                                }
                                /********************************************************/ 
                            ?>
                            
                        </div>
                        <!-- Add Arrows -->
                        <div class="gallery-thumb-arrow swiper-button-next"></div>
                        <div class="gallery-thumb-arrow swiper-button-prev"></div>
                    </div>
                    <!-- End Thumbnail Image -->
                </div>
            </div>
            <div class="col-xl-7 col-lg-6">
                <div class="product-details-content-area product-details--golden" data-aos="fade-up"
                     data-aos-delay="200">
                    <!-- Start  Product Details Text Area-->
                    <div class="product-details-text">
                        <h4 class="title"><?php echo $product_data['name'];?></h4>
                        <div class="d-flex align-items-center">
                            <ul class="review-star">
                                <?php
                                    $counter = $product_data['rating'];
                                    $unCounter = 5 - $product_data['rating'];
                                for ($i = 1; $i <= $counter; $i++){
                                    echo '<i class="fa fa-star f-12 text-c-yellow"></i>';
                                }
                                for ($x = 1; $x <= $unCounter; $x++){
                                    echo '<i class="fa fa-star f-12 text-default"></i>';
                                }
                                ?>
                            </ul>
                            <a href="#" class="customer-review ml-2">(customer review )</a>
                        </div>
                        <div class="price">$ <?php echo $product_data['price'];?></div>
                        <p><?php echo $product_data['description'];?></p>
                    </div> <!-- End  Product Details Text Area-->
                    <!-- Start Product Variable Area -->
                    <div class="product-details-variable">
                        <h4 class="title">Available Options</h4>
                        <!-- Product Variable Single Item -->
                        <div class="variable-single-item">
                            <div class="product-stock"> <span class="product-stock-in"><i
                                        class="ion-checkmark-circled"></i></span> 200 IN STOCK</div>
                        </div>
                        <!-- Product Variable Single Item -->
                        <div class="variable-single-item">
                            <span>Color</span>
                            <div class="product-variable-color">
                                <label for="product-color-red">
                                    <input name="product-color" id="product-color-red" class="color-select"
                                           type="radio" checked>
                                    <span class="product-color-red"></span>
                                </label>
                                <label for="product-color-tomato">
                                    <input name="product-color" id="product-color-tomato" class="color-select"
                                           type="radio">
                                    <span class="product-color-tomato"></span>
                                </label>
                                <label for="product-color-green">
                                    <input name="product-color" id="product-color-green" class="color-select"
                                           type="radio">
                                    <span class="product-color-green"></span>
                                </label>
                                <label for="product-color-light-green">
                                    <input name="product-color" id="product-color-light-green" class="color-select"
                                           type="radio">
                                    <span class="product-color-light-green"></span>
                                </label>
                                <label for="product-color-blue">
                                    <input name="product-color" id="product-color-blue" class="color-select"
                                           type="radio">
                                    <span class="product-color-blue"></span>
                                </label>
                                <label for="product-color-light-blue">
                                    <input name="product-color" id="product-color-light-blue" class="color-select"
                                           type="radio">
                                    <span class="product-color-light-blue"></span>
                                </label>
                            </div>
                        </div>

                        <!-- Product Variable Single Item -->
                        <div class="variable-single-item">
                            <span>Size</span>
                            <select class="product-variable-size">
                                <option selected value="1"> size in option</option>
                                <option value="2">s</option>
                                <option value="3">m</option>
                                <option value="4">l</option>
                                <option value="5">xl</option>
                                <option value="6">xxl</option>
                            </select>
                        </div>
                        <!-- Product Variable Single Item -->
                        <div class="d-flex align-items-center ">
                            <div class="variable-single-item ">
                                <span>Quantity</span>
                                <div class="product-variable-quantity">
                                    <input min="1" max="100" value="1" type="number">
                                </div>
                            </div>

                            <div class="product-add-to-cart-btn">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart">+ Add To Cart</a>
                            </div>
                        </div>
                        <!-- Start  Product Details Meta Area-->
                        <div class="product-details-meta mb-20">
                            <a href="wishlist.html" class="icon-space-right"><i class="icon-heart"></i>Add to
                                wishlist</a>
                            <a href="compare.html" class="icon-space-right"><i class="icon-refresh"></i>Compare</a>
                        </div> <!-- End  Product Details Meta Area-->
                    </div> <!-- End Product Variable Area -->

                    <!-- Start  Product Details Catagories Area-->
                    <div class="product-details-catagory mb-2">
                        <span class="title">CATEGORIES:</span>
                        <ul>
                            <li><a href="shop.php?category_id=<?php echo $category_name['id'];?>&cat_name=<?php echo str_replace(' ','-',$category_name['name']);?>"><?php echo $category_name['name'];?></a></li>
                        </ul>
                    </div> <!-- End  Product Details Catagories Area-->


                    <!-- Start  Product Details Social Area-->
                    <div class="product-details-social">
                        <span class="title">SHARE THIS PRODUCT:</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> <!-- End  Product Details Social Area-->
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Product Details Section -->

<!-- Start Product Content Tab Section -->
<div class="product-details-content-tab-section section-top-gap-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-details-content-tab-wrapper" data-aos="fade-up" data-aos-delay="0">

                    <!-- Start Product Details Tab Button -->
                    <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                        <li><a class="nav-link active" data-bs-toggle="tab" href="#description">
                                Description
                            </a></li>
                        <li><a class="nav-link" data-bs-toggle="tab" href="#specification">
                                Specification
                            </a></li>
                        <li><a class="nav-link" data-bs-toggle="tab" href="#review">
                                Reviews (1)
                            </a></li>
                    </ul> <!-- End Product Details Tab Button -->

                    <!-- Start Product Details Tab Content -->
                    <div class="product-details-content-tab">
                        <div class="tab-content">
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane active show" id="description">
                                <div class="single-tab-content-item">
                                    <p><?php echo $product_data['description'];?></p>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane" id="specification">
                                <div class="single-tab-content-item">
                                    <table class="table table-bordered mb-20">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Category</th>
                                                <td><?php echo $category_name['name'];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Owner</th>
                                                <td><?php echo $product_data['country_made'];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Country</th>
                                                <td>Made In <?php echo $product_data['country_made'];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tags</th>
                                                <td>
                                                    <?php
                                                        $allTags = explode(",", $product_data['tags']);
                                                        foreach($allTags as $tag){
                                                            $tag = str_replace(' ','',$tag);
                                                    ?>
                                                    <a href="tags.php?name=<?php echo $tag;?>"><?php echo $tag;?></a>
                                                    <?php }?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>Fashion has been creating well-designed collections since 2010. The brand
                                        offers feminine designs delivering stylish separates and statement dresses
                                        which have since evolved into a full ready-to-wear collection in which every
                                        item is a vital part of a woman's wardrobe. The result? Cool, easy, chic
                                        looks with youthful elegance and unmistakable signature style. All the
                                        beautiful pieces are made in Italy and manufactured with the greatest
                                        attention. Now Fashion extends to a range of accessories including shoes,
                                        hats, belts and more!</p>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane" id="review">
                                <div class="single-tab-content-item">
                                    <!-- Start - Review Comment -->

                                    <ul class="comment">
                                        <!-- Start - Review Comment list-->
                                        <?php

                                        /* ********************************************************** */
                                        $stmt = $con->prepare("SELECT 
                                                                        comments.* ,users.userName AS member,users.avatar AS Avatar
                                                                    FROM 
                                                                        comments
                                                                    inner join 
                                                                        users
                                                                    on users.id = comments.user_id 
                                                                    WHERE item_id = ?
                                                                    AND status = 1
                                                                    ORDER BY id DESC");
                                        $stmt->execute(array($product_data['id']));
                                        $comments = $stmt->fetchAll();
                                        foreach($comments as $comment){
                                        /* ********************************************************** */
                                        ?>
                                        <li class="comment-list">
                                            <div class="comment-wrapper">
                                                <div class="comment-img">
                                                    <img src="uploads/avatars/<?php echo $comment['Avatar']; ?>" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-content-top">
                                                        <div class="comment-content-left">
                                                            <h6 class="comment-name"><?php echo $comment['member']; ?></h6>
                                                            <ul class="review-star">
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="empty"><i class="ion-android-star"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="comment-content-right">
                                                            <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>

                                                    <div class="para-content">
                                                        <p><?php echo $comment['comment']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li> <!-- End - Review Comment list-->
                                    </ul> <!-- End - Review Comment -->
                                    <?php }
                                    /*********check up the session of the user**********/
                                    if(isset($_SESSION['userSession_username'])){
                                        ?>
                                    <div class="review-form">
                                        <div class="review-form-text-top">
                                            <h5>ADD A REVIEW</h5>
                                        </div>

                                        <form action="<?php $_SERVER['PHP_SELF'] . '?product_id=' . $product_data['id'];?>" method="post">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="default-form-box">
                                                        <textarea id="comment-review-text" placeholder="Write a review" name="comment" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-black-default-hover" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                            /* ******************************************** */
                                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                                $comment = filter_var($_POST['comment'],FILTER_SANITIZE_STRING);;

                                                $item_id = $product_id;
                                                if(!empty($comment)){
                                                    $stmt = $con->prepare("INSERT INTO comments(comment,status, user_id, item_id,comment_date) 
                                                                                 VALUES(:comment,0, :user_id, :item_id, now()) ");
                                                    $stmt->execute(array(
                                                        'comment'      =>$comment,
                                                        'user_id'      =>$user_id['id'],
                                                        'item_id'      =>$item_id,
                                                    ));
                                                    if($stmt){?>
                                                        <div class="alert_msg">
                                                            <div class="alert alert-success background-danger m-4">
                                                                <button type="button" class="close text-blue" data-dismiss="alert" aria-label="Close">
                                                                    <i>x</i>
                                                                </button>
                                                                <strong>Done,Your Comment Is Uploading</strong>
                                                            </div>
                                                        </div>
                                                <?php }
                                            }//end if not empty
                                        }//end request
                                        ?>
                                    </div>
                                <?php }else{?>
                                        <div class="text-center pt-5">You Have To Sign Up To See the Comments <a href="login.php" class="active-link">Login</a> / <a href="register.php" class="active-link">Register</a> </div>
                                    <?php } //end check up the session of the user?>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                        </div>
                    </div> <!-- End Product Details Tab Content -->

                </div>
            </div>
        </div>
    </div>
</div> <!-- End Product Content Tab Section -->

<!-- Start Product Default Slider Section -->
<div class="product-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3 class="section-title">RELATED PRODUCTS</h3>
                            <p>Browse the collection of our related products.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-1row default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-default-slider-4grid-1row">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- End Product Default Single Item -->
                                <?php
                                    $latestProduct = getLatest('*','products','id',10);
                                    foreach ($latestProduct as $product){
                                ?>
                                <!-- Start Product Default Single Item -->
                                <div class="product-default-single-item product-color--golden swiper-slide">
                                    <div class="image-box">
                                        <a href="product-details.php?product_id=<?php  echo $product['id']; ?>" class="image-link">
                                        <img src="uploads/products/<?php echo $product['product_cover']; ?>" alt="<?php echo $product['name']; ?>">
                                        <?php
                                            /*************************************************/
                                            $sub_images_Array = explode("|",$product['sub_images']);
                                            /*************************************************/
                                        ?>
                                        <img src="uploads/products/<?php echo $sub_images_Array[1]; ?>" alt="">
                                        </a>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalAddcart">Add to Cart</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalQuickview"><i
                                                        class="icon-magnifier"></i></a>
                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="product-details.php?product_id=<?php  echo $product['id']; ?>"><?php  echo $product['name'];?></a></h6>
                                            <ul class="review-star">
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
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price">$ <?php  echo $product['price']; ?></span>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                                <?php  } ?>
                                <!-- Start Product Default Single Item -->
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Default Slider Section -->

<!--End Page-->
<?php
    }else{
        echo "<div class='alert alert-danger m-5 text-center'>There is No Such Id Or The Product Under Approved</div>";
    }
    include "includes/templates/footer.php";
    ob_end_flush();
?>
