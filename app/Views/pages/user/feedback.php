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
                <?php foreach ($details as $detail) { ?>
                <div class="border border-1 border-secondary rounded-3 mb-4">
                    <div class="row justify-content-between p-3">
                        <div class="col-lg-4 col-md-6 col-7">
                            <p class="text-black fs-custom-paragraph fw-medium mb-2">
                                <?= $detail->created_at ?></p>
                            <div class="d-flex mb-3">
                            <?php foreach (range(1, 5) as $number) : ?>
                                <?php if ($detail->reviews == null) : ?>
                                    <i class="fa fa-star text-muted"></i>
                                <?php else : ?>
                                    <i class="fa fa-star <?= $number <= $detail->reviews->star ? 'text-warning' : 'text-muted' ?>"></i>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </div>
                            <p class="text-black fw-bold fs-custom-paragraph"><?= $detail->products->nama_produk ?> &ensp; x<?= $detail->qty ?> </p>
                            <div class="d-flex gap-1 align-items-center">
                                <a href="<?= base_url('/detail-transaction/'. $detail->transaction_id) ?>" class="btn btn-custom-submit">
                                    View <span class="d-md-inline d-none">Detail</span>
                                </a>
                                <?php if ($detail->transactions->status == 'success') { ?>
                                <button type="submit" class="btn btn-custom-outline-submit px-2" data-bs-toggle="modal"
                                    data-bs-target="#modalFeedback">Review</button>

                                <div class="modal fade" id="modalFeedback" tabindex="-1"
                                    aria-labelledby="modalFeedbackLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-medium" id="modalFeedbackLabel">Feedback</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('/feedback') ?>" method="POST">
                                                    <div class="mb-3">
                                                        <label for="rating" class="form-label">Overall Rating</label>
                                                        <div class="rating">
                                                        <?php foreach (range(1, 5) as $number) : ?>
                                                            <input type="radio" id="star<?= $number ?>" name="rating" value="<?= $number ?>"
                                                                <?= ($detail->reviews != null && $detail->reviews->star == $number) ? 'checked' : '' ?>>
                                                            <label for="star<?= $number ?>"></label>
                                                        <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <?php if ($detail->reviews != null) { ?>
                                                        <label for="review" class="form-label">Feedback</label>
                                                        <textarea class="form-control border-dark border-opacity-25"
                                                            id="review" name="review" rows="3" placeholder="Tulis ulasan..." value="<?= $detail->reviews->description ?>"></textarea>
                                                        <?php } else { ?>
                                                        <label for="review" class="form-label">Feedback</label>
                                                        <textarea class="form-control border-dark border-opacity-25"
                                                            id="review" name="review" rows="3" placeholder="Tulis ulasan..."></textarea>
                                                        <?php } ?>
                                                    </div>
                                                    <input type="hidden" name="product_id" value="<?= $detail->products->id ?>" />
                                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                    <button type="submit" name="submit" class="btn btn-custom-submit w-100">
                                                        Submit Review
                                                    </button>
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
                                <i class="fa-solid fa-clock text-warning"></i> <?= $detail->transactions->status ?>
                                <?php } else if ($detail->transactions->status == 'canceled') { ?>
                                <i class="fa-solid fa-times-circle text-danger"></i> <?= $detail->transactions->status ?>
                                <?php } else { ?>
                                <i class="fa-solid fa-check-circle text-success"></i> <?= $detail->transactions->status ?>
                                <?php } ?>
                            </p>

                            <p class="text-black fw-medium fs-custom-paragraph">
                                Rp. <?= number_format($detail->products->harga * $detail->qty, 0, ',', '.'); ?></p>
                                <img src="<?= $detail->images != null ? base_url('uploads/img-product/' . $detail->images->image) : base_url('assets/static/images/product.png') ?>" alt="Product"
                                class="img-fluid" width="50">
                        </div>
                    </div>
                </div>
            <?php } ?>        
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>