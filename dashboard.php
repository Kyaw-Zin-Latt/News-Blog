<?php include_once "template/header.php"; ?>

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
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--content Area Start-->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card mb-4 card-bg status-card" onclick="go('https://google.com')">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <i class="feather-eye h1 text-primary"></i>
                                </div>
                                <div class="col-9">
                                    <p class="mb-1 h4 font-weight-bolder">
                                        <span class="counter-up"><?php echo countRow('viewers') ?></span>
                                    </p>
                                    <p class="mb-0 text-white-50">Today Viewers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card mb-4 card-bg status-card" onclick="go('<?php echo $url; ?>/post_list.php')">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <i class="feather-list h1 text-primary"></i>
                                </div>
                                <div class="col-9">
                                    <p class="mb-1 h4 font-weight-bolder">
                                        <span class="counter-up"><?php echo countRow('posts') ?></span>
                                    </p>
                                    <p class="mb-0 text-white-50">Total Posts</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card mb-4 card-bg status-card" onclick="go('<?php echo $url; ?>/categories.php')">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <i class="feather-layers h1 text-primary"></i>
                                </div>
                                <div class="col-9">
                                    <p class="mb-1 h4 font-weight-bolder">
                                        <span class="counter-up"><?php echo countRow('categories') ?></span>
                                    </p>
                                    <p class="mb-0 text-white-50">Total Categories</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card mb-4 card-bg status-card" onclick="go('<?php echo $url; ?>/user.php')">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <i class="feather-users h1 text-primary"></i>
                                </div>
                                <div class="col-9">
                                    <p class="mb-1 h4 font-weight-bolder">
                                        <span class="counter-up"><?php echo countRow('users') ?></span>
                                    </p>
                                    <p class="mb-0 text-white-50">Total Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row align-items-end">
                <div class="col-12 col-xl-7">
                    <div class="card card-bg overflow-hidden shadow mb-4">
                        <div class="">
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <h4 class="mb-0">Order & Viewer</h4>
<!--                                <div class="">-->
<!--                                    <img src="img/user/avatar1.jpg" class="ov-img rounded-circle" alt="">-->
<!--                                    <img src="img/user/avatar2.jpg" class="ov-img rounded-circle" alt="">-->
<!--                                    <img src="img/user/avatar3.jpg" class="ov-img rounded-circle" alt="">-->
<!--                                    <img src="img/user/avatar4.jpg" class="ov-img rounded-circle" alt="">-->
<!--                                    <img src="img/user/avatar5.jpg" class="ov-img rounded-circle" alt="">-->
<!--                                </div>-->
                            </div>
                            <canvas id="ov" height="146"></canvas>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-5">
                    <div class="card card-bg mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <h4 class="mb-0">Order & Place</h4>
                                <div class="">
                                    <i class="feather-pie-chart h4 mb-0 text-primary"></i>
                                </div>
                            </div>
                            <canvas id="op" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-12">
                    <div class="card card-bg overflow-hidden mb-4">

                        <div class="">
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">Recent Post</p>
                                <div class="">
                                    <i class="feather-more-vertical h4 mb-0 text-primary"></i>
                                </div>
                            </div>
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
                                <?php foreach (posts(5) as $row) {
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
            <!--content Area Start-->
        </div>

<?php include_once "template/footer.php"; ?>

<script>



    let dateArr = ['jul 21','jul 20','jul 19','jul 18','jul 17','jul 16','jul 15','jul 14','jul 13','jul 12','jul 11'];
    let orderCountArr = [7, 5, 6, 4, 6, 4,8,6,8,9,6];
    let viewerCountArr = [13,12,15,14,20,17,19,16,23,33,16];

    let ov = document.getElementById('ov').getContext('2d');
    let ovChart = new Chart(ov, {
        type: 'line',
        data: {
            labels: dateArr,
            datasets: [
                {
                    label: 'Orders Count',
                    data: orderCountArr,
                    backgroundColor: [
                        '#007bff',
                    ],
                    fill : false,

                    borderColor: [
                        '#007bff',
                    ],
                    color: [
                        '#fff',
                    ],
                    pointBorderColor : '#fff',
                    borderWidth: 1,
                    tension:0
                },
                {
                    label: 'Viewer Count',
                    data: viewerCountArr,
                    backgroundColor: [
                        '#28a745',
                    ],
                    fill: false,
                    pointBorderColor : '#fff',
                    pointBorderWidth: '2',
                    borderColor: [
                        '#28a745',
                    ],
                    borderWidth: 1,
                    tension:0
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    display:false,
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes:[
                    {
                        display:true,
                        gridLines:[
                            {
                                display:true
                            }
                        ],
                    }
                ]
            },
            legend:{
                display: true,
                shape:"circle",
                position: 'top',
                labels: {
                    fontColor: '#fff',
                    usePointStyle:true
                },
            }
        }
    });


    <?php
    $catArr = [];
    $postByCatArr = [];
    foreach (categories() as $c){
        array_push($catArr,$c->title);
        array_push($postByCatArr,countPostByCat($c->id));
    }

    ?>
    let orderFromPlace = <?php echo json_encode($postByCatArr); ?>;
    let places = <?php echo json_encode($catArr); ?>;

    let op = document.getElementById('op').getContext('2d');
    let opChart = new Chart(op, {
        type: 'doughnut',
        data: {
            labels:places,
            datasets: [{
                label: '# of Votes',
                data:orderFromPlace,
                backgroundColor: [
                    "#FF6384",
                    "#8A00FF",
                    "#00B1FF",
                    "#64D600",
                    "#FFBB00",
                    "#F9874D"
                ],
                borderWidth:0,
                hoverBackgroundColor: [
                    "#FF6384",
                    "#8A00FF",
                    "#00B1FF",
                    "#64D600",
                    "#FFBB00",
                    "#F9874D"
                ],
                hoverBorderColor: [
                    "#FF6384",
                    "#8A00FF",
                    "#00B1FF",
                    "#64D600",
                    "#FFBB00",
                    "#F9874D"
                ],
                borderWidth: 0,
                hoverBorderWidth:15,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    display:false,
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [
                    {
                        display:false
                    }
                ]
            },
            legend:{
                display: true,
                position: 'bottom',
                labels: {
                    fontColor: 'rgba(255, 255, 255, 0.5)',
                    usePointStyle:true
                }
            },
            cutoutPercentage: 60,

        }
    });

</script>
