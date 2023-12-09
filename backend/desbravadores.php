<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


ini_set('display_errors', true);
error_reporting(E_ALL);

include_once 'config.php';
include_once 'Desbravador.php';

$database = new Database();
$db = $database->getConnection();

$desbravador = new Desbravador($db);

$requestMethod = $_SERVER["REQUEST_METHOD"];
switch($requestMethod) {
    case 'GET':
        if(!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $desbravador->getDesbravador($id);
        } else {
            $desbravador->getDesbravadores();
        }
        break;
    case 'POST':
        $desbravador->createDesbravador();
        break;
    case 'PUT':
        $desbravador->updateDesbravador();
        break;
    case 'DELETE':
        $desbravador->deleteDesbravador();
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
?>