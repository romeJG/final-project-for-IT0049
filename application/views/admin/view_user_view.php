<link rel="stylesheet" href="<?= base_url('assets/css/admin_home.css'); ?>">
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-5">
        <br>

        <h3>View User</h3>
        <br>
        <div class="row">
            <div class="mb-3 col">
                <label for="prod_name">First Name</label>
                <input readonly type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $user->firstname; ?>">
            </div>
            <div class="mb-3 col">
                <label for="prod_name">Last Name</label>
                <input readonly type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $user->lastname; ?>">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="prod_name">Email</label>
                <input readonly type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $user->email; ?>">
            </div>
            <div class="mb-3 col">
                <label for="prod_name">Number</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">+63</span>
                    </div>
                    <input readonly id="number" placeholder="Mobile Number" type="number" name="number" class="number form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo ltrim($user->number, '63');  ?>">

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
                <input readonly type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $user->gender; ?>">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col">
                <label for="prod_name">Address</label>
                <input readonly type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" placeholder="Address" value="<?php echo $user->address; ?>">
            </div>
            <div class="mb-3 col">
                <label for="prod_name">ID</label>
                <input readonly type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" placeholder="Address" value="<?php echo $user->id; ?>">
            </div>
        </div>
        <a type="a" class="btn btn-primary" href="<?= base_url('admin'); ?>">Back to list</a>