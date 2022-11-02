<?php
include "init.php";
include $tpl . "header.php";
include "includes/langs/ar.php";
?>
<!-- ############### Body Page ##################### -->

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

<!-- ############### End Body Page ##################### -->
<?php include $tpl . "footer.php"; ?>
