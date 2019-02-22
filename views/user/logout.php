<?php
return "
<form class='logout' method='post' action='index.php'>
    <label for='logout'>Logged in as " . $_SESSION['username'] . "</label>
    <input type='submit' value='Log out' name='logout' />
</form>";
