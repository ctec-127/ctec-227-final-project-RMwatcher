<?php
session_start();
$pageTitle = "Survey";
require "inc/header.inc.php";
require "inc/db_connect.inc.php";
require "inc/functions.inc.php";
?>

<?php
$error_bucket = [];
$instructor_id;
$school_id;

if (is_post_request()) {

    if (!isset($_SESSION['student_id'])) {
        $student_id = "0";
    } else {
        $student_id = $db->real_escape_string($_SESSION['student_id']);
    }

    if ($_POST['results_1'] == " ") {
        array_push($error_bucket, "<p>Please select an instructor.</p>");
    } else {
        $results_1 = $db->real_escape_string($_POST['results_1']);
    }

    if ($results_1 == "Brody Haney") {
        $instructor_id = $db->real_escape_string("bh01");
        $school_id = $db->real_escape_string(6398);
    } elseif ($results_1 == "Nafisa Gates") {
        $instructor_id = $db->real_escape_string("bs02");
        $school_id = $db->real_escape_string(6398);
    } elseif ($results_1 == "Bridie Smith") {
        $instructor_id = $db->real_escape_string("bs03");
        $school_id = $db->real_escape_string(6398);
    } elseif ($results_1 == "Winnie Esparza") {
        $instructor_id = $db->real_escape_string("we31");
        $school_id = $db->real_escape_string(9788);
    } elseif ($results_1 == "Samah Lees") {
        $instructor_id = $db->real_escape_string("sl32");
        $school_id = $db->real_escape_string(9788);
    } elseif ($results_1 == "Rachel Mcneil") {
        $instructor_id = $db->real_escape_string("rm33");
        $school_id = $db->real_escape_string(9788);
    } elseif ($results_1 == "Gino Hagan") {
        $instructor_id = $db->real_escape_string("gh95");
        $school_id = $db->real_escape_string(8887);
    } elseif ($results_1 == "Tala Dupont") {
        $instructor_id = $db->real_escape_string("td96");
        $school_id = $db->real_escape_string(8887);
    } elseif ($results_1 == "Uwais McKinney") {
        $instructor_id = $db->real_escape_string("um97");
        $school_id = $db->real_escape_string(8887);
    }

    if ($_POST['results_2'] == " ") {
        array_push($error_bucket, "<p>Please select a rating.</p>");
    } else {
        $results_2 = $db->real_escape_string($_POST['results_2']);
    }

    if (empty($_POST['results_3'])) {
        array_push($error_bucket, "<p>Please list what your instructor did great at.</p>");
    } else {
        $results_3 = $db->real_escape_string($_POST['results_3']);
    }

    if (empty($_POST['results_4'])) {
        array_push($error_bucket, "<p>Please list what your instructor could improve on.</p>");
    } else {
        $results_4 = $db->real_escape_string($_POST['results_4']);
    }

    if (empty($_POST['results_5'])) {
        array_push($error_bucket, "<p>Please select whether or not you would recommend this instructor.</p>");
    } else {
        $results_5 = $db->real_escape_string($_POST['results_5']);
    }

    if (empty($_POST['results_6'])) {
        array_push($error_bucket, "<p>Please leave a comment or feedback about the instructor.</p>");
    } else {
        $results_6 = $db->real_escape_string($_POST['results_6']);
    }
    if (count($error_bucket) == 0) {


        $sql = "INSERT INTO results (student_id, instructor_id, school_id, results_1, results_2, results_3, results_4, results_5, results_6) VALUES ('$student_id', '$instructor_id', '$school_id', '$results_1', '$results_2', '$results_3', '$results_4', '$results_5', '$results_6')";

        $result = $db->query($sql);

        if (!$result) {
            echo "<p>Something went wrong with submitting your survey, please try again.</p>";
        } else {
            echo "<p>Your survey was submitted successfully!</p>";
        }
    } else {
        display_error_bucket($error_bucket);
    }
}

?>

