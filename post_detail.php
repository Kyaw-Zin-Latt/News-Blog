<?php

include_once "template/header.php";
require_once 'vendor/autoload.php';

use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\AbstractDeviceParser;

AbstractDeviceParser::setVersionTruncation(AbstractDeviceParser::VERSION_TRUNCATION_NONE);

$id = $_GET['id'];
$row = post($id);



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
                                <a class="dropdown-item" href="<?php echo $url; ?>/">Logout</a>
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
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="post_list.php">Post</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page"><?php echo $row->title; ?></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-5">
                    <div class="p-2 card-bg">
                        <div class="">
                            <div class="d-flex justify-content-between">
                                <h5 class="text-white">
                                    <i class="text-primary feather-info"></i>
                                    Post Detail
                                </h5>
                                <a href="<?php echo $url; ?>/post_list.php" class="btn btn-outline-primary">
                                    <i class="feather-list"></i>
                                </a>
                            </div>
                            <hr>
                            <img src="<?php echo $row->photo; ?>" class="img-fluid mb-2 rounded"  alt="">

                            <div class="d-flex">
                                <p class="text-white text-nowrap">
                                    <i class="feather-user text-warning"></i>
                                    <?php echo userId($row->user_id)->name; ?>
                                </p>
                                <p class="text-white mx-2 text-nowrap">
                                    <i class="feather-layers text-warning"></i>
                                    <?php echo category($row->category_id)->title; ?>
                                </p>
                                <p class="text-white mx-2 text-nowrap">
                                    <i class="feather-calendar text-warning"></i>
                                    <?php echo showDate($row->created_at); ?>
                                </p>
                            </div>

                            <h5 class="text-white">
                                <?php echo $row->title; ?>
                            </h5>
                            <div class="text-white-50">
                                <?php echo html_entity_decode($row->description,ENT_QUOTES) ?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="p-2 card-bg ">
                        <div class="">
                            <div class="d-flex justify-content-between">
                                <h4 class="">
                                    <i class="text-primary feather-users"></i>
                                    Viewer
                                </h4>
                                <a href="post_list.php" class="btn btn-outline-primary">
                                    <i class="feather-list"></i>
                                </a>
                            </div>
                            <hr>
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Device</th>
                                    <th>Created_at</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach (viewer($id) as $v) {?>

                                <tr>
                                    <td><?php echo $v->id; ?></td>
                                    <td class="text-nowrap">
                                        <p>

                                            <?php if ($v->user_id == 0){ ?>
                                                Guest
                                            <?php } else {
                                                echo userId($v->user_id)->name;
                                            } ?>


                                        </p>
                                    </td>
                                    <td class="text-nowrap">
                                        <p>
                                            <?php
                                            $dd = new DeviceDetector($v->device);
                                            $dd->parse();
                                            $clientInfo = $dd->getClient('name'); // holds information about browser, feed reader, media player, ...
                                            $osInfo = $dd->getOs('name');
                                            $osVersion = $dd->getOs('version');
                                            $device = $dd->getDeviceName("brand");
                                            $brand = $dd->getBrandName('type');
                                            $model = $dd->getModel();
                                            echo $osInfo . "  " . $osVersion. " ". $clientInfo . " " . $device  ;
                                            ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            <?php echo showDate($v->created_at); ?>
                                        </p>
                                    </td>
                                </tr>

                                <?php } ?>
                                </tbody>
                            </table>


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

            $('#datatable').DataTable({
                "order": [0,'desc']
            });


        </script>
