<?php
include "init.php";
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
                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
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

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Tooltip Validation</h5>
                                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form id="second" action="https://demo.dashboardpack.com/" method="post" novalidate="">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Enter Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="usernameP" name="Username" placeholder="Enter Username">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Enter Email-id</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="EmailP" name="Email" placeholder="Enter email id">
                                                <span class="messages popover-valid"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  page content  -->

</div><!-- end last div-->
<!-- ############### End Body Page ##################### -->
<?php include $tpl . "footer.php"; ?>
