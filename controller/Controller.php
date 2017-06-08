<?php
include_once("model/Model.php");

class Controller {
	public $model;
	
	public function __construct()  
    {  
        $this->model = new Model();

    } 
	
	public function invoke()
	{
		if (!isset($_GET['Artikli']))
		{
			
			$artiklis = $this->model->getArtikli();
			include 'view/artikli.php';
		}
		else
		{
			
			$artikli = $this->model->getArtikli($_GET['artikli']);
			include 'view/viewnek.php';
		}
	}
}

?>