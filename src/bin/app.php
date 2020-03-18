<?php

set_include_path(join(
	PATH_SEPARATOR,
	[
		dirname(realpath(__FILE__)).'/../lib/php7',
		'/opt/IAS/lib/php7',
		get_include_path(),
	]
));

include "IAS/Infra/App/IASGenericApp.php";

$app = new IAS\Infra\App\IASGenericApp();

$app->run();

/* This is only here for helping with debugging. */

print "<br>\n";
print(__FILE__ . "<br>\n");
print($_SERVER["SCRIPT_FILENAME"] . "<br>\n");
print("getcwd: " . getcwd() . "<br>\n");
print("DOCUMENT_ROOT: " . $_SERVER["DOCUMENT_ROOT"] . "<br>\n");

/* */

exit;

