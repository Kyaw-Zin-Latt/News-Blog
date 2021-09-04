<?php

include "template/header.php";

if (isset($_POST['reg'])) {
    if ($_POST['password'] == $_POST['cpassword']){
        register();
        echo showAlert("tu tal","success");
    }else {
        echo showAlert("ma tu buu","danger");
    }
}

?>

<section class="main container ">
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
                        <h2 class="text-center font-weight-normal">Create Account</h2>
                        <p class="text-center text-white-50 mb-4">
                            Already have an account?
                            <a href="<?php echo $url; ?>/login.php">Sign in here</a>
                        </p>
                        <a href="#" class="btn btn-lg w-100 btn-outline-light btn-block">
                            <i class="feather-log-in"></i>
                            Sign in with Google
                        </a>
                        <hr class="mb-5">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <label>Full Name</label>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" name="fname" class="form-control form-control-lg" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">

                                        <input type="text" name="lname" class="form-control form-control-lg" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control form-control-lg">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control form-control-lg">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control form-control-lg">
                            </div>
                            <div class="form-group mb-5">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="termsCheckbox">
                                    <label class="custom-control-label text-muted" for="termsCheckbox">
                                        I accept the <a href="#">Terms and Conditions</a>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-block btn-primary w-100" name="reg">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "template/footer.php"; ?>