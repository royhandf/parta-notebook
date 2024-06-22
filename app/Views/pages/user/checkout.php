<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row gy-4 justify-content-center">
        <div class="col-lg-9 col-11">
            <div class="p-4 bg-white rounded-4">
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
                        <div class="row align-items-start mb-4">
                            <div class="col-md-6">
                                <h5 class="text-black fw-medium">Agus Salam</h5>
                                <!-- if ada alamat -->
                                <p class="text-black">Jl. Kebon Jeruk No. 123 RT 01 RW 02, Kec. Bogor Selatan,
                                    Kota Bogor, Jawa Barat, 16123</p>
                                <!-- else -->
                                <!-- <p class="text-black">Address not set</p> -->

                                <p class="text-black">081234567890</p>
                            </div>
                            <div class="col-md-4">
                                <p class="fw-semibold text-black mb-2">Note</p>
                                <input type="text" name="note" id="note"
                                    class="w-100 rounded-3 form-control border-secondary" placeholder="Tulis pesan...">
                            </div>
                        </div>

                        <h5 class="fw-medium text-black mb-3">Order Summary</h5>
                        <?php for($i = 0; $i < 2; $i++): ?>
                        <div class="row justify-content-start mb-3">
                            <div class="col-lg-2 col-md-4 col-5">
                                <div class="rounded-3 text-center" style="background: #f5f5f5;">
                                    <img src="<?= base_url('assets/static/images/macbook.png') ?>" alt="product"
                                        class="p-md-2 p-3" height="80">
                                </div>
                            </div>
                            <div class="col-6">
                                <p class="text-black mb-1">Macbook Pro 2021</p>
                                <p class="text-custom-red mb-0">Rp.
                                    <?= number_format(20000000, 0, ',', '.') ?>
                                    <small class="text-black">x2</small>
                                </p>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-3 col-11">
            <div class="p-4 bg-white rounded-4">
                <form action="">
                    <div class="input-group mb-3">
                        <label class="input-group-text bg-transparent border-end-0" for="kurir"><i
                                class="fa-solid fa-location-dot"></i></label>
                        <select class="form-select border-start-0" id="kurir">
                            <option value="JNE" selected>JNE</option>
                            <option value="JNT">JNT</option>
                            <option value="POS">POS</option>
                            <option value="TIKI">TIKI</option>
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
                            <p class="mb-2">Rp. <?= number_format(40000000, 0, ',', '.') ?></p>
                            <p class="mb-4">Rp. <?= number_format(15000, 0, ',', '.') ?></p>
                            <p class="mb-2">Rp. <?= number_format(40015000, 0, ',', '.') ?></p>
                        </div>
                    </div>
                    <button type="submit" name="submit"
                        class="btn btn-custom-submit d-block w-100 mt-4">Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>