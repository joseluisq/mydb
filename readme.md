# MyDb

> A small PHP Data Objects ([PDO](http://php.net/manual/en/book.pdo.php)) extension class for database handling.

## Usage

```php
<?php

$options = array(
  "hostname"    => "localhost",
  "username"    => "usr",
  "password"    => "pwd",
  "dbname"      => "dbname",

  // "driver"   => "mysql",
  // "port"     => 3306,
  // "charset"  => "utf8",
  // "options"  => array( [PDO options] )
);

$dbh = new MyDb($options);
$sql = "SELECT id, description FROM `mytable`";

$sth = $dbh->prepare($sql);
$sth->execute();
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

```

## License
MIT license

© 2016 [José Luis Quintana](http://git.io/joseluisq)
