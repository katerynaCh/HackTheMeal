<?php
/*
 * Copyright 2016, Mealvation Oy Hack the Meal project
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

$dishid = $_GET["dishid"];
$servername = "127.0.0.1";
$username = "aleks_romanov";
$password = "v1kCjsvLYytrBTGV";
$dbname = "hackmeal";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT dispname, energy, L, G, M, VL, V, allergy, origin FROM dish WHERE id = " . $dishid;
$result = $conn->query($sql);
#$emparray = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dname = $row["dispname"];
        $energy = $row["energy"];
        $lac = $row["L"];
        $glu = $row["G"];
        $mil = $row["M"];
        $ll = $row["VL"];
        $veg = $row["V"];
        $allerg = $row["allergy"];
        $orig = $row["origin"];
    }
    if ($lac != 0) {
        $lac = "L";
    } else {
        $lac = " ";
    }
    if ($glu != 0) {
        $glu = "G";
    } else {
        $glu = " ";
    }
    if ($mil != 0) {
        $mil = "M";
    } else {
        $mil = " ";
    }
    if ($ll != 0) {
        $ll = "VL";
    } else {
        $ll = " ";
    }
    if ($veg != 0) {
        $veg = " V<br/>";
    } else {
        $veg = "<br/>";
    }
    if($allerg) {
        $allerg = "Contains " . $allerg;
    }
    $imgfile = $dishid . "_img.jpg";
} else {
    echo "0 results";
}
$conn->close();
?>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
    <form action="dispdish.php" method="GET">
        <input name="dishid"></input>
        <button type="submit" value="Display dish">Display dish</button>
    </form>
<!--<img src="<?php echo $imgfile; ?>" alt="No image available" height="250" width="350"> -->
<h1>Restaurant SMART we serve here</h1>
<p><span id="meal"><?php echo $dname; ?></span></p>
<p><span id="diet"><?php echo $lac . " " . $glu . " " . $mil . " " . $ll . $veg; ?></span></p>
<p><span id="energy"><?php echo $energy; ?> kcal/100g.</span></p>  
<p><span id="origin"><?php echo $orig; ?></span></p> 
<?php echo $allerg; ?>
</body>
</html>
