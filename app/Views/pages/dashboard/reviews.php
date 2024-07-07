<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-dark fw-semibold">Reviews</h3>
                <p class="text-subtitle text-muted">
                    This is a list of all reviews
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Reviews
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table2" class="display table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th data-priority="1">No</th>
                                <th>Product</th>
                                <th>Customer</th>
                                <th>Review</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            foreach ($reviews as $review) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $review->nama_produk ?></td>
                                <td><?= $review->nama_lengkap ?></td>
                                <td>
                                    <div class="d-flex gap-1 mb-1">
                                        <?php for ($i = 0; $i < $review->rating; $i++) { ?>
                                            <i class="fa fa-star text-warning"></i>
                                        <?php } ?>
                                    </div>
                                    <div><?= $review->description ?></div>
                                </td>
                                <td><?= $review->updated_at ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection(); ?>