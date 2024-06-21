<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <h3 class="text-black fw-semibold">Dashboard</h3>
    <p class="text-muted mb-0">General overview of your store</p>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-end">
                        <div class="col-12">
                            <p class="fw-medium text-black">Top Revenue</p>
                            <h5 class="fw-semibold">Rp. <?= number_format(100000000, 0, ',', '.') ?></h5>
                        </div>
                        <div class="col-12 text-end">
                            <img src="<?= base_url('assets/static/images/purple-line.png') ?>" alt="line">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-end">
                        <div class="col-12">
                            <p class="fw-medium text-black">Total Customers</p>
                            <h5 class="fw-semibold">100</h5>
                        </div>
                        <div class="col-12 text-end">
                            <img src="<?= base_url('assets/static/images/red-line.png') ?>" alt="line">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-end">
                        <div class="col-12">
                            <p class="fw-medium text-black">Total Orders</p>
                            <h5 class="fw-semibold">55</h5>
                        </div>
                        <div class="col-12 text-end">
                            <img src="<?= base_url('assets/static/images/green-line.png') ?>" alt="line">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-dark fw-semibold mb-3">Sales Analytics</div>
                    <canvas id="bar"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-dark fw-semibold mb-3">Top Sales</div>
                    <div class="d-flex justify-content-center align-items-center">
                        <canvas id="donut"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 5 transaksi terakhir -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="fw-semibold text-dark card-title mb-4">Latest Transactions</h6>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th data-priority="1">Invoice</th>
                                    <th>Customer</th>
                                    <th data-priority="2">Date</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>INV/20210801/1</td>
                                    <td>John Doe</td>
                                    <td>2021-08-01</td>
                                    <td>Rp. <?= number_format(1000000, 0, ',', '.') ?></td>
                                    <td>
                                        <span class="badge bg-warning">Pending</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>INV/20210801/2</td>
                                    <td>Jane Doe</td>
                                    <td>2021-08-01</td>
                                    <td>Rp. <?= number_format(2000000, 0, ',', '.') ?></td>
                                    <td>
                                        <span class="badge bg-success">Success</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>INV/20210801/3</td>
                                    <td>John Doe</td>
                                    <td>2021-08-01</td>
                                    <td>Rp. <?= number_format(3000000, 0, ',', '.') ?></td>
                                    <td>
                                        <span class="badge bg-danger">Canceled</span>
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

<script src="<?= base_url('assets/extensions/chart.js/chart.umd.js') ?>"></script>
<script>
let productNames = [
    "Product 1",
    "Product 2",
    "Product 3",
    "Product 4",
    "Product 5",
];
let productSales = [10, 20, 30, 40, 50];

const donut = document.getElementById("donut").getContext("2d");
const myDonut = new Chart(donut, {
    type: "doughnut",
    data: {
        labels: [...productNames],
        datasets: [{
            backgroundColor: [
                "#F90A45",
                "#0A45F9",
                "#F9BB0A",
                "#0AF9BB",
                "#BB0AF9",
            ],
            data: [...productSales],
            pointStyle: 'circle',
        }, ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        title: {
            display: false,
        },
        tooltips: {
            mode: "index",
            intersect: false,
        },
        plugins: {
            legend: {
                labels: {
                    usePointStyle: true,
                },
            },
        },
    },
});

const bar = document.getElementById("bar").getContext("2d");
const myBar = new Chart(bar, {
    type: "bar",
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
            "Dec",
        ],
        datasets: [{
            data: [65, 59, 80, 81, 56, 55, 40, 60, 70, 80, 90, 100],
            backgroundColor: "#F90A45",
        }, ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        title: {
            display: false,
        },
        tooltips: {
            mode: "index",
            intersect: false,
        },
        plugins: {
            legend: {
                display: false,
            },
        },
        scales: {
            x: {
                display: true,
                ticks: {
                    font: {
                        size: 10,
                    },
                },
            },
            y: {
                display: true,
                ticks: {
                    font: {
                        size: 11,
                    },
                },
            },
        },
    },
});
</script>

<?= $this->endSection(); ?>