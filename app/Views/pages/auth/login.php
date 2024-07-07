<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="shortcut icon" href="<?= base_url('assets/static/images/logo.jpg') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/static/css/auth.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.css') ?>">
</head>

<body>
    <nav class="navbar bg-white">
        <div class="container">
            <span class="navbar-brand fw-semibold fs-5">
                <span class="text-black">Parta.</span><span style="color: #F90A45;">Notebook</span>
            </span>
        </div>
    </nav>
    <div class="background-auth">
        <div class="card p-4 mx-2" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h2 class="text-start mb-5">Log in</h2>
                <form action="<?php echo base_url('/login'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-black">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="user@example.com" required>
                    </div>
                    <div class="mb-5">
                        <label for="password" class="form-label fw-semibold text-black">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="**********" required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <button type="submit" class="btn btn-custom-auth mb-3">Log in</button>
                        <small class="text-center">Don't have an account? <a href="<?= base_url('register') ?>"
                                class="text-custom-auth">Register</a>
                        </small>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/compiled/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script>
    const error = '<?= session()->getFlashdata('error') ?>';
    if (error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    }
    </script>
</body>

</html>