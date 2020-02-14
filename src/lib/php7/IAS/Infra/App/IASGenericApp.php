<?php

namespace IAS\Infra\App;

include "IAS/Infra/App.php";

class IASGenericApp
{
	use \IAS\Infra\App;
	public function setup()
	{
		$this->log_info("Setting up generic app.\n");
	}
	
	public function main()
	{
		$this->log_info("Generic app main\n");
		
		# $this->debug_paths();
		# $this->debug_extended_paths();
		header('Content-Type: text/html');
		print("<html><head><head></head><body>Hello, world!</body></html>\n");

	}
	
	public function teardown()
	{
		$this->log_info("Tearing down generic app.\n");
	}

}
