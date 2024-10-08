<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row gy-4 justify-content-center">
        <div class="col-md-12 col-11">
            <div class="px-md-5 px-4 py-4 bg-white rounded-4 shadow-sm">
                <h2 class="text-black fw-semibold mb-3">My Profile</h2>
                <p class="text-black">Manage your profile information to control, protect and secure your account</p>

                <hr>

                <form action="<?= base_url('/account')?>" method="post">
                    <div class="row align-items-center mb-3">
                        <div class="col-md-3 col-5">
                            <label for="name" class="form-label">Full Name</label>
                        </div>
                        <div class="col-md-9 col-7">
                            <input type="text" class="form-control border-dark border-opacity-25" id="nama" name="nama" value="<?= $user->nama_lengkap ?>"
                                placeholder="Nama lengkap...">
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-md-3 col-5">
                            <label for="email" class="form-label">Email</label>
                        </div>
                        <div class="col-md-9 col-7">
                            <input type="email" class="form-control border-dark border-opacity-25" id="email" name="email" value="<?= $user->email ?>"
                                placeholder="Insert your email">
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-md-3 col-5">
                            <label for="phone" class="form-label">Phone Number</label>
                        </div>
                        <div class="col-md-9 col-7">
                            <input type="text" class="form-control border-dark border-opacity-25" id="no_telp" name="no_telp" value="<?= $user->no_telp ?>"
                                placeholder="Insert your phone number">
                        </div>
                    </div>
                    <div class="row align-items-center mb-4">
                        <div class="col-md-3 col-5">
                            <label for="address" class="form-label">Address</label>
                        </div>
                        <div class="col-md-9 col-7">
                            <input type="text" class="form-control border-dark border-opacity-25" id="alamat" name="alamat" value="<?= $user->alamat ?>"
                                placeholder="Contoh: Jl. Mawar No.3, Kec. Bunga (hanya sampai kecamatan)">
                        </div>
                    </div>
                    <div class="row align-items-center mb-4">
                        <div class="col-md-3 col-5">
                            <label for="city" class="form-label">Kota/Kabupaten</label>
                        </div>
                        <div class="col-md-9 col-7">
                        <select class="form-control select2 border-dark border-opacity-25" id="kota_id" name="kota_id">
                            <option value="">Pilih Kota/Kabupaten</option>
                            <?php foreach ($kota->rajaongkir->results as $city): ?>
                                <option value="<?= $city->city_id ?>" <?= $user->kota_id == $city->city_id ? 'selected' : '' ?>>
                                <?= $city->type ?> <?= $city->city_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                    <div class="row align-items-center mb-4">
                        <div class="col-md-3 col-5">
                            <label for="province" class="form-label">Provinsi</label>
                        </div>
                        <div class="col-md-9 col-7">
                        <select class="form-control select2 border-dark border-opacity-25" id="provinsi_id" name="provinsi_id">
                            <option value="">Pilih Provinsi</option>
                            <?php foreach ($provinsi->rajaongkir->results as $province): ?>
                                <option value="<?= $province->province_id ?>" <?= $user->provinsi_id == $province->province_id ? 'selected' : '' ?>>
                                <?= $province->province ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                    <div class="row align-items-center mb-4">
                        <div class="col-md-3 col-5">
                            <label for="postal_code" class="form-label">Kode Pos</label>
                        </div>
                        <div class="col-md-9 col-7">
                            <input type="text" class="form-control border-dark border-opacity-25" id="kodepos" name="kodepos" value="<?= $user->kode_pos ?>"
                                placeholder="Insert your postal code">
                        </div>
                    </div>
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
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

                <form action="<?= base_url('/change-password')?>" method="POST">
                    <div class="row align-items-center mb-3">
                        <div class="col-md-3 col-5">
                            <label for="old-password" class="form-label">Old Password</label>
                        </div>
                        <div class="col-md-9 col-7">
                            <input type="password" class="form-control border-dark border-opacity-25" id="old-password" name="old-password"
                                value="" placeholder="********">
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-md-3 col-5">
                            <label for="new-password" class="form-label">New Password</label>
                        </div>
                        <div class="col-md-9 col-7">
                            <input type="password" class="form-control border-dark border-opacity-25" id="new-password" name="new-password"
                                value="" placeholder="********">
                        </div>
                    </div>
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <div class="text-end">
                        <button type="submit" class="btn btn-custom-submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>