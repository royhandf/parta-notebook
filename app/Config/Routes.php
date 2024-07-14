<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Home;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\CategoryController;
use App\Controllers\ProductController;
use App\Controllers\SettingController;
use App\Controllers\TransactionController;
use App\Controllers\ReportController;
use App\Controllers\ReviewController;

/**
 * @var RouteCollection $routes
 */

 $routes->setAutoRoute(true);
 $routes->get('/login', [AuthController::class, 'index'], ['filter' => 'islogin']);
 $routes->post('/login', [AuthController::class, 'authenticate']);
 $routes->get('/register', [AuthController::class, 'register']);
 $routes->post('/register', [AuthController::class, 'store']);
 $routes->get('/logout', [AuthController::class, 'logout']);

$routes->get('/account', [Home::class, 'account']);
$routes->post('/account', [Home::class, 'updateAccount']);
$routes->post('/change-password', [Home::class, 'updatePassword']);

$routes->get('/', [Home::class, 'index']);
$routes->get('/products', [Home::class, 'products']);
$routes->get('/detail-product/(:segment)', [Home::class, 'detailProduct']);
$routes->get('/product-filter', [Home::class, 'filterProduct']);

$routes->get('/cek-kota', [Home::class, 'responseCity']);
$routes->get('/cek-provinsi', [Home::class, 'responseProvince']);
$routes->get('/cek-ongkir', [Home::class, 'responseCost']);

$routes->group('/', ['filter' => 'customer'], function ($routes) {
    $routes->post('add-to-cart/(:segment)', [Home::class, 'addCart']);
    $routes->get('cart',  [Home::class, 'cart']);
    $routes->post('cart/update/(:segment)', [Home::class, 'updateCart']);
    $routes->post('cart/delete/(:segment)', [Home::class, 'deleteCart']);
    $routes->get('check-cart', [Home::class, 'checkCart']);
    $routes->get('checkout', [Home::class, 'checkout']);
    $routes->post('checkout', [Home::class, 'storeTransaction']);
    $routes->get('payment', [Home::class, 'payment']);
    $routes->get('verify-payment', [Home::class, 'verifyWhatsapp']);
    $routes->post('cancel-payment/(:segment)', [Home::class, 'cancelPayment']);
    $routes->get('feedback', [Home::class, 'feedback']);
    $routes->post('feedback', [Home::class, 'storeFeedback']);
    $routes->get('detail-transaction/(:segment)', [Home::class, 'detailTransaction']);
});

$routes->get('/dashboard', [DashboardController::class, 'index'], ['filter' => 'admin']);

$routes->get('/dashboard/settings', [SettingController::class, 'index'], ['filter' => 'admin']);
$routes->post('/dashboard/settings/update/(:segment)', [SettingController::class, 'update'], ['filter' => 'admin']);

$routes->group('dashboard/categories', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', [CategoryController::class, 'index']);
    $routes->post('create', [CategoryController::class, 'store']);
    $routes->post('update/(:segment)', [CategoryController::class, 'update']);
    $routes->post('delete/(:segment)', [CategoryController::class, 'delete']);
});

$routes->group('dashboard/products', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', [ProductController::class, 'index']);
    $routes->post('create', [ProductController::class, 'store']);
    $routes->post('update/(:segment)', [ProductController::class, 'update']);
    $routes->post('delete/(:segment)', [ProductController::class, 'delete']);
});

$routes->group('dashboard/transactions', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', [TransactionController::class, 'index']);
    $routes->post('update/(:segment)', [TransactionController::class, 'update']);
    $routes->post('delete/(:segment)', [TransactionController::class, 'delete']);
});

$routes->get('/dashboard/reports', [ReportController::class, 'index'], ['filter' => 'admin']);
$routes->get('/dashboard/reviews', [ReviewController::class, 'index'], ['filter' => 'admin']);
