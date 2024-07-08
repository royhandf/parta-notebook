<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row gy-4 justify-content-center">
        <div class="col-md-12 col-11">
            <div class="px-md-5 px-3 py-4 bg-white rounded-4 shadow-sm">
                <h2 class="text-black fw-semibold mb-3">My Orders</h2>
                <?php if (empty($details)) { ?>
                    <div class="alert alert-warning" role="alert">
                        You don't have any orders yet
                    </div>
                <?php } ?>
                <?php foreach ($details as $index => $detail) { ?>
                    <div class="border border-1 border-secondary rounded-3 mb-4">
                        <div class="row justify-content-between p-3">
                            <div class="col-lg-4 col-md-6 col-7">
                                <p class="text-black fs-custom-paragraph fw-medium mb-2">
                                    <?= esc($detail->created_at) ?>
                                </p>
                                <div class="d-flex mb-3">
                                    <?php foreach (range(1, 5) as $number) : ?>
                                        <i class="fa fa-star <?= $number <= ($detail->reviews != null ? $detail->reviews->star : 0) ? 'text-warning' : 'text-muted' ?>"></i>
                                    <?php endforeach; ?>
                                </div>
                                <p class="text-black fw-bold fs-custom-paragraph">
                                    <?= esc($detail->products->nama_produk) ?> &ensp; x<?= esc($detail->qty) ?>
                                </p>
                                <div class="d-flex gap-1 align-items-center">
                                    <a href="<?= base_url('/detail-transaction/' . $detail->transaction_id) ?>" class="btn btn-custom-submit">
                                        View <span class="d-md-inline d-none">Detail</span>
                                    </a>
                                    <?php if ($detail->transactions->status == 'success') { ?>
                                        <button type="button" class="btn btn-custom-outline-submit px-2" data-bs-toggle="modal"
                                            data-bs-target="#modalFeedback-<?= $detail->product_id ?>">Review</button>
                                        <div class="modal fade" id="modalFeedback-<?= $detail->product_id ?>" tabindex="-1"
                                            aria-labelledby="modalFeedbackLabel-<?= $detail->product_id ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fw-medium" id="modalFeedbackLabel-<?= $detail->product_id ?>">Feedback</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('/feedback') ?>" method="POST">
                                                            <div class="mb-3">
                                                                <label for="rating" class="form-label">Overall Rating</label>
                                                                <div class="rating">
                                                                    <?php for ($number = 5; $number >= 1; $number--) : ?>
                                                                        <input type="radio" id="star<?= $number ?>-<?= $index ?>" name="rating" value="<?= $number ?>"
                                                                            <?= ($detail->reviews != null && $detail->reviews->star == $number) ? 'checked' : '' ?>>
                                                                        <label for="star<?= $number ?>-<?= $index ?>"></label>
                                                                    <?php endfor; ?>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="review-<?= $index ?>" class="form-label">Feedback</label>
                                                                <textarea class="form-control border-dark border-opacity-25"
                                                                    id="review-<?= $index ?>" name="review" rows="3" <?= $detail->reviews != null ? 'disabled' : '' ?>><?= $detail->reviews != null ? esc($detail->reviews->description) : '' ?></textarea>
                                                            </div>
                                                            <input type="hidden" name="product_id" value="<?= esc($detail->products->id) ?>" />
                                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                            <?php if ($detail->reviews == null) { ?>
                                                                <button type="submit" name="submit" class="btn btn-custom-submit w-100">
                                                                    Submit Review
                                                                </button>
                                                            <?php } ?>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-5 text-end">
                                <p class="mb-2 fs-custom-paragraph">
                                    <?php if ($detail->transactions->status == 'pending') { ?>
                                        <i class="fa-solid fa-clock text-warning"></i> <?= esc($detail->transactions->status) ?>
                                    <?php } else if ($detail->transactions->status == 'canceled') { ?>
                                        <i class="fa-solid fa-times-circle text-danger"></i> <?= esc($detail->transactions->status) ?>
                                    <?php } else { ?>
                                        <i class="fa-solid fa-check-circle text-success"></i> <?= esc($detail->transactions->status) ?>
                                    <?php } ?>
                                </p>

                                <p class="text-black fw-medium fs-custom-paragraph">
                                    Rp. <?= number_format($detail->products->harga * $detail->qty, 0, ',', '.'); ?>
                                </p>
                                <img src="<?= $detail->images != null ? base_url('uploads/img-product/' . $detail->images->image) : base_url('assets/static/images/product.png') ?>" alt="Product" class="img-fluid" width="50">
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
