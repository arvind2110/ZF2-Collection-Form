<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use MyLib\Controller\AppController;

class IndexController extends AppController {
	
	public function indexAction() {	    
	    return new ViewModel ();
	}
}
