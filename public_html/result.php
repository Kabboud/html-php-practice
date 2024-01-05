<!DOCTYPE html>

<html>
<?php
if ( !isset( $_COOKIE['hits'] ) ) $_COOKIE['hits'] = 1; 
$hits = $_COOKIE['hits'] + 1;
setcookie('hits', $hits, 60 * 24 * 60 + time()); 
echo "Number of Visits by Current User = ". $_COOKIE['hits'];

$rowsize = $_POST['row']; 
$colsize = $_POST['col'];
echo "<table style='width:20%' border=\"1\" align=\"center\">";
for ( $col = 1; $col <= $colsize; $col += 1) {
	for ( $row = $col; $row <= $rowsize*$col; $row += $col) {
		if ( $row == 1) {
			echo "<tr>";
		}
		if ($col == 1 || ($col == $row)) {
			echo "<td style='text-align:center; background-color: aquamarine; font-family: fantasy'>";
		}
		else {
			echo "<td style='text-align:center; background-color: yellow; font-style: italic; font-family: monospace'>";
		}
		echo $row;
		echo "</td>";
		if ( $row == $rowsize*$col) {
			echo "</tr>";
		}
	}
}
echo "</table>";

?>
<br><div style="text-align:center"> <a href="https://www.cs.ryerson.ca/~kabboud/lab5/main.html">Generate another table</a></div>
</html>