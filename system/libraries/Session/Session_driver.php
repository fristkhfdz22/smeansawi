
<?php  
abstract class CI_Session_driver implements SessionHandlerInterface {

protected $_config;
protected $_fingerprint;
protected $_lock = FALSE;
protected $_session_id;
protected $_success, $_failure;

public function __construct(&$params)
{
	$this->_config =& $params;

	if (is_php('7'))
	{
		$this->_success = TRUE;
		$this->_failure = FALSE;
	}
	else
	{
		$this->_success = 0;
		$this->_failure = -1;
	}
}

// ------------------------------------------------------------------------

public function php5_validate_id()
{
	if (isset($_COOKIE[$this->_config['cookie_name']]) && ! $this->validateSessionId($_COOKIE[$this->_config['cookie_name']]))
	{
		unset($_COOKIE[$this->_config['cookie_name']]);
	}
}

// ------------------------------------------------------------------------

protected function _cookie_destroy()
{
	return setcookie(
		$this->_config['cookie_name'],
		NULL,
		1,
		$this->_config['cookie_path'],
		$this->_config['cookie_domain'],
		$this->_config['cookie_secure'],
		TRUE
	);
}

// ------------------------------------------------------------------------

protected function _get_lock($session_id)
{
	$this->_lock = TRUE;
	return TRUE;
}

// ------------------------------------------------------------------------

protected function _release_lock()
{
	if ($this->_lock)
	{
		$this->_lock = FALSE;
	}

	return TRUE;
}

// Tambahkan atribut #[\ReturnTypeWillChange] pada metode yang relevan

#[\ReturnTypeWillChange]
public function open($save_path, $name)
{
	// Implementasi method open
}

#[\ReturnTypeWillChange]
public function close()
{
	// Implementasi method close
}

#[\ReturnTypeWillChange]
public function read($session_id)
{
	// Implementasi method read
}

#[\ReturnTypeWillChange]
public function write($session_id, $data)
{
	// Implementasi method write
}

#[\ReturnTypeWillChange]
public function destroy($session_id)
{
	// Implementasi method destroy
}

#[\ReturnTypeWillChange]
public function gc($maxlifetime)
{
	// Implementasi method gc
}
}
