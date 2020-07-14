<?php

namespace IAS\Infra;

trait WebHomeDir
{
	function get_owner_home_dir()
	{
		list($scriptPath) = get_included_files();
		//print_r(posix_getpwuid(fileowner($scriptPath)));
		$info = posix_getpwuid(fileowner($scriptPath));
		return $info["dir"];
	}

	function get_home_dir()
	{

		$home = null;
		if (
			getenv('IAS_INFRA_USE_OWNER_HOME_DIR') 
			|| ! $home = getenv("HOME") )
		{
			$home = $get_owner_home_dir();
		}

		return $home;
	}
}

?>
