<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>

<?php
// Assuming $totalReviews contains the total number of reviews
$itemsPerPage = 3;
$totalPagesAllRatings = ceil($totalreviews / $itemsPerPage);

// Get the current page from the query parameter (e.g., ?page=2)
$currentPageAllRatings = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset for the database query
$offset = ($currentPageAllRatings - 1) * $itemsPerPage;
?>
<?php
// Assuming $totalReviews contains the total number of reviews
$itemsPerPage = 3;
$totalPages5Stars = ceil($total5stars / $itemsPerPage);

// Get the current page from the query parameter (e.g., ?page=2)
$currentPage5Stars = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset for the database query
$offset = ($currentPage5Stars - 1) * $itemsPerPage;
?>
<?php
// Assuming $totalReviews contains the total number of reviews
$itemsPerPage = 3;
$totalPages4Stars = ceil($total4stars / $itemsPerPage);

// Get the current page from the query parameter (e.g., ?page=2)
$currentPage4Stars = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset for the database query
$offset = ($currentPage4Stars - 1) * $itemsPerPage;
?>
<?php
// Assuming $totalReviews contains the total number of reviews
$itemsPerPage = 3;
$totalPages3Stars = ceil($total3stars / $itemsPerPage);

// Get the current page from the query parameter (e.g., ?page=2)
$currentPage3Stars = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset for the database query
$offset = ($currentPage3Stars - 1) * $itemsPerPage;
?>
<?php
// Assuming $totalReviews contains the total number of reviews
$itemsPerPage = 3;
$totalPages2Stars = ceil($total2stars / $itemsPerPage);

// Get the current page from the query parameter (e.g., ?page=2)
$currentPage2Stars = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset for the database query
$offset = ($currentPage2Stars - 1) * $itemsPerPage;
?>
<?php
// Assuming $totalReviews contains the total number of reviews
$itemsPerPage = 3;
$totalPages1Stars = ceil($total1stars / $itemsPerPage);

