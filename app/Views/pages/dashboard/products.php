<?php helper('text') ?>

<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="fw-semibold text-dark">Products</h3>
                <p class="text-subtitle text-muted">
                    A list of all products
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Products
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
                        <h5 class="card-title fw-medium text-dark">Products Table</h5>
                    </div>
                    <div class="col-md-4 col-2">
                        <div class="d-flex justify-content-end">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#tambahProducts"
                                class="btn btn-custom-outline-submit">
                                + <span class="d-none d-md-inline">Add Product</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="table2" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Weight</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Detail</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mie Ayam</td>
                                <td>Food</td>
                                <td>100 gr</td>
                                <td>
                                    <?= substr("Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam laborum, omnis saepe pariatur culpa nisi temporibus dolorem atque expedita rerum perspiciatis vero modi aperiam est iusto at non impedit amet.", 0, 80) . '...' ?>
                                </td>
                                <td>100</td>
                                <td>Rp. <?= number_format(10000, 0, ',', '.') ?></td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#imagesModal">
                                        <i class="fa-regular fa-image"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit"
                                            class="btn btn-warning btn-sm edit-button"
                                            data-detail="<?= htmlspecialchars('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam modi rem fuga velit fugiat inventore eveniet, nulla consequuntur, neque iure, voluptate error. Optio animi reprehenderit soluta sunt inventore alias quibusdam.') ?>">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <form action="" method="post" class="form-delete d-inline-block">
                                            <button type="submit" class="btn btn-danger btn-sm delete-item">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="modal fade text-center" id="imagesModal" tabindex="-1" aria-labelledby="imagesLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Mie Ayam
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="carouselProductImages" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <?php for ($i = 0; $i < 3; $i++) : ?>
                                            <button type="button" data-bs-target="#carouselProductImages"
                                                data-bs-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>"
                                                aria-label="Slide <?= $i + 1 ?>"></button>
                                            <?php endfor; ?>
                                        </div>
                                        <div class="carousel-inner">
                                            <?php for ($i = 0; $i < 3; $i++) : ?>
                                            <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                                                <img src="<?= base_url('assets/static/images/macbook.png') ?>"
                                                    class="w-100" alt="products">
                                            </div>
                                            <?php endfor; ?>
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselProductImages" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselProductImages" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Product
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="form form-horizontal" id="form-product" method="post"
                                        enctype="multipart/form-data" action="">
                                        <div class="form-body">
                                            <div class="col-md-12 form-group">
                                                <label for="name">Name</label>
                                                <input type="text" id="name" class="form-control" name="name" required
                                                    value="Mie ayam">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label for="category">Category</label>
                                                <select class="form-control" name="category" id="category" required>
                                                    <option value="" disabled selected>--Select
                                                        Category--</option>
                                                    <option value="1">Food</option>
                                                    <option value="2">Drink</option>
                                                    <option value="3">Snack</option>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label for="detail">Detail Product</label>
                                                <textarea name="detail" id="summernote-product-"
                                                    class="summernote-product custom-summernote"><?= htmlspecialchars('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam modi rem fuga velit fugiat inventore eveniet, nulla consequuntur, neque iure, voluptate error. Optio animi reprehenderit soluta sunt inventore alias quibusdam.') ?></textarea>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label for="stock">Stock</label>
                                                <input type="int" id="stock" class="form-control" name="stock" required
                                                    value="100">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label for="weight">Weight</label>
                                                <input type="text" id="weight" class="form-control" name="weight"
                                                    required value="100 gr">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label for="price">Price</label>
                                                <input type="text" id="price" class="form-control price-product"
                                                    name="price" placeholder="Rp 100.000" required
                                                    value="Rp. <?= number_format(10000, 0, ',', '.') ?>">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label for="images">Images</label>
                                                <input type="file" class="multiple-files-filepond" name="images[]"
                                                    multiple />
                                            </div>
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
            </div>
            <div class="modal fade" id="tambahProducts" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Add Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form form-horizontal" id="form-product" method="post"
                                enctype="multipart/form-data" action="">
                                <div class="form-body">
                                    <div class="col-md-12 form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control" name="name" required>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" name="category" id="category" required>
                                            <option value="" disabled selected>--Select Category--</option>
                                            <option value="1">Food</option>
                                            <option value="2">Drink</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="detail">Detail Product</label>
                                        <textarea name="detail" class="summernote-product custom-summernote"></textarea>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="stock">Stock</label>
                                        <input type="int" id="stock" class="form-control" name="stock" required>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="weight">Weight</label>
                                        <input type="text" id="weight" class="form-control" name="weight" required>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="price">Price</label>
                                        <input type="text" id="price" class="form-control price-product" name="price"
                                            required>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="images">Images</label>
                                        <input type="file" class="multiple-files-filepond" name="images[]" multiple />
                                    </div>
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