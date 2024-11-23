<?php
require_once 'config/Database.php';
require_once 'controllers/AbsensiController.php';

$database = new Database();
$db = $database->getConnection();

$controller = new AbsensiController($db);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch($action) {
    case 'create':
        $controller->create();
        break;
    case 'checkout':
        $controller->checkout();
        break;
    default:
        $controller->index();
        break;
}