<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar card-bg">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
        <div class="d-flex align-items-center">
                    <span class="bg-primary p-2 rounded d-flex justify-content-center align-items-center mr-2">
                        <i class="feather-shopping-bag text-white h4 mb-0"></i>
                    </span>
            <span class="font-weight-bolder h4 mb-0 text-uppercase text-primary">My Shop</span>
        </div>
        <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
            <i class="feather-x text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>
            <li class="menu-spacer"></li>

            <li class="menu-item">
                <a href="<?php echo $url; ?>/dashboard.php" class="menu-item-link">
                            <span class="text-white">
                                <i class="text-warning feather-home"></i>
                                Dashboard
                            </span>
                </a>
            </li>

            <li class="menu-spacer"></li>

            <li class="menu-title">
                <span>Post Management</span>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/post_add.php" class="menu-item-link">
                            <span class="text-white">
                                <i class="text-warning feather-plus-circle"></i>
                                Create New Post
                            </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/post_list.php" class="menu-item-link">
                            <span class="text-white">
                                <i class="text-warning feather-server"></i>
                                Post Lists
                            </span>
                    <span class="badge badge-pill bg-white shadow-sm text-primary"><?php echo countRow("posts") ?></span>
                </a>
            </li>

            <li class="menu-spacer"></li>

            <li class="menu-title">
                <span>Setting</span>
            </li>
            <li class="menu-item ">
                <a href="<?php echo $url; ?>/category.php" class="menu-item-link">
                            <span class="text-nowrap overflow-hidden text-white">
                                <i class="text-warning feather-layers"></i>
                                Category Manager
                            </span>
                    <span class="badge badge-pill bg-white shadow-sm text-primary"><?php echo countRow("categories") ?></span>

                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/user.php" class="menu-item-link">
                            <span class="text-nowrap overflow-hidden text-white">
                                <i class="feather-users text-warning"></i>
                                User Manager
                            </span>
                    <span class="badge badge-pill bg-white shadow-sm text-primary"><?php echo countRow("users") ?></span>

                </a>
            </li>
            <li class="menu-spacer"></li>
            <li class="menu-title">
                <span>Your Profile</span>
            </li>
            <li class="menu-item ">
                <a href="<?php echo $url; ?>/change_password.php" class="menu-item-link">
                            <span class="text-nowrap overflow-hidden text-white">
                                <i class="text-warning feather-lock"></i>
                                Change Password
                            </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/user.php" class="menu-item-link">
                            <span class="text-nowrap overflow-hidden text-white">
                                <i class="feather-user-check text-warning"></i>
                                Your Profile
                            </span>
                    <span class="badge badge-pill bg-white shadow-sm text-primary"><?php echo countRow("users") ?></span>

                </a>
            </li>
            <li class="menu-spacer"></li>


        </ul>
    </div>
</div>