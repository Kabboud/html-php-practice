<!DOCTYPE html>
<html>
<div style="text-align: center">
<p style='font-size: 20px'><u>You Should Visit This Location!</u></p> 
<?php
$servername = "localhost";
$username = "kabboud";
$password = "EipOkBoa";
$dbname = "kabboud";

$location = $_POST['location'];
$date = $_POST['date'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from photograph where location ='" . $location . "' and date_taken='" . $date . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<img style ='width: 35%' src=" . $row["picture_url"] . ">\t<br>";
		echo "Subject: " . $row["subject"] . " - Location: " . $row["location"] . "<br>";
    }
} else {
    echo "No Results found for your query.<br><br>";
}
?>
</div>
<br><div style="text-align:center"> <a href="https://www.cs.ryerson.ca/~kabboud/lab5/part2.html">Try Another Query</a></div>
</html>