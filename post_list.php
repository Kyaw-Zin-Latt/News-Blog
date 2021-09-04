<?php
include_once "template/header.php";



?>

<section class="main container-fluid">
    <div class="row">
        <!--        sidebar start-->
        <?php include "template/sidebar.php"; ?>
        <!--        sidebar end-->
        <div class="col-12 col-lg-9 col-xl-10 vh-100 py-3 content">
            <div class="row header mb-4">
                <div class="col-12">
                    <div class="p-2 bg-primary d-flex justify-content-between align-items-center rounded">
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
                                <a class="dropdown-item" href="<?php echo $url; ?>/logout.php" >Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php

            if (isset($_POST['del'])){
                $id = $_POST['id'];
                if (deletePost($id)){
                    echo showAlert("Post have deleted successfully");
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
                            <li class="breadcrumb-item text-white active" aria-current="page">Post</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-12">
                    <div class="card card-bg">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="text-white">
                                    <i class="text-primary feather-list "></i>
                                    Post List
                                </h4>
                                <a href="post_add.php" class="btn btn-outline-primary">
                                    <i class="feather-plus-circle"></i>
                                </a>
                            </div>
                            <hr>
                            <div class="my-3">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>description</th>
                                        <th>Category</th>
                                        <th>User</th>
                                        <th>Viewer</th>
                                        <th>Control</th>
                                        <th>Created_at</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach (posts() as $row) {
                                            ?>

                                            <tr>
                                                <td><?php echo $row->id; ?></td>
                                                <td><?php echo short($row->title,50); ?> ...</td>
                                                <td><?php echo strip_tags(html_entity_decode(short($row->description,60))); ?></td>
                                                <td class="text-nowrap"><?php echo category($row->category_id)->title; ?></td>
                                                <td><?php echo userId($row->user_id)->name; ?></td>
                                                <td><?php echo count(viewer($row->id)); ?></td>
                                                <td class="text-nowrap">
                                                    <form action="" method="post" class="d-inline-block">
                                                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                                        <button class="btn btn-outline-danger" name="del">
                                                            <i class="feather-trash-2"></i>
                                                        </button>
                                                    </form>
                                                    <a href="productEdit.php?id=<?php echo $row->id; ?>" class="btn btn-outline-warning">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a href="post_detail.php?id=<?php echo $row->id; ?>" class="btn btn-outline-info">
                                                        <i class="feather-info"></i>
                                                    </a>
                                                </td>
                                                <td><?php echo showDate($row->created_at); ?></td>
                                            </tr>

                                        <?php }

                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--content Area Start-->
        </div>

        <?php include_once "template/footer.php"; ?>

        <script>
            $('#datatable').DataTable({
                "order": [0,'desc']
            });
        </script>
