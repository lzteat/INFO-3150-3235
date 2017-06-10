<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Database\QueryProcessor;
use Application\Model\Customer;
use Application\Model\Expense;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController
{
    // This is bad practice for now until I read up on factory design patterns
    private $queryProcessor;
    /**
    * Continued bad practice
    */
    public function __construct()
    {
        // creates a connection to the db
        $this->queryProcessor = new QueryProcessor('info3150', 'admintpc', '3lmerfudd');
    }

    /*
    * For routes on /
    */
    public function indexAction()
    {
        return new ViewModel();
    }

    /*
    * For routes on /expense
    */
    public function expenseAction()
    {
        $data = [];

        $expenses = $this->queryProcessor->getOneMonthExpenses();
        foreach($expenses as $expense)
        {
            $expenseModel = new Expense();
            $expenseModel
                ->setCId($expense['cID'])
                ->setEId($expense['eID'])
                ->setName($expense['eName'])
                ->setPrice($expense['ePrice'])
                ->setDate($expense['eDate'])
            ;

            $data[] = $expenseModel->getArray();
        }

        $request = $this->getRequest();
        if($request->isPost()){
            $expenseName = $request->getPost('expenseName');
            $expensePrice = $request->getPost('expensePrice');

            $this->queryProcessor->addExpense($expenseName, $expensePrice);
        }

        $doto = ['expenses' => json_encode($data)];

        return new ViewModel($doto);
    }
}
