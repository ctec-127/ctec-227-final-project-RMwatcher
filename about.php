<?php
session_start();
$pageTitle = "About Schools";
require "inc/header.inc.php";
?>
<div class="review">
    <div class="about">
        <h1>About the schools</h1>
        <p>You can learn more about each schools on their official websites</p>
        <h2 class="schools">Clark College</h2>
        <p>Clark College Main Campus:</p>
        <p>1933 Fort Vancouver Way, Vancouver, WA 98663</p>
        <a href="http://www.clark.edu/about/"><img src="img/ClarkCollegeChimeTower.jpg" alt="Picture of the Chime Tower at Clark College" height="450" width="400"></a><br>

        <h2 class="schools">Washington State University Vancouver</h2>
        <p>Washington State University Vancouver Main Campus:</p>
        <p>14204 NE Salmon Creek Ave, Vancouver, WA 98686</p>
        <a href="https://www.vancouver.wsu.edu/about-wsu-vancouver"><img src="img/WSU_Vancouver.jpg" alt="Picture of a school in front of a path" height="450" width="500"></a><br>

        <h2 class="schools">Portland State University</h2>
        <p>Portland State University Main Campus:</p>
        <p>724 SW Harrison, Portland, OR 97201</p>
        <a href="https://www.pdx.edu/about-portland-state-university"><img src="img/Portland_state_university_EB.jpg" alt="Picture of a school building" height="450" width="500"></a><br>
    </div>
</div>
<?php
require "inc/footer.inc.php";
?>