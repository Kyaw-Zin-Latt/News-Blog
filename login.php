<?php include "template/header.php"; ?>
<section class="main container">
    <div class="row min-vh-100 justify-content-center align-items-center">
        <div class="col-12 col-mg-6 col-lg-5">
            <div class="my-5">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <span class="bg-primary p-2 rounded d-flex justify-content-center align-items-center mr-2">
                        <i class="feather-shopping-bag text-white h4 mb-0"></i>
                    </span>
                    <span class="font-weight-bolder h4 mb-0 text-uppercase text-primary">My Shop</span>
                </div>
                <div class="border rounded-lg shadow-sm card-bg">
                    <div class="p-4">
                        <h2 class="text-center font-weight-normal">Sign In</h2>
                        <p class="text-center text-white-50 mb-4">
                            Don't have an account yet?
                            <a href="register.php">Sign up here</a>
                        </p>
                        <a href="#" class="btn text-white btn-lg w-100 btn-outline-secondary btn-block">
                            <i class="feather-log-in"></i>
                            Sign in with Google
                        </a>
                        <?php

                        if (isset($_POST['login'])){
                            if (login()){
                                echo showAlert("aung p","success");
                                redirect("dashboard.php");
                            }else{
                                echo showAlert("fail p","danger");
                            }
                        }

                        ?>
                        <hr class="mb-5">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control form-control-lg">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="text-black form-control form-control-lg">
                            </div>
                            <div class="form-group mb-5">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="termsCheckbox">
                                    <label class="custom-control-label text-muted" for="termsCheckbox"> Remember me</label>
                                </div>
                            </div>
                            <button class="btn btn-outline-warning btn-lg w-100" name="login">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "template/footer.php"; ?>