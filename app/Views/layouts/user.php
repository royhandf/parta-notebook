<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/static/images/logo.jpg') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/static/css/custom.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/extensions/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/extensions/swiper/swiper-bundle.min.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightbox-bs5@1.8.3/dist/css/lightbox.min.css" />
</head>

<body>
    <?= $this->include('components/navbar'); ?>

    <?= $this->renderSection('content'); ?>

    <script src="<?= base_url('assets/compiled/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('assets/static/js/pages/swalfire.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/swiper/swiper-bundle.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightbox-bs5@1.8.3/dist/js/lightbox.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    <script>
        $(document).on('click', '.number-spinner button', function() {
            var btn = $(this),
                oldValue = btn.closest('.number-spinner').find('input').val().trim(),
                newVal = 0;

            if (btn.attr('data-dir') == 'up') {
                newVal = parseInt(oldValue) + 1;
            } else {
                if (oldValue > 1) {
                    newVal = parseInt(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            btn.closest('.number-spinner').find('input').val(newVal);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnSearch = document.querySelector('.btn-custom-search');

            function searchProducts(inputSearch) {
                const items = document.querySelectorAll('.list-products');
                items.forEach(item => {
                    const title = item.querySelector('.title-products').textContent.toLowerCase();
                    if (title.includes(inputSearch)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }
            btnSearch.addEventListener('click', function(event) {
                const inputSearch = document.querySelector('.input-search').value.toLowerCase().trim();

                if (inputSearch) {
                    if (window.location.pathname.includes('/products')) {
                        window.history.pushState({}, '', '/products?search=' + inputSearch);
                        searchProducts(inputSearch);
                    } else {
                        window.location.href = '/products?search=' + inputSearch;
                    }
                } else {
                    if (window.location.pathname.includes('/products')) {
                        window.history.pushState({}, '', '/products');
                        searchProducts('');
                    }
                }
            });

            if (window.location.pathname.includes('/products')) {
                const urlParams = new URLSearchParams(window.location.search);
                const storedSearchQuery = urlParams.get('search');
                if (storedSearchQuery) {
                    searchProducts(storedSearchQuery);
                    const inputSearch = document.querySelector('.input-search');
                    inputSearch.value = storedSearchQuery;
                }
            }
        });
    </script>

    <script>
        const swiperReferences = new Swiper(".referenceProducts", {
            slidesPerView: 5,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                576: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                320: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
            },
        });

        const swiperNewArrival = new Swiper(".newArrival", {
            slidesPerView: 5,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                576: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                320: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
            },
        });

        const swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 'auto',
            freeMode: true,
            watchSlidesProgress: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });

        const swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>

    <script>
$(document).ready(function() {
    // Initialize Swiper
    var swiper = new Swiper('.mySwiper2', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    var swiperThumbs = new Swiper('.mySwiper', {
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });

    // Initialize Lightbox-BS5
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    });
    
    // Prevent default action for Swiper navigation buttons
    $('.swiper-button-next, .swiper-button-prev').on('click', function(e) {
    e.preventDefault();
    });
});
</script>

    <script>
        function deleteItem() {
            document.querySelector('.delete-form').submit();
        }
    </script>

<script>
        $(document).ready(function() {
            const rupiahToNumeric = (rupiah) => {
                const numericString = rupiah.replace(/[^\d]/g, '');
                const numericValue = parseFloat(numericString);

                return numericValue;
            }

            $('#collapsePrice').on('input', 'input[type="text"]', function(e) {
                const input = $(this).val()
                const numericValue = rupiahToNumeric(input)
                $(this).val(`${numericValue.toLocaleString('id-ID')}`)
                if (isNaN(numericValue)) {
                    $(this).val('0')
                }
            })

            $('#apply').click(function(e) {
                e.preventDefault()
                const base_url = `<?= base_url() ?>`
                const url = `${base_url}product-filter`
                const category = $('#collapseCategories input[type="radio"]:checked').val();
                const rating = $('#collapseRating input[type="radio"]:checked').val();
                const minimum = rupiahToNumeric($('input[name="price-minimum"]').val());
                const maximum = rupiahToNumeric($('input[name="price-maximum"]').val());


                if (category && rating && minimum && maximum) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            category,
                            rating,
                            price_min: minimum,
                            price_max: maximum
                        },
                        success: function(response) {
                            const newProducts = (product) => {
                                return `
                                <div class="col-md-4 col-6 list-products">
                                <a href="/detail-product/${product.id}">
                                    <div class="card shadow">
                                        <div class="card-content">
                                            <img src="${product.images != null ? base_url + 'uploads/img-product/' + product.images.image : base_url + 'assets/static/images/product.png'}"
                                                class="card-img-top p-3" alt="product" style="background: #f5f5f5" />
                                            <div class="card-body px-3">
                                                <p class="fw-semibold mb-2 text-truncate title-products">
                                                ${product.nama_produk}
                                                </p>
                                                <div class="d-flex mb-2 align-items-center" style="font-size:10px">
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <span class="text-muted ms-1" style="font-size:10px">(${product.rating})</span>
                                                </div>
                                                <p class="fw-semibold text-custom-red fs-custom-references mb-0">
                                                    Rp. ${product.harga}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                                `
                            }
                            if (response.products.length == 0) {
                                $('#product-body').empty();
                            }
                            $('.list-products').empty();
                            response.products.forEach((product, index) => {
                                $('#product-body').prepend(newProducts(product))
                            })
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });
        });
    </script>


    <?php if (session()->getFlashdata('success')) : ?>
        <script>
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "<?= session()->getFlashdata('success') ?>",
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "<?= session()->getFlashdata('error') ?>",
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>
</body>

</html>