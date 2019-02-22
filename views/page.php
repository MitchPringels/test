<?php
return "
<!DOCTYPE html>
  <html>
    <head>
    <title>$pageData->title</title>
    <link rel='shortcut icon' type='image/png' href='img/edge-logo.png'>
    <meta http-equiv='Content-Type' content='text/html;charset=utf-8' />
    $pageData->css
    $pageData->embeddedStyle
    </head>
    <body>
      <div class='kader'>
        $pageData->content
      </div>
      $pageData->js
    </body>
  </html>";
?>
