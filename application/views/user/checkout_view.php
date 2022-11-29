<!-- linking the css file -->
<div class="snow_container"></div>
<link rel="stylesheet" href="<?= base_url('assets/css/signup.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/fonts/material-design-iconic-font/css/material-design-iconic-font.css'); ?>">

<div class="body_container">


    <div class="form-container row">
        <div class="bg">
            <div class="s-head">
                Checkout
            </div>
            <?php
            if (validation_errors()) {
            ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php
            } ?>
            <?php echo form_open_multipart('cart/confirmCheckout'); ?>
            <form name="signupForm">
                <div class="row">
                    <div class="mb-3 col">
                        <label for="prod_name">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="prod_name">Total</label>
                        <input readonly type="text" class="form-control" id="password" name="password" placeholder="New Password" value="€<?php echo $this->session->userdata('total') ?>">
                    </div>
                    <div class="mb-3 col">
                        <label for="prod_name">Mode of payment (mock)</label>
                        <select id="gender" name="gender" placeholder="Gender" value="">
                            <option value="">Gcash</option>
                            <option value="">BPI</option>
                            <option value="">BDO</option>
                            <option value="">Other</option>
                        </select>
                    </div>
                </div>
        </div>


        <div class="row buttons">
            <div class="col-md">
                <a href="<?= base_url(''); ?>" type="cancel" class="form-button btn btn-danger">Back</a>
            </div>
            <div class="col-md">
                <button type="submit" class="form-button btn btn-primary">Confirm Checkout</button>
            </div>


        </div>
        </form>
    </div>


</div>