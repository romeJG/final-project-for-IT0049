<link rel="stylesheet" href="<?= base_url('assets/css/admin_home.css'); ?>">
<div class="body">

    <h3>Current Users</h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile Number</th>
                <th>Gender</th>
                <th>Is activated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($users) : ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td> <?php echo $user->id; ?></td>
                        <td> <?php echo $user->firstname; ?></td>
                        <td> <?php echo $user->lastname; ?></td>
                        <td> <?php echo $user->number; ?></td>
                        <td> <?php echo $user->gender; ?></td>
                        <?php if ($user->active) {
                            $status = "Activated";
                        } else {
                            $status = "Not Activated";
                        }
                        ?>
                        <td> <?php echo $status ?></td>
                        <td>
                            <a type="button" class="btn btn-primary" href="<?php echo base_url('admin/viewUser/') . $user->id; ?>">View User</a>
                            <a type="button" class="btn btn-secondary" href="<?php echo base_url('admin/editUser/') . $user->id; ?>">Edit User</a>
                            <a type="button" class="btn btn-danger" href="<?php echo base_url('admin/confirmDeleteUser/') . $user->id; ?>">Delete User</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</div>