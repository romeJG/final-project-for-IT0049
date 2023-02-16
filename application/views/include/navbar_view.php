<link rel="stylesheet" href="<?= base_url('assets/css/navbar.css'); ?>">
<nav class="navbar navbar-expand-lg navbar navbar-light sticky-top rounded-bottom">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bold " href="<?= base_url(''); ?>">
            <!-- <h1>Lukso</h1> -->
            <img src="<?= base_url('assets/home/lukso_logo_invert.png'); ?>" class="img-fluid" alt="Responsive image">

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if ($active == "home") echo "active" ?>" aria-current="page" href="<?= base_url(''); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($active == "store") echo "active" ?>" href="<?= base_url('store'); ?>">Store</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php if ($active == "about_us") echo "active" ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        About us
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" target="_blank" href="https://github.com/romeJG/lukso#final-project-for-it0049">What is this?</a></li>
                    </ul>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> -->
            </ul>
            <div class="d-flex">
                <?php if (!($this->session->userdata('email'))) : ?>
                    <a class="btn-nav btn btn-outline-dark" href="<?= base_url('login'); ?>" type="" style>Login</a>
                    <a class="btn-nav btn btn-dark" href="<?= base_url('signup'); ?>" type="">Signup</a>
                <?php else : ?>
                    <a class="btn-nav btn btn-outline-dark" href="<?= base_url('user/killsess'); ?>" type="" style>Logout</a>
                    <a class="btn-nav btn btn-outline-dark" href="<?= base_url('user'); ?>" type="">Profile</a>
                    <a class="btn-nav btn btn-dark" href="<?= base_url('cart'); ?>" type=""><i class="fa-solid fa-cart-shopping"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>