<?php 
	class Artikli
	{
		public $naziv;
		public $stanjezaliha;
		public $artiklid;
		public $cijena;

		public function __construct($naziv, $stanjezaliha,$artiklid,$cijena)
		{
			$this->naziv=$naziv;
			$this->stanjezaliha=$stanjezaliha;
			$this->artiklid=$artiklid;
			$this->cijena=$cijena;
		}
	}

	?>