<?php

namespace IAS;

include "IAS/Infra/FullProjectPaths.php";

class Infra
{
	use Infra\FullProjectPaths;
	public function run()
	{
		$this->setup_paths();

		if (method_exists($this, 'setup'))
		{
			$this->setup();
		}
		
		$this->main();
	
		if (method_exists($this, 'teardown'))
		{
			$this->teardown();
		}
	}

	// Path sections (soon to be abstracted)
	public function setup_paths()
	{
		list($script_path) = get_included_files();
		$this->Script = $script_path;
		$this->RealScript = realpath($script_path);
		$this->Bin = dirname($script_path);
		$this->RealBin = realpath($this->Bin);
		
		isset($this->bin_whence) OR
			$this->bin_whence = $this->RealBin;
	}
	
	public function debug_paths()
	{
		print "Script:     ".$this->Script."\n";
		print "RealScript: ".$this->RealScript."\n";
		print "Bin:        ".$this->Bin."\n";
		print "Realbin:    ".$this->RealBin."\n";
		print "Bin whence: ".$this->bin_whence."\n";
		print "In src dir: ".$this->is_in_src_dir()."\n";

		if ($this->is_in_src_dir())
		{
			print "Project name:  ".$this->project_name()."\n";
		}
		else
		{
			print "Artifact name: ".$this->artifact_name()."\n";
		}
	}
	
	public function is_in_src_dir()
	{
		if (! isset($this->in_src_dir))
		{
			$components = explode('/', $this->bin_whence);
			if ($components[count($components)-2] == 'src')
			{
				$this->in_src_dir = 1;
			}
			else
			{
				$this->in_src_dir = 0;
			}
		}
		
		return $this->in_src_dir;
	}
	
	public function artifact_name()
	{
		if (! isset($this->artifact_name)
			&& !$this->is_in_src_dir()
		)
		{

			$components = explode('/', $this->bin_whence);
			$artifact_name = $components[count($components)-1];
			$this->artifact_name = $artifact_name;
		}
		
		return $this->artifact_name;
	}

	public function project_name()
	{
		if (
			! isset($this->project_name)
			&& $this->is_in_src_dir()
		)
		{
			$components = explode('/', $this->bin_whence);
			$project_name = $components[count($components)-3];
			
			$this->project_name = $project_name;
		}
		return $this->project_name;
	}
}
