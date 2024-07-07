<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row gy-4 justify-content-center">
        <div class="col-lg-9 col-11">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <h1 class="text-black fw-medium mb-3">Checkout</h1>
                <div class="d-flex gap-3 align-items-center mb-5">
                    <p class="fw-medium fs-custom-paragraph text-muted mb-0">Cart</p>
                    <hr class="text-black" style="width: 50px;">
                    <p class="fw-medium fs-custom-paragraph text-black mb-0">Checkout</p>
                    <hr class="text-black" style="width: 50px;">
                    <p class="fw-medium fs-custom-paragraph text-muted mb-0">Payment</p>
                </div>
                <form action="" method="POST">
                    <div class="d-flex flex-column mb-4">
                        <h5 class="fw-medium text-muted mb-3">ADDRESS</h5>
                        <div class="mb-4">
                            <h5 class="text-black fw-medium"><?= $user->nama_lengkap ?></h5>
                            <?php if ($user->alamat) : ?>
                                <p class="text-black"><?= $user->alamat ?></p>
                            <?php else : ?>
                                <p class="text-black">Address not set</p>
                            <?php endif; ?>
                            <?php if ($user->no_telp) : ?>
                                <p class="text-black"><?= $user->no_telp ?></p>
                            <?php else : ?>
                                <p class="text-black">Phone number not set</p>
                            <?php endif; ?>
                        </div>

                        <h5 class="fw-medium text-black mb-3">Order Summary</h5>
                        <?php foreach ($carts as $cart) { ?>
                        <div class="row justify-content-start mb-3">
                            <div class="col-lg-2 col-md-4 col-5">
                                <div class="rounded-3 text-center" style="background: #f5f5f5;">
                                <img src="<?= $cart->image != null ? base_url('uploads/img-product/' . $cart->image->image) : base_url('assets/static/images/product.png') ?>" alt="product"
                                        class="p-md-2 p-3" height="80">
                                </div>
                            </div>
                            <div class="col-6">
                                <p class="text-black mb-1"><?= $cart->product->nama_produk ?></p>
                                <p class="text-custom-red mb-0">Rp.
                                    <?= number_format($cart->product->harga, 0, ',', '.') ?>
                                    <small class="text-black">x<?= $cart->qty ?></small>
                                </p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-3 col-11">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <form action="<?= base_url('/checkout') ?>" method="POST">
                    <div class="input-group mb-3">
                        <label class="input-group-text bg-transparent border-end-0" for="kurir"><i
                                class="fa-solid fa-location-dot"></i></label>
                        <select class="form-select border-start-0" id="kurir">
                            <option value="JNE" selected>JNE</option>
                        </select>
                    </div>
                    <h5 class="fw-medium text-black mb-3">Order Summary</h5>
                    <div class="d-flex justify-content-between fw-medium">
                        <div class="d-flex flex-column text-muted">
                            <p class="mb-2">Items</p>
                            <p class="mb-4">Shipping</p>
                            <p class="mb-2">Total</p>
                        </div>
                        <div class="d-flex flex-column text-black text-end">
                            <p class="mb-2">Rp. <?= number_format($subtotal, 0, ',', '.') ?></p>
                            <p class="mb-4">Rp. <?= number_format($ongkir, 0, ',', '.') ?></p>
                            <p class="mb-2">Rp. <?= number_format($total, 0, ',', '.') ?></p>
                        </div>
                    </div>
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <button type="submit" name="submit"
                        class="btn btn-custom-submit d-block w-100 mt-4">Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>