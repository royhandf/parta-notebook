<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-black fw-semibold">Settings</h3>
                <p class="text-muted">
                    Manage your site settings here
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Settings
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row g-2">
                    <div class="col-12">
                        <h5 class="card-title text-black fw-medium">Payment</h5>
                        <small class="text-muted">
                            Update your payment method here
                        </small>
                    </div>
                    <div class="col-12 rounded-4" style="background: #f5f5f5;">
                        <div class="p-3">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="payment" class="text-black fw-medium mb-2">Payment Method</label>
                                    <select class="form-select" name="payment" id="payment" required>
                                        <option value="BCA" selected>BCA</option>
                                        <option value="MANDIRI">MANDIRI</option>
                                        <option value="BRI">BRI</option>
                                        <option value="BSI">BSI</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="account" class="text-black fw-medium mb-2">Account Number</label>
                                    <input type="text" class="form-control" name="account" id="account" required
                                        value="1234 5678 9012 3456">
                                </div>
                                <div class="mb-2 text-end">
                                    <button type="submit" class="btn btn-custom-submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>