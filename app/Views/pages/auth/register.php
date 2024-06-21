<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
        <div class="card p-md-4 p-2 mx-2" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h2 class="text-start mb-5">Register</h2>
                <form>
                    <div class="mb-3">
                        <div class="row gy-3">
                            <div class="col-md-6 col-12">
                                <label for="firstname" class="form-label fw-semibold text-black">First Name</label>
                                <input type="text" class="form-control" id="firstname" placeholder="First Name">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="lastname" class="form-label fw-semibold text-black">Last Name</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-black">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="user@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold text-black">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="**********">
                    </div>
                    <div class="mb-5">
                        <label for="phone" class="form-label fw-semibold text-black">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" placeholder="081234567890">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-custom-auth mb-3">Register</button>
                        <small class="text-center">Already have an account? <a href="<?= base_url('login') ?>"
                                class="text-custom-auth">Log in</a>
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