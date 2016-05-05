<?php

/**
 * MyDb
 * A small PHP Data Objects extension class for database handling.
 *
 * @version   1.0.0
 * @author    José Luis Quintana <http://git.io/joseluisq>
 * @link      https://github.com/quintana-dev/mydb
 */
class MyDb extends PDO {

  /**
   * Setup
   *
   * @param array $setup
   *
   *  Array (
   *      [driver]  => mysql          (default: mysql)
   *    [hostname]  => localhost      (default: localhost)
   *        [port]  => 3306           (default: 3306)
   *    [username]  => usr
   *    [password]  => pwd
   *      [dbname]  => dbname
   *     [charset]  => utf8           (default: utf8)
   *     [options]  => [PDO options]
   *  )
   *
   * Note: Default driver is MySQL.
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
      switch ($driver) {
        case 'mysql':
          $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset",
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => TRUE,
          );
          break;

        default:
          die("`$driver` driver is not supported. Feel free to add support.");
          break;
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
