<?= $this->extend('layouts/user'); ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-12 col-11">
            <div class="px-md-5 px-4 py-4 bg-white rounded-4 shadow-sm">
                <h1 class="text-black fw-medium mb-3">Cart</h1>
                <div class="d-flex gap-2 align-items-center mb-5">
                    <p class="fw-medium fs-custom-paragraph text-black fs-6 mb-0">Cart</p>
                    <hr class="text-black" style="width: 50px;">
                    <p class="fw-medium fs-custom-paragraph text-muted fs-6 mb-0">Checkout</p>
                    <hr class="text-black" style="width: 50px;">
                    <p class="fw-medium fs-custom-paragraph text-muted fs-6 mb-0">Payment</p>
                </div>
                <div class="d-flex justify-content-md-between justify-content-center">
                    <?php if (!$carts) : ?>
                    <div class="text-center">
                        <h3 class="text-black fw-semibold mb-3">Cart is empty</h3>
                        <a href="<?= base_url('/products') ?>" class="btn btn-custom-success">Shop Now</a>
                    </div>
                    <?php endif; ?>
                    <?php foreach ($carts as $cart) { ?>
                        <form action="<?= base_url('/cart/update/') . $cart->id ?>" method="POST">
                            <div class="mb-5">
                                <div class="row justify-content-between">
                                    <div class="col-xl-3 col-md-4 col-5">
                                        <div class="p-4 rounded-3" style="background-color: #F5F5F5;">
                                            <img src="<?= $cart->image != null ? base_url('uploads/img-product/' . $cart->image->image) : base_url('assets/static/images/product.png') ?>"
                                                alt="product" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-md-8 col-7 d-flex flex-column justify-content-between">
                                        <div>
                                            <h5 class="text-black fw-medium"><?= $cart->product->nama_produk ?></h5>
                                            <p>
                                                <?= substr($cart->product->detail, 0, 100) . '...' ?>
                                            </p>
                                        </div>
                                        <span class="text-custom-red fw-medium text-custom-heading mb-2">
                                            Rp. <?= number_format($cart->product->harga, 0, ',', '.') ?>
                                        </span>
                                    </div>
                                </div>

                                <hr>

                                <div class="row justify-content-between gy-2">
                                    <div class="col-md-3 col-sm-6 col-7">
                                        <div class="input-group number-spinner rounded-3"
                                            style="background-color: #f5f5f5;">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn" data-dir="dwn">
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>
                                            </span>
                                            <input type="text" class="form-control text-center" name="qty"
                                                value="<?= $cart->qty ?>" style="background-color: #f5f5f5;">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn" data-dir="up">+</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-5 d-flex gap-2 justify-content-end">
                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                        <button type="submit" name="submit" class="btn btn-outline-success">
                                            <i class="fa-solid fa-check"></i>
                                        </button>

                                        <button type="button" name="submit" class="btn btn-outline-danger"
                                            onclick="deleteItem()">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="<?= base_url('/cart/delete/') . $cart->id ?>" method="POST" class="delete-form">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        </form>
                    <?php } ?>

                    <div class="d-flex justify-content-between align-items-center mb-4 gap-2">
                        <h5 class="fw-medium mb-0 text-custom-total-price">
                            Total: <span class="d-md-inline d-block">Rp.
                                <?= number_format($total, 0, ',', '.') ?></span>
                        </h5>
                        <?php if ($carts) : ?>
                        <a href="<?= base_url('/check-cart') ?>" class="btn btn-custom-submit rounded">Checkout</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>