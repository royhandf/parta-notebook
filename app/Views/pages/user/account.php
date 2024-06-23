<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row gy-4 justify-content-center">
        <div class="col-md-12 col-11">
            <div class="px-md-5 px-4 py-4 bg-white rounded-4 shadow-sm">
                <h2 class="text-black fw-semibold mb-3">My Profile</h2>
                <p class="text-black">Manage your profile information to control, protect and secure your account</p>

                <hr>

                <form action="" method="">
                    <div class="row align-items-center mb-3">
                        <div class="col-md-3 col-5">
                            <label for="username" class="form-label">Username</label>
                        </div>
                        <div class="col-md-9 col-7">
                            <input type="text" class="form-control border-dark border-opacity-25" id="username" value=""
                                placeholder="Insert your username">
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-md-3 col-5">
                            <label for="name" class="form-label">Name</label>
                        </div>
                        <div class="col-md-9 col-7">
                            <input type="text" class="form-control border-dark border-opacity-25" id="name" value=""
                                placeholder="Insert your name">
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-md-3 col-5">
                            <label for="email" class="form-label">Email</label>
                        </div>
                        <div class="col-md-9 col-7">
                            <input type="email" class="form-control border-dark border-opacity-25" id="email" value=""
                                placeholder="Insert your email">
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-md-3 col-5">
                            <label for="phone" class="form-label">Phone Number</label>
                        </div>
                        <div class="col-md-9 col-7">
                            <input type="text" class="form-control border-dark border-opacity-25" id="phone" value=""
                                placeholder="Insert your phone number">
                        </div>
                    </div>
                    <div class="row align-items-center mb-4">
                        <div class="col-md-3 col-5">
                            <label for="address" class="form-label">Address</label>
                        </div>
                        <div class="col-md-9 col-7">
                            <input type="text" class="form-control border-dark border-opacity-25" id="address" value=""
                                placeholder="Insert your address">
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-custom-submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-12 col-11">
            <div class="px-md-5 px-4 py-4 bg-white rounded-4 shadow-sm">
                <h2 class="text-black fw-semibold mb-3">Change My Password</h2>
                <p class="text-black">Manage your password to protect and secure your account</p>

                <hr>

                <form action="" method="">
                    <div class="row align-items-center mb-3">
                        <div class="col-md-3 col-5">
                            <label for="old-password" class="form-label">Old Password</label>
                        </div>
                        <div class="col-md-9 col-7">
                            <input type="password" class="form-control border-dark border-opacity-25" id="old-password"
                                value="" placeholder="********">
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-md-3 col-5">
                            <label for="new-password" class="form-label">New Password</label>
                        </div>
                        <div class="col-md-9 col-7">
                            <input type="password" class="form-control border-dark border-opacity-25" id="new-password"
                                value="" placeholder="********">
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-md-3 col-5">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                        </div>
                        <div class="col-md-9 col-7">
                            <input type="password" class="form-control border-dark border-opacity-25"
                                id="confirm-password" value="" placeholder="********">
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-custom-submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>