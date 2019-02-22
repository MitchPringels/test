<?php
include_once "models/User_Table.class.php";
$loginFormSubmitted = isset( $_POST['log-in'] );
if( $loginFormSubmitted ) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userTable = new User_Table( $db );
    try {
        $un = $userTable->checkCredentials( $email, $password );
        $admin->login($un);
    } catch ( Exception $e ) {
            $banner = "";
            $banner = "<div>Are you SURE that you have made an account?</div>";
    }
}

$loggingOut = isset ( $_POST['logout'] );
if ( $loggingOut ){
    $admin->logout();
}

if ( $admin->isLoggedIn() ) {
    $view = include_once "views/user/logout.php";
} else {
    $view = include_once "views/user/login.php";
}

return $view;
