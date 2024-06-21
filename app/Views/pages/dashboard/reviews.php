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
                            <tr>
                                <td>1</td>
                                <td>Mie Ayam</td>
                                <td>John Doe</td>
                                <td>
                                    <div class="d-flex gap-1 mb-1">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto quasi ea,
                                        perferendis ipsa corrupti eligendi, unde enim ipsum expedita fugit dolor.
                                        Repellat ad saepe nam consequuntur culpa facilis esse voluptatem?</div>
                                </td>
                                <td>01-08-2021</td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Laptop Macbook Pro</td>
                                <td>Jane Doe</td>
                                <td>
                                    <div class="d-flex gap-1 mb-1">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                    </div>
                                    <div>
                                        Laptopnya bagus banget, performanya juga mantap pokoknya recommended deh.
                                        Harganya juga worth it
                                    </div>
                                </td>
                                <td>01-08-2021</td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection(); ?>