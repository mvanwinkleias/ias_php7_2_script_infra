<?php

namespace IAS\Infra;

trait App
{
	public function run()
	{

		$this->setup_paths();

		if (method_exists($this, 'open_log'))
		{
			$this->open_log();
		}
		
		if (method_exists($this, 'log_start'))
		{
			$this->log_start();
		}

		if (method_exists($this, 'setup'))
		{
			$this->setup();
		}
		
		$this->main();
		
		$this->app_cleanup();
	}

	public function app_cleanup()
	{
		if (method_exists($this, 'teardown'))
		{
			$this->teardown();
		}
		
		if (method_exists($this, 'log_end'));
		{
			$this->log_end();
		}
		
		if (method_exists($this, 'close_log'))
		{
			$this->close_log();
		}
	}
}
