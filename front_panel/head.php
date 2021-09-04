<?php require_once "base.php"; ?>
<?php
require_once "function.php";

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $row = post($id);
}

if (isset($_GET['cat_id'])){
    $cat_id = $_GET['cat_id'];
    $row = category($cat_id);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="shortcut icon" href="<?php $url; ?>/img/book-open.svg">

    <?php if (isset($_GET['id'])){ ?>
        <title><?php echo $row->title; ?></title>
    <?php } elseif (isset($_GET['cat_id'])) { ?>
        <title>News |  <?php echo $row->title; ?></title>
    <?php } else { ?>
        <title>News</title>
    <?php } ?>

    <meta property="og:url"           content="<?php echo $url; ?>/index.php" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="News" />
    <meta property="og:description"   content="I am kyawzinlatt. I am junior web developer. This is my first news website" />
    <meta property="og:image"         content="<?php echo $url ?>/img/open-book.svg" />

    <link rel="stylesheet" href="<?php echo $url; ?>/css/app.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/css/style.css">


</head>
<body onresize="limitScreen();">

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row my-3">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3 class="mb-0">
                                <i class="feather-book-open"></i>
                            </h3>
                            <a class="navbar-brand" href="<?php echo $url; ?>">MyanmarNews</a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
                                <input class="form-control mr-sm-2" name="key" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                                <a href="<?php echo $url; ?>/login.php" class="btn btn-outline-secondary my-2 ml-2 my-sm-0" type="submit">Login</a>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
