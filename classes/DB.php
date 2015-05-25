<?php


class DB
{
    private $dbh;
    private $className = 'stdClass';


    public function __construct()
    {
        $dsn = 'mysql:dbname=SDA;host=localhost';
        $this->dbh = new PDO ($dsn , 'root' , '');
    }

    public function setClassName($calssName)
    {
        $this->className = $calssName;
    }

    public function query ($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        return $sth->fetchAll(PDO::FETCH_CLASS/*, $this->className*/);

    }
    public function execute ($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId( $name = 'id_masters');
    }
}