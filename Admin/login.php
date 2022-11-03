<?php
include "init.php";
include $tpl . "header.php";
include "includes/langs/ar.php";
?>
<!-- ############### Body Page ##################### -->
<div class="login-page">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Login Page</h5>
                </div>
                <div class="card-block">
                    <form id="second" action="" method="post" novalidate="">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="usernameP" name="Username" placeholder="Enter Username">
                                <span class="messages popover-valid"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="EmailP" name="Email" placeholder="Enter email id">
                                <span class="messages popover-valid"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary m-b-0">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- ############### End Body Page ##################### -->
<script>
    console.log('hi');
</script>
<script src="../layout/js/backend.js"></script>
<?php include $tpl . "footer.php"; ?>
