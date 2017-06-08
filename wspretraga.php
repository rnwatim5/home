<?php
if (isset($_COOKIE['uname'])){
$prijavljen=true;
$razina=$_COOKIE['razina'];
}
else {
$prijavljen=false;
$razina=0;
}

if($razina==0){
	
	echo 'Moilimo prijavite se prije korištenja pretrage';
	echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL=http://localhost/ovosaljemo/index.php">';
	
}
else {
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RACUNI</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
	<link href="css/crni-inpute.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="https://github.com/BlackrockDigital/startbootstrap-landing-page" target="_blank">CREDITS FOR TEMPLATE</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#services">O projektu</a>
                    </li>
                    <li>
					<div class="containers">
					<?php 
						IF ($razina==1){
							ECHO '<div class="dropdowns">
    <button class="dropbtns">Funkcionalnosti </button>
    <div class="dropdowns-content">
      <a href="#">Funkcionalnost 1 </a>
		<ul class="submenu">
  <li><a class="active" href="ajax1.php" target="_blank">Ajax</a></li>
  <li><a class="active" href="ajax2.php" target="_blank">JQery</a></li>
		</ul>
      <a href="#">Funkcionalnost 2</a>
      <a href="#">Funkcionalnost 3</a>
    </div>
						</div> ';}
  ?>
</div>

                    </li>
                    <li>
                        <a href="#contact">Kontakt</a>
                    </li>
                </ul>
				
				<?php
if(!isset($_COOKIE['uname']))
    {
                echo' <form method="post" action="prijava.php" >
                     <ul class="nav navbar-nav" style="float: right; padding: 1%">
                    
                     <li>
                    <input type="email" class="form-control" placeholder="Korisnicko ime:" name="username">
                    </li>
                    <li>
                    <input type="password" class="form-control" placeholder="Lozinka:" name="password">
                    </li>
                    <input class="btn btn-primary" type="submit" name="Prijava " value="Prijavi se" >
                    </ul>
                    </form>';
                }
                else
                {
                    echo '
                    <form method="post" action="logout.php" >
                    <ul class="nav navbar-nav" style="float: right; padding: 1%">
                    <li>
                    <input class="btn btn-primary" type="submit" name="Prijava " value="Odjavi se" >
                    </li
                    </ul>
                    </form>
                    ';
                }
                    ?>
				
				
				
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	<div class="intro-header">
 <div class="container">

        <div class="row">	
	 <div class="col-md-3">

            </div>
	
	
	
	
	
	</div>
	
	
	
	
	  <div class="col-md-9">

                

                <div class="row"> <!--prvi div za prikaz nekretnina-->
                <div id="txtHint"></div>
               <br />
			    <br />
			   
                    <?php
              
       if (isset($_REQUEST["naziv_tvrtke"])){
					$naziv_tvrtke=$_REQUEST["naziv_tvrtke"];
					$params=$naziv_tvrtke;
					echo "Ispis  Artikla:  ".$naziv_tvrtke.""; 
					try{
						ini_set('soap.wsdl_cache_enabled',0);
						ini_set('soap.wsdl_cache_ttl',0);
					  //$sClient = new SoapClient('http://localhost/djelatnici1/hello.xml,);
					  $sClient = new SoapClient('ispis.wsdl',
					  array(
					  'cache_wsdl'=>WSDL_CACHE_NONE,
					  'trace'=>1,
					  'user' => 'root',
					  'pass' => '',
					  'exceptions' => 0
					));
					  //$sClient = new SoapClient('hello.wsdl');
					  
					  //$params = "Aqila";
					  //echo "<br>REQUEST:\n" . $sClient->__getLastRequest() . "\n";
					  //echo "<pre>";
					  $response = $sClient->doHello($params);
						//echo "<br>REQUEST:<br>";
						//echo "<textarea cols=\"60\" rows=\"20\">". htmlspecialchars($sClient->__getLastRequest())."</textarea>";
						
					  
					  //var_dump($response);
					  //print_r($response);
					  echo "<br><br><br>ODGOVOR:<br>";
					  //echo "<textarea cols=\"30\" rows=\"40\">". htmlspecialchars($sClient->__getLastResponse())."</textarea>";

						
					  $risponz = $sClient->__getLastResponse();
					 
					  
					  echo '<pre>' . $risponz . '</pre>';
					  


					} catch(SoapFault $e){
						echo $e->getMessage();
					}
				}
				
				else {

					echo "Napravi  pretragu artikla po nazivu, unijeti naziv artikla u polje ispod<br>  ";
					echo "<p>Forma poziva web servis koji pretražuje artikle s nazivom koji ste unijeli - vraca JSON odgovor u ovom slucaju</p> ";
					echo "<form method=\"get\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\">";
					echo "Naziv artikla: <input type=\"text\" name=\"naziv_tvrtke\">";
					echo " <input type=\"submit\" name=\"submit\" value=\"Pretraga\"> ";
				echo "</form>";}
                
                ?>
               
                </div>  

            </div>

	
	
	
	
	</div>
	</div>
<?php } ?>
