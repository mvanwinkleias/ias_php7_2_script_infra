<?php

namespace IAS\Infra;

trait FullProjectPaths
{
	public function debug_extended_paths()
	{
		# print "conf_dir:     ".$this->conf_dir()."\n";
		
		$this->debug_infra_path();
	}
	
	public function get_infra_path($path_name)
	{
		$wanted_name = $path_name;
		if ($path_name == "conf")
			$wanted_name = 'etc';
		
		print "Namespace: ".__TRAIT__."\n";
		
		if ($path_name == "lib")
		{

		}
	}
	
	public function debug_infra_path()
	{
		print "lib: ".$this->get_infra_path('lib')."\n";
		print "conf: ".$this->get_infra_path('conf')."\n";
		
	}
	
	public function conf_dir()
	{
		if ($this->is_in_src_dir())
		{
			return $this->bin_whence."/../etc";
		}
		else
		{
			return $this->bin_whence
				."/../../etc/"
				.$this->artifact_name();
		}
	}
}
