<link rel="stylesheet" href="<?= base_url('assets/css/admin_home.css'); ?>">
<div class="body">

    <link rel="stylesheet" href="<?= base_url('assets/css/admin_home.css'); ?>">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <h3>Add Item</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-5">
            <?php echo form_open_multipart('Admin/processAddItem'); ?>
            <form name="editForm" autocomplete="off">
                <br>
                <br>
                <?php
                if (validation_errors()) {
                ?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php
                } ?>

                <div class="row">
                    <div class="col-mb-3">
                        <label for="prod_name">Item Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col">
                        <label for="prod_name">Item Name</label>
                        <input type="text" autocomplete="off" class="form-control" id="name" name="name" placeholder="Item Name" value="<?php echo set_value('name'); ?>">
                    </div>
                    <div class="mb-3 col">
                        <label for="prod_name">Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">€</span>
                            </div>
                            <input id="number" autocomplete="off" placeholder="Price" type="price" name="price" class="number form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo set_value('price'); ?>">

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col">
                        <label for="prod_name">Short Description</label>
                        <textarea type="text" rows="2" class=" form-control" id="short_description" name="short_description" placeholder="Shord Description" value=""><?php echo set_value('short_description'); ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="prod_name">Long Description</label>
                        <textarea type="text" rows="5" class="form-control" id="description" name="description" placeholder="Long Description" value=""><?php echo set_value('description'); ?></textarea>
                    </div>
                </div>
                <a type="a" class="btn btn-danger" href="<?= base_url('admin/items/all'); ?>">Back to list</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>