<link rel="stylesheet" href="<?= base_url('assets/css/admin_home.css'); ?>">
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-5">
        <br>

        <h3>View Profile</h3>
        <br>
        <div class="row">
            <div class="mb-3 col">
                <label for="prod_name">Name</label>
                <input readonly type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $user->name; ?>">
            </div>
            <div class="mb-3 col">
                <label for="prod_name">Email</label>
                <input readonly type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $user->email; ?>">
            </div>
            <div class="mb-3 col">
                <label for="prod_name">ID</label>
                <input readonly type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" placeholder="Address" value="<?php echo $user->id; ?>">
            </div>
        </div>

        <a type="a" class="btn btn-success" href="<?= base_url('admin'); ?>">Back</a>
    </div>