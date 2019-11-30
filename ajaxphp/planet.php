<?php 
   session_start();
?>

<p><h1 class='success'>Welcome to your Galaxy, <span style='color:#FF5700;'><?= $_SESSION['pseudo'] ?></span></h1></p>    

<p><h3 class='success'>Choose your planet ?</h3></p><br>
<div><input type="checkbox" id="check-all" name="all" onchange="loveAllPlanets('check-all')"/> All</div><br>
<div><input type="checkbox" id="check-mercury" name="favorite" onchange="lovePlanet('mercury','check-mercury')"/> Mercury</div>
<div><input type="checkbox" id="check-venus" name="favorite" onchange="lovePlanet('venus','check-venus')"/> Venus</div>
<div><input type="checkbox" id="check-earth" name="favorite" onchange="lovePlanet('earth','check-earth')"/> Earth</div>
<div><input type="checkbox" id="check-mars" name="favorite" onchange="lovePlanet('mars','check-mars')"/> Mars</div>
<div><input type="checkbox" id="check-jupiter" name="favorite" onchange="lovePlanet('jupiter','check-jupiter')"/> Jupiter</div>
<div><input type="checkbox" id="check-saturn" name="favorite" onchange="lovePlanet('saturn','check-saturn')"/> saturn</div>
<div><input type="checkbox" id="check-uranus" name="favorite" onchange="lovePlanet('uranus','check-uranus')"/> Uranus</div>
<div><input type="checkbox" id="check-neptune" name="favorite" onchange="lovePlanet('neptune','check-neptune')"/> Neptune</div>
