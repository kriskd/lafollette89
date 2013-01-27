<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('PhpReader', 'Configure');

class ClassmatesController extends AppController
{
    public function beforeFilter()
    {
        Configure::config('default', new PhpReader());
        Configure::load('my_configs', 'default');
    }
    public function index()
    {
        $from_email = Configure::read('email'); 
        $email = new CakeEmail();
        $email->config('smtp');
        $email->from(array($from_email => 'La Follette 89'));

        $classmates = $this->Classmate->find('all', array('order' => array('formerLastName', 'firstName')));
        $this->set(compact('classmates'));
        
        if(!empty($this->request->data)){
            $recipients = array_shift($this->request->data);
            foreach($recipients['id'] as $id){
                $recipient = $this->Classmate->find('list', array('conditions' => array('id' => $id),
                                                                   'fields' => array('email')));
                $send_to = array_shift($recipient);
                $email->to($send_to)
                        ->subject('About')
                        ->send('My message');
                
            }
        }
    }
}