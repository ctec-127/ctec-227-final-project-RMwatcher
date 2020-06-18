<?php
session_start();
$pageTitle = "login";
require "inc/header.inc.php";
require "inc/functions.inc.php";
require_once "inc/db_connect.inc.php";
?>

<?php

if (is_post_request()) {

    $username = $db->real_escape_string($_POST['username']);

    $password = hash('sha512', $db->real_escape_string($_POST['password']));

    $sql = "SELECT * FROM students WHERE username='$username' AND password='$password'";

    $result = $db->query($sql);
    if ($result->num_rows == 1) {


        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = 1;
        $_SESSION['username'] = $row['username'];
        $_SESSION['student_id'] = $row['student_id'];

        header('location: final.php');
    } else {
        echo "<div class=\"pt-4 text-center alert alert-warning\">";
        echo '<p>Incorrect username or password. Please try again.</p>';
        echo "</div>";
    }
}
?>
<div class="about">
    <h1>Login</h1>
    <form action="login.php" method="post">

        <label for="username">Username</label>
        <br>
        <input type="text" class="form-control-sm col-lg-2" id="username" required name="username">
        <br><br>
        <label for="password">Password</label>
        <span id="showPassword" onclick="showPassword();">Show Password</span><br>
        <input type="password" class="form-control-sm col-lg-2" id="password" required name="password">
        <br><br>

        <input type="submit" class="btn-secondary" value="Login">
    </form>
    <p class="mt-2">New User? <a href="register.php">Register</a></p>

</div>

<script src="js/script.js"></script>
<?php
require "inc/footer.inc.php";
?>