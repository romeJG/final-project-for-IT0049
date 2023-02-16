<!-- linking the css file -->
<div class="snow_container"></div>
<link rel="stylesheet" href="<?= base_url('assets/css/signup.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/fonts/material-design-iconic-font/css/material-design-iconic-font.css'); ?>">

<div class="body_container">


    <div class="form-container row">
        <div class="bg">
            <div class="s-head">
                Signup
            </div>
            <?php
            if (validation_errors()) {
            ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php
            } ?>

            <?php echo form_open_multipart('Signup/processSignup'); ?>
            <form name="signupForm">
                <div class="row">
                    <div class="mb-3 col">
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo set_value('firstName'); ?>">
                    </div>
                    <div class="mb-3 col">
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo set_value('lastName'); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                    </div>
                    <div class="input-group mb-3 col">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">+63</span>
                        </div>
                        <input id="number" placeholder="Mobile Number" type="number" name="number" class="number form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo set_value('number'); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birth Day:" value="<?php echo set_value('birthday'); ?>">
                    </div>
                    <div class="mb-3 col">
                        <select id="gender" name="gender" placeholder="Gender" value="<?php echo set_value('gender'); ?>">
                            <option value="" style="color: gray;">Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" placeholder="Address" value="<?php echo set_value('address'); ?>">
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <input type="password" class="form-control" id="firstName" name="password" placeholder="Password">
                    </div>
                    <div class="mb-3 col">
                        <input type="password" class="form-control" id="lastName" name="confirmPass" placeholder="Confirm Password">
                    </div>
                </div>
        </div>


        <div class="row buttons">
            <div class="col-md">
                <a href="<?= base_url(''); ?>" type="cancel" class="form-button btn btn-danger">Back</a>
            </div>
            <div class="col-md">
            </div>
            <div class="col-md">
                <button type="submit" class="form-button btn btn-success">Submit</button>
            </div>

        </div>
        </form>
    </div>


</div>