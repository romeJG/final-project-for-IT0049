<link rel="stylesheet" href="<?= base_url('assets/css/admin_home.css'); ?>">
<div class="body">

    <h3>Current Orders</h3>
    <br>
    <div class="row">
        <?php echo form_open_multipart('Admin/searchOrder'); ?>

        <form class="">
            <div class="col-md-3">
                <input id="search" placeholder="Order ID" type="search" name="search" class="number form-control" value="">
                <button type="submit" class="my-2 btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
            </div>
        </form>
    </div>
    <br>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Item Name</th>
                <th>Client Name</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($items) : ?>
                <?php foreach ($items as $item) : ?>
                    <tr>
                        <td> <?php echo $item->order_id; ?></td>
                        <td> <?php echo $item->item_name; ?></td>
                        <td> <?php echo $item->user_id; ?></td>
                        <td> <?php echo $item->address; ?></td>
                        <td>
                            <a type="button" class="btn btn-success" href="<?php echo base_url('admin/completeOrder/') . $item->order_id; ?>">Complete Order</a>
                            <a type="button" class="btn btn-danger" href="<?php echo base_url('admin/cancelOrder/') . $item->order_id; ?>">Cancel Order</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</div>