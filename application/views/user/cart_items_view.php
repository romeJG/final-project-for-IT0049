<link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">
<div class="body_container">
    <div class="row">
        <div class="display-3 font-weight-bold col-md best-sellers rounded" id="best-sellers">
            Your cart items
        </div>
    </div>

    <div class="row">
        <div class="row">
            <a href="<?php echo base_url('cart/removeAll/' . $this->session->userdata('id')) ?>" class="col-2 mx-2 my-2 btn btn-danger" style="width:14.2rem;"><i class="fa-solid fa-trash"></i> Remove All</a>
            <div class="col mx-2 my-2"></div>
            <a href="<?php echo base_url('cart/checkout/' . $this->session->userdata('id')) ?>" class="col-2 mx-2 my-2 btn btn-primary" style="width:14.2rem;"><i class="fa-solid fa-cart-shopping"></i> Checkout</a>
        </div>
        <?php if ($items) : ?>
            <div class="row">
                <div class="col"></div>
                <div class=" card text-black col-2 mx-2 my-2" style="width: 14.2rem;">
                    Total Price: €<?php echo $this->session->userdata('total') ?>
                </div>
            </div>
            <?php foreach ($items as $item) : ?>
                <div class="card text-black col-md-3 item my-2 mx-2" style="width: 14.2rem;">
                    <a href="#">
                        <img class="card-img-top" src="<?php echo base_url('uploads/images/') . $item->image; ?>" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item->name; ?></h5>
                        <p class="card-text">€<?php echo $item->price; ?> </p>
                        <a href="<?php echo base_url('cart/remove/') . $item->cart_item_id; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Remove</a>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>
</div>