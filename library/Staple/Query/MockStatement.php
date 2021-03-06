<?php
/**
 * Created by PhpStorm.
 * User: scott.henscheid
 * Date: 3/21/2017
 * Time: 11:21 AM
 */

namespace Staple\Query;

use PDO;

class MockStatement implements IStatement
{
	/**
	 * The Query String
	 * @var string
	 */
	public $queryString;
	/**
	 * Result rows.
	 * @var array
	 */
	protected $rows = [];
	/**
	 * The database driver that is currently in use.
	 * @var string
	 */
	protected $driver;

	/**
	 * The Connection object
	 * @var IConnection
	 */
	protected $connection;

	/**
	 * @return array
	 */
	public function getRows()
	{
		return $this->rows;
	}

	/**
	 * @param array $rows
	 * @return MockStatement
	 */
	public function setRows(array $rows)
	{
		$this->rows = $rows;
		$this->count = count($rows);

		return $this;
	}

	/**
	 * @return int
	 */
	public function getCount()
	{
		return count($this->rows);
	}

	public function fetch($fetch_style = PDO::ATTR_DEFAULT_FETCH_MODE, $cursor_orientation = PDO::FETCH_ORI_NEXT, $cursor_offset = 0)
	{
		$val = current($this->rows);
		next($this->rows);
		return $val;
	}

	public function fetchAll($fetch_style = PDO::ATTR_DEFAULT_FETCH_MODE, $fetch_argument = null, $ctor_args = array())
	{
		return $this->getRows();
	}

	public function rowCount()
	{
		return $this->getCount();
	}

	public function foundRows()
	{
		return $this->getCount();
	}

	public function errorInfo()
	{
		return [];
	}

	/**
	 * Get the driver string
	 * @return string
	 */
	public function getDriver()
	{
		return $this->driver;
	}

	/**
	 * Set the driver string
	 * @param string $driver
	 */
	public function setDriver($driver)
	{
		$this->driver = $driver;
	}

	/**
	 * @return IConnection
	 */
	public function getConnection(): IConnection
	{
		return $this->connection;
	}

	/**
	 * @param IConnection $connection
	 * @return IStatement
	 */
	public function setConnection(IConnection $connection): IStatement
	{
		$this->connection = $connection;
		return $this;
	}

	public function bindColumn($column, &$param, $type = null, $maxlen = null, $driverdata = null)
	{
		return true;
	}

	public function bindParam($parameter, &$variable, $data_type = PDO::PARAM_STR, $length = null, $driver_options = null)
	{
		return true;
	}

	public function bindValue($parameter, $value, $data_type = PDO::PARAM_STR)
	{
		return true;
	}

	/**
	 * @param null $bound_input_params
	 * @return mixed
	 */
	public function execute($bound_input_params = NULL)
	{
		return true;
	}
}