// Get the current page from the query parameter (e.g., ?page=2)
$currentPage1Stars = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset for the database query
$offset = ($currentPage1Stars - 1) * $itemsPerPage;
?>
<div class="container my-5">
    <div class="row gy-4 justify-content-center mb-4">
        <div class="col-md-9 col-11">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <h2 class="text-black fw-semibold mb-3"><?= $detailproducts->nama_produk ?></h2>

                <!-- image -->
                <div class="mt-2 mb-4">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <?php foreach ($detailproducts->images as $image) : ?>
                                <a href="<?= base_url('uploads/img-product/' . $image->image) ?>" data-toggle="lightbox">
                                    <img src="<?= !empty($image) ? base_url('uploads/img-product/' . $image->image) : base_url('assets/static/images/product.png') ?>" class="card-img-top img-fluid" alt="product" />
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($detailproducts->images as $image) : ?>
                                <a href="<?= base_url('uploads/img-product/' . $image->image) ?>" data-toggle="lightbox">
                                    <img src="<?= !empty($image) ? base_url('uploads/img-product/' . $image->image) : base_url('assets/static/images/product.png') ?>" class="card-img-top img-fluid" alt="product" />
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="rounded-4 mb-4" style="background: #f5f5f5">
                    <div class="d-flex justify-content-between align-items-center p-4">
                        <div>
                            <h3 class="fw-semibold text-custom-red mb-3">
                                Rp. <?= number_format($detailproducts->harga, 0, ',', '.') ?>
                            </h3>
                            <div class="d-flex gap-1">
                                <i class="fa-solid fa-star text-warning"></i>

                                <small class="text-muted">(<?= $detailproducts->rating ?>)</small>
                            </div>
                        </div>
                        <button class="btn btn-custom-cart d-md-none d-inline" data-bs-toggle="modal" data-bs-target="#addCart">
                            <i class="fa-solid fa-shopping-cart"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="addCart" tabindex="-1" aria-labelledby="addCartLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="text-black modal-title fw-semibold">Checkout</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="fw-medium text-black">Stock: <?= $detailproducts->stok ?></p>
                                        <div class="input-group number-spinner rounded-3" style="background-color: #f5f5f5;">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn" data-dir="dwn">-</button>
                                            </span>
                                            <input type="text" class="form-control text-center" name="qty" value="1" style="background-color: #f5f5f5;">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn" data-dir="up">+</button>
                                            </span>
                                        </div>
                                        <hr>
                                        <div class="d-lg-flex d-md-block d-flex justify-content-between">
                                            <p class="text-muted fw-medium mb-0">Price</p>
                                            <p class="text-black fw-medium mb-0">Rp.
                                                <?= number_format($detailproducts->harga, 0, ',', '.') ?></p>
                                        </div>
                                        <hr>
                                        <!-- masuk cart -->
                                        <button type="submit" class="btn btn-custom-submit w-100 mb-2">Add to
                                            Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="fw-semibold text-black">
                    Product Description
                </h5>
                <p class="text-black">
                    <?= $detailproducts->detail ?>
                </p>
            </div>
        </div>
        <div class="col-md-3 col-11 d-md-block d-none">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <form action="<?= base_url('/add-to-cart/') . $detailproducts->id ?>" method="POST">
                    <h5 class="text-black fw-semibold mb-4">Checkout</h5>
                    <p class="fw-medium text-black">Stock: <?= $detailproducts->stok ?></p>
                    <hr>
                    <div class="input-group number-spinner rounded-3" style="background-color: #f5f5f5;">
                        <span class="input-group-btn">
                            <button type="button" class="btn" data-dir="dwn">-</button>
                        </span>
                        <input type="text" class="form-control text-center" name="qty" value="1" style="background-color: #f5f5f5;">
                        <span class="input-group-btn">
                            <button type="button" class="btn" data-dir="up">+</button>
                        </span>
                    </div>
                    <hr>
                    <div class="d-lg-flex d-md-block d-flex justify-content-between">
                        <p class="text-muted fw-medium mb-0">Price</p>
                        <p class="text-black fw-medium mb-0">Rp.
                            <?= number_format($detailproducts->harga, 0, ',', '.') ?></p>
                    </div>
                    <hr>
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <!-- masuk cart -->
                    <button type="submit" class="btn btn-custom-submit w-100 mb-2">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-md-12 col-11">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <h4 class="text-black mb-4 fw-semibold">Review Product</h4>
                <div class="rounded-3 border-custom-rating mb-4">
                    <div class="px-4 py-3">
                        <div class="d-flex align-content-end">
                            <div class="me-4">
                                <h3 class="fw-medium text-custom-red"><?= $detailproducts->rating ?> <span class="fs-6">From 5</span></h3>
                                <div class="d-flex gap-1 mb-2">
                                    <?php foreach (range(1, 5) as $i) { ?>
                                        <?php if ($detailproducts->rating >= $i) { ?>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        <?php } else { ?>
                                            <i class="fa-regular fa-star text-warning"></i>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active shadow-none" id="pills-all-ratings-tab" data-bs-toggle="pill" data-bs-target="#pills-all-ratings" type="button" role="tab" aria-controls="pills-all-ratings" aria-selected="true">All
                                        Ratings</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link shadow-none border-custom-pill" id="pills-5-starts-tab" data-bs-toggle="pill" data-bs-target="#pills-5-starts" type="button" role="tab" aria-controls="pills-5-starts" aria-selected="false">5 Stars</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link shadow-none" id="pills-4-starts-tab" data-bs-toggle="pill" data-bs-target="#pills-4-starts" type="button" role="tab" aria-controls="pills-4-starts" aria-selected="false">4 Stars</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link shadow-none" id="pills-3-starts-tab" data-bs-toggle="pill" data-bs-target="#pills-3-starts" type="button" role="tab" aria-controls="pills-3-starts" aria-selected="false">3 Stars</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link shadow-none" id="pills-2-starts-tab" data-bs-toggle="pill" data-bs-target="#pills-2-starts" type="button" role="tab" aria-controls="pills-2-starts" aria-selected="false">2 Stars</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link shadow-none" id="pills-1-starts-tab" data-bs-toggle="pill" data-bs-target="#pills-1-starts" type="button" role="tab" aria-controls="pills-1-starts" aria-selected="false">1 Stars</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all-ratings" role="tabpanel" aria-labelledby="pills-all-ratings-tab" tabindex="0">
                        <!-- 3 ITEM TAMPIL PER PAGE -->
                        <?php if ($reviewusers != null) : ?>
                            <?php foreach ($reviewusers as $review) { ?>
                                <div class="mb-3">
                                    <div class="d-flex gap-3">
                                        <img src="<?= base_url('assets/static/images/user.png') ?>" alt="customers" class="img-fluid" style="max-width:50px; max-height:50px;">
                                        <div>
                                            <h5 class="fw-medium text-black"><?= $review->users->nama_lengkap ?></h5>
                                            <div class="d-flex mb-2">
                                                <?php foreach (range(1, 5) as $i) { ?>
                                                    <?php if ($review->star >= $i) { ?>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    <?php } else { ?>
                                                        <i class="fa-regular fa-star text-warning"></i>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                            <p class="text-black">
                                                <?= $review->description ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php else : ?>
                            <div class="text-center">
                                <p class="text-black fw-medium">There is no reviews yet</p>
                            </div>
                        <?php endif; ?>

                        <!-- PAGINATION -->
                        <?php
                        echo '<nav aria-label="Page navigation example">';
                        echo '<ul class="pagination pagination-sm justify-content-center">';
                        if ($currentPageAllRatings > 1) {
                            echo '<li class="page-item">';
                            echo '<a class="page-link" href="?page=' . ($currentPageAllRatings - 1) . '" aria-label="Previous">';
                            echo '<span aria-hidden="true">&laquo;</span>';
                            echo '</a>';
                            echo '</li>';
                        }
                        for ($page = 1; $page <= $totalPagesAllRatings; $page++) {
                            echo '<li class="page-item' . ($currentPageAllRatings === $page ? ' active' : '') . '">';
                            echo '<a class="page-link" href="?page=' . $page . '">' . $page . '</a>';
                            echo '</li>';
                        }
                        if ($currentPageAllRatings < $totalPagesAllRatings) {
                            echo '<li class="page-item">';
                            echo '<a class="page-link" href="?page=' . ($currentPageAllRatings + 1) . '" aria-label="Next">';
                            echo '<span aria-hidden="true">&raquo;</span>';
                            echo '</a>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        echo '</nav>';
                        ?>
                    </div>

                    <div class="tab-pane fade" id="pills-5-starts" role="tabpanel" aria-labelledby="pills-5-starts-tab" tabindex="0">
                        <?php if ($review5stars != null) : ?>
                            <?php foreach ($review5stars as $review) { ?>
                                <div class="mb-3">
                                    <div class="d-flex gap-3">
                                        <img src="<?= base_url('assets/static/images/user.png') ?>" alt="customers" class="img-fluid" style="max-width:50px; max-height:50px;">
                                        <div>
                                            <h5 class="fw-medium text-black"><?= $review->users->nama_lengkap ?></h5>
                                            <div class="d-flex mb-2">
                                                <?php foreach (range(1, 5) as $i) { ?>
                                                    <?php if ($review->star >= $i) { ?>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    <?php } else { ?>
                                                        <i class="fa-regular
                                                fa-star text-warning"></i>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                            <p class="text-black">
                                                <?= $review->description ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php else : ?>
                            <div class="text-center">
                                <p class="text-black fw-medium">There is no reviews yet</p>
                            </div>
                        <?php endif; ?>
                        <!-- PAGINATION -->
                        <?php
                        echo '<nav aria-label="Page navigation example">';
                        echo '<ul class="pagination pagination-sm justify-content-center">';
                        if ($currentPage5Stars > 1) {
                            echo '<li class="page-item">';
                            echo '<a class="page-link" href="?page=' . ($currentPage5Stars - 1) . '" aria-label="Previous">';
                            echo '<span aria-hidden="true">&laquo;</span>';
                            echo '</a>';
                            echo '</li>';
                        }
                        for ($page = 1; $page <= $totalPages5Stars; $page++) {
                            echo '<li class="page-item' . ($currentPage5Stars === $page ? ' active' : '') . '">';
                            echo '<a class="page-link" href="?page=' . $page . '">' . $page . '</a>';
                            echo '</li>';
                        }
                        if ($currentPage5Stars < $totalPages5Stars) {
                            echo '<li class="page-item">';
                            echo '<a class="page-link" href="?page=' . ($currentPage5Stars + 1) . '" aria-label="Next">';
                            echo '<span aria-hidden="true">&raquo;</span>';
                            echo '</a>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        echo '</nav>';
                        ?>
                    </div>
                    <div class="tab-pane fade" id="pills-4-starts" role="tabpanel" aria-labelledby="pills-4-starts-tab" tabindex="0">
                        <?php if ($review4stars != null) : ?>
                            <?php foreach ($review4stars as $review) { ?>
                                <div class="mb-3">
                                    <div class="d-flex gap-3">
                                        <img src="<?= base_url('assets/static/images/user.png') ?>" alt="customers" class="img-fluid" style="max-width:50px; max-height:50px;">
                                        <div>
                                            <h5 class="fw-medium text-black"><?= $review->users->nama_lengkap ?></h5>
                                            <div class="d-flex mb-2">
                                                <?php foreach (range(1, 5) as $i) { ?>
                                                    <?php if ($review->star >= $i) { ?>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    <?php } else { ?>
                                                        <i class="fa-regular
                                                fa-star text-warning"></i>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                            <p class="text-black">
                                                <?= $review->description ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php else : ?>
                            <div class="text-center">
                                <p class="text-black fw-medium">There is no reviews yet</p>
                            </div>
                        <?php endif; ?>
                        <!-- PAGINATION -->
                        <?php
                        echo '<nav aria-label="Page navigation example">';
                        echo '<ul class="pagination pagination-sm justify-content-center">';
                        if ($currentPage4Stars > 1) {
                            echo '<li class="page-item">';
                            echo '<a class="page-link" href="?page=' . ($currentPage4Stars - 1) . '" aria-label="Previous">';
                            echo '<span aria-hidden="true">&laquo;</span>';
                            echo '</a>';
                            echo '</li>';
                        }
                        for ($page = 1; $page <= $totalPages4Stars; $page++) {
                            echo '<li class="page-item' . ($currentPage4Stars === $page ? ' active' : '') . '">';
                            echo '<a class="page-link" href="?page=' . $page . '">' . $page . '</a>';
                            echo '</li>';
                        }
                        if ($currentPage4Stars < $totalPages4Stars) {
                            echo '<li class="page-item">';
                            echo '<a class="page-link" href="?page=' . ($currentPage4Stars + 1) . '" aria-label="Next">';
                            echo '<span aria-hidden="true">&raquo;</span>';
                            echo '</a>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        echo '</nav>';
                        ?>
                    </div>
                    <div class="tab-pane fade" id="pills-3-starts" role="tabpanel" aria-labelledby="pills-3-starts-tab" tabindex="0">
                        <?php if ($review3stars != null) : ?>
                            <?php foreach ($review3stars as $review) { ?>
                                <div class="mb-3">
                                    <div class="d-flex gap-3">
                                        <img src="<?= base_url('assets/static/images/user.png') ?>" alt="customers" class="img-fluid" style="max-width:50px; max-height:50px;">
                                        <div>
                                            <h5 class="fw-medium text-black"><?= $review->users->nama_lengkap ?></h5>
                                            <div class="d-flex mb-2">
                                                <?php foreach (range(1, 5) as $i) { ?>
                                                    <?php if ($review->star >= $i) { ?>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    <?php } else { ?>
                                                        <i class="fa-regular
                                                fa-star text-warning"></i>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                            <p class="text-black">
                                                <?= $review->description ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php else : ?>
                            <div class="text-center">
                                <p class="text-black fw-medium">There is no reviews yet</p>
                            </div>
                        <?php endif; ?>
                        <!-- PAGINATION -->
                        <?php
                        echo '<nav aria-label="Page navigation example">';
                        echo '<ul class="pagination pagination-sm justify-content-center">';
                        if ($currentPage3Stars > 1) {
                            echo '<li class="page-item">';
                            echo '<a class="page-link" href="?page=' . ($currentPage3Stars - 1) . '" aria-label="Previous">';
                            echo '<span aria-hidden="true">&laquo;</span>';
                            echo '</a>';
                            echo '</li>';
                        }
                        for ($page = 1; $page <= $totalPages3Stars; $page++) {
                            echo '<li class="page-item' . ($currentPage3Stars === $page ? ' active' : '') . '">';
                            echo '<a class="page-link" href="?page=' . $page . '">' . $page . '</a>';
                            echo '</li>';
                        }
                        if ($currentPage3Stars < $totalPages3Stars) {
                            echo '<li class="page-item">';
                            echo '<a class="page-link" href="?page=' . ($currentPage3Stars + 1) . '" aria-label="Next">';
                            echo '<span aria-hidden="true">&raquo;</span>';
                            echo '</a>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        echo '</nav>';
                        ?>
                    </div>
                    <div class="tab-pane fade" id="pills-2-starts" role="tabpanel" aria-labelledby="pills-2-starts-tab" tabindex="0">
                        <?php if ($review2stars != null) : ?>
                            <?php foreach ($review2stars as $review) { ?>
                                <div class="mb-3">
                                    <div class="d-flex gap-3">
                                        <img src="<?= base_url('assets/static/images/user.png') ?>" alt="customers" class="img-fluid" style="max-width:50px; max-height:50px;">
                                        <div>
                                            <h5 class="fw-medium text-black"><?= $review->users->nama_lengkap ?></h5>
                                            <div class="d-flex mb-2">
                                                <?php foreach (range(1, 5) as $i) { ?>
                                                    <?php if ($review->star >= $i) { ?>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    <?php } else { ?>
                                                        <i class="fa-regular
                                                fa-star text-warning"></i>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                            <p class="text-black">
                                                <?= $review->description ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php else : ?>
                            <div class="text-center">
                                <p class="text-black fw-medium">There is no reviews yet</p>
                            </div>
                        <?php endif; ?>
                        <!-- PAGINATION -->
                        <?php
                        echo '<nav aria-label="Page navigation example">';
                        echo '<ul class="pagination pagination-sm justify-content-center">';
                        if ($currentPage2Stars > 1) {
                            echo '<li class="page-item">';
                            echo '<a class="page-link" href="?page=' . ($currentPage2Stars - 1) . '" aria-label="Previous">';
                            echo '<span aria-hidden="true">&laquo;</span>';
                            echo '</a>';
                            echo '</li>';
                        }
                        for ($page = 1; $page <= $totalPages2Stars; $page++) {
                            echo '<li class="page-item' . ($currentPage2Stars === $page ? ' active' : '') . '">';
                            echo '<a class="page-link" href="?page=' . $page . '">' . $page . '</a>';
                            echo '</li>';
                        }
                        if ($currentPage2Stars < $totalPages2Stars) {
                            echo '<li class="page-item">';
                            echo '<a class="page-link" href="?page=' . ($currentPage2Stars + 1) . '" aria-label="Next">';
                            echo '<span aria-hidden="true">&raquo;</span>';
                            echo '</a>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        echo '</nav>';
                        ?>
                    </div>
                    <div class="tab-pane fade" id="pills-1-starts" role="tabpanel" aria-labelledby="pills-1-starts-tab" tabindex="0">
                        <?php if ($review1stars != null) : ?>
                            <?php foreach ($review1stars as $review) { ?>

                                <div class="mb-3">
                                    <div class="d-flex gap-3">
                                        <img src="<?= base_url('assets/static/images/user.png') ?>" alt="customers" class="img-fluid" style="max-width:50px; max-height:50px;">
                                        <div>
                                            <h5 class="fw-medium text-black"><?= $review->users->nama_lengkap ?></h5>
                                            <div class="d-flex mb-2">
                                                <?php foreach (range(1, 5) as $i) { ?>
                                                    <?php if ($review->star >= $i) { ?>
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    <?php } else { ?>
                                                        <i class="fa-regular
                                                fa-star text-warning"></i>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                            <p class="text-black">
                                                <?= $review->description ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php else : ?>
                            <div class="text-center">
                                <p class="text-black fw-medium">There is no reviews yet</p>
                            </div>
                        <?php endif; ?>
                        <!-- PAGINATION -->
                        <?php
                        echo '<nav aria-label="Page navigation example">';
                        echo '<ul class="pagination pagination-sm justify-content-center">';
                        if ($currentPage1Stars > 1) {
                            echo '<li class="page-item">';
                            echo '<a class="page-link" href="?page=' . ($currentPage1Stars - 1) . '" aria-label="Previous">';
                            echo '<span aria-hidden="true">&laquo;</span>';
                            echo '</a>';
                            echo '</li>';
                        }
                        for ($page = 1; $page <= $totalPages1Stars; $page++) {
                            echo '<li class="page-item' . ($currentPage1Stars === $page ? ' active' : '') . '">';
                            echo '<a class="page-link" href="?page=' . $page . '">' . $page . '</a>';
                            echo '</li>';
                        }
                        if ($currentPage1Stars < $totalPages1Stars) {
                            echo '<li class="page-item">';
                            echo '<a class="page-link" href="?page=' . ($currentPage4Stars + 1) . '" aria-label="Next">';
                            echo '<span aria-hidden="true">&raquo;</span>';
                            echo '</a>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        echo '</nav>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 col-11">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <h4 class="text-black mb-4 fw-semibold">You May Also Like</h4>
                <!-- JIKA JUMLAH LEBIH DARI 6 -->
                <div class="swiper referenceProducts">
                    <div class="swiper-wrapper">
                        <?php if ($relatedproducts != null) : ?>
                            <?php foreach ($relatedproducts as $related) : ?>
                                <div class="swiper-slide">
                                    <a href="<?= base_url('/detail-product/') . $related->id ?>">
                                        <div class="card shadow">
                                            <div class="card-content">
                                                <img src="<?= $related->images != null ? base_url('uploads/img-product/' . $related->images->image) : base_url('assets/static/images/product.png') ?>" class="card-img-top img-fluid" alt="product" />
                                                <div class="card-body px-3">
                                                    <p class="fw-semibold fs-custom-references mb-2 text-truncate">
                                                        <?= $related->nama_produk ?>
                                                    </p>
                                                    <div class="d-flex mb-2 align-items-center" style="font-size:10px">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <span class="text-muted fs-custom-references ms-1" style="font-size:10px">(<?= $related->rating ?>)</span>
                                                    </div>
                                                    <p class="fw-semibold text-custom-red fs-custom-references mb-0">
                                                        Rp. <?= number_format($related->harga, 0, ',', '.') ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?php foreach ($products as $product) : ?>
                                <div class="swiper-slide">
                                    <a href="<?= base_url('/detail-product/') . $product->id ?>">
                                        <div class="card shadow">
                                            <div class="card-content">
                                                <img src="<?= $product->images != null ? base_url('uploads/img-product/' . $product->images[0]->image) : base_url('assets/static/images/product.png') ?>" class="card-img-top img-fluid" alt="product" />
                                                <div class="card-body px-3">
                                                    <p class="fw-semibold fs-custom-references mb-2 text-truncate">
                                                        <?= $product->nama_produk ?>
                                                    </p>
                                                    <div class="d-flex mb-2 align-items-center" style="font-size:10px">
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                        <span class="text-muted fs-custom-references ms-1" style="font-size:10px">(<?= $product->rating ?>)</span>
                                                    </div>
                                                    <p class="fw-semibold text-custom-red fs-custom-references mb-0">
                                                        Rp. <?= number_format($product->harga, 0, ',', '.') ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>