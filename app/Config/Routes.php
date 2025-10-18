<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Authentication
$routes->get('/', 'AuthController::login');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::loginPost');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::registerPost');
$routes->get('/logout', 'AuthController::logout', ['as' => 'logout']);

// Protected routes
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/dashboard', 'DashboardController::index');
    $routes->get('/profile', 'ProfileController::index');
    $routes->post('/profile', 'ProfileController::update');
    $routes->get('/courses', 'CoursesController::index');
    $routes->get('/grades', 'GradesController::index');
    $routes->get('/announcements', 'Announcement::index');
});

// Admin routes
$routes->group('admin', ['filter' => 'admin'], static function ($routes) {
    $routes->get('students', 'Admin\StudentsController::index');
    $routes->get('students/create', 'Admin\StudentsController::create');
    $routes->post('students/create', 'Admin\StudentsController::store');
    $routes->get('students/edit/(:num)', 'Admin\StudentsController::edit/$1');
    $routes->post('students/edit/(:num)', 'Admin\StudentsController::update/$1');
    $routes->get('students/delete/(:num)', 'Admin\StudentsController::delete/$1');
});
