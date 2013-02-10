<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('PhpReader', 'Configure');

class SendEmailsController extends AppController
{
    public $uses = array('Classmate');
    
    public function beforeFilter()
    {
        Configure::config('default', new PhpReader());
        Configure::load('my_configs', 'default');
    }
    
    /**
     * All data for sending emails
     */
    public function send()
    {
        $referer = $this->referer(null, true);
        $route = Router::url(array('controller' => 'classmates', 'action' => 'compose'));
        if(!empty($this->request->data) && strcasecmp($referer, $route)==0){
            $from_email = Configure::read('email'); 
            $email = new CakeEmail(); 
            $email->config('smtp');
            $email->from(array($from_email => 'La Follette 89')); 
        
            $data = $this->request->data;
            $recipients = $data['Classmate'];
            foreach($recipients as $id){
                $recipient = $this->Classmate->find('list', array('conditions' => array('id' => $id),
                                                                   'fields' => array('email')));
                
                $send_to = array_shift($recipient); 
                //Emails will be written to db to send via cron job
                /*$email->to($send_to)
                        ->subject('About')
                        ->send('My message');*/
                }
        }
        
    }
}