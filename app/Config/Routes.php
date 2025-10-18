<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Authentication Routes
$routes->group('', ['namespace' => 'App\Controllers'], static function ($routes) {
    $routes->get('/', 'AuthController::login');
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::loginPost');
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::registerPost');
    $routes->get('logout', 'AuthController::logout', ['as' => 'logout']);
});

// Protected Routes (Requires Authentication)
$routes->group('', ['filter' => 'auth', 'namespace' => 'App\Controllers'], static function ($routes) {
    // Common routes for all authenticated users
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('announcements', 'Announcement::index');

    // Teacher routes
    $routes->group('teacher', static function ($routes) {
        $routes->get('dashboard', 'Teacher::dashboard');
    });
    // Admin routes
    $routes->group('admin', ['filter' => 'admin'], static function ($routes) {
        $routes->get('dashboard', 'Admin\Admin::dashboard');
    });
});
