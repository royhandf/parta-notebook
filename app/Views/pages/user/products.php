<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row gy-4 justify-content-center mb-4">
        <div class="col-md-9 col-11">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <div class="d-flex gap-1 justify-content-between align-items-start mb-4">
                    <div>
                        <h2 class="text-black fw-semibold text-custom-heading mb-3">Catalog All Products</h2>
                        <p class="text-black fs-custom-paragraph mb-0">
                            These products has been approved by our best experts
                        </p>
                    </div>
                    <span class="d-md-none d-inline">
                        <a href="#toggleFilter" role="button" data-bs-toggle="modal" data-bs-target="#toggleFilter">
                            <i class="fa-solid fa-filter"></i>
                        </a>
                    </span>

                    <div class="modal fade" id="toggleFilter" tabindex="-1" aria-labelledby="toggleFilterLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold text-black" id="toggleFilterLabel">Filter</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="">
                                        <div class="mb-3">
                                            <button class="btn btn-outline-light btn-block text-start" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseCategories"
                                                aria-expanded="false" aria-controls="collapseCategories">
                                                Category
                                            </button>
                                            <ul id="collapseCategories" class="collapse list-unstyled mt-2">
                                                <?php  foreach ($categories as $category) : ?>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="category"
                                                            value="<?= $category->id ?>" id="<?= $category->id ?>">
                                                        <label class="form-check-label" for="<?= $category->id ?>">
                                                            <?= $category->nama_kategori ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>

                                        <!-- RATING -->
                                        <div class="mb-3">
                                            <button class="btn btn-outline-light btn-block text-start" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseRating"
                                                aria-expanded="false" aria-controls="collapseRating">
                                                Rating
                                            </button>
                                            <ul id="collapseRating" class="collapse list-inline mt-2">
                                                <li class="list-inline-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="rating"
                                                            value="1" id="rating1">
                                                        <label class="form-check-label" for="rating1">1</label>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="rating"
                                                            value="2" id="rating2">
                                                        <label class="form-check-label" for="rating2">2</label>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="rating"
                                                            value="3" id="rating3">
                                                        <label class="form-check-label" for="rating3">3</label>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="rating"
                                                            value="4" id="rating4">
                                                        <label class="form-check-label" for="rating4">4</label>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="rating"
                                                            value="5" id="rating5">
                                                        <label class="form-check-label" for="rating5">5</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- HARGA -->
                                        <div class="mb-3">
                                            <button class="btn btn-outline-light btn-block text-start" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapsePrice"
                                                aria-expanded="false" aria-controls="collapsePrice">
                                                Price
                                            </button>
                                            <div id="collapsePrice" class="collapse mt-2">
                                                <div class="input-group input-group-sm flex-nowrap mb-2">
                                                    <span class="input-group-text" id="price-minimum">Rp</span>
                                                    <input type="text" class="form-control" name="price-minimum"
                                                        placeholder="Harga Minimum">
                                                </div>
                                                <div class="input-group input-group-sm flex-nowrap mb-2">
                                                    <span class="input-group-text" id="price-maximum">Rp</span>
                                                    <input type="text" class="form-control" name="price-maximum"
                                                        placeholder="Harga Maksimum">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-custom-submit btn-block" type="submit" id="apply">
                                                Apply
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <?php foreach ($products as $product) { ?>
                    <div class="col-md-4 col-6 list-products">
                        <a href="<?= base_url('/detail-product/'. $product->id) ?>">
                            <div class="card shadow">
                                <div class="card-content">
                                    <img src="<?= $product->images != null ? base_url('uploads/img-product/' . $product->images->image) : base_url('assets/static/images/product.png') ?>"
                                        class="card-img-top p-3" alt="product" style="background: #f5f5f5" />
                                    <div class="card-body px-3">
                                        <p class="fw-semibold mb-2 text-truncate title-products">
                                        <?= $product->nama_produk ?>
                                        </p>
                                        <div class="d-flex mb-2 align-items-center" style="font-size:10px">
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <span class="text-muted ms-1" style="font-size:10px">(<?= $product->rating ?>)</span>
                                        </div>
                                        <p class="fw-semibold text-custom-red fs-custom-references mb-0">
                                            Rp. <?= number_format($product->harga, 0, ',', '.') ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>

                    <!-- PER PAGE ISI 12 PRODUK -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm justify-content-center">
                            <li class="page-item <?= $currentPage == 1 ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $currentPage - 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?= $currentPage == $i ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item <?= $currentPage == $totalPages ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $currentPage + 1 ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-4 bg-white rounded-4 shadow-sm d-md-block d-none">
                <h5 class="fw-bold text-black mb-4">Filter</h5>
                <!-- KATEGORI -->
                <form action="">
                    <div class="mb-3">
                        <button class="btn btn-outline-light btn-block text-start" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false"
                            aria-controls="collapseCategories">
                            Category
                        </button>
                        <ul id="collapseCategories" class="collapse list-unstyled mt-2">
                        <?php foreach ($categories as $category) : ?>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category"
                                        value="<?= $category->id ?>" id="<?= $category->id ?>">
                                    <label class="form-check-label" for="<?= $category->id ?>">
                                        <?= $category->nama_kategori ?>
                                    </label>
                                </div>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- RATING -->
                    <div class="mb-3">
                        <button class="btn btn-outline-light btn-block text-start" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseRating" aria-expanded="false"
                            aria-controls="collapseRating">
                            Rating
                        </button>
                        <ul id="collapseRating" class="collapse list-inline mt-2">
                            <li class="list-inline-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" value="1" id="rating1">
                                    <label class="form-check-label" for="rating1">1</label>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" value="2" id="rating2">
                                    <label class="form-check-label" for="rating2">2</label>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" value="3" id="rating3">
                                    <label class="form-check-label" for="rating3">3</label>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" value="4" id="rating4">
                                    <label class="form-check-label" for="rating4">4</label>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" value="5" id="rating5">
                                    <label class="form-check-label" for="rating5">5</label>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- HARGA -->
                    <div class="mb-3">
                        <button class="btn btn-outline-light btn-block text-start" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapsePrice" aria-expanded="false"
                            aria-controls="collapsePrice">
                            Price
                        </button>
                        <div id="collapsePrice" class="collapse mt-2">
                            <div class="input-group input-group-sm flex-nowrap mb-2">
                                <span class="input-group-text" id="price-minimum">Rp</span>
                                <input type="text" class="form-control" name="price-minimum"
                                    placeholder="Harga Minimum">
                            </div>
                            <div class="input-group input-group-sm flex-nowrap mb-2">
                                <span class="input-group-text" id="price-maximum">Rp</span>
                                <input type="text" class="form-control" name="price-maximum"
                                    placeholder="Harga Maksimum">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-custom-submit btn-block" type="submit" id="apply">
                            Apply
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>