<div class="sign_up">
    <h2 class="mb-5">Rate Your Instructor's Survey</h2>
    <p class="text-center mb-5">Here you can review your favorite instructor and have it posted on the home page for everyone to see. Since you're a member, you can delete you past reviews at anytime as long as you're signed in. Keep in mind that you cannot delete reviews from other members.</p>

    <form action="survey.php" method="post">
        <label for="instructor">Who's your instructor?</label><br>
        <select name="results_1" class="form-control-sm col-lg-10" id="instructor"><br>
            <option value=" " <?php if (isset($results_1) && $results_1 == " ") echo "selected" ?>>--Select--</option>

            <option value="Brody Haney" <?php if (isset($results_1) && $results_1 == "Brody Haney") echo "selected" ?>>Brody Haney - Clark</option>

            <option value="Bridie Smith" <?php if (isset($results_1) && $results_1 == "Bridie Smith") echo "selected" ?>>Bridie Smith - Clark</option>

            <option value="Nafisa Gates" <?php if (isset($results_1) && $results_1 == "Nafisa Gates") echo "selected" ?>>Nafisa Gates - Clark</option>

            <option value="Rachel Mcneil" <?php if (isset($results_1) && $results_1 == "Rachel Mcneil") echo "selected" ?>>Rachel Mcneil - WSUV</option>

            <option value="Winnie Esparza" <?php if (isset($results_1) && $results_1 == "Winnie Esparza") echo "selected" ?>>Winnie Esparza - WSUV</option>

            <option value="Samah Lees" <?php if (isset($results_1) && $results_1 == "Samah Lees") echo "selected" ?>>Samah Lees - WSUV</option>

            <option value="Uwais McKinney" <?php if (isset($results_1) && $results_1 == "Uwais McKinney") echo "selected" ?>>Uwais McKinney - PSU</option>

            <option value="Tala Dupont" <?php if (isset($results_1) && $results_1 == "Tala Dupont") echo "selected" ?>>Tala Dupont - PSU</option>

            <option value="Gino Hagan" <?php if (isset($results_1) && $results_1 == "Gino Hagan") echo "selected" ?>>Gino Hagan - PSU</option>
        </select><br><br>
        <label for="rating">What rating would you give your instructor?</label><br>
        <select name="results_2" class="form-control-sm col-lg-10" id="rating">
            <option value=" " <?php if (isset($results_2) && $results_2 == " ") echo "selected" ?>>--Select--</option>

            <option value="Bad" <?php if (isset($results_2) && $results_2 == "Bad") echo "selected" ?>>Bad</option>

            <option value="Poor" <?php if (isset($results_2) && $results_2 == "Poor") echo "selected" ?>>Poor</option>

            <option value="Fair" <?php if (isset($results_2) && $results_2 == "Fair") echo "selected" ?>>Fair</option>

            <option value="Good" <?php if (isset($results_2) && $results_2 == "Good") echo "selected" ?>>Good</option>

            <option value="Excellent" <?php if (isset($results_2) && $results_2 == "Excellent") echo "selected" ?>>Excellent</option>
        </select><br><br>

        <label for="did_great">Things the instructor did great.</label><br>
        <input type="text" class="form-control-sm col-lg-10" name="results_3" size="40" maxlength="60" id="did_great" value="<?php echo (isset($results_3)) ? $results_3 : " " ?>"><br><br>

        <label for="could_improve">Things the instructor could improve on.</label><br>
        <input type="text" class="form-control-sm col-lg-10" size="40" maxlength="60" name="results_4" id="could_improve" value="<?php echo (isset($results_4)) ? $results_4 : " " ?>"><br><br>

        <p>Would you recommend this instructor to other students?</p>
        <label for="yes">
            <input type="radio" name="results_5" id="yes" value="yes" <?php echo ($results_5 = "yes" ? 'checked' : ''); ?>>
            Yes
        </label><br><br>

        <label for="no">
            <input type="radio" name="results_5" id="no" value="no" <?php echo ($results_5 = "no" ? 'checked' : ''); ?>>
            No
        </label><br><br>

        <label for="comment">Comments about the instructor:</label><br>
        <textarea name="results_6" id="comment" cols="42" rows="5" value="<?php echo (isset($results_6)) ? $results_6 : " " ?>"></textarea><br><br>

        <input type="submit" class="btn-secondary" value="Submit Survey">

    </form>
</div>
<?php
require "inc/footer.inc.php";
?>