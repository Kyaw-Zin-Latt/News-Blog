<?php
include "template/header.php";

if (isset($_POST['add'])){
    if (createCategory()){
        echo showAlert("aung p");
    }else{
        echo showAlert("fail p");
    }
}

if (isset($_POST['del'])){
    $id = $_POST['id'];
    if (userDelete($id)){
        echo showAlert("aung p","success");
    }else{
        echo showAlert("fail p","danger");
    }
}


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
                                <img src="img/me.jpg" class="user-img shadow-sm" alt=""> <?php echo $_SESSION['userName'] ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php $url; ?>/logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--content Area Start-->
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb card-bg">
                            <li class="breadcrumb-item"><a href="<?php $url; ?>/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-10">
<!--                    <div class="card card-bg my-2">-->
<!--                        <div class="card-body">-->
<!--                            <div class="d-flex justify-content-between">-->
<!--                                <h4 class="text-white">-->
<!--                                    <i class="text-primary feather-plus-circle "></i>-->
<!--                                    Category Add-->
<!--                                </h4>-->
<!--                            </div>-->
<!--                            <hr>-->
<!--                            <form action="" method="post">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="">Category</label>-->
<!--                                    <input class="form-control" name="title" type="text" placeholder="Category Name">-->
<!--                                </div>-->
<!--                                <button class="btn btn-outline-warning" name="add">Add New Category</button>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="card card-bg">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="text-white">
                                    <i class="text-primary feather-users "></i>
                                    User List
                                </h4>
                            </div>
                            <hr>
                            <div class="my-3">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>Control</th>
                                        <th>Created_at</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach (users() as $row) { ?>

                                            <tr>
                                                <td><?php echo $row->id; ?></td>
                                                <td class="text-nowrap"><?php echo short($row->name,50); ?></td>
                                                <td><?php echo $row->email; ?></td>
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

                                        <?php } ?>
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

