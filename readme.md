# MyDb

> A small PHP Data Objects ([PDO](http://php.net/manual/en/book.pdo.php)) extension class for database handling.

## Usage

```php
<?php

// MySQL

$options = array(
  "hostname"    => "localhost",
  "username"    => "usr",
  "password"    => "pwd",
  "dbname"      => "dbname"
);

$dbh = new MyDb($options);
$sql = "SELECT id, description FROM `mytable`";

$sth = $dbh->prepare($sql);
$sth->execute();
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

```


## Options

```php
<?php

$options = array(
    "driver"  => "mysql"          // > default: mysql
  "hostname"  => "localhost"      // > default: localhost
      "port"  => 3306             // > default: 3306
  "username"  => "usr"
  "password"  => "pwd"
    "dbname"  => "dbname"
   "charset"  => "utf8"           // > default: utf8
   "options"  => array( [PDO options] )
);

```

## License
MIT license

© 2016 [José Luis Quintana](http://git.io/joseluisq)
