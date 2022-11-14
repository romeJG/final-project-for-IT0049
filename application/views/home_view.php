<!-- linking the css file -->
<div class="snow_container"></div>
<link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">

<div class="body_container">

    <div class="divider"><span></span><span>
            Welcome
        </span><span></span>
    </div>
    <div class="row logo-desc">

        <img class="col-md-4" src="<?= base_url('assets/home/lukso_logo.png'); ?>" alt="Logo">
        <div class="col-md-1"></div>
        <div class="description col-md-7">
            <p>
                <b class="display-3 font-weight-bold">H</b>ello World lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget risus vulputate, posuere mauris quis, efficitur eros. Morbi venenatis tempus metus, eu facilisis mauris ornare ac. Morbi ultricies, turpis vel aliquet commodo, urna mauris tincidunt nisl, ultricies finibus leo ipsum a libero. Vestibulum porttitor lorem tellus, sit amet gravida magna molestie nec. Morbi nec nisl mi. Aenean placerat eu justo in tincidunt. Proin convallis arcu dictum turpis blandit, sit amet fringilla nunc luctus. Maecenas tempus urna nec lacus iaculis, sit amet venenatis enim blandit.
            </p>
        </div>
    </div>
    <!-- <hr /> -->
    <div class="divider"><span></span><span>✨</span><span></span></div>
    <div class="row">
        <div class="display-3 font-weight-bold col-md best-sellers rounded" id="best-sellers">
            Best Sellers
        </div>
    </div>
    <div class="row">
        <?php for ($x = 1; $x <= 8; $x++) : ?>
            <div class="card text-white bg-dark mb-3 col-md-3 item mx-2" style="width: 18rem;">
                <img class="card-img-top" src="https://i.pinimg.com/originals/b8/72/95/b87295964f02e372deee5e2e91155fbf.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Item <?= $x; ?></h5>
                    <p class="card-text">PANGIT PA DESIGN </p>
                    <a href="#" class="btn btn-primary">Buy</a>
                    <a href="#" class="btn btn-primary">Add to cart</a>
                </div>
            </div>

        <?php endfor; ?>
    </div>
</div>