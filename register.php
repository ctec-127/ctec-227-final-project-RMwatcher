<?php
session_start();
$pageTitle = "Register";
require "inc/header.inc.php";
require_once "inc/db_connect.inc.php";
require "inc/functions.inc.php";
?>

<?php
$error_bucket = [];

if (is_post_request()) {

    if (empty($_POST['first_name'])) {
        array_push($error_bucket, "<p>A first name is required.</p>");
    } else {
        $first_name = $db->real_escape_string($_POST['first_name']);
    }

    if (empty($_POST['last_name'])) {
        array_push($error_bucket, "<p>A last name is required.</p>");
    } else {
        $last_name = $db->real_escape_string($_POST['last_name']);
    }

    if (empty($_POST['username'])) {
        array_push($error_bucket, "<p>A username is required.</p>");
    } elseif (!has_length_greater_than($_POST['username'], 3)) {
        array_push($error_bucket, "<p>Your username needs to be at least 4 characters or longer.</p>");
    } else {
        $username = $db->real_escape_string($_POST['username']);
    }

    if (empty($_POST['password'])) {
        array_push($error_bucket, "<p>A password is required.</p>");
    } elseif (!has_length_greater_than($_POST['password'], 3)) {
        array_push($error_bucket, "<p>Your password needs to be at least 4 characters or longer.</p>");
    } else {
        $password = hash('sha512', $db->real_escape_string($_POST['password']));
    }

    if (empty($_POST['major'])) {
        array_push($error_bucket, "<p>A major is required.</p>");
    } else {
        $major = $db->real_escape_string($_POST['major']);
    }

    if ($_POST['school_id'] == "") {
        array_push($error_bucket, "<p>Please select your school.</p>");
    } else {
        $school_id = $db->real_escape_string($_POST['school_id']);
    }

    if (count($error_bucket) == 0) {


        $sql = "INSERT INTO students (first_name, last_name, username, password, major, school_id) 
                        VALUES('$first_name','$last_name',
                        '$username','$password','$major','$school_id')";
        $result = $db->query($sql);

        if (!$result) {
            echo "<p>There was a problem registering your account, please try again.</p>";
        } else {
            echo "<p>You are now ready to go " . $first_name . "!</p>";
            echo '<a href="login.php" title="Login Page">Login</a>';
        }
    } else {
        display_error_bucket($error_bucket);
    }
}
?>
<div class="sign_up">
    <h2 class="mb-5">Register</h2>
    <form action="register.php" method="POST">

        <label for="first_name">First Name</label><br>
        <input type="text" class="form-control-sm col-lg-10" id="first_name" name="first_name">
        <br><br>
        <label for="last_name">Last Name</label><br>
        <input type="text" class="form-control-sm col-lg-10" id="last_name" name="last_name">
        <br><br>
        <label for="username">Username</label><br>
        <input type="text" class="form-control-sm col-lg-10" id="username" name="username">
        <br><br>
        <label for="password">Password</label><br>
        <input type="password" class="form-control-sm col-lg-10" id="password" name="password">
        <br><br>
        <label for="major">Major</label><br>
        <input type="text" class="form-control-sm col-lg-10" id="major" name="major">
        <br><br>
        <label for="school">School you attend</label><br>
        <select name="school_id" class="form-control-sm col-lg-12" id="school">
            <option value="">--Select--</option>
            <option value="6398">Clark College</option>
            <option value="9788">Washington State University Vancouver</option>
            <option value="8887">Portland State University</option>
        </select>
        <br><br>
        <input type="submit" class="btn-secondary" value="Register">
        <input type="reset" class="btn-warning" value="Clear Form">
    </form>
</div>

<?php require "inc/footer.inc.php"; ?>