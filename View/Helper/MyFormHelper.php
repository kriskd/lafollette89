<?php
App::uses('FormHelper', 'View/Helper');
class MyFormHelper extends FormHelper
{
    public $helpers = array('Html', 'Form');
    
    public function captcha($captcha_img, $label = 'I hate spam! Just tell me what color this is:')
    {   
        $element = $this->Form->label('captcha', $label);
        $element .= $this->Html->image($captcha_img);
        $element .= $this->Form->input('captcha', array('label' => false));
        
        return $element;
    }
}