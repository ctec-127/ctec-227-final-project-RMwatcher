<?php
session_start();
$pageTitle = "Homepage";
require "inc/header.inc.php";
require "inc/db_connect.inc.php";
?>


<p class="text-center">Welcome to our site. Here you're able to see reviews of different instructors from different schools. Once you become a member, you'll be able to write a review about your instructor for everyone to see.</p>


<?php
$sql = "SELECT students.username, schools.school_name, results.results_1, results.results_2, results.results_3, results.results_4, results.results_5, results.results_6 FROM results JOIN students ON students.student_id = results.student_id JOIN schools ON schools.school_id = results.school_id ORDER BY date DESC";

$result = $db->query($sql);

if ($result->num_rows == 1) {
    echo "<p>Here are what other students are saying about their instructors.</p>";
} else {
    echo "<p class=\"text-center\">There are no reviews at this time.</p>";
}

echo "<div class=\"review\">";


while ($row = $result->fetch_assoc()) {
    if (isset($_SESSION['username']) && $_SESSION['username'] == $row['username']) {
        echo "<div class=\"delete\"><a href=\"helper/delete_results.php?student_id=" . $_SESSION['student_id'] . "\">Delete</a></div><br>";
    }

    echo "<div class=\"review_results\">";

    echo "<h4>Username:</h4>";

    echo "<p>" . $row['username'] . "</p>";

    echo "<h4>School:</h4>";

    if ($row['results_1'] == "Brody Haney" || $row['results_1'] == "Nafisa Gates" || $row['results_1'] == "Bridie Smith") {
        echo "<p>Clark College</p>";
    } elseif ($row['results_1'] == "Winnie Esparza" || $row['results_1'] == "Samah Lees" || $row['results_1'] == "Rachel Mcneil") {
        echo "<p>Washington State University Vancouver</p>";
    } elseif ($row['results_1'] == "Gino Hagan" || $row['results_1'] == "Tala Dupont" || $row['results_1'] == "Uwais McKinney") {
        echo "<p>Portland State University</p>";
    }

    echo "<h4>Who's your instructor?</h4>";
    echo "<p>{$row['results_1']}</p>";

    echo "<h4>What rating would you give your instructor?</h4>";
    echo "<p>{$row['results_2']}</p>";

    echo "<h4>Things the instructor did great.</h4>";
    echo "<p>{$row['results_3']}</p>";

    echo "<h4>Things the instructor could improve on.</h4>";
    echo "<p>{$row['results_4']}</p>";

    echo "<h4>Would you recommend this instructor to other students?</h4>";
    echo "<p>{$row['results_5']}</p>";

    echo "<h4>Comments about the instructor:</h4>";
    echo "<p>{$row['results_6']}</p>";

    echo "</div>";
}

?>

</div>

<script defer src="js/script.js"></script>
<?php
require "inc/footer.inc.php";
?>