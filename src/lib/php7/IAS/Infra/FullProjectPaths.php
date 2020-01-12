<?php

trait FullProjectPaths
{
	public function debug_extended_paths()
	{
		print "conf_dir:     ".$this->conf_dir()."\n";
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
				."../.."
				.$self->artifact_name()
				."/etc";
		}
	}
}
