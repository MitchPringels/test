<?php
  class Page_Data {
      public $title = "";
      public $content = "";
      public $css = "";
      public $js = "";
      public $embeddedStyle = "";
      public function addStylesheet($href){
          $this->css .= "<link href='$href' rel='stylesheet' />";
      }
      public function addJavaScript($href){
          $this->js .= "<script type='text/javascript' src='$href'></script>";
      }
  }
?>
