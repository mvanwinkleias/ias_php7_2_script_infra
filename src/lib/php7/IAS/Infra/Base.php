<?php

namespace IAS\Infra;

trait Base
{
	public function setup_paths()
	{

		$this->Script = $_SERVER["SCRIPT_FILENAME"];
		$this->Bin = dirname($this->Script);

		list($script_path) = get_included_files();
		$this->RealScript = realpath($script_path);
		$this->RealBin = realpath(dirname($this->RealScript));
		
		isset($this->bin_whence) OR
			$this->bin_whence = $this->RealBin;
		
		$this->ScriptName=basename($script_path);
		$this->BasePathsAreSet=1;
	}
	
	public function debug_paths()
	{
		if (! isset($this->BasePathsAreSet))
		{
			$this->setup_paths();
		}
		$this->log_info("Script:     ".$this->Script."\n");
		$this->log_info("RealScript: ".$this->RealScript."\n");
		$this->log_info("Bin:        ".$this->Bin."\n");
		$this->log_info("Realbin:    ".$this->RealBin."\n");
		$this->log_info("Bin whence: ".$this->bin_whence."\n");
		$this->log_info("In src dir: ".$this->is_in_src_dir()."\n");

		if ($this->is_in_src_dir())
		{
			$this->log_info("Project name:  ".$this->project_name()."\n");
		}
		else
		{
			$this->log_info("Artifact name: ".$this->artifact_name()."\n");
		}
	}
	
	public function is_in_src_dir()
	{
		if (! isset($this->BasePathsAreSet))
		{
			$this->setup_paths();
		}
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
		if (! isset($this->BasePathsAreSet))
		{
			$this->setup_paths();
		}
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
		if (! isset($this->BasePathsAreSet))
		{
			$this->setup_paths();
		}
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
