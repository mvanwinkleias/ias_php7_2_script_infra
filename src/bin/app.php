<?php
namespace IAS\Infra\App;

set_include_path(join(
	PATH_SEPARATOR,
	[
		dirname(realpath(__FILE__)).'/../lib/php7',
		'/opt/IAS/lib/php7',
		get_include_path(),
	]
));

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
		
		$this->debug_paths();
		$this->debug_extended_paths();
		header('Content-Type: text/html');
		print("<html><head><head></head><body>Hello, world!</body></html>\n");

	}
	
	public function teardown()
	{
		$this->log_info("Tearing down generic app.\n");
	}

}

$app = new IASGenericApp();

$app->run();

exit;

