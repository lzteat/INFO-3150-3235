<?php

namespace Application\Database;

use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Insert;
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
        $this->insert = new Insert($this->adapter);
    }

    /**
    * Method for getting the expenses of June
    * TODO: take a parameter to get the expenses of one month
    */
    public function getOneMonthExpenses()
    {
        $select = $this->sql
            ->select()
            ->from('expense')
            ->where('eDate >= "2017-06-01"')
            ->where('eDate <= "2017-07-01"')
            ->where('cID = 1')
        ;

        $query = $this->sql->buildSqlString($select);

        return $this->adapter->query($query)->execute();
    }

    /**
    * TODO: get all expenses of a given ID
    */
    public function getAllExpenses()
    {
        //stub
    }

    /**
    * Method for adding an expense
    * @param $price the price of the expense to be inserted
    * @param $name the name of the expense to be inserted
    * @param $date the date of the expense to be inserted
    */
    public function addExpense($name, $price, $date)
    {
        
        $insert = $this->insert
            ->into('expense')
            ->values(array(
                'cID' => '1',
                'eName' => $name,
                'ePrice' => $price,
                'eDate' => $date
            ))
        ;

        $query = $this->sql->buildSqlString($insert);

        return $this->adapter->query($query)->execute();
    }

}
