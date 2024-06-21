<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Home;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\CategoryController;
use App\Controllers\ProductController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Home::class, 'index']);
$routes->get('/login', [AuthController::class, 'index']);

$routes->get('/register', [AuthController::class, 'register']);

$routes->get('/cart', [Home::class, 'cart']);

$routes->get('/dashboard', [DashboardController::class, 'index']);
$routes->get('/dashboard/categories', [CategoryController::class, 'index']);
$routes->get('/dashboard/products', [ProductController::class, 'index']);
