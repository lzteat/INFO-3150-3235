<?php

namespace Application\Database;

use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Adapter;

class QueryProcessor
{
    protected $sql;
    protected $adapter;

    /**
     * Table constructor.
     *
     * @param string $hostname
     * @param $database
     * @param $username
     * @param $password
     * @param string $driver
     */
    public function __construct($database, $username, $password, $hostname = 'tpc2017.cnd231jurlnn.us-west-2.rds.amazonaws.com',  $driver = 'Pdo_Mysql')
    {
        $this->adapter = new Adapter([
            'driver'   => $driver,
            'hostname' => $hostname,
            'username' => $username,
            'password' => $password,
            'database' => $database,
        ]);

        $this->sql = new Sql($this->adapter);
    }

    /**
    * Testing if SQL works
    */
    public function testQuery()
    {
        $select = $this->sql
            ->select()
            ->columns()
            ->from()
        ;

        $query = $this->sql->buildSqlString($select);

        return $this->adapter->query($query)->execute();
    }

}
