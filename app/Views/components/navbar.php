<?php
$auth = $role;
?>

<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-semibold fs-5" href="/">
            <!-- <img src="<?= base_url('assets/static/images/logo.jpg') ?>" alt="Logo" id="logo" width="50"> -->
            <span class="text-black">Parta.</span><span style="color: #F90A45;">Notebook</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-lg-flex align-items-center" id="navbarNav">
            <ul class="navbar-nav nav-underline d-md-none d-block mt-2">
            <?php if ($auth == 'User') : ?>
                <li class="nav-item me-2">
                    <a class="nav-link" href="/cart">Cart</i></a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link" href="/feedback">Ratings & Feedback</a>
                </li>
            <?php endif; ?>
            <?php if ($auth == 'Admin') : ?>
                <li class="nav-item me-2">
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                </li>
            <?php endif; ?>
                <li class="nav-item me-2">
                    <a class="nav-link" href="/account">Profile</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            </ul>

            <!-- PENCARIAN PRODUK DAN AKAN PINDAH KE HALAMAN GALLERY PRODUCTS -->
            <form class="d-md-flex d-block mx-auto mt-md-0 mt-3" role="search" action="">
                <div class="input-group search-bar">
                    <input type="text" class="form-control" placeholder="Search for products"
                        aria-label="Search for products">
                    <button class="btn btn-custom-search" type="button" id="search-products">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </div>
            </form>

            <ul class="navbar-nav d-md-flex gap-1 d-none">
            <?php if ($auth == 'User') : ?>
                <li class="nav-item me-2">
                    <a class="nav-link" href="/cart"><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
            <?php endif; ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-circle-user fs-5"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <?php if ($auth == 'User') : ?>
                        <li class="mb-2">
                            <a class="dropdown-item" href="/feedback">
                                <i class="fa-regular fa-star me-1"></i> Ratings & Feedback
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if ($auth == 'Admin') : ?>
                        <li class="mb-2">
                            <a class="dropdown-item" href="/dashboard">
                                <i class="fa fa-tachometer me-1"></i> Dashboard
                            </a>
                        </li>
                        <?php endif; ?>
                        <li>
                            <a class="dropdown-item" href="/account">
                                <i class="fa-regular fa-user me-2"></i> Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/logout">
                                <i class="fa-solid fa-arrow-right-from-bracket me-1"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>