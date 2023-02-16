<link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">

<div class="row ">
    <div class="col-md-2"></div>

    <div class="col-md-7 item-frame">

        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-mb-3">
                        <img class="item-img-details" src="<?php echo base_url('uploads/images/') . $item->image; ?>">
                    </div>
                </div>
            </div>
            <div class="col">

                <div class="row">
                    <div class="mb-3 col">
                        <label for="prod_name">Item Name</label>
                        <input readonly type="text" autocomplete="off" class="form-control" id="name" name="name" placeholder="Item Name" value="<?php echo $item->name; ?>">
                    </div>
                    <div class="mb-3 col">
                        <label for="prod_name">Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">€</span>
                            </div>
                            <input readonly id="number" autocomplete="off" placeholder="Price" type="price" name="price" class="number form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $item->price; ?>">

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col">
                        <label for="prod_name">Short Description</label>
                        <textarea readonly type="text" rows="2" class=" form-control" id="short_description" name="short_description" placeholder="Shord Description"><?php echo $item->short_description; ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="prod_name">Long Description</label>
                        <textarea readonly type="text" rows="5" class="form-control" id="description" name="description" placeholder="Long Description"><?php echo $item->description; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="row col">
                <div class="col">
                    <label for="prod_name">Date created</label>
                    <input readonly type="text" autocomplete="off" class="form-control" id="name" name="name" placeholder="Item Name" value="<?php echo $item->date_created; ?>">
                </div>
                <?php if ($item->is_active) {
                    $status = "Active";
                } else {
                    $status = "Inactive";
                }
                ?>
                <div class="col">
                    <label for="prod_name">Is active</label>
                    <input readonly type="text" autocomplete="off" class="form-control" id="name" name="name" placeholder="Item Name" value="<?php echo $status; ?>">
                </div>
            </div>

        </div>


        <a type="a" class="btn btn-primary" href="<?= base_url('store'); ?>">Back to list</a>
        </form>
    </div>
</div>