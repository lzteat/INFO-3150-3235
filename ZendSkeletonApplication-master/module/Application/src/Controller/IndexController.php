<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Database\QueryProcessor;

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
        $this->queryProcessor = new QueryProcessor('4669a2', 'admintpc', '3lmerfudd');
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
        return new ViewModel();
    }
}
