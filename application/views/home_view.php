<!-- linking the css file -->
<div class="snow_container"></div>
<link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">

<div class="body_container">

    <div class="divider"><span></span><span>
            Welcome
        </span><span></span>
    </div>
    <div class="row logo-desc">

        <img class="col-md-4 logo-img-desc" src="<?= base_url('assets/home/lukso_logo.png'); ?>" alt="Logo">
        <div class="col-md-1"></div>
        <div class="description col-md-7">
            <p>
                <b class="display-3 font-weight-bold">H</b>ere ye, here ye! Ollivander's Wand Shop has just joined forces with the Lukso Team. The number of magicians in the globe is increasing, and with that comes the chance to have our wand selected for us online. If you'd want to save some floo powders, we can even have your wand delivered to your home by owl! Powered by Lukso, the Ollivanders Online Wand Shop welcomes your perusal.
            </p>
            <p>
                Young witches and wizards who need to buy their first wand come here. Here's your chance to watch a wand choose a wizard in a one-of-a-kind, interactive show! Visitors (and the wizard they choose* in the interactive experience) may buy their very own wand, as well as wand sets, character wand reproductions, and more.
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