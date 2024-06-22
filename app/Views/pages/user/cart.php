<?= $this->extend('layouts/user'); ?>

<?= $this->section('content') ?>

<div class="container my-5 px-5 py-4 bg-white rounded-4">
    <h1 class="text-black fw-medium mb-3">Cart</h1>
    <div class="d-flex gap-2 align-items-center mb-5">
        <p class="fw-medium fs-custom-paragraph text-black fs-6 mb-0">Cart</p>
        <hr class="text-black" style="width: 50px;">
        <p class="fw-medium fs-custom-paragraph text-muted fs-6 mb-0">Checkout</p>
        <hr class="text-black" style="width: 50px;">
        <p class="fw-medium fs-custom-paragraph text-muted fs-6 mb-0">Payment</p>
    </div>
    <div class="d-flex justify-content-md-between justify-content-center">
        <!-- if cart empty  -->
        <!-- <div class="text-center">
                <h3 class="text-black fw-semibold mb-3">Cart is empty</h3>
                <a href="<?= base_url('/products') ?>" class="btn btn-custom-success">Shop Now</a>
            </div> -->
        <form action="" method="POST">
            <?php for ($i = 0; $i < 2; $i++) : ?>
            <div class="mb-5">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-md-4 col-5">
                        <div class="p-4 rounded-3" style="background-color: #F5F5F5;">
                            <img src="<?= base_url('assets/static/images/macbook.png') ?>" alt="product"
                                class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-xl-9 col-md-8 col-7 d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="text-black fw-medium">Macbook Pro 2021</h5>
                            <p>
                                <?= substr("Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam laborum, omnis saepe pariatur culpa nisi temporibus dolorem atque expedita rerum perspiciatis vero modi aperiam est iusto at non impedit amet.", 0, 100) . '...' ?>
                            </p>
                        </div>
                        <span class="text-custom-red fw-medium text-custom-price mb-2">
                            Rp. <?= number_format(10000000, 0, ',', '.') ?>
                        </span>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-between gy-2">
                    <div class="col-md-3 col-sm-6 col-7">
                        <div class="input-group number-spinner rounded-3" style="background-color: #f5f5f5;">
                            <span class="input-group-btn">
                                <button type="button" class="btn" data-dir="dwn">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </span>
                            <input type="text" class="form-control text-center" name="qty" value="1"
                                style="background-color: #f5f5f5;">
                            <span class="input-group-btn">
                                <button type="button" class="btn" data-dir="up">+</button>
                            </span>
                        </div>
                    </div>
                    <!-- CHECKLIST digunakan MANA AJA PRODUK YANG INGIN DI CHECKOUT -->
                    <div class="col-md-3 col-sm-6 col-5 d-flex gap-2 justify-content-end">
                        <input type="checkbox" class="btn-check" id="btn-check-outlined-<?= $i ?>" autocomplete="off">
                        <label class="btn btn-outline-dark" for="btn-check-outlined-<?= $i ?>">
                            <i class="fa-solid fa-check"></i>
                        </label>

                        <button type="button" name="submit" class="btn btn-outline-danger">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php endfor; ?>

            <div class="d-flex justify-content-between align-items-center mb-4 gap-2">
                <h5 class="fw-medium mb-0 text-custom-total-price">
                    Total: <span class="d-md-inline d-block">Rp. <?= number_format(20000000, 0, ',', '.') ?></span>
                </h5>
                <button type="submit" class="btn btn-custom-submit rounded">Checkout</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>