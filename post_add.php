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
                                <img src="img/me.jpg" class="user-img shadow-sm" alt=""> <?php echo $_SESSION['userName'] ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php

            if (isset($_POST['add'])){
                if (createPost()){
                    echo showAlert("Post Added Successfully");
                }else{
                    echo showAlert("fail p","danger");
                }
            }

            ?>


            <!--content Area Start-->
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb card-bg">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="post_list.php">Post</a></li>
                            <li class="breadcrumb-item active text-whited" aria-current="page">Create New Post</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-10">
                    <div class="card-bg" >
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="text-white">
                                    <i class="text-primary feather-plus-circle"></i>
                                    Create New Post
                                </h4>
                                <a href="post_list.php" class="btn btn-outline-primary">
                                    <i class="feather-list"></i>
                                </a>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="" class="text-white">Post Title</label>
                                    <input type="text" placeholder="Name" name="title" class="form-control text-white">
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-white">Post Cover Image</label>
                                    <input type="file" placeholder="Name" name="photo" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-white">Select Category</label>
                                    <select class="form-control text-white" name="category_id" id="exampleFormControlSelect1">
                                        <?php foreach (categories() as $c){ ?>
                                            <option class="bg-dark" value="<?php echo $c->id; ?>"><?php echo $c->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-white">Post Description</label>
                                    <textarea class="form-control rounded" name="description" id="summernote" cols="30" rows="10"></textarea>
                                </div>
                                <div class="">
                                    <button class="btn btn-outline-primary w-auto" name="add">Create New Post</button>
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
