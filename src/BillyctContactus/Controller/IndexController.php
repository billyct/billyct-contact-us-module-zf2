<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace BillyctContactus\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\EventManager\EventManagerInterface;

class IndexController extends AbstractActionController
{
	private $collection;

	public function setEventManager(EventManagerInterface $events) {
		parent::setEventManager($events);
		$this->init();
	}

	public function init() {
		$this->collection = $this->getServiceLocator()->get('BillyctContactus\MongoColletion');
	}

    public function indexAction()
    {
    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		$email = $request->getPost('email');
    		$title = $request->getPost('title');
    		$content = $request->getPost('content');

    		$this->collection->save(array(
    			'email' => $email,
    			'title' => $title,
    			'content' => $content
    		));

    		return new ViewModel(array('success' => '提交成功'));
    	}
        return new ViewModel();
    }

    public function listAction() 
    {
    	$contacts = $this->collection->find();
    	return new ViewModel(array('contacts' => $contacts));
    }
}
