<div class="snow_container"></div>
<link rel="stylesheet" href="<?= base_url('assets/css/login.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/fonts/material-design-iconic-font/css/material-design-iconic-font.css'); ?>">


<div class="body_container">
    <div class="form-container row">
        <div class="bg">
            <div class="s-head">
                Login
            </div>
            <?php
            if (validation_errors()) {
            ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php
            } ?>

            <?php echo form_open_multipart('Login/processLogin'); ?>
            <form name="signupForm">
                <div class="row input-cont">
                    <input type="email" class="form-control col-md" id="email" name="email" placeholder="Email / Username" value="<?php echo set_value('email'); ?>">
                </div>
                <div class="row input-cont">
                    <input type="password" class="form-control col-md" id="password" name="password" placeholder="Password" value="">
                </div>
                <div class="col-md">
                    <button type="submit" class="form-button btn btn-success">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>