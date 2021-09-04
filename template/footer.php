</div>
</section>

<script src="<?php echo $url; ?>/vendor/jquery.min.js"></script>
<!--<script src="--><?php //echo $url; ?><!--/https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>-->
<script src="<?php echo $url; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>/vendor/way_point/jquery.waypoints.js"></script>
<script src="<?php echo $url; ?>/vendor/counter_up/counter_up.js"></script>
<script src="<?php echo $url; ?>/vendor/chart_js/chart.min.js"></script>
<script src="<?php echo $url; ?>/vendor/data_table/jquery.dataTables.min.js"></script>
<script src="<?php echo $url; ?>/vendor/data_table/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo $url; ?>/vendor/summer_note/summernote.min.js"></script>
<script src="<?php echo $url; ?>/js/app.js"></script>

<script src="<?php echo $url; ?>/js/dashboard.js"></script>
<script>
    let currentPage = location.href;
    $(".menu-item-link").each(function () {
        let links = $(this).attr("href");
        console.log(links);
        if(currentPage == links){
            $(this).addClass('active');
        }
    });
</script>
</body>
</html>