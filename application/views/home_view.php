<!-- linking the css file -->
<div class="snow_container"></div>
<link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">

<div class="body_container">

    <div class="row logo_desc">

        <div class="display-1 font-weight-bold col-md-4">LOGO ?</div>
        <div class="description col-md-8">
            PANGIT PA DESIGN Aenean suscipit massa diam, vel tincidunt nisi dapibus vel. Aliquam tortor dolor, viverra semper laoreet pharetra, maximus id tellus. Fusce gravida, lectus sit amet porttitor convallis, augue quam varius ex, in aliquam tellus odio pretium elit. Curabitur id diam purus. Mauris non mattis velit. Morbi nec sem ac velit viverra luctus. Duis dolor mauris, mattis dapibus justo et, posuere tincidunt est. Sed velit mauris, dignissim at egestas sed, fringilla vel turpis.
            PANGIT PA DESIGN Aenean suscipit massa diam, vel tincidunt nisi dapibus vel. Aliquam tortor dolor, viverra semper laoreet pharetra, maximus id tellus. Fusce gravida, lectus sit amet porttitor convallis, augue quam varius ex, in aliquam tellus odio pretium elit. Curabitur id diam purus. Mauris non mattis velit. Morbi nec sem ac velit viverra luctus. Duis dolor mauris, mattis dapibus justo et, posuere tincidunt est. Sed velit mauris, dignissim at egestas sed, fringilla vel turpis.
        </div>
    </div>

    <div class="row">
        <?php for ($x = 1; $x <= 8; $x++) : ?>
            <div class="card text-white bg-dark mb-3 col-md-3 item" style="width: 18rem;">
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