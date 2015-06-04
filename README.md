# MyDb

> A small PHP Data Objects extension class for database handling.

## Usage

```php
$database_settings array(
  "hostname"    => "localhost",
  "username"    => "usr",
  "password"    => "pwd",
  "dbname"      => "dbname",

  // "driver"   => "mysql",
  // "port"     => 3306,
  // "charset"  => "utf8",
  // "options"  => array( [PDO options] )
);

$dbh = new MyDb($database_settings);
$sql = 'SELECT id, description FROM `mytable`';

$sth = $dbh->prepare($sql);
$sth->execute();
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

```

## Licence
MIT licence
