#!/usr/bin/php
<?php
set_include_path(join(
	PATH_SEPARATOR,
	[
		dirname(realpath($_SERVER['PHP_SELF'])).'/../lib/php7',
		'/opt/IAS/lib/php7',
		get_include_path(),
	]
));

include "IAS/Infra/App/IASGenericApp.php";

$app = new IAS\Infra\App\IASGenericApp();

$app->run();

exit;

