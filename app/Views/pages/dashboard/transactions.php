<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-dark fw-semibold">Transactions</h3>
                <p class="text-subtitle text-muted">
                    This is a list of all transactions
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Transactions
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header ">
                <h5 class="card-title fw-medium text-dark">Transactions Table</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table2" class="display nowrap table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>INV/20210801/1</td>
                                <td>01-08-2021</td>
                                <td>John Doe</td>
                                <td>Rp. <?= number_format(10000000, 0, ',', '.') ?></td>
                                <td>
                                    <!-- <span class="badge bg-danger">Canceled</span>
                                    <span class="badge bg-warning">Pending</span> -->
                                    <span class="badge bg-success">Success</span>
                                </td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#detailTransaction"
                                        class="btn btn-info btn-sm edit-button">
                                        <i class=" fa-regular fa-eye"></i>
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editStatus"
                                        class="btn btn-warning btn-sm edit-button">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <form action="" method="POST" class="form-delete d-inline-block">
                                        <button type="submit" class="btn btn-danger btn-sm delete-item">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="modal fade" id="detailTransaction" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Transaction
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Products</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th>1</th>
                                                                <td>Macbook Pro 2021
                                                                    <small>x10 pcs</small>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>2</th>
                                                                <td>iPhone 12 Pro Max
                                                                    <small>x5 pcs</small>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editStatus" tabindex="-1" aria-labelledby="editLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="form form-horizontal" id="form-product" method="post" action="">
                                        <div class="form-body">
                                            <div class="col-md-12 form-group">
                                                <label for="category">Status</label>
                                                <select class="form-control" name="status" required>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Canceled">Canceled</option>
                                                    <option value="Success">Success</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" name="submit"
                                                    class="btn btn-custom-submit me-1 mb-1">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection(); ?>