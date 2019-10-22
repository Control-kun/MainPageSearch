<?php
declare(strict_types=1);

use App\Core\Route;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$router = new Route();

$router->run();

$db = new \App\Core\Db();
?>

