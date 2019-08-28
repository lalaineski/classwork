<?php

require('vendor/autoload.php');

use aitsyd\Navigation;
use aitsyd\Account;

$nav = new Navigation();
$nav_items = $nav -> getNavigation();

// if request_method == post, user is submitting the register form
if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    //create instance of account class
    $account = new Account();
    $register = $account -> register($email,$password);
}
else{
    $register = '';
}

//create twig loader
//$loader = new \twig\loader\filesystemloader('templates')
$loader = new Twig_Loader_Filesystem('templates');

//create twig environment
//$twig = new \twig\environment($loader);
$twig = new Twig_Environment($loader);

//load a twig template
$template = $twig -> load('register.twig');

//pass value to twig
echo $template -> render([
    'navigation' => $nav_items,
    'title' => 'Register for an account',
    'response' => $register
]);
?>

?>