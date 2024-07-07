<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row gy-4 justify-content-center">
        <div class="col-md-12 col-11">
            <div class="px-md-5 px-3 py-4 bg-white rounded-4 shadow-sm">
                <h2 class="text-black fw-semibold mb-3">My Orders</h2>
                <?php foreach ($transactions as $transaction) { ?>
                <div class="border border-1 border-secondary rounded-3 mb-4">
                    <div class="row justify-content-between p-3">
                        <div class="col-lg-4 col-md-6 col-7">
                            <p class="text-black fs-custom-paragraph fw-medium mb-2">
                                <?= $transaction->created_at ?></p>

                            <div class="d-flex mb-3">
                            <?php for ($i = 0; $i < $transaction->details->review->star; $i++) { ?>
                                            <i class="fa fa-star text-warning"></i>
                            <?php } ?>
                            </div>
                            <div class="d-flex gap-1 align-items-center">
                                <a href="<?= base_url('/detail-transaction/'. $transaction->id) ?>" class="btn btn-custom-submit">
                                    View <span class="d-md-inline d-none">Detail</span>
                                </a>
                                <button type="submit" class="btn btn-custom-outline-submit px-2" data-bs-toggle="modal"
                                    data-bs-target="#modalFeedback">Feedback</button>

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
                                                <form action="">
                                                    <div class="mb-3">
                                                        <label for="rating" class="form-label">Overall Rating</label>
                                                        <div class="rating">
                                                            <input type="radio" id="star1" name="rating"
                                                                value="1"><label for="star1"></label>
                                                            <input type="radio" id="star2" name="rating"
                                                                value="2"><label for="star2"></label>
                                                            <input type="radio" id="star3" name="rating"
                                                                value="3"><label for="star3"></label>
                                                            <input type="radio" id="star4" name="rating"
                                                                value="4"><label for="star4"></label>

                                                            <input type="radio" id="star5" name="rating"
                                                                value="5"><label for="star5"></label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="review" class="form-label">Review</label>
                                                        <textarea class="form-control border-dark border-opacity-25"
                                                            id="review" rows="3"></textarea>
                                                    </div>
                                                    <!-- JIKA SUDAH SUBMIT HILANGKAN BUTTON -->
                                                    <a href="<?= base_url('/detail-transaction/'. $transaction->id) ?>" class="btn btn-custom-submit w-100">
                                                        Submit Review
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-5 text-end">
                            <p class="mb-2 fs-custom-paragraph">
                                <i class="fa-solid fa-check-circle text-success"></i> Success
                            </p>

                            <p class="text-black fw-medium fs-custom-paragraph">
                                Rp. <?= number_format(100000, 0, ',', '.'); ?></p>
                            <img src="<?= base_url('assets/static/images/macbook.png') ?>" alt="Product"
                                class="img-fluid" width="50">
                        </div>
                    </div>
                </div>
                <?php } ?>


                <div class="border border-1 border-secondary rounded-3 mb-4">
                    <div class="row justify-content-between p-3">
                        <div class="col-lg-4 col-md-6 col-7">
                            <p class="text-black fs-custom-paragraph fw-medium mb-2">31 December 2021</p>

                            <div class="d-flex mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="d-flex gap-1 align-items-center">
                                <a href="/detail-transaction" class="btn btn-custom-submit">
                                    View <span class="d-md-inline d-none">Detail</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-5 text-end">
                            <p class="mb-2 fs-custom-paragraph">
                                <i class="fa-solid fa-circle-exclamation text-warning"></i> Pending
                            </p>
                            <p class="text-black fw-medium fs-custom-paragraph">Rp.
                                <?= number_format(100000, 0, ',', '.'); ?></p>
                            <img src="<?= base_url('assets/static/images/macbook.png') ?>" alt="Product"
                                class="img-fluid" width="50">
                        </div>
                    </div>
                </div>

                <div class="border border-1 border-secondary rounded-3 mb-4">
                    <div class="row justify-content-between p-3">
                        <div class="col-lg-4 col-md-6 col-7">
                            <p class="text-black fs-custom-paragraph fw-medium mb-2">31 December 2021</p>

                            <div class="d-flex mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="d-flex gap-1 align-items-center">
                                <a href="/detail-transaction" class="btn btn-custom-submit">
                                    View <span class="d-md-inline d-none">Detail</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-5 text-end">

                            <p class="mb-2 fs-custom-paragraph">
                                <i class="fa-solid fa-circle-xmark text-danger"></i> Cancel
                            </p>

                            <p class="text-black fw-medium fs-custom-paragraph">Rp.
                                <?= number_format(100000, 0, ',', '.'); ?></p>
                            <img src="<?= base_url('assets/static/images/macbook.png') ?>" alt="Product"
                                class="img-fluid" width="50">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>