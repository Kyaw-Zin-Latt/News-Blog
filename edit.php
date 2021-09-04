<?php
include "template/header.php";

$id = $_GET['id'];
$row = category($id);

if (isset($_POST['update'])){
    if (updateCategory($id)){
        echo showAlert("aung p","success");
        header("Location:category.php");
    }else{
        echo showAlert("fail p","danger");
    }
}


?>

<div class="container">
    <div class="row my-5">
        <div class="col-8">
            <div class="row g-1">
                <form action="" method="post">
                    <div class="col-5">
                        <input type="text" placeholder="Name" name="title" value="<?php echo $row->title; ?>" class="form-control">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-outline-primary w-100" name="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
