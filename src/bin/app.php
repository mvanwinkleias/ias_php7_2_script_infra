#!/usr/bin/php
<?php

$php_lib='php7.2';

set_include_path(join(
	PATH_SEPARATOR,
	[
		dirname(realpath($_SERVER['PHP_SELF'])).'/../lib/'.$php_lib,
		'/opt/IAS/lib/'.$php_lib,
		get_include_path(),
	]
));

include "IAS/Infra.php";

class IASGenericApp extends IASInfra
{
	public function setup()
	{
		print "Setting up generic app.\n";
	}
	
	public function main()
	{
		print "Generic app main\n";
	}
	
#	public function teardown()
#	{
#		print "Tearing down generic app.\n";
#	}

}

$app = new IASGenericApp();

$app->run();

exit;

