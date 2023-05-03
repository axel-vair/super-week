<?php
require_once 'vendor/autoload.php';

use App\Controller\UserController;
use App\Model\User;

$router = new AltoRouter();
$router->setBasePath('/super-week');

$router->map('GET', '/', function () {
    echo '<h1>Welcome on my index</h1>';
});

$router->map('GET', '/users', function () {
    echo '<h1>Welcome to me users list</h1>';
    $UserController = new UserController();
    $UserController->list();
});

$router->map('GET', '/users/[i:id]', function ($id) {
    echo '<h1>Welcome sur la page de l\'utilisateur ' . $id . '</h1>';
});

$router->map('GET', '/register', function(){
    require_once 'src/View/register.php';
});


$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
}
