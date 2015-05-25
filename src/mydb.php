<?php

/**
 * MyDb
 * A small PHP Data Objects extension class for database handling.
 *
 * @version   1.0.0
 * @author    José Luis Quintana <joseluisquintana20@gmail.com>
 * @link      https://github.com/quintana-dev/mydb
 */
class MyDb extends PDO {

	/**
	 * Setup
	 *
	 * @param array $setup
	 *
	 *  Array (
	 *    [driver] => mysql
	 *    [hostname] => localhost
	 *    [port] => 3306
	 *    [username] => usr
	 *    [password] => pwd
	 *    [dbname] => dbname
	 *    [charset] => utf8
	 *    [options] => [PDO options]
	 *  )
	 *
	 * Default driver is MySQL
	 *
	 */
	function __construct($setup) {
		$driver = isset($setup['driver']) ? $setup['driver'] : 'mysql';
		$hostname = isset($setup['hostname']) ? $setup['hostname'] : 'localhost';
		$port = isset($setup['port']) ? $setup['port'] : 3306;
		$charset = isset($setup['charset']) ? $setup['charset'] : 'utf8';
		$username = $setup['username'];
		$password = $setup['password'];
		$dbname = $setup['dbname'];
		$options = array();

		if (isset($setup['options'])) {
			$options = $setup['options'];
		} else {
			if ($driver === 'mysql') {
				$options = array(
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . $charset,
					PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => TRUE,
				);
			}
		}

		try {
			parent::__construct("$driver:host=$hostname;port=$port;dbname=$dbname", $username, $password, $options);

			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}
