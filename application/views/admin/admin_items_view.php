<link rel="stylesheet" href="<?= base_url('assets/css/admin_home.css'); ?>">
<div class="body">

    <h3>Current Items</h3>
    <br>
    <a type="button" class="btn btn-primary" href="<?php echo base_url('admin/addItem/'); ?>">Add Item</a>
    <a type="button" class="btn btn-<?php if ($this->uri->segment(3) == 'all') echo 'success';
                                    else echo 'dark'; ?>" href="<?php echo base_url('admin/items/all'); ?>">Show All Items</a>
    <a type="button" class="btn btn-<?php if ($this->uri->segment(3) == 'active') echo 'success';
                                    else echo 'dark'; ?>" href="<?php echo base_url('admin/items/active'); ?>">Show Active Items</a>
    <a type="button" class="btn btn-<?php if ($this->uri->segment(3) == 'inactive') echo 'success';
                                    else echo 'dark'; ?>" href="<?php echo base_url('admin/items/inactive'); ?>">Show Inactive Items</a>
    <br>
    <br>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Price</th>
                <th>Name</th>
                <th>Date Created</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($items) : ?>
                <?php foreach ($items as $item) : ?>
                    <tr>
                        <td> <?php echo $item->id; ?></td>
                        <td><img class="item-img" src="<?php echo base_url('uploads/images/') . $item->image; ?>"></td>
                        <td>€<?php echo $item->price; ?></td>
                        <td> <?php echo $item->name; ?></td>
                        <td> <?php echo $item->date_created; ?></td>
                        <?php if ($item->is_active) {
                            $status = "Active";
                        } else {
                            $status = "Inactive";
                        }
                        ?>
                        <td> <?php echo $status ?></td>
                        <td>
                            <a type="button" class="btn btn-primary" href="<?php echo base_url('admin/viewItem/') . $item->id; ?>">View item</a>
                            <a type="button" class="btn btn-secondary" href="<?php echo base_url('admin/editItem/') . $item->id; ?>">Edit item</a>
                            <a type="button" class="btn btn-danger" href="<?php echo base_url('admin/confirmDeleteItem/') . $item->id; ?>">Delete item</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</div>