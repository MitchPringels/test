<?php
include_once "models/User_Table.class.php";
$usertable = new User_Table( $db );

$page="profile";

$isaction = isset($_GET['action']);
if ($isaction) {
    $action = $_GET['action'];
    if ($action == 'update') {
        $user_id = $_GET['id'];
        $singleuser = $usertable->readone($user_id);
        $output = include_once "views/profile/update.php";
    } else if ($action == 'delete') {
        $user_id = $_GET['id'];
        $usertable->delete($user_id);
        $admin->logout();
        header('Location: index.php');
    }else {
        header('Location: index.php');
    }
    return $output;
} else {
    $updateFormData = isset($_POST['update']);
    if ($updateFormData) {
        $user_id = $_POST['id'];
        $username= $_POST['username'];
        $email = $_POST['email'];
        $usertable->update($user_id, $username, $email);
        header('Location: index.php?page=profile&action=detail&amp');
    }
    else{
      header('Location: index.php');
    }
}
