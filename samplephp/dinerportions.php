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
$startdate = $_GET["startdate"];
$enddate = $_GET["enddate"];

$servername = "127.0.0.1";
$username = "aleks_romanov";
$password = "v1kCjsvLYytrBTGV";
$dbname = "hackmeal";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM diner WHERE id = " . $dinerid;
$result1 = $conn->query($sql);
$jsarray = array();
if ($result1->num_rows > 0) {
    while($row =mysqli_fetch_assoc($result1)) {
        $jsarray[] = $row;
    }
    echo json_encode($jsarray);
} else {
    echo "0 results";
}
$sql1 = "SELECT mealname, weight, energy, protein, fat, carbon FROM portion where moment > '" . 
        $startdate . "' AND moment < '" . $enddate . "' AND dinerid = " . $dinerid;
$result = $conn->query($sql1);
$emparray = array();
if ($result->num_rows > 0) {
   while($row =mysqli_fetch_assoc($result)) {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
} else {
    echo "0 results";
}
$conn->close();
?> 

