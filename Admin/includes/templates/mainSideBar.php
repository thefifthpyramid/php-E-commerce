<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <!-- left nav-bar -->
                <nav class="pcoded-navbar">
        <div class="nav-list">
            <div class="pcoded-inner-navbar main-menu">
                <!-- Dashboard -->
                <div class="pcoded-navigation-label">Dashboard</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class=""><!-- Start dashboard li -->
                        <a href="dashboard.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-home"></i>
                                </span>
                            <span class="pcoded-mtext">Home</span>
                        </a>
                    </li><!-- end li -->
                    <li class=""><!-- Start li -->
                        <a href="#" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-menu"></i>
                                </span>
                            <span class="pcoded-mtext">Navigation</span>
                        </a>
                    </li><!-- end li -->
                </ul>


                <!-- Categories -->
                <div class="pcoded-navigation-label">Categories</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class=""><!-- Start Show all Categories li -->
                        <a href="categories.php?do=Manage" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="feather icon-file-plus"></i>
                            </span>
                            <span class="pcoded-mtext">Show All Category</span>
                        </a>
                    </li><!-- end li -->
                    <li class=""><!-- Start li -->
                        <a href="categories.php?do=add" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-file-plus"></i>
                                </span>
                            <span class="pcoded-mtext">Create New</span>
                        </a>
                    </li><!-- end li -->
                </ul>

                <!-- Other -->
                <div class="pcoded-navigation-label">Other</div>
                <ul class="pcoded-item pcoded-left-item">

                    <li class="">
                        <a href="members.php?do=add" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="feather icon-file-plus"></i>
                            </span>
                            <span class="pcoded-mtext">Create new Member</span>
                        </a>
                    </li>
                    <!-- -->
                    <li class="">
                        <a href="members.php?do=edit&userid=<?php echo $_SESSION['id'] ?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="feather icon-user"></i>
                            </span>
                            <span class="pcoded-mtext"><?php echo lang("profile"); ?></span>
                        </a>
                    </li>
                    <!-- -->
                    <li class="">
                        <a href="members.php?do=Manage" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="feather icon-user"></i>
                            </span>
                            <span class="pcoded-mtext"><?php echo lang("users_manage"); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
                <!-- left nav-bar -->

                <!-- mainSideBar -->
                <?php include "includes/templates/nav-bar.php"?>
                <!-- mainSideBar -->

                <!-- right nav-bar -->
                <div id="sidebar" class="users p-chat-user showChat">
        <div class="had-container">
            <div class="p-fixed users-main">
                <div class="user-box">
                    <div class="chat-search-box">
                        <a class="back_friendlist">
                            <i class="feather icon-x"></i>
                        </a>
                        <div class="right-icon-control">
                            <div class="input-group input-group-button">
                                <input type="text" id="search-friends" name="footer-email" class="form-control"
                                       placeholder="Search Friend">
                                <div class="input-group-append">
                                    <button class="btn btn-primary waves-effect waves-light" type="button"><i
                                                class="feather icon-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start main-friend-list -->
                    <div class="main-friend-list">
                        <div class="media userlist-box waves-effect waves-light" data-id="1"
                             data-status="online" data-username="Josephin Doe">
                            <a class="media-left" href="#!">
                                <img class="media-object img-radius img-radius"
                                     src="layout/images/avatar-3.jpg" alt="Generic placeholder image ">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="chat-header">Josephin Doe</div>
                            </div>
                        </div>
                        <div class="media userlist-box waves-effect waves-light" data-id="2"
                             data-status="online" data-username="Lary Doe">
                            <a class="media-left" href="#!">
                                <img class="media-object img-radius" src="layout/images/avatar-2.jpg"
                                     alt="Generic placeholder image">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="f-13 chat-header">Lary Doe</div>
                            </div>
                        </div>
                        <div class="media userlist-box waves-effect waves-light" data-id="3"
                             data-status="online" data-username="Alice">
                            <a class="media-left" href="#!">
                                <img class="media-object img-radius" src="layout/images/avatar-4.jpg"
                                     alt="Generic placeholder image">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="f-13 chat-header">Alice</div>
                            </div>
                        </div>
                        <div class="media userlist-box waves-effect waves-light" data-id="4"
                             data-status="offline" data-username="Alia">
                            <a class="media-left" href="#!">
                                <img class="media-object img-radius" src="layout/images/avatar-3.jpg"
                                     alt="Generic placeholder image">
                                <div class="live-status bg-default"></div>
                            </a>
                            <div class="media-body">
                                <div class="f-13 chat-header">Alia<small class="d-block text-muted">10 min
                                        ago</small></div>
                            </div>
                        </div>
                        <div class="media userlist-box waves-effect waves-light" data-id="5"
                             data-status="offline" data-username="Suzen">
                            <a class="media-left" href="#!">
                                <img class="media-object img-radius" src="layout/images/avatar-2.jpg"
                                     alt="Generic placeholder image">
                                <div class="live-status bg-default"></div>
                            </a>
                            <div class="media-body">
                                <div class="f-13 chat-header">Suzen<small class="d-block text-muted">15 min
                                        ago</small></div>
                            </div>
                        </div>
                    </div>
                    <!-- End main-friend-list -->

                    <!-- Start Chat -->
                    <div class="showChat_inner">
                        <div class="media chat-inner-header">
                            <a class="back_chatBox">
                                <i class="feather icon-x"></i> Josephin Doe
                            </a>
                        </div>
                        <div class="main-friend-chat">
                            <div class="media chat-messages">
                                <a class="media-left photo-table" href="#!">
                                    <img class="media-object img-radius img-radius m-t-5" src="layout/images/avatar-2.jpg"
                                         alt="Generic placeholder image">
                                </a>
                                <div class="media-body chat-menu-content">
                                    <div class="">
                                        <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?
                                        </p>
                                    </div>
                                    <p class="chat-time">8:20 a.m.</p>
                                </div>
                            </div>
                            <div class="media chat-messages">
                                <div class="media-body chat-menu-reply">
                                    <div class="">
                                        <p class="chat-cont">Ohh! very nice</p>
                                    </div>
                                    <p class="chat-time">8:22 a.m.</p>
                                </div>
                            </div>
                            <div class="media chat-messages">
                                <a class="media-left photo-table" href="#!">
                                    <img class="media-object img-radius img-radius m-t-5" src="layout/images/avatar-2.jpg"
                                         alt="Generic placeholder image">
                                </a>
                                <div class="media-body chat-menu-content">
                                    <div class="">
                                        <p class="chat-cont">can you come with me?</p>
                                    </div>
                                    <p class="chat-time">8:20 a.m.</p>
                                </div>
                            </div>
                        </div>
                        <div class="chat-reply-box">
                            <div class="right-icon-control">
                                <div class="input-group input-group-button">
                                    <input type="text" class="form-control" placeholder="Write hear . . ">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary waves-effect waves-light" type="button"><i
                                                    class="feather icon-message-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Chat -->
                </div>
            </div>
        </div>
    </div>
        <!-- right nav-bar -->
    </div>