<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row gy-md-4 gy-0 justify-content-md-between justify-content-center mb-5">
        <!-- MASUK KE PRODUCTS DENGAN FILTER SESUAI YANG DIKLIK -->

        <!-- DEFAULT (LATEST PRODUCTS) -->
        <div class="col-12">
            <a href="/products">
                <div class="row border-custom-rounded align-items-center justify-content-center gy-4 bg-arrival">
                    <div class="col-md-5 col-8 px-0">
                        <img src="<?= base_url('assets/static/images/new-arrival.png') ?>" alt="new arrival"
                            class="img-fluid mt-4 d-md-inline d-none" style="border-end-start-radius: 10px;">
                        <img src="<?= base_url('assets/static/images/macbook.png') ?>" alt="new arrival"
                            class="img-fluid mt-4 d-md-none d-block">
                    </div>
                    <div class="col-md-7 col-12">
                        <div class="px-4">
                            <h2 class="text-white fw-bold text-custom-heading">CHECK OUT OUR NEW ARRIVAL LAPTOPS</h2>
                            <p class="text-white fs-custom-paragraph">Click, Order, Delivered, Needs Revived,
                                Satisfaction
                                Guaranteed!</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- PRODUCTS DENGAN KATEGORY POWER ADAPTER -->
        <div class="col-md-4 col-12">
            <a href="/products">
                <div class="row border-custom-rounded h-100 me-md-1 bg-adapter">
                    <div class="col-12">
                        <h2 class="text-white fw-bold pt-4 ms-5 text-custom-heading">Adapter</h2>
                    </div>
                    <div class="col-12 text-end">
                        <img src="<?= base_url('assets/static/images/power-adapter.png') ?>" alt="adapter"
                            class="img-fluid">
                    </div>
                </div>
            </a>
        </div>

        <!-- PRODUCTS DENGAN KATEGORY LCD -->
        <div class="col-md-4 col-12">
            <a href="/products">
                <div class="row border-custom-rounded text-center text-custom-heading bg-lcd">
                    <div class="col-12">
                        <h2 class="text-white fw-bold pt-4">LCD</h2>
                    </div>
                    <div class="col-12">
                        <img src="<?= base_url('assets/static/images/lcd.png') ?>" alt="lcd" class="img-fluid pb-4">
                    </div>
                </div>
            </a>
        </div>

        <!-- PRODUCTS DENGAN KATEGORY KEYBOARD -->
        <div class="col-md-4 col-12">
            <a href="/products">
                <div class="row border-custom-rounded ms-lg-1 h-100 bg-keyboard">
                    <div class="col-12 text-end">
                        <h2 class="text-white fw-bold pt-4 me-4 text-custom-heading">Keyboard</h2>
                    </div>
                    <div class="col-12 px-0">
                        <img src="<?= base_url('assets/static/images/keyboard.png') ?>" alt="lcd" class="img-fluid">
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-12 col-11">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <h3 class="text-black mb-4 fw-bold text-custom-heading">New Arrival Products</h3>
                <!-- JIKA JUMLAH LEBIH DARI 6 -->
                <div class="swiper newArrival">
                    <div class="swiper-wrapper">
                    <?php foreach ($latestproducts as $latest) : ?>
                        <div class="swiper-slide">
                            <a href="<?= base_url('/detail-product/') . $latest->id ?>">
                                <div class="card shadow">
                                    <div class="card-content">
                                    <img src="<?= $latest->images != null ? base_url('uploads/img-product/' . $latest->images[0]->image) : base_url('assets/static/images/product.png') ?>" class="card-img-top img-fluid" alt="product" />

                                        <div class="card-body px-3">
                                            <p class="fw-semibold fs-custom-references mb-2 text-truncate">
                                                <?= $latest->nama_produk ?>
                                            </p>
                                            <div class="d-flex mb-2 align-items-center" style="font-size:10px">
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <span class="text-muted fs-custom-references ms-1"
                                                    style="font-size:10px">(<?= $latest->rating ?>)</span>
                                            </div>
                                            <p class="fw-semibold text-custom-red fs-custom-references mb-0">
                                                Rp. <?= number_format($latest->harga, 0, ',', '.') ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-black mb-5 fw-bold text-center text-custom-heading">RECOMMENDATION</h3>
    <div class="row justify-content-sm-start justify-content-center">
        <?php foreach ($products as $product) : ?>
        <div class="col-lg-2 col-md-4 col-sm-6 col-5">
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
    </div>
</div>
<?= $this->endSection(); ?>