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

$dinerid = $_GET["dinerid"];
$dishid = $_GET["dishid"];
$edate = $_GET["edate"];
$weight = $_GET["weight"];

$servername = "127.0.0.1";
$username = "aleks_romanov";
$password = "v1kCjsvLYytrBTGV";
$dbname = "hackmeal";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT dispname, energy, protein, fat, carbon FROM dish WHERE id = " . $dishid;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dname = $row["dispname"];
        $energy = $row["energy"];
        $prot = $row["protein"];
        $fat = $row["fat"];
        $carb = $row["carbon"];
    }
} else {
    echo "0 dishes";
}
$energy = $weight * $energy / 100;
$prot = $weight * $prot / 100;
$fat = $weight * $fat / 100;
$carb = $weight * $carb / 100;
$moment = $edate . " 12:13:14";
$insert = "INSERT INTO portion (dinerid, dishid, weight, moment, energy, protein,"
        . " fat, carbon, mealname) VALUES (" . $dinerid .", " . $dishid . ", " 
        . $weight . ", '" . $moment ."', " . $energy . ", " . $prot . ", " . 
        $fat . ", " . $carb . ", '" . $dname . "')";
if ($conn->query($insert) === TRUE) {
    echo "Portion saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
