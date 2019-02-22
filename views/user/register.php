<?php
  if(isset($gebruikersMessage) === false) {
    $gebruikersMessage = "";
  }
  $output =  "
    <div class='overlay'>
      <div class='container2'>
        <form method='post' action='index.php' enctype='multipart/form-data' class='registreer'>
          <h1>Paymo data registreer</h1>
          <label for='email'>E-mail: </label>
          <input type='email' name='email' required>
          <label for='password'>Paswoord: </label>
          <input type='password' name='password' required>
          <input class='submit' type='submit' value='Registreer' name='register' />
          <p>$gebruikersMessage</p>
        </form>
      </div>
    </div>
  ";

   return $output;
