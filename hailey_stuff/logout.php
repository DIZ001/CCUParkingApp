<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php");

/*notice this page has NO html, etc....
End the session and immediately go back to the login page.*/
?>