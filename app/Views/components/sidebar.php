<div id="sidebar">
    <div class="sidebar-wrapper active shadow-sm">
        <div class="sidebar-header position-relative">
            <div class="container-fluid text-center">
                <a href="/">
                    <img class="w-75 h-75" src="<?= base_url('assets/static/images/logo.jpg') ?>" alt="Logo" />
                </a>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item <?= $title == 'Dashboard' ? 'active' : '' ?>">
                    <a href="/dashboard" class="sidebar-link fw-medium text-black">
                        <i class="fa-solid fa-house"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $title == 'Settings' ? 'active' : '' ?>">
                    <a href="/dashboard/settings" class="sidebar-link fw-medium text-black">
                        <i class="fa-solid fa-cog"></i> <span>Settings</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $title == 'Categories' ? 'active' : '' ?>">
                    <a href="/dashboard/categories" class="sidebar-link fw-medium text-black">
                        <i class="fa-solid fa-list"></i><span>Categories</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $title == 'Products' ? 'active' : '' ?>">
                    <a href="/dashboard/products" class="sidebar-link fw-medium text-black">
                        <i class="fa-solid fa-box me-1"></i><span>Products</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $title == 'Transactions' ? 'active' : '' ?>">
                    <a href="/dashboard/transactions" class="sidebar-link fw-medium text-black">
                        <i class="fa-solid fa-exchange-alt"></i> <span>Transactions</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $title == 'Reports' ? 'active' : '' ?>">
                    <a href="/dashboard/reports" class="sidebar-link fw-medium text-black">
                        <i class="fa-solid fa-chart-line"></i> <span>Reports</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $title == 'Reviews' ? 'active' : '' ?>">
                    <a href="/dashboard/reviews" class="sidebar-link fw-medium text-black">
                        <i class="fa-regular fa-star"></i> <span>Reviews</span>
                    </a>
                </li>
                <hr>
                <li class="sidebar-item">
                    <a href="/logout" class="sidebar-link fw-medium text-black">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>