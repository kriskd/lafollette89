<?php
App::uses('AppController', 'Controller');
App::uses('CaptchaComponent', 'Controller/Component');

class ClassmatesController extends AppController
{
    public $components = array('Captcha');

    public function beforeFilter()
    {
        
    }
    
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
}