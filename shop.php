<?php
    $pageTitle = "Home Page";
    include_once "init.php";
    $cat_id = isset($_GET['category_id']) && is_numeric($_GET['category_id']) ? intval($_GET['category_id']) : 0 ;
    $WhereVar =  '';
    if($cat_id != 000){
        $WhereVar =  "WHERE cat_id = ? AND approve = 1";
    }else{
        $WhereVar =  "WHERE approve = 1";
    }
    if(isset($_GET['cat_name'])){
        $cat_name = $_GET['cat_name'];
    }else{
        $cat_name = "All Products";
    }


    $lastElement = $con->prepare("SELECT * FROM products " . $WhereVar ." ORDER BY id DESC ");

    if($cat_id != 000){
        $lastElement->execute(array($cat_id));
    }else{
        $lastElement->execute();
    }
    $tableData = $lastElement->fetchAll();
?>
<!--Start Page-->

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Shop - <?php echo str_replace('-',' ',$cat_name);?></h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li>Shop</li>
                                    <li class="active" aria-current="page"><?php echo str_replace('-',' ',$cat_name);?></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Shop Section:::... -->
    <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">CATEGORIES</h6>
                            <div class="sidebar-content">
                                <ul class="sidebar-menu">

                                    <?php
                                        $dataCat = getIData('categories','parent',0);
                                        foreach ($dataCat as $item){
                                    ?>
                                    <li>
                                        <a href="?category_id=<?php echo $item['id']; ?>&cat_name=<?php echo str_replace(' ','-',$item['name']); ?>" class="<?php if($item['name'] == str_replace('-',' ',$cat_name)){ echo 'active';}?>" ><?php echo $item['name']; ?>

                                            <span class="Category_counter float-right">
                                                <?php echo getCatCount('cat_id','products',$item['id']); ?>
                                            </span>
                                        </a>
                                    </li>
                                        <?php
                                            //Get Sub Category
                                            $subCategoy = getIData('categories','parent', $item['id']);
                                            foreach ($subCategoy as $sub){
                                        ?>
                                    <ul class="sidebar-menu">
                                        <li class="sub-link">
                                            <a href="?category_id=<?php echo $sub['id']; ?>&cat_name=<?php echo str_replace(' ','-',$sub['name']); ?>" class="<?php if($sub['name'] == str_replace('-',' ',$cat_name)){ echo 'active';}?>" ><?php echo $sub['name']; ?>
                                                <span class="Category_counter float-right">
                                                    <?php echo getCatCount('cat_id','products',$sub['id']); ?>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <?php }} ?>
                                </ul>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">FILTER BY PRICE</h6>
                            <div class="sidebar-content">
                                <div id="slider-range"></div>
                                <div class="filter-type-price">
                                    <label for="amount">Price range:</label>
                                    <input type="text" id="amount">
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">MANUFACTURER</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        <li>
                                            <label class="checkbox-default" for="brakeParts">
                                                <input type="checkbox" id="brakeParts">
                                                <span>Brake Parts(6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="accessories">
                                                <input type="checkbox" id="accessories">
                                                <span>Accessories (10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="EngineParts">
                                                <input type="checkbox" id="EngineParts">
                                                <span>Engine Parts (4)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="hermes">
                                                <input type="checkbox" id="hermes">
                                                <span>hermes (10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="tommyHilfiger">
                                                <input type="checkbox" id="tommyHilfiger">
                                                <span>Tommy Hilfiger(7)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">SELECT BY COLOR</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        <li>
                                            <label class="checkbox-default" for="black">
                                                <input type="checkbox" id="black">
                                                <span>Black (6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="blue">
                                                <input type="checkbox" id="blue">
                                                <span>Blue (8)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="brown">
                                                <input type="checkbox" id="brown">
                                                <span>Brown (10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="Green">
                                                <input type="checkbox" id="Green">
                                                <span>Green (6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="pink">
                                                <input type="checkbox" id="pink">
                                                <span>Pink (4)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">Tag products</h6>
                            <div class="sidebar-content">
                                <div class="tag-link">
                                    <a href="#">asian</a>
                                    <a href="#">brown</a>
                                    <a href="#">euro</a>
                                    <a href="#">fashion</a>
                                    <a href="#">hat</a>
                                    <a href="#">t-shirt</a>
                                    <a href="#">teen</a>
                                    <a href="#">travel</a>
                                    <a href="#">white</a>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <div class="sidebar-content">
                                <a href="product-details.php?product_id=<?php  echo $item['id']; ?>" class="sidebar-banner img-hover-zoom">
                                    <img class="img-fluid" src="layout/assets/images/banner/side-banner.jpg" alt="">
                                </a>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                    </div> <!-- End Sidebar Area -->
                </div>
                <div class="col-lg-9">
                    <!-- Start Shop Product Sorting Section -->
                    <div class="shop-sort-section">
                        <div class="container">
                            <div class="row">
                                <!-- Start Sort Wrapper Box -->
                                <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column" data-aos="fade-up" data-aos-delay="0">
                                    <!-- Start Sort tab Button -->
                                    <div class="sort-tablist d-flex align-items-center">
                                        <ul class="tablist nav sort-tab-btn">
                                            <li><a class="nav-link active" data-bs-toggle="tab"
                                                   href="#layout-3-grid"><img src="layout/assets/images/icons/bkg_grid.png"
                                                                              alt=""></a></li>
                                            <li><a class="nav-link" data-bs-toggle="tab" href="#layout-list"><img
                                                            src="layout/assets/images/icons/bkg_list.png" alt=""></a></li>
                                        </ul>

                                        <!-- Start Page Amount -->
                                        <div class="page-amount ml-2">
                                            <span>Showing 1???9 of 21 results</span>
                                        </div> <!-- End Page Amount -->
                                    </div> <!-- End Sort tab Button -->

                                    <!-- Start Sort Select Option -->
                                    <div class="sort-select-list d-flex align-items-center">
                                        <label class="mr-2">Sort By:</label>
                                        <form action="#">
                                            <fieldset>
                                                <select name="speed" id="speed">
                                                    <option>Sort by average rating</option>
                                                    <option>Sort by popularity</option>
                                                    <option selected="selected">Sort by newness</option>
                                                    <option>Sort by price: low to high</option>
                                                    <option>Sort by price: high to low</option>
                                                    <option>Product Name: Z</option>
                                                </select>
                                            </fieldset>
                                        </form>
                                    </div> <!-- End Sort Select Option -->



                                </div> <!-- Start Sort Wrapper Box -->
                            </div>
                        </div>
                    </div> <!-- End Section Content -->

                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content tab-animate-zoom">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                            <div class="row">
                                                <?php
                                                    if($lastElement->rowCount() > 0){
                                                    foreach($tableData as $item){
                                                ?>
                                                <div class="col-xl-4 col-sm-6 col-12">
                                                    <!-- Start Product Default Single Item -->
                                                    <div class="product-default-single-item product-color--golden"
                                                         data-aos="fade-up" data-aos-delay="0">
                                                        <div class="image-box">
                                                            <a href="product-details.php?product_id=<?php  echo $item['id']; ?>" class="image-link">
                                                                <img src="uploads/products/<?php echo $item['product_cover']; ?>" alt="<?php echo $item['name']; ?>">
                                                                <?php
                                                                    /*************************************************/
                                                                    $sub_images_Array = explode("|",$item['sub_images']);
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
                                                                    <a href="wishlist.html"><i
                                                                                class="icon-heart"></i></a>
                                                                    <a href="compare.html"><i
                                                                                class="icon-shuffle"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <div class="content-left">
                                                                <h6 class="title"><a href="product-details.php?product_id=<?php  echo $item['id']; ?>"><?php echo $item['name']; ?></a></h6>
                                                                <ul class="review-star">
                                                                    <?php
                                                                        $counter = $item['rating'];
                                                                        $unCounter = 5 - $item['rating'];
                                                                        for ($i = 1; $i <= $counter; $i++){
                                                                            echo '<li class="fill"><i class="ion-android-star"></i></li>';
                                                                        }
                                                                        for ($x = 1; $x <= $unCounter; $x++){
                                                                            echo '<li class="empty"><i class="ion-android-star"></i></li>';
                                                                        }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                            <div class="content-right">
                                                                <span class="price">$ <?php  echo $item['price']; ?></span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- End Product Default Single Item -->
                                                </div>
                                                <?php  }//end foreach
                                                    }else{
                                                        echo "<div class='alert alert-danger m-3'>There is no data</div>";
                                                    }?>
                                            </div>
                                        </div> <!-- End Grid View Product -->
                                        <!-- Start List View Product -->
                                        <div class="tab-pane sort-layout-single" id="layout-list">
                                            <div class="row">
                                                <?php
                                                    if($lastElement->rowCount() > 0){
                                                    foreach($tableData as $item){
                                                ?>
                                                    <div class="col-12">
                                                            <!-- Start Product Defautlt Single -->
                                                            <div class="product-list-single product-color--golden">
                                                                <a href="product-details.php?product_id=<?php  echo $item['id']; ?>"
                                                                   class="product-list-img-link">
                                                                    <img class="img-fluid" src="uploads/products/<?php echo $item['product_cover']; ?>" alt="<?php echo $item['name']; ?>">
                                                                    <?php
                                                                        /*************************************************/
                                                                            $sub_images_Array = explode("|",$item['sub_images']);
                                                                        /*************************************************/
                                                                    ?>
                                                                    <img class="img-fluid" src="uploads/products/<?php echo $sub_images_Array[1]; ?>" alt="">
                                                                </a>
                                                                <div class="product-list-content">
                                                                    <h5 class="product-list-link"><a  href="product-details.php?product_id=<?php  echo $item['id']; ?>"><?php  echo $item['name']; ?></a></h5>
                                                                    <ul class="review-star">
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                                    </ul>
                                                                    <span class="product-list-price"> $<?php  echo $item['price']; ?></span>
                                                                    <p><?php  echo $item['description']; ?></p>
                                                                    <div class="product-action-icon-link-list">
                                                                        <a href="#" data-bs-toggle="modal"  data-bs-target="#modalAddcart"  class="btn btn-lg btn-black-default-hover">Add to cart</a>
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                                        <a href="wishlist.html"  class="btn btn-lg btn-black-default-hover"><i  class="icon-heart"></i></a>
                                                                        <a href="compare.html" class="btn btn-lg btn-black-default-hover"><i  class="icon-shuffle"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- End Product Defautlt Single -->
                                                        </div>
                                                <?php  }//end foreach
                                                    }else{
                                                        echo "<div class='alert alert-danger m-3'>There is no data</div>";
                                                    }
                                                ?>
                                            </div>
                                        </div> <!-- End List View Product -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Tab Wrapper -->

                    <!-- Start Pagination -->
                    <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                        <ul>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                        </ul>
                    </div> <!-- End Pagination -->
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Shop Section:::... -->



<!--End Page-->
<?php include "includes/templates/footer.php"; ?>