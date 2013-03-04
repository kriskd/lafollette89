<?php
App::uses('AppController', 'Controller');
App::uses('CaptchaComponent', 'Controller/Component');

class ClassmatesController extends AppController
{
    public $components = array('Captcha');
    
    /**
     * Display a list of classmates to send emails to.
     */
    public function index()
    {
        $classmates = $this->Classmate->find('all', array('order' => array('formerLastName', 'firstName')));
        $count = count($classmates);
        $chunk = array_chunk($classmates, ceil($count/3));
        
        $col1 = current($chunk);
        $col2 = next($chunk);
        $col3 = next($chunk);
        
        $this->set(compact('col1', 'col2', 'col3'));
        
        if(!empty($this->request->data)){
            $recipients = array_shift($this->request->data);
            $ids = array();
            foreach($recipients['id'] as $id){
                $ids[] = $id;
            }
            $this->Session->write(compact('ids'));
            $this->redirect(array('action' => 'compose'));
        }
    }
       
    /**
     * After selecting classmates to send email to, compose the email
     */
    public function compose()
    {
        $referer = $this->referer(null, true);
        $route = Router::url(array('controller' => 'classmates', 'action' => 'compose')); 
        if(!empty($this->request->data) && strcasecmp($referer, $route)==0){
            $this->loadModel('SendEmail');
            $data = $this->request->data; 
            $this->SendEmail->set($data); 
            if($this->SendEmail->validates()){ 
                $captcha = $data['SendEmail']['captcha']; 
                $sendemail = array('SendEmail' => $data['SendEmail']);
                $recipients = $data['Classmate'];
                foreach($recipients as $id){
                    $recipient = $this->Classmate->find('list', array('conditions' => array('id' => $id),
                                                                       'fields' => array('email')));
                    
                    $to_email = array_shift($recipient);
                    $sendemail['SendEmail']['to_email'] = $to_email;
                    unset($sendemail['SendEmail']['captcha']);
                    $savemany[] = $sendemail; 
                }
                $this->SendEmail->saveMany($savemany, array('validate' => false));
                $this->Session->delete('ids');
                $this->Session->setFlash('Your email will be sent.');
            }
        }

        $captcha_img = $this->Captcha->makeCaptcha();
        
        $ids = $this->Session->read('ids'); 
        if(empty($ids)){
            $this->redirect(array('action' => 'index'));
        }
        
        $this->set(compact('ids', 'captcha_img'));
    }
    
    /**
     * Add classmate email
     */
    public function add()
    {
        if($this->request->is('post') || $this->request->is('put')){
            $data = $this->request->data; 
            $captcha = $data['Classmate']['captcha'];
            $this->Classmate->create();
            if($this->Classmate->save($this->request->data)){
                $this->Session->setFlash('Saved');
            }
            else{
                $this->Session->setFlash('Not saved');
            }
        }
        $captcha_img = $this->Captcha->makeCaptcha();
        $this->set(compact('captcha_img'));
    }
     
    /**
     * Get the user object for the user email
     */
    public function email()
    {   
        if($this->request->is('post') || $this->request->is('put')){
            $data = $this->request->data;
            $email = $data['Classmate']['email']; 
            if($classmate = $this->Classmate->find('first', array('conditions' => array(
                                                            'email' => $email,
                                                        )))){
                if($classmate['Classmate']['login'] == null){  
                    $this->Session->write(compact('classmate'));
                    $this->redirect(array('action' => 'create'));
                }
                else{
                    $this->Session->SetFlash('This email already has an account associated with it.');
                    //redirect to login
                }
            }
            else{
                $this->Session->setFlash('This email is not registered with the site.');
            }
        }
    }
    
    /**
     * Create a full user
     */
    public function create()
    {
        $classmate = $this->Session->read('classmate'); 
        if(isset($classmate)){
            if($this->request->is('post') || $this->request->is('put')){
                $data = $this->request->data;
                $this->Classmate->addPwValidator();
                $this->Classmate->set($data);
                if($this->Classmate->validates()){
                    //Update user
                }
                //Redirect to user's control panel
            }
        }
        else{
            $this->redirect(array('action' => 'email'));
        }
    }
}