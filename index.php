<?php
session_start();

use KPO\Controllers\Conditions;
use KPO\Controllers\Formats;
use KPO\Controllers\Modules;
use KPO\Controllers\Pages;
use KPO\Controllers\Shelves;
use KPO\Controllers\Users;

/*
 |--------------------------------------------------------------------------
 | Base Site URL
 |--------------------------------------------------------------------------
 */
const BASE_URL = 'http://localhost:8000';

/*
 |--------------------------------------------------------------------------
 | Environment
 |--------------------------------------------------------------------------
 */
const ENVIRONMENT = 'development';

/*
 |--------------------------------------------------------------------------
 | With database
 |--------------------------------------------------------------------------
 */
const WITH_DATABASE = true;

/*
 |--------------------------------------------------------------------------
 | Autoload files
 |--------------------------------------------------------------------------
 */
require_once __DIR__ . '/controllers/Controller.php';
require_once __DIR__ . '/models/Model.php';

foreach (glob(__DIR__ . '/system/helpers/*.php') as $file) {
    require_once $file;
}

foreach (glob(__DIR__. '/system/classes/*.php') as $file) {
    require_once $file;
}

foreach (glob(__DIR__ . '/helpers/*.php') as $file) {
    require_once $file;
}

foreach (glob(__DIR__. '/controllers/*.php') as $file) {
    if (basename($file) !== 'Controller.php') {
        require_once $file;
    }
}

foreach (glob(__DIR__. '/models/*.php') as $file) {
    if (basename($file) !== 'Model.php') {
        require_once $file;
    }
}

/*
 |--------------------------------------------------------------------------
 | Language constant
 |--------------------------------------------------------------------------
 */
define('LANG', get_language());

/*
 |--------------------------------------------------------------------------
 | Routing
 |--------------------------------------------------------------------------
 */
$routeFound = router('', static function() {
    $pagesInstance = new Pages();
    $pagesInstance->login();
});

$routeFound = router('login', static function() {
    $pagesInstance = new Pages();
    $pagesInstance->login();
}) || $routeFound;

$routeFound = router('logout', static function() {
    $pagesInstance = new Pages();
    $pagesInstance->logout();
}) || $routeFound;

$routeFound = router('dashboard', static function() {
    $pagesInstance = new Pages();
    $pagesInstance->dashboard();
}) || $routeFound;

########################################################################################################################
# Condition related routs ##############################################################################################
########################################################################################################################
$routeFound = router('conditions', static function() {
    $conditionsInstance = new Conditions();
    $conditionsInstance->index();
}) || $routeFound;

$routeFound = router('create-condition', static function() {
    $conditionsInstance = new Conditions();
    $conditionsInstance->create();
}) || $routeFound;

$routeFound = router('edit-condition/:id', static function($id) {
    $conditionsInstance = new Conditions();
    $conditionsInstance->edit($id);
}) || $routeFound;

$routeFound = router('show-condition/:id', static function($id) {
    $conditionsInstance = new Conditions();
    $conditionsInstance->show($id);
}) || $routeFound;

$routeFound = router('delete-condition/:id', static function($id) {
    $conditionsInstance = new Conditions();
    $conditionsInstance->delete($id);
}) || $routeFound;

########################################################################################################################
# Format related routs #################################################################################################
########################################################################################################################
$routeFound = router('formats', static function() {
    $formatsInstance = new Formats();
    $formatsInstance->index();
}) || $routeFound;

$routeFound = router('create-format', static function() {
    $formatsInstance = new Formats();
    $formatsInstance->create();
}) || $routeFound;

$routeFound = router('edit-format/:id', static function($id) {
    $formatsInstance = new Formats();
    $formatsInstance->edit($id);
}) || $routeFound;

$routeFound = router('show-format/:id', static function($id) {
    $formatsInstance = new Formats();
    $formatsInstance->show($id);
}) || $routeFound;

$routeFound = router('delete-format/:id', static function($id) {
    $formatsInstance = new Formats();
    $formatsInstance->delete($id);
}) || $routeFound;

########################################################################################################################
# Modul related routs ##################################################################################################
########################################################################################################################
$routeFound = router('modules', static function() {
    $modulesInstance = new Modules();
    $modulesInstance->index();
}) || $routeFound;

########################################################################################################################
# Shelf related routs ##################################################################################################
########################################################################################################################
$routeFound = router('shelves', static function() {
    $shelvesInstance = new Shelves();
    $shelvesInstance->index();
}) || $routeFound;

$routeFound = router('create-shelf', static function() {
    $shelvesInstance = new Shelves();
    $shelvesInstance->create();
}) || $routeFound;

$routeFound = router('show-shelf/:id', static function($id) {
    $shelvesInstance = new Shelves();
    $shelvesInstance->show($id);
}) || $routeFound;

$routeFound = router('edit-shelf/:id', static function($id) {
    $shelvesInstance = new Shelves();
    $shelvesInstance->edit($id);
}) || $routeFound;

$routeFound = router('delete-shelf/:id', static function($id) {
    $shelvesInstance = new Shelves();
    $shelvesInstance->delete($id);
}) || $routeFound;

########################################################################################################################
# User related routs ###################################################################################################
########################################################################################################################
$routeFound = router('users', static function() {
    $usersInstance = new Users();
    $usersInstance->index();
}) || $routeFound;

$routeFound = router('create-user', static function() {
    $usersInstance = new Users();
    $usersInstance->create();
}) || $routeFound;

$routeFound = router('show-user/:id', static function($id) {
    $usersInstance = new Users();
    $usersInstance->show($id);
}) || $routeFound;

$routeFound = router('edit-user/:id', static function($id) {
    $usersInstance = new Users();
    $usersInstance->edit($id);
}) || $routeFound;

$routeFound = router('change-user-status/:id', static function($id) {
    $usersInstance = new Users();
    $usersInstance->change_status($id);
}) || $routeFound;

$routeFound = router('delete-user/:id', static function($id) {
    $usersInstance = new Users();
    $usersInstance->delete((int)$id);
}) || $routeFound;

########################################################################################################################
# Error related routs ##################################################################################################
########################################################################################################################
if (!$routeFound) {
    header("HTTP/1.0 404 Not Found");
    $pagesInstance = new Pages();
    $pagesInstance->error_404();
    exit();
}