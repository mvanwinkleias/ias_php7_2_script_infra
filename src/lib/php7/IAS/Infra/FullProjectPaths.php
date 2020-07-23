<?php

/**
 * Calculates / defines the following directories:
 * 	- bin
 * 	- lib
 * 	- log
 * 	- conf
 * 	- input
 * 	- output
 */
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
		
		// print "Namespace: ".__TRAIT__."\n";
		
		if ($path_name == "lib")
		{
			$trait = __TRAIT__;
			$trait_parts = explode('\\', $trait);
			
			$file = __FILE__;
			// print "File: $file\n";
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
		$this->log_info("bin_dir: ".$this->bin_dir()."\n");
		$this->log_info("lib_dir: ".$this->lib_dir()."\n");
		$this->log_info("log_dir: ".$this->log_dir()."\n");
		$this->log_info("conf_dir: ".$this->conf_dir()."\n");
		$this->log_info("input_dir: ".$this->input_dir()."\n");
		$this->log_info("output_dir: ".$this->output_dir()."\n");
				
	}
	

	public function bin_dir()
	{
		return $this->bin_whence;
	}
	
	public function input_dir()
	{
		return $this->get_infra_path('input');
	}
	
	public function output_dir()
	{
		return $this->get_infra_path('output');
	}
	
	public function conf_dir()
	{
		return $this->get_infra_path('etc');
	}

	public function log_dir()
	{
		return $this->get_infra_path('log');
	}
	
	public function lib_dir()
	{
		return $this->get_infra_path('lib');
	}
	
}
