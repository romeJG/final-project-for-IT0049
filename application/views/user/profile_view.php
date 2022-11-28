<!-- linking the css file -->
<div class="snow_container"></div>
<link rel="stylesheet" href="<?= base_url('assets/css/signup.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/fonts/material-design-iconic-font/css/material-design-iconic-font.css'); ?>">

<div class="body_container">


    <div class="form-container row">
        <div class="bg">
            <div class="s-head">
                Profile
            </div>
            <form name="signupForm">
                <div class="row">
                    <div class="mb-3 col">
                        <label for="prod_name">First Name</label>
                        <input readonly type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $user->firstname ?>">
                    </div>
                    <div class="mb-3 col">
                        <label for="prod_name">Last Name</label>
                        <input readonly type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo $user->lastname; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="prod_name">Email</label>
                        <input readonly type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user->email; ?>">
                    </div>
                    <div class="mb-3 col">
                        <label for="prod_name">Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">+63</span>
                            </div>
                            <input readonly id="number" placeholder="Mobile Number" type="number" name="number" class="number form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $user->number ?>">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="prod_name">Birthday</label>
                        <input readonly type="date" class="form-control" id="birthday" name="birthday" placeholder="Birth Day:" value="<?php echo $user->birthday; ?>">
                    </div>
                    <div class="mb-3 col">
                        <label for="prod_name">Gender</label>
                        <input readonly type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo $user->gender; ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="prod_name">Address</label>
                    <input readonly type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" placeholder="Address" value="<?php echo $user->address; ?>">
                </div>
        </div>


        <div class="row buttons">
            <div class="col-md">
                <a href="<?= base_url(''); ?>" type="cancel" class="form-button btn btn-danger">Back</a>
            </div>
            <div class="col-md">
            </div>
            <div class="col-md">
                <a href="<?= base_url('user/editProfile'); ?>" type="cancel" class="form-button btn btn-primary">Edit Profile</a>
            </div>

        </div>
        </form>
    </div>


</div>