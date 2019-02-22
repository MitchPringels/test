<?php

class Admin_User {
    public function __construct(){
        session_start();
    }

    public function isLoggedIn(){
        $sessionIsSet = isset( $_SESSION['logged_in'] );
        if ( $sessionIsSet ) {
            $out = $_SESSION['logged_in'];
        } else {
            $out = false;
        }
        return $out;
    }

    public function login($un){
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $un;

    }

    public function logout(){
        $_SESSION['logged_in'] = false;
        $_SESSION['username'] = "";

    }
}
