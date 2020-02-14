<?php

namespace IAS\Infra;

include "IAS/Infra/Syslog.php";

trait Logger
{
	use Syslog;
	
	public function log_start()
	{
		$this->log_info($this->RealScript." --BEGINNING--");
	}
	
	public function log_end()
	{
		$this->log_info($this->RealScript." --ENDING--");
	}
}
