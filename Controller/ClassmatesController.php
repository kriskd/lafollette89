<?php
App::uses('AppController', 'Controller');

class ClassmatesController extends AppController
{
    public function index()
    {
        $classmates = $this->Classmate->find('all', array('order' => array('formerLastName', 'firstName')));
        $this->set(compact('classmates'));
        
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
    
    public function compose()
    {
        $ids = $this->Session->read('ids');
        if(empty($ids)){
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->delete('ids'); 
        $this->set(compact('ids'));
    }
}