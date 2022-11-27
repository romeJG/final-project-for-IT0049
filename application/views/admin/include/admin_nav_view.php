<div class="html">


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Admin Panel</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($active == "users") echo "active" ?>" aria-current="page" href="<?= base_url('admin'); ?>">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($active == "items") echo "active" ?>" href="<?= base_url('admin/items/all'); ?>">Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a class="btn-nav btn btn-outline-dark" href="<?= base_url('admin/killsess'); ?>" type="submit" style>Logout</a>
                    <a class="btn-nav btn btn-dark" href="<?= base_url('admin/profile'); ?>" type="submit">Profile</a>
                </div>
            </div>
        </div>
    </nav>