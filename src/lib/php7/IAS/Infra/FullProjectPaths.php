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
			$trait = __TRAIT__;
			$trait_parts = explode('\\', $trait);
			
			$file = __FILE__;
			print "File: $file\n";
			$file_parts = explode('/', $file);
			
			$file_parts = array_slice(
				$file_parts,
				0,
				count($file_parts) - count($trait_parts)
			);
			
			return join('/', $file_parts);
		}
		
		if ($this->is_in_src_dir())
		{
			return $this->bin_whence."/../$wanted_name";
		}
		else
		{
			return $this->bin_whence
				."/../../$path_name/"
				.$this->artifact_name();
		}
	}
	
	public function debug_infra_path()
	{
		print "lib: ".$this->get_infra_path('lib')."\n";
		print "conf: ".$this->get_infra_path('conf')."\n";
		print "input: ".$this->get_infra_path('input')."\n";
		
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
