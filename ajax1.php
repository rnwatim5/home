<?php
// get the q parameter from URL
$s = $_REQUEST["s"];
$hint = "";
$hint1 = "";
$hint1 .= '<table><tr><th>Naziv Artikla</th><th>broj racuna</th><th>Kolicina</th><th>Popust</th><th>Napomena</th></tr>';
// lookup all hints from array if $q is different from "" 
if ($s !== "") {
    $s = strtolower($s);
    $len=strlen($s);
    /*
	foreach($a as $name) {
        if (stristr($s, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
	
	*/
	

/**********************************************************/
$db = mysql_connect("localhost","root","");

if($db) {

$result = mysql_select_db("maloprodaja", $db) or die("Došlo je do problema prilikom odabira baze...");
$sql="SELECT * FROM artikli inner join racunistavke on artiklID=artiklidd INNER JOIN racuni on BrojRacunaa=BrojRacuna where naziv LIKE '%$s%' ";
//echo $sql;
$result2 = mysql_query($sql, $db) or die("Došlo je do problema prilikom izvrsavanja upita...");
$n=mysql_num_rows($result2);

if ($n > 0){
	while ($myrow=mysql_fetch_row($result2)){
			//echo $myrow[0].",".$myrow[1].",".$myrow[2];
			
			$hint .= "<tr><td>".$myrow[2]."</td><td>".$myrow[8]."</td><td>".$myrow[10]."</td><td>".$myrow[11]."</td><td>".$myrow[15]."</td></tr>";
		}
	}
else {
//echo "No patern rows returned<br>";
}	
}
else {
echo "<br>Nije proslo spajanje<br>";
}
/**********************************************************/
	
}
$hint1 .= $hint."</table>";
// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint1;

?>