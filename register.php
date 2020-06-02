<?php
session_start();
$pageTitle = "Register";
require "inc/header.inc.php";
require "inc/db_connect.inc.php";
require "inc/functions.inc.php";
?>

<?php
if (is_post_request()) {
    $first_name = $db->real_escape_string($_POST['first_name']);
    $last_name = $db->real_escape_string($_POST['last_name']);
    $username = $db->real_escape_string(has_length_greater_than($_POST['username'], 4);
    $password = hash('sha512', $db->real_escape_string($_POST['password']));
    $major = $db->real_escape_string($_POST['major']);

    $sql = "INSERT INTO students (first_name, last_name, username, password, major) 
                    VALUES($first_name','$last_name',
                    '$username','$password','$major')";

    $result = $db->query($sql);

    if (!$result) {
        echo "<p>There was a problem registering your account, please try again.</p>";
    } else {
        echo "<p>You are now ready to go!</p>";
        echo '<a href="login.php" title="Login Page">Login</a>';
    }
}
?>

<h1>Register</h1>
<form action="register.php" method="POST">

    <label for="first_name">First Name</label>
    <input type="text" id="first_name" required name="first_name">
    <br><br>
    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" required name="last_name">
    <br><br>
    <label for="username">Email</label>
    <input type="text" id="username" required name="username">
    <br><br>
    <label for="password">Password</label>
    <input type="password" id="password" required name="password">
    <br><br>
    <label for="major">Major</label>
    <input type="text" id="major" required name="major">
    <br><br>
    <input type="submit" value="Register">
</form>

<?php
require "inc/footer.inc.php";
?>