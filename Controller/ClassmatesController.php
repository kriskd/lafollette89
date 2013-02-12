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
        $captcha_img = $this->Captcha->makeCaptcha();
        $ids = $this->Session->read('ids');
        if(empty($ids)){
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->delete('ids'); 
        $this->set(compact('ids', 'captcha_img'));
    }
}