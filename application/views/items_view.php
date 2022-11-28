<link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">
<div class="body_container">
    <div class="row">
        <div class="display-3 font-weight-bold col-md best-sellers rounded" id="best-sellers">
            Store
        </div>
    </div>

    <div class="divider"><span></span><span>✨</span><span></span></div>
    <div class="row">
        <?php if ($items) : ?>
            <?php foreach ($items as $item) : ?>
                <div class="card text-black mb-3 col-md-3 item mx-2" style="width: 18rem;">
                    <a href="#">
                        <img class="card-img-top" src="<?php echo base_url('uploads/images/') . $item->image; ?>" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item->name; ?></h5>
                        <p class="card-text">€<?php echo $item->price; ?> </p>
                        <a href="#" class="btn btn-primary">Buy</a>
                        <a href="#" class="btn btn-primary">Add to cart</a>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>