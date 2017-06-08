<html>
<head></head>

<body>

<table>
	
	<?php 

		foreach ($artiklis as $naziv => $nek)
		{
			include ("connect.php");
			$queryy = "SELECT `lokacija` FROM `slike` WHERE `artikl_idartikl`=".$nek->artiklid."";
                    $resulte = $con->query($queryy);
                    while($rez=$resulte->fetch_array())
                    {
                    $slika=$rez['lokacija'];
                    }
			echo '<div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="'.$slika.'" alt="">
                            <div class="caption">
                                <h4 class="pull-right">'.$nek->cijena.'KM</h4>
                                <h4><a href="#">'.$nek->naziv.'</a>
                                </h4>
                                <p>Stanje Zaliha'.$nek->stanjezaliha.'</p>
                            </div>
                           
                        </div>
                    </div>';
			
			
		}

	?>
</table>

</body>
</html>