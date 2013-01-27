<?php
App::uses('AppController', 'Controller');

class ClassmatesController extends AppController
{
    public function index()
    {
        $classmates = $this->Classmate->find('all', array('order' => array('formerLastName', 'firstName')));
        $this->set(compact('classmates'));
        
        if(!empty($this->request->data)){
            var_dump($this->request->data);
        }
    }
}