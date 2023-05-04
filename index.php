<?php
require_once 'vendor/autoload.php';

use App\Controller\UserController;
use App\Controller\AuthController;
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

$router->map('GET', '/books/write', function () {
    echo "mon formulaire";
});

$router->map('POST', '/books/write', function () {
    echo "ajoute un nouveau livre en bdd avec comme auteur l'utilisateur actuellement connecté";
});

$router->map('GET', '/books', function (){
   echo "récupère les infos de tous les livres et les affiche au format JSOn";
});

$router->map('GET', '/books/[i:id]', function (){
    echo 'récupère les infos du livre avec lid précisé en paramètre et affiche au format json';
});

$router->map('GET', '/logout', function (){
    echo "déconnection";
});


$router->map('GET', '/register', function(){
    require_once 'src/View/register.php';
});

$router->map('POST', '/register', function (){
    $AuthController = new AuthController();

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $response = $AuthController->register($email, $firstname, $lastname, $password);
    echo json_encode($response);
});

$router->map('GET', '/login', function(){
    require_once 'src/View/login.php';
});

$router->map('POST', '/login', function (){
    $AuthController = new AuthController();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $response = $AuthController->connectionUser($email, $password);
    echo json_encode($response);
});


$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
}
