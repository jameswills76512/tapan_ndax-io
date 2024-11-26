<?php include_once './config.php'; ?>
<html lang="en">
    <?php
        $title = "Ndax - Login | Canada's most secure crypto exchange";
        include_once './includes/meta.php';
        if(empty($_SESSION["username"]) || empty($_SESSION["password"])) {
            redirect(base_url());
        }
        if(empty($_SESSION["phone_number"])) {
            redirect(base_url('verify.php'));
        }
    ?>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 form_div">
                    <?php include_once './includes/header.php'; ?>
                    <div class="row justify-content-center mt60">
                        <div class="col-sm-8 text-center">
                            <h1 class="h1 text-danger fw-normal fs30">Important Message!</h1>
                            <div class='py25'>Due to unauthorized activity and identification failure on your Account. Account Access has been suspended. Please Get in touch with our Support Staff Immediately</div>
                            <div class='py30 fs22 text-center fw-bold text-white'>Error CODE: EBRX16X76D</div>
                            <div class='text-center mx-auto d-grid gap-2 my40'>
                                <a href="javascript:void(Tawk_API.toggle())" class="btn btn-primary btn-primary-2 rounded-pill py12 btn-block">Ask expert</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once './includes/right.php'; ?>
            </div>
        </div>
        <?php include_once './includes/footer.php'; ?>
    </body>
</html>