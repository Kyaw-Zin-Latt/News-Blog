<?php
//require_once "auth.php";
include_once "front_panel/head.php";

$id = $_GET['id'];
$row = post($id);

if (isset($_SESSION['userName'])){
    $row1 = user($_SESSION['userName']);
    $userId = $row1->id;
} else {
    $userId = 0;
}
viewerCountByPost($userId,$id,$_SERVER['HTTP_USER_AGENT']);
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb card-bg">
        <li class="breadcrumb-item"><a href="<?php $url; ?>/index.php">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page"><?php echo $row->title ?></li>
    </ol>
</nav>
<div class="row">

    <div class="col-9">
        <div class="p-1 card-bg">
            <div class="card-body">
                        <div class="row">
                            <img src="<?php echo $row->photo ?>" class="img-fluid w-100"  alt="">
                            <div class="col-12">

                                <div class="p-5">
                                    <a href="fpost_by_category.php?cat_id=<?php echo $row->category_id; ?>">
                                        <p class="text-white font-weight-bold badge badge-pill badge-warning"><?php echo category($row->category_id)->title; ?></p>
                                    </a>
                                    <h2 class="mb-4 text-white"><?php echo $row->title; ?></h2>
                                    <p class="d-inline-block text-warning">
                                        <p class="text-white d-inline-block">
                                            <i class="feather-user text-warning"></i> <?php echo userId($row->user_id)->name; ?>
                                        </p>
                                        <i class="feather-calendar text-warning"></i> <?php echo showDate($row->created_at); ?>

                                    <i class="feather-clock text-warning"></i>        2 mins read
                                    </p>
                                    <h5 class="line-height text-white-50">
                                        <?php echo html_entity_decode($row->description,ENT_QUOTES) ?>
                                    </h5>
                                </div>
                            </div>
                        </div>



                    </div>
        </div>
        <h4 class="text-white mt-4 mb-1">Related Posts</h4>
        <div class="row my-2">
            <?php foreach (fPostByCategory($row->category_id,2,$id) as $row){ ?>
            <div class="col-6">
                <div class="card card-bg card-hover mb-3">
                    <div class="card-body" >
                        <a class="h-25" href="fdetail.php?id=<?php echo $row->id; ?>">
                            <img src="<?php echo $row->photo; ?>" class="img-fluid img-hover" alt="">
                        </a>
                        <h4 class="my-2 text-white"><?php echo $row->title; ?></h4>
                        <a class="text-decoration-none" href="fdetail.php?id=<?php echo $row->id; ?>">
                            <p class="text-white-50">
                                <?php echo short(strip_tags(html_entity_decode($row->description)),100); ?> ...
                            </p>
                        </a>
                        <div class="d-flex align-items-end">
                            <img src="img/1.jpg" class="rounded-circle round-img"  alt="">
                            <div class="mx-2">
                                <p class="mb-0 text-white"><?php echo userId($row->user_id)->name; ?></p>
                                <small class="text-warning font-weight-bolder"><?php echo showDate($row->created_at); ?></small>
                            </div>
                            <div class="text-warning font-weight-bolder">
                                <small class="font-weight-bolder">1 min read</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-3">
        <div class="card mb-2 card-bg">
            <div class="card-body">
                <?php if (isset($_SESSION['userName'])){ ?>
                    <div class="d-flex align-items-center">
                        <p class="mr-2 d-inline-block d-flex justify-content-center align-items-center rounded-circle bg-warning" style="margin-bottom: 0px; width: 35px; height: 35px;">
                            <i class="d-inline-block text-dark feather-user"></i>
                        </p>
                        Hello &nbsp; <p class="d-inline-block mb-0 text-white font-weight-bolder text-capitalize"><?php echo $_SESSION['userName'] ?></p>
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
            <a href="index.php" class="card-bg text-white mb-1 list-group-item list-group-item-action active" aria-current="true">
                All Categories
            </a>
            <?php foreach (categories() as $c){ ?>
                <a href="fpost_by_category.php?cat_id=<?php echo $c->id; ?>" class="card-bg text-white mb-1 list-group-item list-group-item-action" aria-current="true">
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
