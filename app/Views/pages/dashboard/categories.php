<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-dark fw-semibold">Categories</h3>
                <p class="text-subtitle text-muted">
                    In this page you can manage your categories
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Categories
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-8 col-10">
                        <h5 class="card-title fw-medium text-dark">Categories Table</h5>
                    </div>
                    <div class="col-md-4 col-2">
                        <div class="d-flex justify-content-end">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#tambahCategory"
                                class="btn btn-custom-outline-submit">
                                + <span class="d-none d-md-inline">Add Category</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="table2" class="display table" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($categories as $category) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $category->nama_kategori ?></td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit<?= $category->id ?>"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <div class="modal fade" id="edit<?= $category->id ?>" tabindex="-1" aria-labelledby="editLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-md modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Category
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <form method="post" action="<?= base_url('dashboard/categories/update/') . $category->id ?>">
                                                        <div class="form-body">
                                                            <div class="col-md-12 form-group">
                                                                <label for="name">Name</label>
                                                                <input type="text" id="name" class="form-control"
                                                                    name="name" required value="<?= $category->nama_kategori ?>">
                                                            </div>
                                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                            <div class="col-sm-12 d-flex justify-content-end">
                                                                <button type="submit" name="submit"
                                                                    class="btn btn-custom-submit me-1 mb-1">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="<?= base_url('dashboard/categories/delete/') . $category->id ?>" method="POST" class="form-delete d-inline-block">
                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />    
                                        <button type="submit" class="btn btn-danger btn-sm delete-item">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="modal fade" id="tambahCategory" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Add Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="<?= base_url('dashboard/categories/create') ?>">
                                <div class="form-body">
                                    <div class="col-md-12 form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control" name="name" required>
                                    </div>
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" name="submit"
                                            class="btn btn-custom-submit me-1 mb-1">Submit</button>
                                    </div>
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