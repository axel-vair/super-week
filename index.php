<?php
require_once 'vendor/autoload.php';
session_start();
use App\Controller\UserController;
use App\Controller\AuthController;
use App\Controller\BookController;
use App\Model\User;

$router = new AltoRouter();
$router->setBasePath('/super-week');

$router->map('GET', '/', function () {
    require_once 'src/View/home.php';
});

$router->map('GET', '/users', function () {
    $UserController = new UserController();
    $UserController->list();
});

$router->map('GET', '/user/[i:id]', function ($id) {
    $UserController = new UserController();
    $UserController->getUserById($id);
});

$router->map('GET', '/books/write', function () {
    require_once 'src/View/add_book.php';
});

$router->map('POST', '/books/write', function () {
    echo "ajoute un nouveau livre en bdd avec comme auteur l'utilisateur actuellement connecté";
    $BookController = new BookController();
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id_user = $_SESSION['id'];
    $BookController->insertBook($title, $content, $id_user);
});

$router->map('GET', '/books', function (){
    $BookController = new BookController();
    $BookController->getBooks();
});

$router->map('GET', '/books/[i:id]', function ($id){
    $BookController = new BookController();
    $BookController->getBookById($id);

});

$router->map('GET', '/logout', function (){
    $AuthController = new AuthController();
    $response = $AuthController->logout();
    require_once 'src/View/logout.php';
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
