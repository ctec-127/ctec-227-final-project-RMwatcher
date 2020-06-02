<?php
session_start();
$pageTitle = "login";
require "inc/header.inc.php";
require "inc/db_connect.inc.php";
require "inc/functions.inc.php";
?>

<?php
if (is_post_request()) {
}
?>

<?php
require "inc/footer.inc.php";
?>