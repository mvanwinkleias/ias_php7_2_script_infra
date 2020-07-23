<?php

/**
 * Defines common logging functionality
 */
namespace IAS\Infra;

include "IAS/Infra/Syslog.php";

trait Logger
{
	use Syslog;
	
	public function log_start()
	{
		$this->log_info($this->Script." --BEGINNING--");
		$this->log_info("Cwd: " . getcwd());
	}
	
	public function log_end()
	{
		$this->log_info($this->Script." --ENDING--");
	}
}
