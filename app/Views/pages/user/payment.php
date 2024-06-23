<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row gy-4 justify-content-center">
        <div class="col-lg-9 col-11">
            <div class="px-md-5 px-4 py-4 bg-white rounded-4 shadow-sm">
                <h1 class="text-black fw-medium mb-3">Payment</h1>
                <div class="d-flex gap-3 align-items-center mb-4">
                    <p class="fw-medium fs-custom-paragraph text-muted mb-0">Cart</p>
                    <hr class="text-black" style="width: 50px;">
                    <p class="fw-medium fs-custom-paragraph text-muted mb-0">Checkout</p>
                    <hr class="text-black" style="width: 50px;">
                    <p class="fw-medium fs-custom-paragraph text-black mb-0">Payment</p>
                </div>
                <div class="alert alert-success d-flex align-items-center text-white" role="alert">
                    <i class="fa-solid fa-circle-check fs-3"></i>
                    <div class="d-flex flex-column ms-3">
                        <span class="fw-medium">Your payment has been successful !</span>
                        <small>Thank you for your order</small>
                    </div>
                </div>
                <!-- <div class="alert alert-warning d-flex align-items-center text-white" role="alert">
                    <i class="fa-solid fa-circle-exclamation fs-3"></i>
                    <div class="d-flex flex-column ms-3">
                        <span class="fw-medium">Please make payment immediately !</span>
                        <small>Please verify your order via WhatsApp</small>
                    </div>
                </div>
                <div class="alert alert-danger d-flex align-items-center text-white" role="alert"
                    style="background-color: #FC5A37;">
                    <i class="fa-solid fa-circle-xmark fs-3"></i>
                    <div class="d-flex flex-column ms-3">
                        <span class="fw-medium">Payment has been Cancelled !</span>
                        <small>Please make another order</small>
                    </div>
                </div> -->

                <div class="d-flex flex-column">
                    <div class="row align-items-start gy-4">
                        <div class="col-md-6">
                            <h5 class="fw-medium text-muted mb-2">BILLING FROM</h5>
                            <h5 class="text-black fw-medium">Parta Notebook</h5>
                            <p class="text-black mb-2">Jl. Kebon Jeruk No. 123 RT 01 RW 02, Kec. Bogor Selatan,
                                Kota
                                Bogor, Jawa Barat, 16123</p>
                            <p class="text-black mb-2">081234567890</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="fw-medium text-muted mb-2">BILLING TO</h5>
                            <h5 class="text-black fw-medium">Agus Salam</h5>
                            <p class="text-black mb-2">Jl. Kebon Jeruk No. 123 RT 01 RW 02, Kec. Bogor Selatan,
                                Kota
                                Bogor, Jawa Barat, 16123</p>
                            <p class="text-black mb-2">081234567890</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <h5 class="text-black fw-medium">Invoice INV/20210801/1</h5>
                    <p class="text-muted fw-medium">Item</p>
                    <?php for($i = 0; $i < 2; $i++) : ?>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0 text-black">Macbook Pro 2021</p>
                            <small class="text-muted">x2</small>
                        </div>
                        <p class="text-custom-red fw-medium mb-1">Rp.
                            <?= number_format(10000000, 0, ',', '.') ?></p>
                    </div>
                    <hr>
                    <?php endfor; ?>
                    <div class="mt-2">
                        <div class="d-flex justify-content-between">
                            <p class="text-black mb-1">Shipping</p>
                            <p class="text-custom-red fw-medium mb-1">Rp
                                <?= number_format(15000, 0, ',', '.') ?></p>
                        </div>
                    </div>
                    <div class="mt-2 mb-4">
                        <div class="d-flex justify-content-between">
                            <p class="text-black mb-1">Total Amount</p>
                            <p class="text-custom-red fw-medium mb-1">Rp
                                <?= number_format(22000000, 0, ',', '.') ?></p>
                        </div>
                    </div>
                    <!-- if status pending -->
                    <form action="" method="POST">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <button type="submit" name="submit" class="btn btn-custom-cancel w-100 mb-2">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-11">
            <div class="p-4 rounded-3 bg-white shadow-sm">
                <div class="text-center mb-4 p-3">
                    <!-- kondisi payment, gambar dari asset sudah ada -->
                    <img src="<?= base_url('assets/static/images/mandiri.png') ?>" alt="mandiri" class="img-fluid">
                </div>
                <h5 class="fw-medium text-black mb-4">Bank Mandiri</h5>
                <div>
                    <h5 class="fw-medium text-black">Account Number</h5>
                    <p class="text-black fw-regular">2208 1999 1234 5678</p>
                </div>
                <div>
                    <h5 class="fw-medium text-black">Account Name</h5>
                    <p class="text-black fw-regular">PT. Parta Notebook</p>
                </div>
                <a href="" class="btn btn-custom-outline-submit d-block mt-4">
                    <i class="fa-brands fa-whatsapp mx-2 fs-6"></i> Verify Payment
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>