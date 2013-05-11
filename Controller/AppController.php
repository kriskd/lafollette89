<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $components =    array(
                            'Captcha',
                            'Session',
                            'Auth' => array(
                                'authenticate' => array(
                                    'Form' => array(
                                        'userModel' => 'Classmate',
                                        'fields' => array(
                                            'username' => 'login',
                                        ),
                                    ),
                                ),
                                'loginAction' => array(
                                    'controller' => 'classmates',
                                    'action' => 'login',
                                    'admin' => false
                                ),
                                'loginRedirect' => array(
                                    'controller' => 'classmates',
                                    'action' => 'edit',
                                    'admin' => false
                                ),
                                'authorize' => array(
                                    'Controller'
                                ),
                            ),
                        );
        
    public function beforeRender()
    {
        if(Configure::read('debug') > 0){
            App::import('Vendor', 'lessc');
            $lessc = new lessc();
            $less = getcwd() . DS . 'less' . DS . 'styles.less'; 
            $css = getcwd() . DS . 'css' . DS . 'styles.css'; 
            $lessc->checkedCompile($less,$css);
        }
        parent::beforeRender();
    }
    
    public function beforeFilter()
    {
        //Some variables needed in the view
        $has_login = $this->Auth->user('login');
        $role = $this->Auth->user('role');
        $logged_in = $this->Auth->loggedIn();
        $this->set(compact('has_login', 'role', 'logged_in'));
    }
    
    public function isAuthorized($user = null)
    {   
        if(empty($this->request->params['admin'])) return true;
        
        if(isset($this->request->params['admin'])){
            return (bool)($user['role'] == 9);
        }
        
        return false;
    }
}
