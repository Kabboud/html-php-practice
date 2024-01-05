<!DOCTYPE html>
<html>
<div style="text-align: center"> 
<p style='font-size: 20px'><u>A Listing of all Destinations in the Database</u></p>
<?php
$servername = "localhost";
$username = "kabboud";
$password = "EipOkBoa";
$dbname = "kabboud";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from photograph order by date_taken desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div style='font-style: italic; color:red; font-size: 18px'>Subject: " . $row["subject"]. " - Location: " . $row["location"]. " - Date: " . $row["date_taken"] . "</div><br>";
    }
} else {
    echo "0 results<br><br>";
}
?>
</div>
<div style="text-align: center"> 
<p style='font-size: 20px'><u>Images of Ontario</u></p>
<?php
$sql = "select * from photograph where location='Ontario'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<img style ='width: 25%' src=" . $row["picture_url"] . ">\t<br>";
		echo "Subject: " . $row["subject"] . " - Location: " . $row["location"] . "<br>";
    }
} else {
    echo "No Locations in Ontario are currently in the database.";
}
?>
</div>
<div style="text-align: center"> 
<p style='font-size: 20px'><u>Image Count and Random Display</u></p>
<?php
$sql = "select count(*) as total from photograph";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<p style='font-style: italic; color:red; font-size: 18px'> There are a total of " . $row["total"] . " images in the database.</p>";
    }
}

$sql = "select * from photograph order by rand() LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<img style ='width: 25%' src=" . $row["picture_url"] . "><br>";
		echo "Subject: " . $row["subject"] . " - Location: " . $row["location"] . "<br>";
    }
} else {
    echo "No Images currently in the database.";
}
?>
</html>
