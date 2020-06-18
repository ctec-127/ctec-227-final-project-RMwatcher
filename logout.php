<?php
session_start();
session_unset();
session_destroy();
$pageTitle = "logged Out";
require "inc/header.inc.php";

?>

<h2 class="text-center">You have successfully logged out.</h2>



<?php
require "inc/footer.inc.php";
?>