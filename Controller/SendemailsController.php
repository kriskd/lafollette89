<?php
App::uses('AppController', 'Controller');

class SendEmailsController extends AppController
{
    public $uses = array('Classmate', 'SendEmail');
    
    /**
     * Write emails to send to database
     */
    public function index()
    {
        $referer = $this->referer(null, true);
        $route = Router::url(array('controller' => 'classmates', 'action' => 'compose'));
        if(!empty($this->request->data) && strcasecmp($referer, $route)==0){
            $data = $this->request->data; 
            $sendemail = array('SendEmail' => $data['Sendemail']); 
            $recipients = $data['Classmate'];
            foreach($recipients as $id){
                $recipient = $this->Classmate->find('list', array('conditions' => array('id' => $id),
                                                                   'fields' => array('email')));
                
                $to_email = array_shift($recipient);
                $sendemail['SendEmail']['to_email'] = $to_email;
                $this->SendEmail->create();
                $this->SendEmail->save($sendemail);
            }
        }
    }

}