<!-- linking the css file -->
<div class="snow_container"></div>
<link rel="stylesheet" href="<?= base_url('assets/css/signup.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/fonts/material-design-iconic-font/css/material-design-iconic-font.css'); ?>">

<div class="body_container">


    <div class="form-container row">
        <div class="bg">
            <div class="s-head">
                Change Your Password
            </div>
            <?php
            if (validation_errors()) {
            ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php
            } ?>
            <?php echo form_open_multipart('User/processChangePass/' . $user->id); ?>
            <form name="signupForm">
                <div class="row">
                    <div class="mb-3 col">
                        <label for="prod_name">Current Password</label>
                        <input type="password" class="form-control" id="currentpassword" name="currentpassword" placeholder="Current Password" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="prod_name">New Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="New Password" value="">
                    </div>
                    <div class="mb-3 col">
                        <label for="prod_name"> Confirm New Password</label>
                        <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Confirm New Password" value="">
                    </div>
                </div>
        </div>


        <div class="row buttons">
            <div class="col-md">
                <a href="<?= base_url(''); ?>" type="cancel" class="form-button btn btn-danger">Back</a>
            </div>
            <div class="col-md">
                <button type="submit" class="form-button btn btn-primary">Submit</button>
            </div>


        </div>
        </form>
    </div>


</div>