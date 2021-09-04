<?php
include_once "front_panel/head.php";
$id = $_GET['cat_id'];
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb card-bg">
        <li class="breadcrumb-item"><a href="<?php $url; ?>/index.php">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page"><?php echo category($id)->title; ?> Category</li>
    </ol>
</nav>
<div class="row">
    <div class="col-9">
        <div class="row list-wrapper">
            <?php foreach (fPostByCategory($_GET['cat_id']) as $row) { ?>
                <div class="col-4 list-item">
                    <div class=" card-bg card-hover mb-3">
                        <div class="p-3" >
                            <a class="h-25" href="fdetail.php?id=<?php echo $row->id; ?>">
                                <img src="<?php echo $row->photo; ?>" class="img-fluid img-hover" alt="">
                            </a>
                            <a href="fpost_by_category.php?cat_id=<?php echo $row->category_id; ?>">
                                <p class="text-white font-weight-bold badge badge-pill badge-warning"><?php echo category($row->category_id)->title; ?></p>
                            </a>
                            <a class="text-decoration-none" href="fdetail.php?id=<?php echo $row->id; ?>">
                                <h6 class="mb-2 text-white"><?php echo $row->title; ?></h6>
                            </a>
                            <div class="d-flex align-items-end">

                                <div class="">
                                    <i class="feather-user text-warning"></i>
                                    <small class="mb-0 text-white"><?php echo userId($row->user_id)->name; ?></small>
                                </div>
                                <div class="mx-2">
                                    <i class="feather-calendar text-warning"></i>
                                    <small class="text-white"><?php echo showDate($row->created_at); ?></small>
                                </div>
                                <div class="text-warning font-weight-bolder">
                                    <i class="feather-eye"></i>
                                    <small class="font-weight-bolder"><?php echo count(viewer($row->id)); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </div>
        <div id="pagination-container" class="align-items-start mt-3 fs"></div>
    </div>
    <div class="col-3">
        <div class="card mb-2 card-bg">
            <div class="card-body">
                <?php if (isset($_SESSION['userName'])){ ?>
                    <div class="d-flex align-items-center">
                        <p class="mr-2 d-inline-block d-flex justify-content-center align-items-center rounded-circle bg-warning" style="margin-bottom: 0px; width: 35px; height: 35px;">
                            <i class="d-inline-block text-dark feather-user"></i>
                        </p>
                        Hello &nbsp; <p class="d-inline-block mb-0 text-dark font-weight-bolder text-capitalize"><?php echo $_SESSION['userName'] ?></p>
                    </div>
                <?php }else { ?>
                    <div class="d-flex align-items-center">
                        <p class="mr-2 d-inline-block d-flex justify-content-center align-items-center rounded-circle bg-warning" style="margin-bottom: 0px; width: 35px; height: 35px;">
                            <i class="d-inline-block text-dark feather-user"></i>
                        </p>
                        Hello &nbsp; <p class="text-dark font-weight-bolder text-capitalize d-inline-block mb-0">Guest</p>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="list-group">
            <a href="<?php echo $url; ?>/index.php" class="text-white mb-1 card-bg list-group-item list-group-item-action <?php echo isset($id) ? '' : 'active' ?>" aria-current="true">
                All Categories
            </a>
            <?php foreach (fcategories() as $c){ ?>
                <a href="fpost_by_category.php?cat_id=<?php echo $c->id; ?>" class="text-white mb-1 card-bg list-group-item list-group-item-action <?php echo $c->id == $id ? 'active' : '' ?>" aria-current="true">
                    <?php echo $c->title; ?>
                </a>
            <?php } ?>
        </div>
        <div class="my-2 card card-bg">
            <div class="card-body">
                <form action="fpost_by_date.php" method="post">
                    <div class="form-group">
                        <label for="" class="text-white">Start Date</label>
                        <input name="start" class="form-control" type="date">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-white">End Date</label>
                        <input name="end" class="form-control" type="date">
                    </div>
                    <Button class="btn btn-outline-light" name="search">
                        <i class="text-warning feather-calendar"></i>
                        Search
                    </Button>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include_once "front_panel/foot.php"; ?>

