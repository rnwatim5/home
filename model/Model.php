<?php

include_once("model/artikli.php");

class Model {
	public function getArtikli()
	{
		// here goes some hardcoded values to simulate the database
		
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maloprodaja";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM artikli";
//mysql_query("SET NAMES 'utf8'", $connection);
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$arej = array();
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
   
    array_push($arej, new Artikli($row["Naziv"], $row["StanjeZaliha"], $row['ArtiklID'], $row['Cijena']));

	}
} else { 
$arej = array();
    //echo "0 results";
}
$conn->close();
		return $arej;
	}
	
	/*public function getArtikli($naziv)
	{

		
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maloprodaja";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM artikli WHERE naziv = ". $naziv;
//mysql_query("SET NAMES 'utf8'", $connection);
$result = $conn->query($sql);
$test = new Artikli("a", "b", "c");
if ($result->num_rows > 0) {
	$arej = array();
    // output data of each row
	
    while($row = $result->fetch_assoc()) {

	    array_push($arej, new Artikli($row["Naziv"], $row["StanjeZaliha"]));

	$test = new Artikli($row["Naziv"], $row["StanjeZaliha"]);
	}
} else { 
$arej = array();

    //echo "0 results";
}
$conn->close();
		return $test;
	}*/
	
	}
	

?>