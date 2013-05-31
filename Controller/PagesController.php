<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Content');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}
    
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Security->validatePost = false;
    }
	
	public function admin_index()
	{
		$controllerClasses = App::objects('Controller');
		foreach($controllerClasses as $controller){
			if(strcasecmp($controller, 'AppController' != 0)){
				App::uses($controller, 'Controller');
				$actions = get_class_methods($controller);
				$parentActions = get_class_methods('AppController');
                $controllers[$controller] = array_diff($actions, $parentActions);
			}
		}
		$this->set(compact('controllers'));
	}
	
    /**
     * Edit page content.
     */
	public function admin_content($slug)
	{   
        if(empty($slug)){
            $this->redirect(array('controller' => 'pages', 'action' => 'index', 'admin' => true));
        }
        if($this->request->is('post') || $this->request->is('put')){ 
            $this->_processContent();
        }
        $content = $this->Content->find('all', array('conditions' => array('slug' => $slug))); 
		$this->set(compact('slug', 'content'));
	}
	
    /**
     * Add page content. Before data is saved it is formatted in the saveMany
     * format so one method can handle both add and edit.
     */
	public function admin_add($slug)
	{
        if($this->request->is('post') || $this->request->is('put')){
            $this->request->data['Content'] = array($this->request->data['Content']);
            $this->_processContent();
        }
		$this->set(compact('slug'));
	}
    
    protected function _processContent()
    {
        //For beforeSave to work, request data must be sent with 'Content' key
        if($this->Content->saveMany($this->request->data['Content'])){ 
            $this->Session->setFlash('Content saved');
        }
        else{
            $this->Session->setFlash('Content not saved');
        }
        $this->redirect(array('controller' => 'pages', 'action' => 'index', 'admin' => true));
    }
}
