<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="fw-semibold text-dark">Sales Report</h3>
                <p class="text-subtitle text-muted">
                    A report of all sales transactions
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Reports
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-md-8 col-10">
                        <h5 class="card-title fw-medium text-dark">Sales Table</h5>
                    </div>
                    <div class="col-md-4 col-12">
                        <div id="reportrange" style="cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; ">
                            <i class="fa-regular fa-calendar"></i>&nbsp;
                            <span></span> <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table2" class="display nowrap table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>No. Order</th>
                                <th>Product Sold</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            foreach ($transactions as $transaction) { ?>
                            <tr>
                                <td> <?= $no++ ?></td>
                                <td><?= $transaction->date ?></td>
                                <td><?= $transaction->kode_transaksi ?></td>
                                <td><?= $transaction->total_qty?></td>
                                <td><?= $transaction->total_price ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let start = moment();
    let end = moment();

    // Get startDate and endDate from URL parameters if they exist
    const urlParams = new URLSearchParams(window.location.search);
    const startDateParam = urlParams.get('startDate');
    const endDateParam = urlParams.get('endDate');

    if (startDateParam && endDateParam) {
        start = moment(startDateParam);
        end = moment(endDateParam);
    }

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                .endOf('month')
            ]
        },
        showCustomRangeLabel: false
    }, cb);

    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        window.location.href = '/dashboard/reports?startDate=' + picker.startDate.format('YYYY-MM-DD') +
            '&endDate=' + picker.endDate.format('YYYY-MM-DD');
    });

    cb(start, end);
});
</script>

<?= $this->endSection(); ?>