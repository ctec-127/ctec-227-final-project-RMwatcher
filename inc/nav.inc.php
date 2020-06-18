<nav class=" bg-info">
    <a class="navbar-brand text-white ml-3" href="final.php">Home</a>
    <?= (!isset($_SESSION['username'])) ? "<a class=\"navbar-brand text-white\" href=\"login.php\">Login</a>
" : ""; ?>
    <a class="navbar-brand text-white" href="register.php">Register</a>
    <?php
    if (isset($_SESSION['username'])) {
        echo "<a class=\"navbar-brand text-white\" href=\"survey.php\">Survey</a>";
        echo "<a class=\"navbar-brand text-white\" href=\"logout.php\">Logout</a>
    ";
    }
    ?>
    <a class="navbar-brand text-white" href="about.php">About schools</a>
</nav>
<h2 class="mt-1">Welcome <?= isset($_SESSION['username']) ? $_SESSION['username'] : "guest" ?></h2>