</div>
</div>
</div>


<script src="<?php echo $url; ?>/vendor/jquery.min.js"></script>
<script src="<?php echo $url; ?>/https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="<?php echo $url; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script>



    let items = $(".list-wrapper .list-item");
    let numItems = items.length;
    let perPage = 6;

    items.slice(perPage).hide();

    $('#pagination-container').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "&laquo;",
        nextText: "&raquo;",
        onPageClick: function (pageNumber) {
            let showFrom = perPage * (pageNumber - 1);
            let showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });

    function limitScreen() {
         if (screen.width < 1200){
            alert("This website don't support for Mobile and Tablet  right now yet!😢😢😢");
        }
    }


</script>
</body>
</html>