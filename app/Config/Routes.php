<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.




$routes->get('/', 'Home::index');
$routes->get('explore', 'Home::explore');
$routes->get('blog', 'Home::blog');
$routes->get('blog/create', 'Home::blog/$1');
$routes->post('home/createBlog', 'Home::createBlog');
$routes->post('handle-login', 'Home::loginAttempt');
$routes->get('logout', 'Home::logout');



$routes->group('products', ["filter"=>"loginfilter"] , function ($routes) {
    $routes->get('', 'Product::index');
    $routes->post('', 'Product::save');
    $routes->put('', 'Product::update');
    $routes->get('categories', 'Product::categories');
    $routes->post('categories', 'Product::categorySave');
    $routes->put('categories', 'Product::categoryUpdate');
});

$routes->group('cart', function ($routes) {
    $routes->get('', 'Home::getCart');
    $routes->get('my-carts', 'Home::myCarts');
    $routes->get("info", "Home::cartInfo");
    $routes->get('add', 'Home::addToCart');
    $routes->get('remove', 'Home::removeFromCart');
    $routes->get('clear', 'Home::clearCart');
    $routes->post('checkout', 'Home::checkout');
});

$routes->group('orders', ["filter"=>"loginfilter"] , function ($routes) {
    $routes->get('', 'Home::orders');
    $routes->get('api-gateway-details', 'Home::apiGatewayDetails');
});

$routes->group('settings', ["filter"=>"loginfilter"] , function ($routes) {
    $routes->get('', 'Home::settings');
    $routes->post('', 'Home::saveSettings');
    $routes->post('update-password', 'Home::updatePassword');   
    $routes->post('save-email-template', 'Home::saveEmailTemplate');

});






/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
