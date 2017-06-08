<?php
if(!extension_loaded("soap")){
  dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled",0);
$server = new SoapServer("ispis.wsdl");

function doHello($yourName){
 
$username = "root";
$password = "";
$hostname = "localhost"; 

$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");

$selected = mysql_select_db("maloprodaja",$dbhandle)
  or die("Could not select maloprodaja");

$result = mysql_query("SELECT *  FROM Artikli where naziv= \"" . $yourName."\"");
$response = array();
  
  while ($row = mysql_fetch_array($result)) {

$tmp            = array();
		$tmp["Naziv Artikla"]        = $row["Naziv"]; 
		$tmp["Sifra Artikla"]        = $row["Sifra"];
		$tmp["Cijena Artikla"]        = $row["Cijena"];

								      

        array_push($response, $tmp);

    $privremeni = $privremeni
      ."\n Naziv Artikla: " . $row["Naziv"]
      ."\n Sifra Artikla: " . $row["Sifra"] 
      ."\n Cijena Artikla: " . $row["Cijena"]
      ."\n \n";
}



    $jsonn = json_encode($response);
  
  
  return $jsonn;
      return $privremeni;
}

$server->AddFunction("doHello");
$server->handle();
?>