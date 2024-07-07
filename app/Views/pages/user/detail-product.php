<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row gy-4 justify-content-center mb-4">
        <div class="col-md-9 col-11">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <h2 class="text-black fw-semibold mb-3"><?= $product->nama_produk ?></h2>

                <!-- image -->
                <div class="mt-2 mb-4">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                        <?php foreach ($productimages as $productimage) : ?>
                            <img src="<?= $productimage != null ? base_url('uploads/img-product/' . $productimage[0]->image) : base_url('assets/static/images/product.png') ?>" class="card-img-top img-fluid" alt="product" />
                        <?php endforeach; ?>
                        </div>
                    </div>

                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                        <?php foreach ($productimages as $productimage) : ?>
                            <img src="<?= $productimage != null ? base_url('uploads/img-product/' . $productimage[0]->image) : base_url('assets/static/images/product.png') ?>" class="card-img-top img-fluid" alt="product" />
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="rounded-4 mb-4" style="background: #f5f5f5">
                    <div class="d-flex justify-content-between align-items-center p-4">
                        <div>
                            <h3 class="fw-semibold text-custom-red mb-3">
                                Rp. <?= number_format($product->harga, 0, ',', '.') ?>
                            </h3>
                            <div class="d-flex gap-1">
                                <i class="fa-solid fa-star text-warning"></i>

                                <small class="text-muted">(<?= $product->rating ?>)</small>
                            </div>
                        </div>
                        <button class="btn btn-custom-cart d-md-none d-inline" data-bs-toggle="modal"
                            data-bs-target="#addCart">
                            <i class="fa-solid fa-shopping-cart"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="addCart" tabindex="-1" aria-labelledby="addCartLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="text-black modal-title fw-semibold">Checkout</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="fw-medium text-black">Stock: <?= $product->stok ?></p>
                                        <div class="input-group number-spinner rounded-3"
                                            style="background-color: #f5f5f5;">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn" data-dir="dwn">-</button>
                                            </span>
                                            <input type="text" class="form-control text-center" name="qty" value="1"
                                                style="background-color: #f5f5f5;">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn" data-dir="up">+</button>
                                            </span>
                                        </div>
                                        <hr>
                                        <div class="d-lg-flex d-md-block d-flex justify-content-between">
                                            <p class="text-muted fw-medium mb-0">Price</p>
                                            <p class="text-black fw-medium mb-0">Rp.
                                                <?= number_format($product->harga, 0, ',', '.') ?></p>
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
                <?= $product->detail ?>
                </p>
            </div>
        </div>
        <div class="col-md-3 col-11 d-md-block d-none">
            <div class="p-4 bg-white rounded-4 shadow-sm">
            <form action="<?= base_url('/add-to-cart/') . $product->id ?>" method="POST">
                <h5 class="text-black fw-semibold mb-4">Checkout</h5>
                <p class="fw-medium text-black">Stock: <?= $product->stok ?></p>
                <hr>
                <div class="input-group number-spinner rounded-3" style="background-color: #f5f5f5;">
                    <span class="input-group-btn">
                        <button type="button" class="btn" data-dir="dwn">-</button>
                    </span>
                    <input type="text" class="form-control text-center" name="qty" value="1"
                        style="background-color: #f5f5f5;">
                    <span class="input-group-btn">
                        <button type="button" class="btn" data-dir="up">+</button>
                    </span>
                </div>
                <hr>
                <div class="d-lg-flex d-md-block d-flex justify-content-between">
                    <p class="text-muted fw-medium mb-0">Price</p>
                    <p class="text-black fw-medium mb-0">Rp. <?= number_format($product->harga, 0, ',', '.') ?></p>
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
                                <h3 class="fw-medium text-custom-red">5.0 <span class="fs-6">From 5</span></h3>
                                <div class="d-flex gap-1 mb-2">
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                </div>
                            </div>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active shadow-none" id="pills-all-ratings-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-all-ratings" type="button"
                                        role="tab" aria-controls="pills-all-ratings" aria-selected="true">All
                                        Ratings</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link shadow-none border-custom-pill" id="pills-5-starts-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-5-starts" type="button" role="tab"
                                        aria-controls="pills-5-starts" aria-selected="false">5 Stars</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link shadow-none" id="pills-4-starts-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-4-starts" type="button" role="tab"
                                        aria-controls="pills-4-starts" aria-selected="false">4 Stars</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link shadow-none" id="pills-3-starts-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-3-starts" type="button" role="tab"
                                        aria-controls="pills-3-starts" aria-selected="false">3 Stars</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link shadow-none" id="pills-2-starts-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-2-starts" type="button" role="tab"
                                        aria-controls="pills-2-starts" aria-selected="false">2 Stars</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link shadow-none" id="pills-1-starts-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-1-starts" type="button" role="tab"
                                        aria-controls="pills-1-starts" aria-selected="false">1 Stars</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all-ratings" role="tabpanel"
                        aria-labelledby="pills-all-ratings-tab" tabindex="0">
                        <!-- 3 ITEM TAMPIL PER PAGE -->
                        <?php for ($i = 0; $i < 3; $i++) : ?>
                        <div class="mb-3">
                            <div class="d-flex gap-3">
                                <img src="<?= base_url('assets/static/images/user.png') ?>" alt="customers"
                                    class="img-fluid" style="max-width:50px; max-height:50px;">
                                <div>
                                    <h5 class="fw-medium text-black">John Doe</h5>
                                    <div class="d-flex mb-2">
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                        <i class="fa-solid fa-star text-warning"></i>
                                    </div>
                                    <p class="text-black">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis officiis quod
                                        dolorem necessitatibus nostrum? Enim iste esse temporibus, quaerat dolorem
                                        maxime non deleniti ratione. Magni facilis enim et odit non repellat porro
                                        dolorum reprehenderit, distinctio aliquid! Ipsa quos iusto, odit a itaque
                                        pariatur cupiditate inventore repellat, quo, sequi commodi non soluta error
                                        mollitia excepturi nesciunt. Aperiam officia rerum et, dolorem beatae quaerat
                                        adipisci porro praesentium reiciendis tempora!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endfor; ?>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-sm justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="tab-pane fade" id="pills-5-starts" role="tabpanel" aria-labelledby="pills-5-starts-tab"
                        tabindex="0">
                        5 STARS
                    </div>
                    <div class="tab-pane fade" id="pills-4-starts" role="tabpanel" aria-labelledby="pills-4-starts-tab"
                        tabindex="0">
                        4 Stars
                    </div>
                    <div class="tab-pane fade" id="pills-3-starts" role="tabpanel" aria-labelledby="pills-3-starts-tab"
                        tabindex="0">
                        3 stars
                    </div>
                    <div class="tab-pane fade" id="pills-2-starts" role="tabpanel" aria-labelledby="pills-2-starts-tab"
                        tabindex="0">
                        2 stars
                    </div>
                    <div class="tab-pane fade" id="pills-1-starts" role="tabpanel" aria-labelledby="pills-1-starts-tab"
                        tabindex="0">
                        1 stars
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
                                    <img src="<?= $related->images != null ? base_url('uploads/img-product/' . $related->images[0]->image) : base_url('assets/static/images/product.png') ?>" class="card-img-top img-fluid" alt="product" />
                                        <div class="card-body px-3">
                                            <p class="fw-semibold fs-custom-references mb-2 text-truncate">
                                            <?= $related->nama_produk ?>
                                            </p>
                                            <div class="d-flex mb-2 align-items-center" style="font-size:10px">
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <span class="text-muted fs-custom-references ms-1"
                                                    style="font-size:10px">(<?= $related->rating ?>)</span>
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
                                                    <span class="text-muted fs-custom-references ms-1"
                                                        style="font-size:10px">(<?= $product->rating ?>)</span>
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