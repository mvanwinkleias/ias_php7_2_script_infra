<?php

class IASInfra
{

	public function run()
	{
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
	
}
