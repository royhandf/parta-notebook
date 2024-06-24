<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/static/images/logo.jpg') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/static/css/custom.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/extensions/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/extensions/swiper/swiper-bundle.min.css') ?>">
</head>

<body>
    <?= $this->include('components/navbar'); ?>

    <?= $this->renderSection('content'); ?>

    <script src="<?= base_url('assets/compiled/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/swiper/swiper-bundle.min.js') ?>"></script>

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
    <?php if (session()->getFlashdata('success')) : ?>
    Swal.fire({
        icon: "success",
        title: "Success!",
        text: "<?= session()->getFlashdata('success') ?>",
        confirmButtonText: 'OK'
    });
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
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