<?php

class MyRedis extends Redis implements IApplicationComponent
{
    public $host;
    public $port;
    public $password;
    private $_initialized=false;

    function init()
    {
        parent::__construct();
        $this->connect($this->host,$this->port);
        $this->auth($this->password);
		$this->_initialized = true;
    }

    public function getIsInitialized()
	{
		return $this->_initialized;
	}

}

