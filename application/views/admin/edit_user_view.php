<link rel="stylesheet" href="<?= base_url('assets/css/admin_home.css'); ?>">
<div class="row">
    <div class="col-md-3"></div>

    <div class="col-md-5">
        <br>

        <?php echo form_open_multipart('Admin/processEdit/' . $user->id); ?>
        <form name="editForm">
            <br>
            <h3>Edit User</h3>
            <br>
            <?php
            if (validation_errors()) {
            ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php
            } ?>

            <br>
            <div class="row">
                <div class="mb-3 col">
                    <label for="prod_name">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $user->firstname; ?>">
                </div>
                <div class="mb-3 col">
                    <label for="prod_name">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo $user->lastname; ?>">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="prod_name">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user->email; ?>">
                </div>
                <div class="mb-3 col">
                    <label for="prod_name">Number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">+63</span>
                        </div>
                        <input id="number" placeholder="Mobile Number" type="number" name="number" class="number form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo ltrim($user->number, '63');  ?>">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="prod_name">Birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birth Day" value="<?php echo $user->birthday; ?>">
                </div>
                <div class="mb-3 col">
                    <label for="prod_name">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" placeholder="Gender" value="<?php echo $user->gender; ?>">
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col">
                    <label for="prod_name">Address</label>
                    <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" placeholder="Address" value="<?php echo $user->address; ?>">
                </div>
            </div>
            <a type="a" class="btn btn-danger" href="<?= base_url('admin'); ?>">Back to list</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>