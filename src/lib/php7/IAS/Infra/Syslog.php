<?php

namespace IAS\Infra;

trait Syslog
{
	public function open_log()
	{
		openlog($this->ScriptName, LOG_PID, LOG_LOCAL0);

	}

	public function close_log()
	{
		closelog();
	}
	
	public function log_debug($message)
	{
		syslog(LOG_DEBUG, $message);
	}
	public function log_info($message)
	{
		syslog(LOG_INFO, $message);
	}
	public function log_warning($message)
	{
		syslog(LOG_WARNING, $message);
	}
	public function log_error($message)
	{
		syslog(LOG_ERR, $message);
	}
	public function log_err($message)
	{
		sysllg(LOG_ERR, $message);
	}

	public function log_notice($message)
	{
		syslog(LOG_NOTICE, $message);
	}

	public function log_critic($message)
	{
		syslog(LOG_CRIT, $message);
	}
	public function log_crit($message)
	{
		syslog(LOG_CRIT, $message);
	}
	
	public function log_alert($message)
	{
		syslog(LOG_ALERT, $message);
	}
}

