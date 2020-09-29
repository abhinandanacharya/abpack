<?php
use \Abpackage\login\Login;
require __DIR__ . '/vendor/autoload.php';
$obj = new Login('localhost','root','','advdb');
$obj->login_auth('admin',$fields=array('username','password'),$redirector=array('ok','oops'));


?>