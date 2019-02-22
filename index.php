<?php
  include_once "models/Page_Data.class.php";
  $pageData = new Page_Data();
  $pageData->title = "Paymo to Google Sheets";
  $pageData->addStylesheet("css/style.css");  
  $pageData->addJavaScript("js/script.js");

  $banner="";
  $dbInfo = "mysql:host=localhost;dbname=paymotosheets";
  $dbUser = "root";
  $dbpassword = "";
  $db = new PDO( $dbInfo, $dbUser, $dbpassword );
  $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

  include_once "models/Admin_User.class.php";
	$admin = new Admin_User();
  $logininfo = include_once "controllers/user/login.php";

  if ( $admin->isLoggedIn() ) {
      $pageData->content = include_once "views/navigatie.php";
      $navigationIsClicked = isset( $_GET['page'] );
      if ( $navigationIsClicked ) {
        $fileToLoad = $_GET['page'];
      } else {
        $fileToLoad = "paymo";
      }
      $pageData->content .=include_once "views/$fileToLoad.php"; /* niet in de else! */
  } else {
      $pageData->content .= $banner;
      $pageData->content .= $logininfo;
      $pageData->content .= include_once "controllers/user/newuser.php";
  }

  $page = include_once "views/page.php";
  echo $page;
?>
