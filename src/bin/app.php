#!/usr/bin/php
<?php

$php_lib='php7';

set_include_path(join(
	PATH_SEPARATOR,
	[
		dirname(realpath($_SERVER['PHP_SELF'])).'/../lib/'.$php_lib,
		'/opt/IAS/lib/'.$php_lib,
		get_include_path(),
	]
));

include "IAS/Infra.php";

class IASGenericApp extends IAS\Infra
{
	public function setup()
	{
		$this->log_info("Setting up generic app.\n");
	}
	
	public function main()
	{
		$this->log_info("Generic app main\n");
		
		$this->debug_paths();
		$this->debug_extended_paths();

	}
	
	public function teardown()
	{
		$this->log_info("Tearing down generic app.\n");
	}

}

$app = new IASGenericApp();

$app->run();

exit;

