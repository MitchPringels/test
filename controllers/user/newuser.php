<?php
include_once "models/User_Table.class.php";
$userTable = new User_Table($db);

$newUser = isset( $_POST['register'] );
if($newUser) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id = $userTable->create($email, $password);

    $un = $userTable->checkCredentials( $email, $password );
    $admin->login($un);
    header('Location: index.php');
}
else {
    $register = include_once "views/user/register.php";
    return $register;
}
