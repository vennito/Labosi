<?php


class Database extends mysqli
{
	protected $con;
	protected $exception;
	
	/**
	 * Constructor: Set database access data.
	 *
	 * @param string	The database host
	 * @param string	The database username
	 * @param string	The database password
	 * @param string	The database name
	 * @param integer	The database port
	 *
	 * @return void
	 */
	public function __construct()
	{
		require(ROOT_PATH . 'includes/config.php');
		
		$this->con			= $database;

        if (!isset($this->con['port'])) {
            $this->con['port'] = 3306;
        }
		@parent::__construct($this->con['host'], $this->con['user'], $this->con['userpw'], $this->con['databasename'], $this->con['port']);
		if(mysqli_connect_error())
		{
			throw new Exception("Connection to database failed: ".mysqli_connect_error());
		}		
		parent::set_charset("utf8");
	}

	/**
	 * Purpose a query on selected database.
	 *
	 * @param string	The SQL query
	 *
	 * @return resource	Results of the query
	 */

	public function query($resource)
	{
		if($result = parent::query($resource))
		{
			return $result;
		}
		else
		{
			throw new Exception("SQL Error: ".$this->error."Query Code: ".$resource);
		}
        return false;
	}

	public function getFirstRow($resource)
	{		
		return $this->uniquequery($resource);
	}

	public function uniquequery($resource)
	{		
		$result = $this->query($resource);
		$Return = $result->fetch_array(MYSQLI_ASSOC);
		$result->close();
		return $Return;
		
	}
	/**
	 * Purpose a query on selected database.
	 *
	 * @param string	The SQL query
	 *
	 * @return resource	Results of the query
	 */

	public function getFirstCell($resource)
	{		
		return $this->countquery($resource);
	}
	public function countquery($resource)
	{		
		$result = $this->query($resource);
		list($Return) = $result->fetch_array(MYSQLI_NUM);
		$result->close();
		return $Return;
	}	
	/**
	 * Purpose a query on selected database.
	 *
	 * @param string	The SQL query
	 *
	 * @return resource	Results of the query
	 */

	public function fetchquery($resource, $encode = array())
	{		
		$result = $this->query($resource);
		$Return	= array();
		$Col	= 0;
		while($Data	= $result->fetch_array(MYSQLI_ASSOC)) {
			foreach($Data as $Key => $Store) {
				if(in_array($Key, $encode))
					$Data[$Key]	= base64_encode($Store);
			}
			$Return[]	= $Data;
		}
		$result->close();
		return $Return;
	}

	/**
	 * Returns the row of a query as an array.
	 *
	 * @param resource	The SQL query id
	 *
	 * @return array	The data of a row
	 */
	public function fetchArray($result)
	{
		return $result->fetch_array(MYSQLI_ASSOC);
	}
	
	public function fetch_array($result)
	{
		return $result->fetch_array(MYSQLI_ASSOC);
	}

	/**
	 * Returns the row of a query as an array.
	 *
	 * @param resource	The SQL query id
	 *
	 * @return array	The data of a row
	 */
	public function fetch_num($result)
	{
		return $result->fetch_array(MYSQLI_NUM);
	}

	/**
	 * Escapes a string for a safe SQL query.
	 *
	 * @param string The string that is to be escaped.
	 *
	 * @return string Returns the escaped string, or false on error.
	 */
	
    public function escape($string, $flag = false)
    {
		return $this->sql_escape($string, $flag);
    }
	
    public function sql_escape($string, $flag = false)
    {
		return ($flag === false) ? parent::escape_string($string): addcslashes(parent::escape_string($string), '%_');
    }
	
	/**
	 * Frees stored result memory for the given statement handle.
	 *
	 * @param resource	The statement to free
	 *
	 * @return void
	 */
	 
	public function free_result($resource)
	{
		return $resource->close();
	}
	
	/**
	 * Close mysql connection
	 *
	 * @param void
	 *
	 * @return void
	 */
	 
	public function close()
	{
		parent::close();
	}

}

?>