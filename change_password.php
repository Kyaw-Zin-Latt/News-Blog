<?php include_once "template/header.php"; ?>

<section class="main container-fluid" style="position: relative;">
    <div class="row">
        <!--        sidebar start-->
        <?php include "template/sidebar.php"; ?>
        <!--        sidebar end-->
        <div class="col-12 col-lg-9 col-xl-10 vh-100 py-3 content">
            <div class="row header mb-4">
                <div class="col-12">
                    <div class="p-2 card-bg card-bg d-flex justify-content-between align-items-center rounded">
                        <button class="show-sidebar-btn btn btn-primary d-block d-lg-none">
                            <i class="feather-menu text-light" style="font-size: 2em;"></i>
                        </button>
                        <form action="" method="post" class="d-none d-md-block">
                            <div class="form-inline">
                                <input type="text" class="form-control mr-2" placeholder="Search Everything">
                                <button class="btn btn-light">
                                    <i class="feather-search text-primary"></i>
                                </button>
                            </div>
                        </form>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="img/me.jpg" class="user-img shadow-sm" alt=""> <?php echo $_SESSION['userName']; ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo  $url; ?>/logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php

            if (isset($_POST['save'])){
                if (changePassword()){
                    echo showAlert("Your Password have changed successful");
                }else{
                    echo showAlert("Your Password is wrong !");
                }
            }

            ?>


            <!--content Area Start-->
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb card-bg">
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>/your_profile.php">Profile</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Change New Password</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-6">
                    <div class="card-bg" >
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="text-white">
                                    <i class="text-primary feather-lock"></i>
                                    Change New Password
                                </h4>
                                <a href="<?php echo $url; ?>/your_profile.php" class="btn btn-outline-primary">
                                    <i class="feather-user-check"></i>
                                </a>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputPassword" class="col-form-label">Old Password</label>
                                    <input type="password" name="oldPass" class="form-control" id="inputPassword">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-form-label">New Password</label>
                                    <input type="password" name="newPass" class="form-control" id="inputPassword">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-form-label">Confirm Password</label>
                                    <input type="password" name="conPass" class="form-control" id="inputPassword">
                                </div>
                                <div class="">
                                    <button class="btn btn-outline-primary w-auto" name="save">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!--content Area Start-->
        </div>

        <?php include_once "template/footer.php"; ?>
        <script>
            $('#summernote').summernote({
                placeholder: 'Hello Bootstrap 4',
                tabsize: 2,
                height: 350,

            });

            $('.toast').toast('show')

        </script>
